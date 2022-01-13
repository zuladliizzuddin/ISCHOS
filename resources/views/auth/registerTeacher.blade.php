<x-guest-layout>
    <x-auth-card>



        <x-slot name="logo">
            <a href="/">
                <x-application-sms-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register.teacher') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                    placeholder="Enter First Name" :value="old('first_name')" required autofocus />
            </div>

            <br>

            <!-- Last Name -->
            <div>
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                    placeholder="Enter Last Name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Username -->
            <div class="mt-4">
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" placeholder="Enter Username"
                    :value="old('username')" required />
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name="email" placeholder="Enter Email"
                    :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                    placeholder="Enter Password (at least 6 character)" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    placeholder="Re-enter Password" name="password_confirmation" required />
            </div>


            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    placeholder="Enter Phone Number (Example:01119800063)" :value="old('phone_number')" required />
            </div>


            <!-- Class Name -->
            <div class="mt-4">
                <x-label for="class" :value="__('Class Name')" />
                {!! Form::select('class', $classList, $class, ['class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm', 'required', 'placeholder' => __('Please select'), 'id' => 'class', 'name' => 'class']) !!}
            </div>


            <!-- Subject Name -->
            <div class="mt-4">
                <x-label for="subject" :value="__('Subject Class Name')" />
                {!! Form::select('subject[]', $subjectList, $subject, ['class' => 'js-example-basic-multiple block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm', 'multiple' => 'multiple', 'required', 'id' => 'subject[]', 'name' => 'subject[]']) !!}
            </div>

            <br>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

</x-guest-layout>

<script type="text/javascript">
    $('.js-example-basic-multiple').select2({
        multiple: true
    });
</script>
