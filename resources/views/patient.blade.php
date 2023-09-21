{{-- <x-guest-layout> --}}
{{--    <form method="POST" action=    "{{ route('register') }}">--}}
    {{-- <form method="POST" action="/subsub">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        {{-- <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="phonenumber" :value="__('Phone Number')"/>
            <x-text-input id="phonenumber" typr="text" class="block mt-1 w-full" name="phonenumber" :value="old('phonenumber')" required />
            <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />

        </div>
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')"/>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female"> Female
            <x-input-error :messages="$errors->get('gender')" class="mt-2" /> --}}
        {{-- </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="patientlogin">
                {{ __('Already registered?') }}
            </a> --}}

{{--            <x-primary-button class="ml-4">--}}
{{--                {{ __('Register') }}--}}
{{--            </x-primary-button>--}}
            {{-- <button class="ml-4" name="subsub" id="subsub"> Submit</button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST"  action="/subsub">
                        @csrf
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required autocomplete="email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-input" name="phonenumber" id="phonenumber" placeholder="Your Mobile Number" required/>
                            <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <p>Gender: <input type="radio" name="gender" value="male" >Male
                            <input type="radio"  name="gender" value="female" >Female</p>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password" required autocomplete="new-password"/>
                            {{-- <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span> --}}
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" required autocomplete="new-password"/>
                            <x-input-error :messages="$errors->get('password_confirmation"')" class="mt-2" />
                        </div>
                        {{-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div> --}}
                        <div class="form-group">
                            <input type="submit" name="subsub" id="subsub" class="form-submit" value="Sign up"/>
                        </div>
                        {{-- <div class="flex items-center justify-end mt-4">
                            <a href="">
                                <img src="https://developers.google.com/identity/images/btn9876543_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                            </a>
                        </div> --}}
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="/patientlogin" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
