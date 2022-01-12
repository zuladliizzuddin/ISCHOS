<x-app-layout>
    
    <x-slot name="header">
        <h2 class=" uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('Change Password') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8 md:w-6/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white ">
                    <form method="POST"
                        action="{{ route('manage_user.update_password', ['id' => $user->id]) }}" id="change_password_form">
                        @csrf

                        
                        <!-- Old Password -->
                        <div class="mt-4">
                            
                            <x-label for="old_password" :value="__('Old Password')" />

                            <x-input id="old_password" class="block mt-1 w-full" type="password" name="old_password" value="{{old('old_password')}}"/>
                            @if ($errors->any('old_password'))
                                <span class="text-red-600">{{$errors->first('old_password')}}</span>
                            @endif
                        </div>

                        <!-- New Password -->
                        <div class="mt-4">
                            <x-label for="new_password" :value="__('New Password')" />

                            <x-input id="new_password" class="block mt-1 w-full" type="password" name="new_password" value="{{old('new_password')}}"/>
                            @if ($errors->any('new_password'))
                                <span class="text-red-600">{{$errors->first('new_password')}}</span>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="confirm_password" :value="__('Confirm Password')" />

                            <x-input id="confirm_password" class="block mt-1 w-full" type="password" name="confirm_password" value="{{ old('confirm_password')}}"/>
                            @if ($errors->any('confirm_password'))
                                <span class="text-red-600">{{$errors->first('confirm_password')}}</span>
                            @endif
                        </div>


                        <div class="flex items-center justify-center mt-10">
                            <x-button class="ml-4 rounded-full bg-indigo-900 border-indigo-300  shadow-xl font-medium text-white">
                                {{ __('Update Password') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
