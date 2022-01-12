<x-app-layout>
    <x-slot name="header">
        <h2 class="uppercase font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Social Media Group') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('socialMediaGroup.addSocialMediaGroupStore') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">

                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <select name="platform"
                                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                            <option>Choose the platform</option>
                                            <option value="whatsapp">Whatsapp</option>
                                            <option value="telegram">Telegram</option>
                                        </select>

                                    </div>

                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label
                                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Link
                                            Media Social</label>
                                        <input name="link"
                                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            type="text" placeholder="Insert Link" />
                                    </div>

                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label
                                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Name
                                            of Media Social</label>
                                        <textarea name="name"
                                            class="resize-none py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            type="text" placeholder="Insert Name of Media Social"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                    <div class='flex items-center justify-center pt-10 pb-8 '>
                        <button type="submit"
                            class=' md:w-5/12 w-11/12 bg-indigo-900 border-indigo-300 rounded-full shadow-xl font-medium text-white px-4 py-2'>PUBLISH</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
