<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Notifications\EmailNotification;
use App\Providers\RouteServiceProvider;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Notification;

// namespace App\Http\Controllers\Auth;

class PatientController extends Controller
{
    //
    public function create(): View
    {
        return view('patient');
    }
    public function createlogin(): View
    {
        return view('patientlogin');
    }
    public function updateappointment($id):View{
        $data=DB::table('appointment')->find($id);
        return view('updateappointment', compact('data'));
        // $data = DB::table('appointment')
        //     ->select('id','patientname', 'phonenumber', 'appointmentdate', 'problem', 'bookingnumber')
        //     ->where('patient_id', $patientId)
        //     ->get()

        //     ->toArray();
        // // ddd($appointment);
        // return view('updateappointment', compact('data'));
        // return view('updateappointment');
    }


    public function viewappointment():View{
        $patientId =  Auth::guard("patient")->user()->id;
        $appointment = DB::table('appointment')
            ->select('id','patientname', 'phonenumber', 'appointmentdate', 'problem', 'bookingnumber')
            ->where('patient_id', $patientId)
            ->get()

            ->toArray();
        // ddd($appointment);
        return view('viewappointment', compact('appointment'));
    }
    public function dashboard(): View
    {
        //$appointment=DB::table('appointment')->get()->toArray();
        $patientId =  Auth::guard("patient")->user()->id;
        $appointment = DB::table('appointment')
            ->select('id','patientname', 'phonenumber', 'appointmentdate', 'problem', 'bookingnumber')
            ->where('patient_id', $patientId)
            ->get()

            ->toArray();
        // ddd($appointment);
        return view('patientdashboard', compact('appointment'));
    }
    public function bookappointment(): View
    {
        return view('bookappointment');
    }

    public function login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('patient')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $request->session()->regenerate();
            return redirect()->route('patientdashboard');
        } else {
//         throw validationex
            // ddd($attributes);
            return back()->withErrors(['email' => 'Your provided credentials is not be validated']);
        }
    }
//        $req->authenticate();
//
//        $req->session()->regenerate();
//
//        return redirect()->intended(RouteServiceProvider::HOME);

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Patient::class],
            'phonenumber' => ['required', 'min:8', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'gender' => ['required', 'string'],
            'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
        ]);
        // $data=$request->all();
        $patient = Patient::create([
            'name' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($patient));
        //ddd($request);

        Auth::guard('patient')->login($patient);

        return redirect(RouteServiceProvider::patient);
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('patient')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function generateRandomString($length = 4)
    {
        $characters = '0123456789';
        $randomString = substr(str_shuffle($characters), 0, $length);
        //echo "Your Booking Number is #". $randomString;
        return $randomString;
    }

// Generate a random string of length 8
//$randomString = generateRandomString(8);
//echo $randomString."<br>";

    public function bookapp(Request $request)
    {
        $patientname = $request->input('patientname');
        $phonenumber = $request->input('phonenumber');
        $age = $request->input('age');
        $patient_id = $request->input('patient_id');
        $appointmentdate = $request->input('appointmentdate');
        $problem = $request->input('problem');
        $doctor = $request->input('doctor');
        $number = $this->generateRandomString();
        $bookingnumber = $number;
        $data = ['patient_id' => $patient_id,
            'patientname' => $patientname,
            'phonenumber' => $phonenumber,
            'age' => $age,
            'appointmentdate' => $appointmentdate,
            'problem' => $problem,
            'doctor' => $doctor,
            'bookingnumber' => $bookingnumber,
        ];
        //ddd($data);
        DB::table('appointment')->insert($data);
        $user = Patient::first();

        $project = [
            'greeting' => 'Hi ' . $user->name . ',',
            'body' => 'You have Successfully Booked an Appointment to see a Doctor on' . $appointmentdate,
            'thanks' => 'Thank you this is from Doctorpatient.com',
            'actionText' => 'View Appointment Details',
            'actionURL' => url('/'),
            'id' => 57,
        ];

        Notification::send($user, new EmailNotification($project));

        // echo "Your Appointment has been Booked Successfully with Booking Number #".$number;
        session()->flash('sucess', 'Booking Number is' . $number);
        return redirect('patientdashboard');

    }
    // public function indexx(){
    //     $users = DB::select('select * from appointment');
    //     // return view('stud_delete_view',['users'=>$users]);
    //     }
    public function destroyy($id)
    {
        DB::delete('delete from appointment where id = ?', [$id]);

        session()->flash('Success', 'Record Deleted');
        return redirect('patientdashboard');
        // echo 'Click Here to go back.';
    }
//         public function send()
//         {

//              //dd('Notification sent!');
//         }
}
