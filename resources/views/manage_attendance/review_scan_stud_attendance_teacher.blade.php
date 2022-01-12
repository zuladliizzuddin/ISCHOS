<x-app-layout>
    <x-slot name="header">
        <h2 class="uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Student Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <!-- SMALL CARD ROUNDED -->
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">

                                    <table class="min-w-full leading-normal">

                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    No
                                                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    Name
                                                </th>
                                                <th
                                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                                </th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $bil = 0;
                                                
                                            @endphp
                                            @foreach ($student as $listStud)

                                                @php
                                                    $bil += 1;
                                                    $id = $listStud->id;
                                                @endphp
                                                <tr>

                                                    <td
                                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                                            {{ $bil }}</p>
                                                    </td>
                                                    <td
                                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5  text-center">
                                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                                            {{ $listStud->student->studFullName }}
                                                        </p>
                                                    </td>

                                                    <form method="POST"
                                                        action="{{ route('studAttendance.deleteScanRecord', $id) }}">
                                                        @csrf
                                                        <td
                                                            class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5 text-center">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                <button type="submit"
                                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                                    Delete
                                                                </button>
                                                            </p>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- END SMALL CARD ROUNDED -->


                    <div class="text-center pb-5">
                        <button
                            class="px-8 py-2 bg-blue-400 text-sm shadow-sm font-medium tracking-wider text-white  rounded-full hover:shadow-lg hover:bg-red-500"
                            onclick="window.location='{{ route('studAttendance.scanQrCode') }}'">Scan Again
                        </button>
                    </div>
                    <div class="col">
                        <div style="width:500px;" id="reader"></div>
                    </div>

                    <form method="POST" action="{{ route('studAttendance.updateScanRecord') }}">
                        @csrf
                        <div class='flex items-center justify-center  pt-5 pb-5 '>
                            <button
                                class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'>SUBMIT
                                RECORD</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    </div>

</x-app-layout>
