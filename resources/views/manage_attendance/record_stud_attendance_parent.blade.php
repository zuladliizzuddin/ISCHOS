<x-app-layout>
    <x-slot name="header">
        <h2 class="uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Student Attendance') }}
        </h2>
    </x-slot>

    <div class="">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="min-h-full dark:bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
                        <div class="flex flex-col">

                            <div class="row pb-2 ">
                                <button
                                class='md:w-3/12 w-4/12 bg-indigo-900 border-indigo-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                                onclick="location.href='{{ ('/studAttendance/individualAttendanceReport') }}/{{$attendances->first()->student_id !=null ? $attendances->first()->student_id:0}}'">Report</button>
                            </div>

                            @foreach ($attendances as $attend)
                                <!-- SMALL CARD ROUNDED -->
                                <div
                                    class="bg-white shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-100 dark:hover:bg-gray-900 hover:border-transparent | transition-colors duration-500">
                                    <div class="flex flex-col justify-center p-5">
                                        <p class="text-center text-gray-900 dark:text-gray-300 pb-5">Date</p>
                                        <p class="text-center text-blue-400 font-bold text-3xl">
                                            {{ $attend->created_at->format('d/m/Y') }}
                                        </p>


                                    </div>
                                    <div class="flex flex-col justify-center p-5 text-center">
                                        <p class="text-gray-900 dark:text-gray-300 pb-5">Status</p>

                                        @if ($attend->status == 'present')
                                            <span class="text-green-600   dark:text-gray-100  font-bold">
                                                Present </span>
                                        @else
                                            <span class="text-red-500   dark:text-gray-100  font-bold">
                                                Absent </span>
                                            <div
                                                class='flex items-center justify-center w-100  md:gap-8 gap-4 pt-5 pb-5 '>
                                                <button
                                                    class='w-auto bg-indigo-900 border-indigo-300 rounded-lg shadow-xl font-medium text-white px-4 py-2'
                                                    onclick="location.href='{{ route('studAttendance.attendanceReason', ['id' => $attend->id]) }}'">REASON</button>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                <div><br></div>

                            @endforeach
                            <!-- END SMALL CARD ROUNDED -->
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script type='text/javascript'>
    function reloadIt() {
        if (window.localStorage) {
            if (!localStorage.getItem('firstLoad')) {
                localStorage['firstLoad'] = true;
                window.location.reload();
            } else
                localStorage.removeItem('firstLoad');
        }
    }
    setTimeout('reloadIt()', 0)();
</script>