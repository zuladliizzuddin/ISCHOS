<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 uppercase">
            <a href="{{ route('manage_profile.view_profile')}}">{{ __('PROFILE') }}</a>
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <section class="justify-center">
                    <div class="container mx-auto">
                        <div class="flex flex-wrap px-6">
                            <div class="w-full md:px-4 lg:px-6 py-5">

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First
                                        Name</label>
                                    <input
                                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        type="text" value="{{ $parentData->first_name }}" disabled />
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last
                                        Name</label>
                                    <input
                                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        type="text" value="{{ $parentData->last_name }}" disabled />
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Phone
                                        Number</label>
                                    <input
                                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        type="text" value="{{ $parentData->phone_number }}" disabled />
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Email</label>
                                    <input
                                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        type="text" value="{{ $parentData->email }}" disabled />
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <label
                                        class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Username</label>
                                    <input
                                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        type="text" value="{{ $parentData->username }}" disabled />
                                </div>

                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <a href="{{ route('manage_user.change_password', ['id' => $parentData->user_id]) }}"
                                        class="text-blue-500">Change Password</a>
                                </div>

                                <div class='flex items-center justify-center pt-5 pb-8 '>
                                    <button
                                        class='md:w-5/12 w-11/12 bg-indigo-900 border-indigo-300 rounded-full shadow-xl font-medium text-white px-4 py-2'
                                        onclick="location.href='{{ route('manage_profile.edit_profile') }}'">EDIT</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
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