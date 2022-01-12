<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('ANNOUNCEMENT') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <section class="justify-center">
                <div class="container mx-auto">
                    <div class="flex flex-wrap px-6">
                        <div class="w-full md:px-4 lg:px-6 py-5">

                            @php
                                $id = $detailAnnouncement->id;
                            @endphp
                            <div class="">
                                @if ($detailAnnouncement->picture != null)
                                    <img src="{{ url($detailAnnouncement->picture) }}"
                                        class="h-auto w-full border-white border-8">
                                @endif
                            </div>
                            <div class="px-4 py-4 md:px-10">
                                <div class="flex flex-row">
                                    <div class="pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="#dee2e6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="p-1 text-gray-300 font-bold">
                                            {{ $detailAnnouncement->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <h1 class="font-bold text-xl md:text-3xl">
                                    {{ $detailAnnouncement->title }}
                                </h1>
                                <textarea class="resize-none border-none w-full h-40 pt-2 py-2 text-base md:text-xl" disabled>{{ $detailAnnouncement->description }}</textarea>
                
                                {{-- <div class="flex flex-wrap">
                                            <div class="w-full md:w-1/3 text-sm font-medium capitalize">
                                                {{$detailUser->first_name}} {{$detailUser->last_name}}
                                            </div>
                                        </div> --}}
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</x-app-layout>
