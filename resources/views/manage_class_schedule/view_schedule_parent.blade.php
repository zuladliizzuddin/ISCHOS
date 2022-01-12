<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('TIMETABLE') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <section class="justify-center">
                <div class="container mx-auto">
                    <div class="flex flex-wrap px-6">
                        <div class="w-full md:px-4 lg:px-6 py-5">
                            <div class="px-4 py-4 md:px-10">
                                <h1 class="font-bold text-3xl text-lg text-center ">
                                    @if ($detailSchedule != null)
                                        {{ $detailSchedule->school_class->class_name }}
                                    @endif
                                </h1>
                            </div>

                            <div class="">
                                @if ($detailSchedule != null)
                                    <img src="{{ url($detailSchedule->image) }}"
                                        class="h-auto w-full border-white border-8">
                                @else
                                    <h1 class="font-bold text-3xl text-lg text-center text-red-500 ">No Schedule Yet
                                    </h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</x-app-layout>
