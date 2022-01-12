<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('BANNER') }}
        </h2>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('announcement.addBanerStore') }}" enctype="multipart/form-data">
                @csrf
                <section class="justify-center">
                    <div class="container mx-auto">
                        <div class="flex flex-wrap px-6">
                            <div class="w-full md:px-4 lg:px-6 py-5">
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload
                                        File (RECOMMENDED SIZE 1440 X 380)</label>
                                    <div class='flex items-center justify-center w-full h-auto'>
                                        <label
                                            class='flex flex-col border-4 border-dashed w-full h-auto hover:bg-gray-100 hover:border-purple-300 group'>
                                            <div id="placeholder"
                                                class='flex flex-col items-center justify-center pt-7'>
                                                <svg class=" w-10 h-10 text-purple-400 group-hover:text-purple-600"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <p
                                                    class=' lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                                    Select a file</p>
                                            </div>
                                            <img id="output" class="h-auto w-auto">
                                            <input type='file' name="picture" id="image" onchange="loadFile(event)"
                                                class="hidden" />
                                        </label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Banner
                                        Name</label>
                                    <input name="banner_name"
                                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        type="text" placeholder="Insert banner name" />
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <div class='flex items-center justify-center pt-10 pb-5 '>
                    <button type="submit"
                        class=' md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white px-4 py-2'>PUBLISH</button>
                </div>

            </form>


            <section class="container mx-auto p-6 font-mono">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3">Image Banner</th>
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>

                            @foreach ($listBanner as $banners)

                                @php
                                    $id = $banners->id;
                                @endphp
                                <tbody class="bg-white">
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 border">
                                            <div class="flex items-center text-sm">
                                                <div class="w-60 h-20 ">
                                                    <img class=" w-full h-full " src="{{ url($banners->banner) }}"
                                                        alt="" loading="lazy" />
                                                </div>
                                            </div>
                                        <td class="px-4 py-3 text-sm border">{{ $banners->banner_name }}</td>
                                        <td class="px-4 py-3 text-sm border ">
                                            <button
                                                class="text-white bg-red-500 p-3 rounded-lg visited:text-purple-600 "
                                                onclick="confirmDelete('{{ '/announcement/deleteBanner' }}/{{ $id != null ? $id : 0 }}')">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="pb-3 px-6 ">
                    {{ $listBanner->links() }}
                </div>

            </section>
        </div>
    </div>
</x-app-layout>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        var placeholder = document.getElementById('placeholder');
        output.src = URL.createObjectURL(event.target.files[0]);
        placeholder.style.display = "none";

    }

    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this?")) {
            window.location.replace(url);
        } else {
            false;
        }
    }
</script>
