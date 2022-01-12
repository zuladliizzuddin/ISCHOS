<x-app-layout>
    <x-slot name="header">
        
        <h2 class="uppercase font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('FINANCIAL INFORMATION') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="min-h-screen dark:bg-gray-900 py-6 flex flex-col sm:py-12">
                    <div class="flex flex-col p-4">

                        @foreach ($listPayment as $detailPayment)

                            @php
                                
                                $FeesDate = $detailPayment->created_at->format('d/m/Y');
                                $id = $detailPayment->id;
                                
                            @endphp
                            <div class="p-2">
                                <div class="max-w-full  bg-white flex flex-col rounded overflow-hidden shadow-lg">
                                    <div class="flex flex-row items-baseline flex-nowrap bg-gray-100 p-2">
                                        @if ($FeesDate == $date)
                                            <p class="ml-2 font-bold text-red-500 ">New Fees</p>
                                        @endif
                                    </div>
                                    <div class="mt-2 flex sm:flex-row mx-6 sm:justify-between flex-wrap ">
                                        <div class="flex flex-row place-items-center p-2">
                                            <img alt="" class="w-10 h-10"
                                                src="{{ url('img/payment_list.jpeg') }}"
                                                style="opacity: 1; transform-origin: 0% 50% 0px; transform: none;" />
                                            <div class="flex flex-col ml-2">
                                                <p class="text-lg text-gray-500 font-bold">
                                                    {{ $detailPayment->payment_title }}</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col p-2">

                                            <div class="text-sm mx-2 flex flex-col">
                                                <p>Total Payment</p>
                                                <p class="font-bold">RM{{ $detailPayment->amount }}</p>
                                            </div>
                                            <button
                                                class="w-28 h-9 rounded flex border-solid border text-white bg-indigo-900 mx-2 justify-center place-items-center"
                                                onclick="location.href='{{ 'payment/detailPayment' }}/{{ $id != null ? $id : 0 }}'">
                                                <div class="">DETAIL</div>
                                            </button>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        @endforeach

                        {{-- @else
                                    <tr>
                                        <td class="text-center text-xl" colspan="4">You have no payment</td>
                                    </tr>
                                @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
