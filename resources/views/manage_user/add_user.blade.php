<div class="modal fade" id="registerModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModal">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Validation Errors -->
                {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

                @if ($errors->add->any())
                    <x-auth-validation-errors class="mb-4" :errors="$errors->add" />
                @endif

                <form method="POST" action="{{ route('manage_user.register_parent') }}">
                    @csrf

                    <!-- First Name -->
                    <div>
                        <x-label for="first_name" :value="__('First Name')" />

                        <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" placeholder="Enter First Name" :value="old('first_name')" required
                            autofocus />
                        
                    </div>

                    <!-- Last Name -->
                    <div>
                        <x-label for="last_name" :value="__('Last Name')" />

                        <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" placeholder="Enter Last Name" :value="old('last_name')" required
                            autofocus />
                    </div>

                    <!-- Username -->
                    <div class="mt-4">
                        <x-label for="username" :value="__('Username')" />

                        <x-input id="username" class="block mt-1 w-full" type="text" name="username" placeholder="Enter Username" :value="old('username')" required />

                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" placeholder="Enter Email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" /> 

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Enter Password (at least 6 character)" required
                            autocomplete="new-password" />

                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Re-enter Password"
                            name="password_confirmation" required />

                    </div>

                    <!-- Child Name -->
                    <div class="mt-4">
                        <x-label for="class" :value="__('Child Name')" />
                        {!! Form::select('add_student', $studentList, $student, ['class' => 'block p-2 mt-1 w-full h-12 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm', 'required', 'placeholder' => __('Please select'), 'id' => 'student', 'name' => 'add_student']) !!}
                    </div>

                    <!-- Phone -->
                    <div class="mt-4">
                        <x-label for="phone_number" :value="__('Phone Number')" /> 

                        <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" placeholder="Enter Phone Number (Example:01119800063)" :value="old('phone_number')" required />

                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>