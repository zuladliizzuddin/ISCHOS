<x-app-layout>
    <x-slot name="header">
            <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
                {{ __('ANNOUNCEMENT') }}
            </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="min-h-screen py-6 flex flex-col ">
                <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 grid-cols-2 gap-4 px-4 ">
                    <!-- SMALL CARD ROUNDED -->
                    <div class="py-12"> </div>
                    <div class="py-12"> </div>
                    <a href="{{ route('announcement.listBanner') }}">
                        <div class="hover:transition-all">
                            <div
                                class="grid bg-white shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500 | ">
                                <div class="flex justify-center items-center">
                                    <img class="origin-center rotate-45 w-auto h-16"
                                        src="https://cdn-icons-png.flaticon.com/512/6502/6502196.png" alt="" />
                                </div>
                                <div class="text-center pt-2">
                                    <p class="text-gray-900 dark:text-gray-300 font-semibold">Banner</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- SMALL CARD ROUNDED -->
                    <a href="{{ route('announcement.listAnnouncement') }}">
                        <div
                            class="grid bg-white shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | justify-around cursor-pointer | hover:bg-grey dark:hover:bg-indigo-600 hover:border-transparent | transition-colors duration-500">
                            <div class="flex justify-center items-center">
                                <img class="w-auto h-16"
                                    src="https://cdn-icons-png.flaticon.com/512/1378/1378644.png" alt="" />
                            </div>
                            <div class="text-center pt-2">
                                <p class="text-gray-900 dark:text-gray-300 font-semibold">Announcement</p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
