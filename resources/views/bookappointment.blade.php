<x-guest-layout xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<h1>WELCOME, PLEASE BOOK APPOINTMENT BELOW</h1>
    <a href="{{route('patientdashboard')}}" style="color:white"> Go back to Dashboard</a>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if(Session::has('error'))
        <alert>{{Session::get('error')}}</alert>
    @endif

    <form method="POST" action="{{route('bookappointment')}}">
        @csrf
        <div class="mt-4">
            <x-input-label for="patient_id" :value="__('Patient ID')" />

            <input  readonly id="patient_id" class="block mt-1 w-full"
                          type="text"
                          name="patient_id" value="{{Auth::guard('patient')->user()->id}}" placeholder="{{Auth::guard('patient')->user()->id}}"
                          required autofocus autocomplete="patient_id" />


        </div>
        <!-- Patient Name -->
        <div>
            <x-input-label for="patientname" :value="__('Full Name')" />
            <x-text-input id="patientname" class="block mt-1 w-full" type="text" name="patientname" :value="old('Full Name')" required autofocus autocomplete="patientname" />
            <x-input-error :messages="$errors->get('patientname')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phonenumber" :value="__('Phone Number')" />

            <x-text-input id="phonenumber" class="block mt-1 w-full"
                          type="text"
                          name="phonenumber"
                          required autofocus autocomplete="phonenumber" />

            <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
        </div>
        <!--Age-->
        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />

            <x-text-input id="age" class="block mt-1 w-full"
                          type="number"
                          name="age"
                          required autofocus autocomplete="age" />

            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="appointmentdate" :value="__('Choose Appointment Date')" />

            <x-text-input type="date" id="appointmentdate" class="block mt-1 w-full"

                          name="appointmentdate"
                          required autofocus autocomplete="appointmentdate" />

            <x-input-error :messages="$errors->get('appointmentdate')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="problem" :value="__('Problem/Issue/Symptoms')" />

            <textarea type="text" id="problem" class="block mt-1 w-full"

                          name="problem"
                      required autofocus autocomplete="problem" />
        </textarea>

            <x-input-error :messages="$errors->get('problem')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="doctor" :value="__('Choose Doctor') " />


            <x-text-input type="text" id="doctor" class="block mt-2 w-full"

                          name="doctor"
                          required autofocus autocomplete="doctor" />

            <x-input-error :messages="$errors->get('doctor')" class="mt-2" />
        </div>



        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            <button class="ml-4" name="patientlogin" id="patientlogin"> Submit</button>
        </div>
    </form>
</x-guest-layout>
