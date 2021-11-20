<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

                <div class="mt-4{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label for="gender" class="block mt-1 w-full">Gender</label>

                    <div class="col-md-12">
                        <select class="form-control" required name="gender" id="gender">
                            <option value=""> Please Select </option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <label for="dob" class="col-md-4 control-label">Date of Birth</label>

                    <div class="col-md-6">
                        <input id="dob" name="dob" type="date" class="form-control"  required>
                    </div>
                </div>

                <div class="mt-4">
                    <label for="profileImage" class="col-md-4 control-label"> Profile Picture </label>

                    <div class="col-md-6">
                        <input type="file" name="profileImage" id="profileImage"  class="form-control"  accept="image/*">
                        @if ($errors->has('profileImage'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('profileImage') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>

            <div class="flex items-center justify-end mt-4">
               {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>--}}

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
