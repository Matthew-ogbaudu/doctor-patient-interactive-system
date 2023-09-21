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
<div class="row" style="margin-top: -120px">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pending Appointments</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Patient Name </th>
                            <th> Phone Number</th>
                            <th> Appointment Date </th>
                            <th> Problem </th>
                            <th> Booking Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($appointment as $data)
                            <tr>
                                <td>{{$data->patientname}}</td>
                                <td>{{$data->phonenumber}}</td>
                                <td>{{$data->appointmentdate}}</td>
                                <td>{{$data->problem}}</td>
                                <td>{{$data->bookingnumber}}</td>
                                {{-- <td><a href="{{route('updateappointment') }}" Update Appointment ></a> </td> --}}
                                <td><a href = 'updateappointment/{{$data->id}}')}}'>Update</a></td>
                                <td><a href = 'delete/{{ $data->id }}'>Delete</a></td>

                                {{-- <form action="patientdashboard/deleteappointment" method=POST>
                                 <input type="hidden" name="id" value="{{ $data->id }}"/>
                                <td><button>Delete </button></td></form> --}}
                        @empty
                            <tr><td colspan="4">No record found</td></tr>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
