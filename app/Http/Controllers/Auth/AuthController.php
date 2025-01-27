<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Pharmacist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function show_login(Request $request)
    {
        $request->merge(['guard' => $request->guard]);
        $validator = Validator::make($request->all(), [
            'guard' => 'required|string|in:doctor,patient,pharmacist',
        ]);
        session()->put(['guard' => $request->guard]);
        if (!$validator->fails()) {
            return response()->view('auth.login');
        } else {
            abort(404);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        $guard = session('guard');
        if (!$validator->fails()) {
            if (Auth::guard($guard)->attempt($request->only(['email', 'password']), true)) {
                return response()->json(['message' => 'Logged in Successfully.'], Response::HTTP_OK);
            } else {
                return response()->json(['message' => 'Please check email or password ,and try again!'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            abort(404);
        }
    }
    public function show_signup(Request $request)
    {
        $request->merge(['guard' => $request->guard]);
        $validator = Validator::make($request->all(), [
            'guard' => 'required|string|in:doctor,pharmacist',
        ]);
        session()->put(['guard' => $request->guard]);
        if (!$validator->fails()) {
            return response()->view('auth.sign_up');
        } else {
            abort(404);
        }
    }

    public function sign_up(Request $request)
    {
        $guard = session('guard');
        if ($guard == 'patient') {
            $validate = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', "unique:patients,email"],
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                ],
                'phoneNumber' => ['required', 'numeric', 'digits:15'],
                'age' => ['nullable', 'numeric'],
                'gender' => ['nullable', 'in:male,female'],
                'problem' => ['nullable', 'string'],
            ]);
            if (!$validate->fails()) {
                $patient = new Patient();
                $patient->name = $request->name;
                $patient->email = $request->email;
                $patient->password = Hash::make($request->password);
                $patient->phoneNumber = $request->phoneNumber;
                $patient->age = $request->age;
                $patient->gender = $request->gender;
                $patient->problem = $request->problem;
                $patient->entrancDate = now()->toDate();
                $saved = $patient->save();
                if ($saved) {
                    Auth::guard($guard)->login($patient);
                    return redirect()->route('starter');
                }
            } else {
                return redirect()->back()->with('error', $validate->getMessageBag()->first());
            }
        } elseif ($guard == 'doctor') {
            $validate = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', "unique:patients,email"],
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                ],
                'phoneNumber' => ['required', 'numeric', 'digits:15'],
            ]);
            if (!$validate->fails()) {
                $doctor = new Doctor();
                $doctor->name = $request->name;
                $doctor->email = $request->email;
                $doctor->password = Hash::make($request->password);
                $doctor->phoneNumber = $request->phoneNumber;
                $saved = $doctor->save();
                if ($saved) {
                    Auth::guard($guard)->login($doctor);
                    return redirect()->route('starter');
                } else {
                    return $validate->getMessageBag()->first();
                }
            } else {
                return redirect()->back()->with('error', $validate->getMessageBag()->first());
            }
        } elseif ($guard == 'pharmacist') {
            $validate = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'email' => ['required', 'email', "unique:patients,email"],
                'password' => [
                    'required',
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                ],
                'phoneNumber' => ['required', 'numeric', 'digits:15'],
            ]);
            if (!$validate->fails()) {
                $pharmacist = new Pharmacist();
                $pharmacist->name = $request->name;
                $pharmacist->email = $request->email;
                $pharmacist->password = Hash::make($request->password);
                $pharmacist->phoneNumber = $request->phoneNumber;
                $saved = $pharmacist->save();
                if ($saved) {
                    Auth::guard($guard)->login($pharmacist);
                    return redirect()->route('starter');
                }
            } else {
                return redirect()->back()->with('error', $validate->getMessageBag()->first());
            }
        }
    }

    public function logout(Request $request)
    {
        $guard = session('guard');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login', 'patient');
    }
}
