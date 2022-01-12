<x-app-layout>
    <x-slot name="header">
        <h2 class="uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Student Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- SMALL CARD ROUNDED -->
            <div
                class="bg-white shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | transition-colors duration-500">
                <p class="text-gray-900 dark:text-gray-300 font-bold">1 ZAMRUD</p>
            </div>
            <br><br>
            <!-- END SMALL CARD ROUNDED -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="px-6 pt-8 pb-3">
                        <div class="border-8 border-black border-dashed w-full max-w-xs p-5 relative m-auto pb-0 rounded-xl bg-gray-50"
                            div="">
                            <div class="relative text-center p-5 flex-auto justify-center bg-gray-50 rounded-xl">
                                <div
                                    class="shadow-out absolute inset-x-0 top-0 border-4 border-yellow-300 rounded-full top-1">
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-32 h-32 flex items-center text-gray-500 mx-auto" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                                    </path>
                                </svg>
                            </div>

                            <span class="border_bottom"></span>
                        </div>
                    </div>
                    <br>

                    <div class="text-center pb-32">
                        {{-- <label for="cameraFileInput"> --}}
                        {{-- <span class="btn px-8 py-2 bg-blue-400 text-sm shadow-sm font-medium tracking-wider text-white font-medium rounded-full hover:shadow-lg hover:bg-red-500">Start Scanning</span> --}}

                        <!-- The hidden file `input` for opening the native camera -->
                        {{-- <input
                                      id="cameraFileInput"
                                      type="file"
                                      accept="image/*"
                                      capture="environment"
                                      class="hidden"
                                    />
                                  </label> --}}



                        <button
                            class="px-8 py-2 bg-blue-400 text-sm shadow-sm font-medium tracking-wider text-white font-medium rounded-full hover:shadow-lg hover:bg-red-500"
                            onclick="window.location='{{ route('studAttendance.scanQrCodeNew') }}'">Start
                            Scanning</button>
                    </div>
                    <div class="col">
                        <div style="width:500px;" id="reader"></div>
                    </div>


                    <div class='flex items-center justify-center pt-5 pb-5 '>
                        <button
                            class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'
                            onclick="location.href='{{ route('studAttendance.attendanceRecord') }}'">ATTENDANCE
                            RECORD</button>
                    </div>
                    <div class='flex items-center justify-center  pt-5 pb-5 '>
                        <button
                            class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'
                            onclick="location.href='{{ route('studAttendance.attendanceReport') }}'">ATTENDANCE
                            REPORT</button>
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>

</x-app-layout>

{{-- <script language="JavaScript">
    
// document
//   .getElementById("cameraFileInput")
//   .addEventListener("change", function () {
//     document
//       .getElementById("pictureFromCamera")
//       .setAttribute("src", window.URL.createObjectURL(this.files[0]));
//   });
// </script> --}}
