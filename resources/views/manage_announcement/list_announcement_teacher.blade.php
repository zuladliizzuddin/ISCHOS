<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            <a href="/announcement/listAnnouncement">{{ __('ANNOUNCEMENT') }}</a>
        </h2>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 pt-16">
            @foreach ($announcement as $announce)
                @php
                    $announcementDate = $announce->created_at->format('d/m/Y');
                    $id = $announce->id;
                @endphp
                <div style="cursor: pointer"
                    onclick="window.location.href='{{ 'detailAnnouncement' }}/{{ $id != null ? $id : 0 }}'"
                    class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:max-w-2xl">
                    <div class="md:flex">
                        @if ($announce->picture != null)
                            <div class="md:flex-shrink-0">
                                <img class="h-48 w-full object-cover md:w-48" src="{{ url($announce->picture) }}">
                            </div>
                        @endif
                        <div class="p-8">
                            @if ($announcementDate == $date)
                                <div class="uppercase tracking-wide text-sm text-red-500 font-semibold">New
                                    Announcement</div>
                            @else
                                <div class="flex flex-row">
                                    <div class="pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="#dee2e6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="p-1 text-gray-300 font-bold">{{ $announcementDate }}</p>
                                    </div>
                                </div>
                            @endif
                            <a class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $announce->title }}
                            </a>
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
            <div class='flex items-center justify-center  pt-10 pb-8 '>
                <button
                    class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'
                    onclick="location.href='{{ route('announcement.addAnnouncementView') }}'">ADD</button>
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
