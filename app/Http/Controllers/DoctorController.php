<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function __construct()
    {
        if (!Auth::guard('doctor')->check()) {
            abort(403);
        }
    }

    public function showAssignDrug($id)
    {
        $patients = Patient::findOrFail($id);
        $drugs = Drug::get();
        $data = DB::table('patientdrug')->join('drugs', 'drugs.id', '=', 'patientdrug.drug_id')->get();
        return response()->view('doctors.index', ['patients' => $patients, 'drugs' => $drugs, 'data' => $data]);
    }
    public function assignDrug(Request $request, $pat_id)
    {

        //
        $validator = Validator::make($request->all(), [
            'drug_id' => ['required'],
        ]);
        if (!$validator->fails()) {
            DB::table('patientdrug')->where('pat_id', $pat_id)->delete();
            foreach ($request->drug_id as $drug) {
                $saved = DB::table('patientdrug')->insert([
                    'pat_id' => $pat_id,
                    'drug_id' => $drug,
                ]);
            }
            if ($saved) {
                return redirect()->back()->with('success', 'Assign drug successfully.');
            } else {
                return redirect()->back()->with('error', 'error');
            }
        } else {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }
    }
    public function unsignDrug($drug_id, $pat_id)
    {
        $deleted = DB::table('patientdrug')->where('drug_id', $drug_id)->where('pat_id', $pat_id)->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Drug unsigned successfully.');
        } else {
            return redirect()->back()->with('error', 'Drug unsigned failed, please try again');
        }
    }
}
