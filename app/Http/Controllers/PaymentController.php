<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\School_Class;
use Carbon\Carbon;
use App\Models\Payment_status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class PaymentController extends Controller
{

    public function index()
    {
        $id = "";

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $school_class = $parent->students[0]->school_class;
            $listPayment = $school_class->payment->sortBy([
                ['id', 'desc'],
            ]);

            //dd($listPayment);
            $date = Carbon::now()->format('d/m/Y');
            //$paymentStatus = Payment_status::where('student_id', $parent->student_id)->get();
            $paymentStatus = Payment_status::select('status')->where('student_id', $parent->student_id)->get();
            return view('manage_payment.list_payment_parent', compact('parent', 'listPayment', 'date', 'paymentStatus'));
        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $date = Carbon::now()->format('d/m/Y');
            return view('manage_payment.list_payment_teacher', compact('teacher', 'date'));
        }

        return redirect()->route('login');
    }


    public function addPayment()
    {
        $class = "";
        $clasList = School_Class::orderBy('id')->pluck('class_name', 'id');
        return view('manage_payment.add_payment', compact('class', 'clasList'));
    }


    public function addPaymentStore(Request $request)
    {

        $request->validate([

            'payment_title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',

        ]);


        $payment = Payment::create([

            'teacher_id' => Auth::user()->teacher->id,
            'class_id' => $request->class,
            'payment_title' => $request->payment_title,
            'description' => $request->description,
            'amount' => $request->amount,

        ]);

        $students = School_class::find($request->class)->students;
        foreach ($students as $student) {

            $paymentStatus = Payment_status::create([
                'student_id' => $student->id,
                'payment_id' => $payment->id,
                'status' => "Not Paid",
                'billCode' => "BIL0000",
            ]);
        }

        return \Redirect::route('payment.list_payment')->with('success', 'Add Successfuly');
    }


    public function detailPayment(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;
            $id = $request->route('id');
            $detailPayment = Payment::where('id', $id)->first();
            $paymentStatus = Payment_status::where('payment_id', $id)->where('student_id', $parent->student_id)->first();
            return view('manage_payment.detail_payment_parent', compact('parent', 'detailPayment', 'paymentStatus'));
        } elseif (Auth::check() && Auth::user()->hasRole('teacher')) {
            $teacher = Auth::user()->teacher;
            $id = $request->route('id');
            $detailPayment = Payment::where('id', $id)->first();
            return view('manage_payment.detail_payment_teacher', compact('teacher', 'detailPayment'));
        }
    }


    public function createBill(Request $request)
    {

        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $parent = Auth::user()->parent;

            $id = $request->id;

            $parentsName = "{$parent->first_name} {$parent->last_name}";
            $payment = Payment::find($id);
            // dd($payment);
            $option = array(
                'userSecretKey' => config('toyyibpay.key'),
                'categoryCode' => config('toyyibpay.category'),
                'billName' => $payment->payment_title,
                'billDescription' => $payment->description,
                'billPriceSetting' => 1,
                'billPayorInfo' => 1,
                'billAmount' => ($payment->amount) * 100,
                'billReturnUrl' => route('payment.paymentGateway-status', $payment),
                'billCallbackUrl' => route('payment.paymentGateway-status', $payment),
                'billExternalReferenceNo' => 'BILL-0001',
                'billTo' => $parentsName,
                'billEmail' => $parent->email,
                'billPhone' => $parent->phone_number,
                'billSplitPayment' => 0,
                'billSplitPaymentArgs' => '',
                'billPaymentChannel' => 0,
                'billContentEmail' => 'Terima Kasih Untuk Pembayaran Yuran Sekolah!',
                'billChargeToCustomer' => 2
            );
            // $curl = curl_init();
            // curl_setopt($curl, CURLOPT_POST, 1);
            // curl_setopt($curl, CURLOPT_URL, 'https://toyyibpay.com/index.php/api/createBill');
            // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($curl, CURLOPT_POSTFIELDS, $option);

            // $billCode = curl_exec($curl);


            // dd($option);
            $url = 'https://dev.toyyibpay.com/index.php/api/createBill';
            $response = Http::asForm()->post($url, $option);


            $billCode = $response[0]['BillCode'];

            // dd($billCode);
            // Belum bayar lagi masukkan dalam payment status

        }

        return redirect('http://dev.toyyibpay.com/' . $billCode);
    }


    public function paymentStatus(Request $request)
    {
        if (Auth::check() && Auth::user()->hasRole('parent')) {
            $payment = $request->route('id');
            //  dd($payment);
            $parent = Auth::user()->parent;
            $billcode = request()->billcode;
            $statusid = request()->status_id;

            $paymentStatus = Payment_status::where('payment_id', $payment)->where('student_id', $parent->student_id)->first();
            //  dd($paymentStatus);

            $paymentStatus->status = $statusid;

            // dd($billCode);

            if ($paymentStatus->status == 1) {

                $paymentStatus->status = 'Paid';
                $paymentStatus->billCode = $billcode;

                try {
                    $paymentStatus->save();
                    return \Redirect::route('payment.list_payment')
                        ->with('success', 'Thank you! Your payment has been received and you receipt has been send to your email');
                } catch (\Exception $e) {

                    return \Redirect::route('payment.list_payment')
                        ->with('error', 'Payment Unsuccessfuly!');
                }
            } elseif ($paymentStatus->status == 3) {

                $paymentStatus->status = 'Not Paid';
                $paymentStatus->billCode = $billcode;

                try {
                    $paymentStatus->save();
                    return \Redirect::route('payment.list_payment')
                        ->with('error', 'Your payment failed, Try again!');
                } catch (\Exception $e) {

                    return \Redirect::route('payment.list_payment')
                        ->with('error', 'Error during the creation!');
                }
            }
        }
    }


    public function recordPayment(Request $request)
    {
        $teacher = Auth::user()->teacher;
        $id = $request->route('id');
        $listRecordPayment = Payment::where('id', $id)->get();
        $paymentRecordStatus = Payment_status::where('payment_id', $id)->get();
        return view('manage_payment.record_payment', compact('teacher', 'listRecordPayment', 'paymentRecordStatus'));
    }

    public function deletePayment(Request $request)
    {
        $teacher = Auth::user()->teacher;
        $id = $request->route('id');
        // dd($id);
        try {

            Payment_status::where('payment_id', $id)->delete();
            Payment::where('id', $id)->delete();

            return \Redirect::route('payment.list_payment')
                ->with('success', ' Delete Succesfully');
        } catch (\Exception $e) {

            return \Redirect::route('payment.list_payment')
                ->with('error', 'Error during the creation!');
        }
    }

    public function viewReceipt($id)
    {
        $parent = Auth::user()->parent;
        $paymentStatus = Payment_status::where('payment_id', $id)->where('student_id', $parent->student_id)->first();
        $detailPayment = Payment::where('id', $id)->first();
        return view('manage_payment.receiptPayment', compact('detailPayment', 'paymentStatus'));
    }
}
