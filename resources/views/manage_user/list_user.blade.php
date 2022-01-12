<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="min-h-screen py-6 flex flex-col ">
                        <div class="row pb-2 justify-self-end">
                            <button id="button_register" data-toggle="modal" data-target="#registerModal"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                Add User
                            </button>
                            {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                            {{-- @if (session('error'))
                                {{ session('error') }}
                            @endif --}}
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-7">
                                <div class="py-2 align-middle inline-block min-w-full  sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full  divide-y divide-gray-200">
                                            <thead class="bg-gray-50 ">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        No Phone
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            @foreach ($user as $list_user)
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div>
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $list_user->first_name }}
                                                                        {{ $list_user->last_name }}
                                                                    </div>
                                                                    <div class="text-sm text-gray-500">
                                                                        {{ $list_user->username }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">
                                                                {{ $list_user->phone_number }}
                                                            </div>

                                                        </td>
                                                        <td class=" px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                            <div class="row gap-2">
                                                                <button id="button_edit" data-toggle="modal"
                                                                    data-target="#editModal{{ $list_user->user_id }}"
                                                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                                                    Edit
                                                                </button>

                                                                <form
                                                                    action="{{ route('manage_user.remove_parent', ['id' => $list_user->user_id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure to delete?')"
                                                                        class=" bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                                                                        Delete
                                                                    </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('manage_user.edit_user')
                                            @endforeach
                                            <!-- More people... -->
                                            </tbody>
                                        </table>
                                        <div class="py-3 px-6 pt-4">
                                            {{ $user->links() }}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('manage_user.add_user')

</x-app-layout>

<script type="text/javascript">
    @if ($errors->edit->any())
        document.getElementById("button_edit").click()
        // if (document.getElementById('button_register')){
        // $('#registerModal').modal('show');
        // } else
        // if (document.getElementById('button_edit')){
        // $('#editModal{{ $list_user->user_id }}').modal('show');
    
        // }
    @elseif ($errors->add->any())
        document.getElementById("button_register").click()
    @endif
</script>
