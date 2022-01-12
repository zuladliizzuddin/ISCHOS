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
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload
                                    File</label>
                                <div class='flex items-center justify-center w-full'>
                                    @foreach ($teacher->schedules as $detailSchedule)
                                        @php
                                            $id = $detailSchedule->id;
                                        @endphp
                                        <form method="POST"
                                            action="{{ route('classSchedule.updateClassSchedule', $id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @if ($detailSchedule->image != null)
                                                <label
                                                    class='flex flex-col border-4 border-dashed w-full h-auto hover:bg-gray-100 hover:border-purple-300 group'>
                                                    <img class="h-auto w-full" id="output"
                                                        src="{{ asset($detailSchedule->image) }}">
                                                    <input type='file' class="hidden" name="image"
                                                        onchange="loadFile(event)" />
                                                </label>
                                            @else
                                                <label
                                                    class='flex flex-col border-4 border-dashed w-full h-auto hover:bg-gray-100 hover:border-purple-300 group'>
                                                    <div class='flex flex-col items-center justify-center pt-7'>
                                                        <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                        <p
                                                            class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                                            Select a file</p>
                                                    </div>
                                                    <img class="h-auto w-full" id="output"
                                                        src="{{ asset($detailSchedule->image) }}">
                                                    <input type='file' class="hidden" name="image"
                                                        onchange="loadFile(event)" />
                                                </label>
                                            @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <div class='flex items-center justify-center  pt-10 pb-8 '>
                <button type="submit"
                    class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300   font-medium text-white px-4 py-2'>SAVE</button>
            </div>
            </form>
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