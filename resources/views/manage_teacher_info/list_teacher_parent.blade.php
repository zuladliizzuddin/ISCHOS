<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Teacher Information') }}
        </h2>
    </x-slot>

    <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="min-h-full dark:bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
                <div class="flex flex-col p-4">

                    {{-- Search --}}
                    <form action="{{ route('teacherInfo.search_teacher') }}" method="get">
                        <div class="flex-1 pr-4 pb-5">
                            <div class="relative md:w-1/3">
                                <input name="search" type="search"
                                    class="md:w-full w-full pl-10 pr-4 py-2 rounded-lg shadow-md border-gray-200 font-normal"
                                    placeholder="Search...">
                                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                            <circle cx="10" cy="10" r="7" />
                                            <line x1="21" y1="21" x2="15" y2="15" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- End Search --}}

                    {{-- Start Table List Student --}}

                    <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                        <div class="p-3">
                            <div class="overflow-x-auto">

                                <!-- Table -->
                                <table class="table-auto w-full">
                                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                        <tr>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Name</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Email</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-left">Teacher Class</div>
                                            </th>
                                            <th class="p-2 whitespace-nowrap">
                                                <div class="font-semibold text-center">Phone Number</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($subjectData as $listTeacherinfo)
                                        @php
                                            $id = $listTeacherinfo->id;
                                        @endphp
                                        <tbody class="text-sm divide-y divide-gray-100">
                                            <tr>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">

                                                            @if ($listTeacherinfo->teacherImage != null)
                                                                <img class="rounded-full w-11 h-11 "
                                                                    src="{{ url($listTeacherinfo->teacherImage) }}"
                                                                    width="" height="" alt="Alex Shatov">
                                                            @else
                                                                <img class="rounded-full w-11 h-11 "
                                                                    src="{{ url('img/empty_image.png') }}" width=""
                                                                    height="" alt="Alex Shatov">
                                                            @endif

                                                        </div>
                                                        <div class="font-medium text-gray-800">
                                                            {{ $listTeacherinfo->first_name }}
                                                            {{ $listTeacherinfo->last_name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-left">{{ $listTeacherinfo->email }}
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-left 0">
                                                        {{ $listTeacherinfo->school_class->class_name }}
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-sm text-center">
                                                        {{ $listTeacherinfo->phone_number }}</div>
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{-- End Table --}}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        {!! $subjectData->links() !!}
                    </div>
                    {{-- End Table List Student --}}

                </div>
            </div>
        </div>
    </div>


</x-app-layout>

{{-- <div class="overflow-x-auto mt-6">
                                <table class="table-auto border-collapse w-full">
                                    <thead>
                                        <tr class="rounded-lg text-sm font-medium text-gray-700 text-left"
                                            style="font-size: 0.9674rem">
                                            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8"></th>
                                            <th class="px-4 py-2 " style="background-color:#f8f8f8">First Name</th>
                                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Last Name</th>
                                            <th class="px-4 py-2 " style="background-color:#f8f8f8">Phone Number</th>
                                        </tr>
                                    </thead>
                                    @foreach ($subjectData as $listTeacherinfo)
                                        @php
                                            $id = $listTeacherinfo->id;
                                        @endphp
                                        <tbody class="text-sm font-normal text-gray-700">
                                            <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                                <td class="px-4 py-4 "><img class="h-28 w-28" src="{{url($listTeacherinfo->teacherImage)}}"></td>
                                                <td class="px-4 py-4">{{ $listTeacherinfo->first_name }}</td>
                                                <td class="px-4 py-4">{{ $listTeacherinfo->last_name }}</td>
                                                <td class="px-4 py-4">{{ $listTeacherinfo->phone_number }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {!! $subjectData->links() !!}
                            </div> --}}

{{-- Search --}}
{{-- <div class="pt-2 relative mx-auto text-gray-600">
                                <form action="{{ route('studInfo.searchStudInfo') }}" method="GET" role="search">
                                    <input
                                        class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                        type="search" name="search" placeholder="Search">
                                    <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                        <svg class="text-gray-600 h-4 w-4 fill-current"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                            y="0px" viewBox="0 0 56.966 56.966"
                                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                            width="512px" height="512px">
                                            <path
                                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                        </svg>
                                    </button>
                                </form>
                            </div> --}}
{{-- End Search --}}
