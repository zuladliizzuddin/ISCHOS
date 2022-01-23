<x-app-layout>
    <x-slot name="header">
        <h2 class=" uppercase font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            <a href="{{ route('manage_profile.view_profile')}}">{{ __('PROFILE') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">
                                    @if ($errors->edit->any())
                                        <x-auth-validation-errors class="mb-4" :errors="$errors->edit" />
                                    @endif

                                    <form method="post" action="{{ route('manage_profile.update_profile') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="w-full md:px-4 lg:px-6 py-5">
                                            <div class="grid grid-cols-1 mt-5 mx-7">
                                                <label
                                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload
                                                    Image</label>
                                                <div class='flex items-center justify-center w-full'>

                                                    @if ($teacherData->teacherImage != null)
                                                        <div class="flex">
                                                            <label
                                                                class='flex flex-col border-5 border-dashed w-40 h-40 hover:bg-gray-100 hover:border-purple-300 group '>
                                                                <div class='flex flex-col items-center justify-center'>
                                                                    <img class="w-40 h-40 border-4 border-dashed"
                                                                        id="output"
                                                                        src="{{ asset($teacherData->teacherImage) }}" />
                                                                    <input type='file' name="teacherImage" id="image"
                                                                        onchange="loadFile(event)"
                                                                        class="hidden" />
                                                                </div>
                                                            </label>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label
                                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Upload
                                                Image</label>
                                            <div class='flex items-center justify-center w-full'>

                                                @if ($teacherData->teacherImage != null)
                                                    <label
                                                        class='flex flex-col border-4 border-dashed w-40 h-40 hover:bg-gray-100 hover:border-purple-300 group'>
                                                        <img id="output" class="h-40 w-40"
                                                            src="{{ asset($teacherData->teacherImage) }}">
                                                        <input type='file' name="teacherImage" id="image"
                                                            onchange="loadFile(event)" class="hidden" />
                                                    </label>
                                                @else
                                                    <label
                                                        class='flex flex-col border-4 border-dashed w-40 h-40 hover:bg-gray-100 hover:border-purple-300 group'>
                                                        <div id="placeholder"
                                                            class='flex flex-col items-center justify-center pt-7 '>
                                                            <svg class=" w-10 h-10 mt-3 text-purple-400 group-hover:text-purple-600"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                                </path>
                                                            </svg>
                                                            <p
                                                                class='h-40 w-40 text-center lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                                                Select a file</p>
                                                        </div>
                                                        <img id="output" class="h-40 w-40">
                                                        <input type='file' name="teacherImage" id="image"
                                                            onchange="loadFile(event)" class="hidden" />

                                                    </label>

                                            </div>

                                            @endif


                                        </div>

                                        <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label
                                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First
                                                Name</label>
                                            <input
                                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                type="text" name="first_name"
                                                value="{{ $teacherData->first_name }}" />
                                        </div>

                                        <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label
                                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last
                                                Name</label>
                                            <input
                                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                type="text" name="last_name" value="{{ $teacherData->last_name }}" />
                                        </div>

                                        <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label
                                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Phone
                                                Number</label>
                                            <input
                                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                type="text" name="phone_number"
                                                value="{{ $teacherData->phone_number }}" />
                                        </div>

                                        <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label
                                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                                            <input
                                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                type="text" name="email" value="{{ $teacherData->email }}" />
                                        </div>

                                        <div class="grid grid-cols-1 mt-5 mx-7">
                                            <label
                                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Username</label>
                                            <input
                                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                type="text" name="username" value="{{ $teacherData->username }}" />
                                        </div>

                                        <div class='flex items-center justify-center pt-5 pb-5 '>
                                            <button type="submit"
                                                class='md:w-5/12 w-11/12 rounded-full bg-indigo-900 border-indigo-300 shadow-xl font-medium text-white px-4 py-2'>UPDATE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
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
