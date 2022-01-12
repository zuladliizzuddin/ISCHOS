<x-app-layout>
    <x-slot name="header">
        <h2
            class=" uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Student Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('studAttendance.attendanceReport') }}">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- SMALL CARD ROUNDED -->
                <div
                    class="bg-white  shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | transition-colors duration-500">
                    <p class="text-gray-900 dark:text-gray-300 font-bold">{{ $teacher->school_class->class_name }}</p>
                </div>
                <br>
                <div
                    class="bg-white w-full shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | transition-colors duration-500">
                    <select name="month" class="w-full rounded-full p-2 border-gray-200" onchange="this.form.submit()"
                        class="rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        <option disabled selected>Select month</option>
                        <option value="1" {{ old('month', $month) == '1' ? 'selected' : '' }}>January</option>
                        <option value="2" {{ old('month', $month) == '2' ? 'selected' : '' }}>Febuary</option>
                        <option value="3" {{ old('month', $month) == '3' ? 'selected' : '' }}>March</option>
                        <option value="4" {{ old('month', $month) == '4' ? 'selected' : '' }}>April</option>
                        <option value="5" {{ old('month', $month) == '5' ? 'selected' : '' }}>May</option>
                        <option value="6" {{ old('month', $month) == '6' ? 'selected' : '' }}>Jun</option>
                        <option value="7" {{ old('month', $month) == '7' ? 'selected' : '' }}>July</option>
                        <option value="8" {{ old('month', $month) == '8' ? 'selected' : '' }}>August</option>
                        <option value="9" {{ old('month', $month) == '9' ? 'selected' : '' }}>September</option>
                        <option value="10" {{ old('month', $month) == '10' ? 'selected' : '' }}>September</option>
                        <option value="11" {{ old('month', $month) == '11' ? 'selected' : '' }}>November</option>
                        <option value="12" {{ old('month', $month) == '12' ? 'selected' : '' }}>December</option>
                    </select>
                </div>
                <br><br>
        </form>
        <!-- END SMALL CARD ROUNDED -->

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2">

                        <div class="card-body md:w-full md:h-full">
                            <div class="chart-container ">
                                <canvas id="Chartappointment"  class="md:h-1/6 w-full h-10" ></canvas>
                            </div>
                        </div>
                        {{-- <div class="w-full lg:w-1/2">
                            <div
                                class="widget w-full p-4 rounded-lg bg-red-200 border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                                <div class="flex flex-row content-center justify-between ">
                                    <div class="flex flex-col ">
                                        <div class="text-xs uppercase font-light text-gray-500">
                                            No. Student Absent
                                        </div>
                                        <div class="text-xl font-bold">
                                            {{ $countAbsent }}
                                        </div>
                                    </div>
                                    <svg class="stroke-current text-gray-500" fill="none" height="24"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewbox="0 0 24 24" width="24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                                        </path>
                                        <circle cx="9" cy="7" r="4">
                                        </circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                                        </path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="w-full lg:w-1/2">
                            <div
                                class="widget w-full p-4 rounded-lg bg-green-200 border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-col">
                                        <div class="text-xs uppercase font-light text-gray-500">
                                            No. Student Present
                                        </div>
                                        <div class="text-xl font-bold">
                                            {{ $countPresent }}
                                        </div>
                                    </div>
                                    <svg class="stroke-current text-gray-500" fill="none" height="24"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewbox="0 0 24 24" width="24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                                        </path>
                                        <circle cx="9" cy="7" r="4">
                                        </circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                                        </path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>


                <h2 class="font-bold text-3xl text-center text-black  leading-tight  bg-gray-300 border-indigo-300 ">
                    {{ __('Student Absent') }}
                </h2>


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
                                                Date
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

                                        @foreach ($studentAbsent as $stud)
                                            @php
                                                $bil += 1;
                                            @endphp
                                            <tr class="hover:bg-gray-200 border-b border-gray-200 py-10" style="cursor: pointer" onclick="window.location.href='{{ ('/studAttendance/individualAttendanceReport') }}/{{$stud->student_id !=null ? $stud->student_id:0}}'">
                                                <td
                                                    class="px-5 py-5 border-b border-gray-200  text-sm text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                                        {{ $bil }}</p>
                                                </td>
                                                <td
                                                    class="px-5 py-5 border-b border-gray-200  text-sm w-2/5  text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                                        {{ $stud->student->studFullName }}
                                                    </p>
                                                </td>
                                                <td
                                                    class="px-5 py-5 border-b border-gray-200  text-sm w-2/5 text-center">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $stud->created_at->format('d/m/Y') }}
                                                    </p>
                                                </td>
                                                <td>
                                                    @if ($stud->file_reason != null)
                                                        <a
                                                            href="{{ route('studAttendance.attendanceReason', $stud->id) }}">
                                                            <span
                                                                class="font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                                                Absent </span>
                                                        </a>
                                                    @else
                                                        <span
                                                            class="font-semibold leading-tight text-green-700 bg-red-400 rounded-sm">
                                                            Absent </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="py-3 px-6 pt-4">
                                {{ $studentAbsent->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</x-app-layout>


<script>
    var ctx = document.getElementById("Chartappointment");
    var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Present", "Absent"],
    datasets: [{
      label: "No Student",
      backgroundColor: ["rgba(2,117,216,1)", "rgb(255, 0, 0)" ],
      borderColor: ["rgba(2,117,216,1)", "rgb(255, 0, 0)"],
      data: [{{$countPresent}}, {{$countAbsent}}],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 25,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>
