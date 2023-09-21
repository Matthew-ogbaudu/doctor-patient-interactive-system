<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>View Appointment</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}" />
    <style>
        body{
            background: none;
        }
    </style>
</head>
<body>
<form method="POST" action="">
    @csrf
@method('PUT')

    <div class="mt-4">
        <label for="appointmentdate">Appointment Date</label>

        <input type="date" id="appointmentdate" class="block mt-1 w-full"
        value="{{ $data->appointmentdate}}"
                      name="appointmentdate"
                      required autofocus autocomplete="appointmentdate" />

        <x-input-error :messages="$errors->get('appointmentdate')" class="mt-2" />
    </div>
    <div class="mt-4">
        <label for="phonenumber">Phone Number</label>

        <x-text-input type="number" id="phonenumber" class="block mt-1 w-full"
                      value="{{$data->phonenumber}}"
                      name="phonenumber"
                      required autofocus autocomplete="phonenumber" />

        <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-input-label for="problem" :value="__('Problem')" />

        <x-text-input type="text" id="problem" class="block mt-1 w-full"
        value="{{$data->problem}}"
                      name="problem"
                      required autofocus autocomplete="problem" />

        <x-input-error :messages="$errors->get('problem')" class="mt-2" />
    </div>
    <button type="submit">Update</button>
</form>
</body>
</html>
