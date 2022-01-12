<x-app-layout>

    <x-slot name="header">
        <div id="carouselExampleIndicators" class="carousel slide md:h-96 h-52  " data-ride="carousel">
            <div class="carousel-inner md:h-96 " role="listbox" style="width: 100%;">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                    crossorigin="anonymous">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                                crossorigin="anonymous">
                </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                                crossorigin="anonymous">
                </script>
                @php $i = 1; @endphp
                @foreach ($slider as $slideItem)
                    <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                        @php $i++; @endphp
                        <img class="d-block w-100 md:h-96 h-52 " src="{{ $slideItem->banner }}" alt="Slider image">
                    </div>
                @endforeach


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </x-slot>

    <div class="py-12 pt-0">
        <div class="">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" min-h-screen py-6 flex flex-col ">
                        <link rel="stylesheet"
                            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                            crossorigin="anonymous">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                                                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                                                crossorigin="anonymous">
                        </script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                                                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                                                crossorigin="anonymous">
                        </script>

                        {{-- Menu --}}
                        <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                            <div class="carousel-inner ">
                                <div class="carousel-item active ">
                                    <div
                                        class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 grid-cols-3 gap-1 px-3 pb-2 ">
                                        <!-- SMALL CARD ROUNDED -->
                                        <a class="hover:no-underline"
                                            href="{{ route('announcement.listAnnouncement') }}">
                                            <div
                                                class="grid bg-white dark:bg-gray-800 bg-opacity-95 border-opacity-60 h-40 | p-4 border-solid rounded-md border-2 shadow-md | flex justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                                <div class="flex justify-center items-center">
                                                    <img class="w-16 h-16"
                                                        src="{{ asset('img/announcement_icon.png') }}" alt="" />
                                                </div>
                                                <div class="text-center pt-2 text-xs">
                                                    <p class="text-gray-900 dark:text-gray-300 ">
                                                        Announcement</p>

                                                </div>

                                            </div>
                                        </a>
                                        <!-- END SMALL CARD ROUNDED -->

                                        <!-- SMALL CARD ROUNDED -->
                                        <a class="hover:no-underline"
                                            href="{{ route('studAttendance.attendanceRecord') }}">
                                            <div
                                                class="grid bg-white  dark:bg-gray-800 bg-opacity-95 border-opacity-60  h-40 | p-4 border-solid  rounded-md border-2 shadow-md | flex justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">

                                                <div class="flex justify-center items-center">
                                                    <img class="w-16 h-16"
                                                        src="{{ asset('img/attendance_icon.jpg') }}" alt="" />
                                                </div>

                                                <div class="text-center pt-2 text-xs">
                                                    <p class="text-gray-900 dark:text-gray-300 ">Student
                                                        Attendance</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- END SMALL CARD ROUNDED -->

                                         <!-- SMALL CARD ROUNDED -->
                                         <a class="hover:no-underline"
                                         href="{{ route('schoolWorkInfo.listHomeworkTeacher') }}">
                                         <div
                                             class=" grid bg-white dark:bg-gray-800 bg-opacity-95 border-opacity-60 h-40 | p-4 border-solid  rounded-md border-2 shadow-md | flex justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                             <div class="flex justify-center items-center">
                                                 <img class="w-16 h-16 "
                                                     src="{{ asset('img/homework_icon.png') }}" alt="" />
                                             </div>
                                             <div class="text-center pt-2 text-xs">
                                                 <p class="text-gray-900 dark:text-gray-300 ">SchoolWork
                                                     Information</p>
                                             </div>
                                         </div>
                                     </a>
                                     <!-- END SMALL CARD ROUNDED -->

                                        


                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div
                                        class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 grid-cols-3 gap-1 px-4 pb-2">
                                        <!-- SMALL CARD ROUNDED -->
                                        <a class="hover:no-underline"
                                            href="{{ route('classSchedule.viewSchedule') }}">
                                            <div
                                                class=" grid bg-white dark:bg-gray-800 bg-opacity-95 border-opacity-60  h-40 | p-4 border-solid  rounded-md border-2 shadow-md | flex justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                                <div class="flex justify-center items-center">
                                                    <img class="w-16 h-16"
                                                        src="{{ asset('img/schedule_icon.png') }}" alt="" />
                                                </div>
                                                <div class="text-center pt-2 text-xs">
                                                    <p class="text-gray-900 dark:text-gray-300 ">Class
                                                        Timetable
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- END SMALL CARD ROUNDED -->

                                       
                                        <!-- SMALL CARD ROUNDED -->
                                        <a class="hover:no-underline"
                                            href="{{ route('socialMediaGroup.view_media') }}">
                                            <div
                                                class="grid bg-white  dark:bg-gray-800 bg-opacity-95 border-opacity-60  h-40  | p-4 border-solid  rounded-md border-2 shadow-md | flex justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                                <div class="flex justify-center items-center">
                                                    <img class="w-16 h-16"
                                                        src="{{ asset('img/scgroup_icon.png') }}" alt="" />
                                                </div>
                                                <div class="text-center pt-2 text-xs">
                                                    <p class="text-gray-900 dark:text-gray-300 ">Social
                                                        Media</p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- END SMALL CARD ROUNDED -->

                                        <!-- SMALL CARD ROUNDED -->
                                        <a class="hover:no-underline" href="{{ route('studInfo.stud_detail') }}">
                                            <div
                                                class="grid bg-white  dark:bg-gray-800 bg-opacity-95 border-opacity-60  h-40 | p-4 border-solid  rounded-md border-2 shadow-md | flex justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">

                                                <div class="flex justify-center items-center">
                                                    <img class="w-16 h-16"
                                                        src="{{ asset('img/student_icon.png') }}" alt="" />
                                                </div>

                                                <div class="text-center pt-2 text-xs">
                                                    <p class="text-gray-900 dark:text-gray-300 ">Student
                                                        Information
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- END SMALL CARD ROUNDED -->




                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div
                                        class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 grid-cols-3 gap-1 px-4 pb-2">

                                        <!-- SMALL CARD ROUNDED -->
                                        <a class="hover:no-underline" href="{{ route('teacherInfo.list_teacher') }}">
                                            <div
                                                class="grid bg-white dark:bg-gray-800 bg-opacity-95 border-opacity-60  h-40 | p-4 border-solid  rounded-md border-2 shadow-md | flex justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                                                <div class="flex justify-center items-center">
                                                    <img class="w-16 h-16"
                                                        src="{{ asset('img/teacher_icon.png') }}" alt="" />
                                                </div>
                                                <div class="text-center pt-2 text-xs">
                                                    <p class="text-gray-900 dark:text-gray-300 ">Teacher
                                                        Information
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- END SMALL CARD ROUNDED -->

                                        


                                    </div>
                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-indigo-200"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon bg-indigo-200"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        {{-- Close Menu --}}


                        {{-- List Teacher --}}
                        <div class=" mt-16 p-2 ">
                            <div class="container pb-12 ">
                                <div class="float-left">
                                    <h2 class="text-xl text-grey-light ">List Teacher</h2>
                                </div>
                                <div class="float-right text-blue-500 pt-0.5 ">
                                    <a class="hover:no-underline" href="{{ route('teacherInfo.list_teacher') }}">See
                                        all</a>
                                </div>
                            </div>
                            <div id="carouselControls" class="carousel slide md:w-3/4 md:m-auto " data-interval="false">

                                <div class="carousel-inner ">
                                    {{-- First Slider --}}
                                    @foreach ($teacherSlider->chunk(2) as $teacherCollection)
                                        <div class="carousel-item  {{ $loop->first ? 'active' : '' }}">
                                            <div id="container" class="w-4/5 mx-auto">
                                                <div
                                                    class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 grid-cols-2 justify-items-center ">
                                                    @foreach ($teacherCollection as $teacher)
                                                        <div class="grid md:w-48 md:h-full w-28 h-full pb-5">
                                                            <div
                                                                class=" bg-white px-6 py-8 rounded-lg shadow-md text-center hover:shadow-2xl transform duration-200">
                                                                <div class="mb-3">
                                                                    @if ($teacher->teacherImage != null)
                                                                        <img class="md:w-28 md:h-28 w-16 h-16 mx-auto rounded-full"
                                                                            src={{ url($teacher->teacherImage) }}
                                                                            alt="" />
                                                                    @else
                                                                        <img class="md:w-28 md:h-28 w-16 h-16 mx-auto rounded-full"
                                                                            src={{ asset('img/empty_image.png') }}
                                                                            alt="" />
                                                                    @endif

                                                                </div>
                                                                <h2 class="text-xs font-medium text-gray-700 ">
                                                                    {{ $teacher->first_name }}
                                                                    {{ $teacher->last_name }}</h2>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <a class="carousel-control-prev" href="#carouselControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-indigo-200"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon bg-indigo-200"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        {{-- Close List Student Class --}}


                        {{-- List Announcement Class --}}
                        <div class="p-2 ">
                            <div class="container pb-12 ">
                                <div class="float-left">
                                    <h2 class="text-xl text-grey-light "> Announcement</h2>
                                </div>
                                <div class="float-right text-blue-500 pt-0.5 ">
                                    <a class="hover:no-underline"
                                        href="{{ route('announcement.listAnnouncement') }}">See
                                        all</a>
                                </div>
                            </div>
                            <div id="carouselControlsAnnouncement" class="carousel slide md:w-3/4 md:m-auto "
                                data-interval="false">

                                <div class="carousel-inner pb-5">
                                    @foreach ($announcementSlider->chunk(2) as $announcementCollection)
                                        <div class="carousel-item  {{ $loop->first ? 'active' : '' }}">
                                            <!-- component -->
                                            <div id="container" class="w-4/5 mx-auto">
                                                <div
                                                    class="grid mt-6 md:grid-cols-2 lg:grid-cols-2  grid-cols-2 gap-x-1.5 md:gap-x-6 gap-y-8">
                                                    @foreach ($announcementCollection as $announcement)
                                                        @php
                                                            $id = $announcement->id;
                                                        @endphp
                                                        <div class="grid bg-white group relative rounded-lg overflow-hidden shadow-md hover:shadow-2xl transform duration-200"
                                                            onclick="window.location.href='{{ '/announcement/detailAnnouncement' }}/{{ $id != null ? $id : 0 }}'">
                                                            <div class=" relative w-full h-32 md:h-64 lg:h-44">
                                                                @if ($announcement->picture != null)
                                                                    <img src="{{ $announcement->picture }}"
                                                                        class="w-full h-full object-center object-cover">
                                                                @else
                                                                    <img src="{{ asset('img/white.jpg') }}"
                                                                        class="w-full h-full object-center object-cover">
                                                                @endif

                                                            </div>
                                                            <div class=" px-3 py-4">
                                                                <p
                                                                    class="text-base font-semibold text-gray-900 group-hover:text-indigo-600">
                                                                    {{ $announcement->title }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>




                                <a class="carousel-control-prev" href="#carouselControlsAnnouncement" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon bg-indigo-200"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselControlsAnnouncement" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon bg-indigo-200"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        {{-- Close List Class Announcement --}}



                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
