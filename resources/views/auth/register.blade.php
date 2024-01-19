<x-guest-layout>
    {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-screen-lg mx-auto"> --}}
        <!-- Image Section -->
        {{-- <div class="">
            <img src="{{ asset('images/pictures/001.jpg') }}" alt="app logo" class="w-full h-auto md:h-full object-cover">
        </div> --}}

        <x-authentication-card>
            <x-slot name="logo">
                <img src="{{ asset('images/app_logo/app-logo1.png') }}" alt="app logo" style="width: 350px; height: auto;">
            </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div>
                    <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" placeholder="{{ __('First name') }}" />
                </div>
                
                <div>
                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" placeholder="{{ __('Last Name') }}" />
                </div>
            </div>

            <div class="mt-4">
                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="{{ __('Username') }}" />
            </div>

            <div class="mt-4">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="{{ __('Email address') }}" />
            </div>

            <div class="mt-4">
                <x-label for="dob" value="{{ __('Date of Birth') }}" />
                <div class="flex items-center">
                    <select id="day" name="day" class="flex-1 mr-2 block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:ring-indigo-500">
                        <option value="" selected disabled>Date</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                        @endfor
                    </select>

                    <select id="month" name="month" class="flex-1 mr-2 block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:ring-indigo-500">
                        <option value="" selected disabled>Month</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                        @endfor
                    </select>

                    <select id="year" name="year" class="flex-1 mr-2 block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:ring-indigo-500">
                        <option value="" selected disabled>Year</option>
                        @for ($i = date('Y'); $i >= 1900; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="gender" value="{{ __('Gender') }}" />
                <div class="flex items-center mt-2">
                    <label for="male" class="flex-1 mr-2">
                        <div class="border rounded-md p-2 flex items-center justify-between cursor-pointer border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:ring-indigo-500">
                            <span class="dark:text-white">Male</span>
                            <input type="radio" name="gender" value="male" class="" />
                        </div>
                    </label>

                    <label for="female" class="flex-1 mr-2">
                        <div class="border rounded-md p-2 flex items-center justify-between cursor-pointer border-gray-300 dark:border-gray-700 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:focus:ring-indigo-500">
                            <span class="dark:text-white">Female</span>
                            <input type="radio" name="gender" value="female" class="" />
                        </div>
                    </label>
                </div>
            </div>

            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}" />
            </div>

            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
{{-- </div> --}}
</x-guest-layout>
