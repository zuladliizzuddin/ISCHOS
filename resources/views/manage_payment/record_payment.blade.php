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

                    <section class="container mx-auto p-6 font-mono">
                        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                            <div class="w-full overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr
                                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                            <th class="px-4 py-3">Name</th>
                                            <th class="px-4 py-3">Status</th>
                                            <th class="px-4 py-3">Date</th>
                                        </tr>
                                    </thead>

                                    @foreach ($paymentRecordStatus as $recordPayment)

                                        @php
                                            $id = $recordPayment->id;
                                        @endphp

                                        <tbody class="bg-white">
                                            <tr class="text-gray-700">
                                                <td class="px-4 py-3 border">
                                                    <div class="flex items-center text-sm">
                                                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full"
                                                                src="{{ url($recordPayment->students->studImage) }}"
                                                                alt="" loading="lazy" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner"
                                                                aria-hidden="true"></div>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-black">
                                                                {{ $recordPayment->students->studFullName }}</p>
                                                            <p class="text-xs text-gray-600">
                                                                {{ $recordPayment->students->studIdCard }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                @if ($recordPayment->status == 'Paid')
                                                    <td class="px-4 py-3 text-xs border">
                                                        <span
                                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                                            {{ $recordPayment->status }} </span>
                                                    </td>
                                                @else
                                                    <td class="px-4 py-3 text-xs border">
                                                        <span
                                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">
                                                            {{ $recordPayment->status }} </span>
                                                    </td>
                                                @endif
                                                <td class="px-4 py-3 text-sm border">{{ $recordPayment->updated_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
