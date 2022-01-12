<div class="modal fade" data-backdrop="static" id="editModal{{ $list_user->user_id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">{{ __('Edit') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Validation Errors -->
                {{-- @if (session()->get('message') == 'edit')
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                {{-- @if (session()->has('message'))
                    <div class="text-black text-md-center">
                        {{ session()->get('message') }}
                    </div>
                @endif --}}


                @if ($errors->edit->any())
                    <x-auth-validation-errors class="mb-4" :errors="$errors->edit" />
                @endif

                <form method="POST" action="{{ route('manage_user.update_parent', ['id' => $list_user->user_id]) }}">
                    @csrf

                    <!-- First Name -->
                    <div>
                        <x-label for="first_name" :value="__('First Name')" />

                        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                            value="{{ $list_user->first_name }}" required autofocus />
                    </div>

                    <!-- Last Name -->
                    <div>
                        <x-label for="last_name" :value="__('Last Name')" />

                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                            value="{{ $list_user->last_name }}" required autofocus />
                    </div>

                    <!-- Username -->
                    <div class="mt-4">
                        <x-label for="username" :value="__('Username')" />

                        <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                            value="{{ $list_user->username }}" required />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" 
                            value="{{ $list_user->email }}" required />
                    </div>

                    <!-- Student Name -->
                    <div class="mt-4">
                        <x-label for="class" :value="__('Child Name')" />
                        {!! Form::select('student', $studentList, $list_user->students, ['class' => 'block p-2  w-full h-12 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm', 'required', 'placeholder' => __('Please select'), 'id' => 'student', 'name' => 'student']) !!}
                    </div>

                    <!-- Phone -->
                    <div class="mt-4">
                        <x-label for="phone_number" :value="__('Phone')" />

                        <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                            value="{{ $list_user->phone_number }}" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <a href="{{ route('manage_user.change_password', ['id' => $list_user->user_id]) }}"
                            class="text-primary">Change Password</a>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
