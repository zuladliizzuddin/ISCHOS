<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 uppercase">
            {{ __('Financial Information') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="min-h-screen dark:bg-gray-900 py-6 flex flex-col sm:py-12">
                    <div class="flex flex-col p-4">
                        @php
                            $id = $detailPayment->id;
                        @endphp

                        <form method="POST" action="{{ '/payment/paymentGateway' }}" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Payment
                                    Title</label>
                                <input name="payment_title"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text" value="{{ $detailPayment->payment_title }}" disabled />
                                <input name="id" type="hidden" value="{{ $detailPayment->id }}" />
                            </div>

                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                                <input name="description"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text" value="{{ $detailPayment->description }}" disabled />
                            </div>

                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Amount(RM)</label>
                                <input name="amount"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text" value="{{ $detailPayment->amount }}" disabled />
                            </div>

                            @if ($paymentStatus->status == 'Paid')
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold ">Status</label>
                                    <input type="status"
                                        class=' py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent text-green-600 font-extrabold bg-green-100'
                                        type="text" value="{{ $paymentStatus->status }}" disabled />
                                </div>
                            @else
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold ">Status</label>
                                    <input name="status"
                                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent text-red-600 font-extrabold bg-red-100"
                                        type="text" value="{{ $paymentStatus->status }}" disabled />
                                </div>
                            @endif


                            @if ($paymentStatus->status == 'Not Paid')
                                <div class='flex items-center justify-center pt-10 pb-8 '>
                                    <button type="submit"
                                        class='  md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'>PAY</button>
                                </div>

                            @else
                        </form>
                        <div class='flex items-center justify-center pt-10 pb-8 '>
                            {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
                        </script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
                        </script> --}}
                            <button onclick="window.location.href='{{ '/payment/viewReceipt' }}/{{ $id != null ? $id : 0 }}'"
                                class=" md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2">
                                RECEIPT
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
