<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            <a href="/classSchedule">{{ __('TIMETABLE') }}</a>
        </h2>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <section class="justify-center">
                <div class="container mx-auto">
                    <div class="flex flex-wrap px-6">
                        <div class="w-full md:px-4 lg:px-6 py-5">

                            @foreach ($teacher->schedules as $detailSchedule)

                                @php
                                    $id = $detailSchedule->id;
                                @endphp
                                <div class="px-4 py-4 md:px-10">
                                    <h1 class="font-bold text-3xl text-lg text-center ">
                                        {{ $detailSchedule->school_class->class_name }}
                                    </h1>
                                </div>

                                <div class="">
                                    <img src="{{ url($detailSchedule->image) }}"
                                        class="h-auto w-full border-white border-8">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <div class='flex items-center justify-center pt-10 pb-8 '>
                <button
                    class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300 shadow-xl font-medium text-white px-4 py-2'
                    onclick="window.location.href='{{ route('classSchedule.viewEditClassSchedule') }}'">Edit</button>
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