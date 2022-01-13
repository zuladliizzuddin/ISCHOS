<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 uppercase">
            {{ __('School Work Information') }}
        </h2>
    </x-slot>

    <div class="h-full">

        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2
                        class="font-bold text-3xl text-center text-black shadow-md leading-tight  bg-gray-200 border-indigo-300 ">
                        {{ $detailSchoolWork->subject->subject_name }}
                    </h2>
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">
                                    <div class="px-4 py-4 md:px-10">
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
                                                @if ($detailSchoolWork->due_date != null)
                                                    @php
                                                        $schoolDueDate = $detailSchoolWork->due_date;
                                                        $convertDueDate = date('d/m/Y', strtotime($schoolDueDate));
                                                    @endphp
                                                    <p class="p-1 text-red-500 font-bold">
                                                        Due date: {{ $convertDueDate }}</p>
                                            </div>
                                            @endif
                                        </div>
                                        <h1 class="font-bold text-xl md:text-3xl pt-1">
                                            {{ $detailSchoolWork->title }}
                                        </h1>
                                        <textarea class="resize-none border-none w-full h-40 pt-2 py-2 text-base md:text-xl" disabled>{{ $detailSchoolWork->description }}</textarea>
                                        <div class="">
                                            @if ($detailSchoolWork->picture != null)
                                                <img src="{{ url($detailSchoolWork->picture) }}"
                                                    class="h-auto w-full border-white border-8">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    <div class='flex items-center justify-center pt-10 pb-8 '>
                        <button
                            class='md:w-3/12 w-11/12 bg-indigo-900 border-indigo-300 rounded-full shadow-xl font-medium text-white px-4 py-2'
                            onclick="location.href='{{ ('/schoolWorkInfo/editHomeworkTeacherView') }}/{{$detailSchoolWork->id !=null ? $detailSchoolWork->id:0}}}'">EDIT</button>
                            <button
                            class='md:w-3/12 w-11/12 bg-indigo-900 border-indigo-300 rounded-full shadow-xl font-medium text-white px-4 py-2'
                            onclick="location.href='{{ ('/schoolWorkInfo/deleteHomework') }}/{{$detailSchoolWork->id !=null ? $detailSchoolWork->id:0}}}'">DELETE</button>
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
