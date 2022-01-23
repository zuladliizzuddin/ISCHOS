<x-app-layout>
    <x-slot name="header">
        <h2
            class="uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            <a href="/studAttendance">{{ __('STUDENT ATTENDANCE') }}</a>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 pt-2 lg:px-8">
        <!-- SMALL CARD ROUNDED -->
        <div
            class="bg-white  shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | transition-colors duration-500">
            <p class="text-gray-900 dark:text-gray-300 font-bold">{{ $date->format('d/m/Y') }}</p>
        </div>
        <br><br>
        <!-- END SMALL CARD ROUNDED -->

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
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
                                                Status
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @php
                                            $bil = 0;
                                            
                                        @endphp
                                        @if ($attendances != null)
                                            @foreach ($student as $listStud)

                                                @php
                                                    $bil += 1;
                                                    
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
                                                            {{ $listStud->studFullName }}
                                                        </p>
                                                    </td>


                                                    <td
                                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5 text-center">

                                                        <p class="text-gray-900 whitespace-no-wrap">



                                                            @if ($listStud->status_attendance == 'present')
                                                                <span
                                                                    class="font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                                                    Present </span>
                                                            @else

                                                                <span
                                                                    class="font-semibold leading-tight text-green-700 bg-red-400 rounded-sm">
                                                                    Absent </span>


                                                            @endif
                                                        </p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td
                                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap text-center"></p>
                                                </td>
                                                <td
                                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5  text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap text-center">

                                                    </p>
                                                </td>
                                                <td
                                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5 text-center">

                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <div class="py-3 px-6 pt-4">
                                {{ $student->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class='flex items-center justify-center pt-5 pb-8 '>
                    <button type="submit"
                        class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'
                        onclick="location.href='{{ route('push.pushget') }}'">SUBMIT</button>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
