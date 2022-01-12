<x-app-layout>
    <x-slot name="header">
      <h2 class=" uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
        {{ __('School Work Information') }}
    </h2>
    </x-slot>
    <div class="">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('schoolWorkInfo.listHomeworkTeacher') }}">
                        <div class="grid grid-cols">
                            {!! Form::select('class', $classList, $classid, ['class' => 'py-2 px-3 rounded-lg border-1 border-gray-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent', 'required', 'placeholder' => __('Class'), 'onchange' => 'this.form.submit()', 'id' => 'classid', 'name' => 'class']) !!}
                        </div>
                    </form>


                    <div class=" dark:bg-gray-900 py-6 flex flex-col  sm:py-12">
                        <div class="flex flex-col">
                            @foreach ($school_work as $work)
                                @php
                                    $schoolWorkDate = $work->created_at->format('d/m/Y');
                                    $schoolDueDate = $work->due_date;
                                    $convertDueDate = date('d/m/Y', strtotime($schoolDueDate));
                                    $id = $work->id;
                                @endphp
                                <!-- SMALL CARD ROUNDED -->
                                <a href="{{ 'schoolWorkInfo/detailHomeworkTeacher' }}/{{ $id != null ? $id : 0 }}">
                                    @if ($schoolWorkDate == $date)
                                        <div
                                            class=" bg-indigo-400 shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 px-3 |  border-solid rounded-3xl border-2 | flex md:justify-around justify-between cursor-pointer | hover:bg-indigo-300 dark:hover:bg-gray-900 hover:border-transparent | transition-colors duration-500">
                                            <div class="flex flex-col p-5 ">
                                                <p
                                                    class=" font-semibold text-black dark:text-gray-300 text-3xl pb-3">
                                                    {{ $work->subject->subject_name }}</p>
                                                <div class="flex flex-row">
                                                    <div class="pt-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="#dee2e6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="p-1 text-gray-300 font-bold ">Today</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col justify-end pr-3 pb-6">
                                                <p class="text-white font-semibold  ">Due by : {{ $convertDueDate }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class=" bg-white shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 px-3 |  border-solid rounded-3xl border-2 | flex md:justify-around justify-between cursor-pointer | hover:bg-gray-100 dark:hover:bg-gray-900 hover:border-transparent | transition-colors duration-500">
                                            <div class="flex flex-col p-5 ">
                                                <p
                                                    class=" font-semibold text-gray-900 dark:text-gray-300 text-3xl pb-3">
                                                    {{ $work->subject->subject_name }}</p>
                                                <div class="flex flex-row">
                                                    <div class="pt-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="#dee2e6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="p-1 text-gray-300 font-bold">{{ $schoolWorkDate }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col justify-end pr-3 pb-6">
                                                <p class="text-red-400 font-semibold  ">Due by : {{ $convertDueDate }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </a>
                                <div><br></div>
                                <!-- END SMALL CARD ROUNDED -->
                            @endforeach
                        </div>
                    </div>

                    <div class='flex items-center justify-center  pt-5 pb-8'>
                        <button
                            class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'
                            onclick="location.href='{{ route('schoolWorkInfo.addHomeworkTeacherView') }}'">ADD</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
