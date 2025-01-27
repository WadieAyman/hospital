<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::guard('doctor')->check()) {
            $patients = Patient::all();
            return response()->view('patients.index', ['patients' => $patients]);
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Auth::guard('doctor')->check()) {
            return response()->view('patients.create');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (Auth::guard('doctor')->check()) {
            $validator = Validator($request->all(), [
                'name' => ['required', 'string'],
                'email' => ['required', 'string'],
                'password' => ['required'],
                'phoneNumber' => ['required', 'numeric', 'digits:15'],
                'age' => ['required', 'numeric'],
                'gender' => ['required', 'in:Male,Female'],
                'problem' => ['required', 'string'],
            ]);
            if (!$validator->fails()) {
                $saved = Patient::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phoneNumber' => $request->phoneNumber,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'problem' => $request->problem,
                    'entrancDate' => now()->toDateTimeString(),
                ]);
                if ($saved) {
                    DB::table('patientdoctor')->insert([
                        'pat_id' => $saved->id,
                        'doc_id' => Auth::guard('doctor')->user()->id,
                    ]);
                    // dd(Auth::guard('doctor')->user()->id);
                    return redirect()->back()->with('success', 'Add patient successfully.');
                } else {
                    return redirect()->back()->with('error', 'Add patient failed.');
                }
            } else {
                return redirect()->back()->with('error', $validator->getMessageBag()->first());
            }
        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        if (!Auth::guard('pharmacist')->check()) {
            if (Auth::guard('patient')->check()) {
                if (Auth::guard('patient')->user()->id != $id) {
                    abort(403);
                } else {
                    $patient = Patient::findOrFail($id);
                    $data = DB::table('patientdrug')
                        ->join('drugs', 'drugs.id', '=', 'patientdrug.drug_id')
                        ->where('pat_id', $id)
                        ->get();
                    return view('patients.show', compact(['data', 'patient']));
                }
            } else {
                $patient = Patient::findOrFail($id);
                $data = DB::table('patientdrug')
                    ->join('drugs', 'drugs.id', '=', 'patientdrug.drug_id')
                    ->where('pat_id', $id)
                    ->get();
                return view('patients.show', compact(['data', 'patient']));
            }
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
        if (!Auth::guard('pharmacist')->check()) {
            return response()->view('patients.edit', ['patient' => $patient]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
        if (!Auth::guard('pharmacist')->check()) {
            $updated = $patient->update($request->all(), [
                'updated_at' => now()->toTimeString(),
            ]);
            if ($updated) {
                return redirect()->back()->with('success', 'Updated patient details successfully.');
            } else {
                return redirect()->back()->with('error', 'Update patient details failed.');
            }
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
        if (Auth::guard('doctor')->check()) {
            $delete = $patient->delete();
            return redirect()->back()->with('success', 'deleted patient successfully');
        }
    }
}
