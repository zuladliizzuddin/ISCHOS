<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('FINANCIAL INFORMATION') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="min-h-screen dark:bg-gray-900 py-6 flex flex-col sm:py-0">
                    <div class="flex flex-col p-4">

                        @php
                            $id = $detailPayment->id;
                        @endphp
                        {{-- <table class="table-fixed">
                                <thead>
                                  <tr>
                                    <th>Payment Title</th>
                                    <th>Description</th>
                                    <th>Amount(RM)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{$detailPayment->payment_title}}</td>
                                    <td>{{$detailPayment->description}}</td>
                                    <td>{{$detailPayment->amount}}</td>
                                  </tr>
                                </tbody>
                            </table> --}}
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Payment
                                Title</label>
                            <input
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" value="{{ $detailPayment->payment_title }}" disabled />
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                            <input
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" value="{{ $detailPayment->description }}" disabled />
                        </div>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Amount(RM)</label>
                            <input
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" value="{{ $detailPayment->amount }}" disabled />
                        </div>

                        <div class='flex items-center justify-center w-100  md:gap-8 gap-4 pt-10 pb-5 '>
                            <button
                                class='md:w-5/12 w-2/4 bg-indigo-900 border-indigo-300 rounded-full shadow-xl font-medium text-white px-4 py-2'
                                onclick="confirmDelete('{{ '/payment/deletePayment' }}/{{ $id != null ? $id : 0 }}')">DELETE</button>
                            <button
                                class='md:w-5/12 w-2/4 bg-indigo-900 border-indigo-300 rounded-full shadow-xl font-medium text-white px-4 py-2'
                                onclick="location.href='{{ '/payment/recordPayment' }}/{{ $id != null ? $id : 0 }}'">RECORD</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this?")) {
            window.location.replace(url);
        } else {
            false;
        }
    }
</script>
