<x-app-layout>
    <x-slot name="header">
        <h2 class="uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Student Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($attendances as $attend)


                <!-- SMALL CARD ROUNDED -->
                <div
                    class="bg-white shadow-lg dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer  | transition-colors duration-500">
                    <div class="flex flex-col justify-center p-5">
                        <p class="text-center text-gray-900 dark:text-gray-300 pb-5">Date</p>
                        <p class="text-center text-blue-400 font-bold text-3xl">
                            {{ $attend->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex flex-col justify-center p-5">
                        <p class="text-gray-900  text-center dark:text-gray-300 pb-5">Status</p>
                        <p class="text-red-500 text-center  dark:text-gray-100 text-justify font-bold capitalize">
                            {{ $attend->status }}</p>
                    </div>
                </div>
                <br><br>
                <!-- END SMALL CARD ROUNDED -->
            @endforeach

            <form method="POST" action="{{ route('studAttendance.saveAttendanceReason', ['id' => $attend->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2
                        class="font-bold text-3xl text-center text-white  leading-tight  bg-indigo-900 border-indigo-300 ">
                        {{ __('Reason') }}
                    </h2>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="justify-center">
                            <div class="container mx-auto">
                                <div class="flex flex-wrap px-6">
                                    <div class="w-full md:px-4 lg:px-6 py-5">
                                        <div class="px-4 py-4 md:px-10">
                                            <div class="grid grid-cols-1">
                                                <label
                                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Title</label>
                                                <input
                                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                    type="text" name="title" />
                                            </div>
                                            <div class="grid grid-cols-1 pt-2">
                                                <label
                                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                                                <textarea
                                                    class="resize-none py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                    type="text" name="description"></textarea>
                                            </div>

                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label
                                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload
                                                    File</label>
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
                                                        <input type='file' name="file_reason" id="image"
                                                            onchange="loadFile(event)" class="hidden" />
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>


                        <div class='flex items-center justify-center pt-5 pb-5 '>
                            <button
                                class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300 shadow-xl font-medium text-white px-4 py-2'
                                type="submit">SUBMIT</button>
                        </div>
            </form>


        </div>
    </div>

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
</script>
