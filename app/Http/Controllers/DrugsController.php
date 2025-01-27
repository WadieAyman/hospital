<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DrugsController extends Controller
{
    public function __construct()
    {
        if (!Auth::guard('pharmacist')->check()) {
            abort(403);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $drugs = Drug::with('patient')->paginate(8);
        return view('drugs.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('drugs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'dosage' => ['required', 'numeric'],
            'productionDate' => ['required'],
            'expiryDate' => ['required'],
        ]);
        if (!$validator->fails()) {
            $drug = new Drug();
            $drug->name = $request->name;
            $drug->dosage = $request->dosage;
            $drug->productionDate = $request->productionDate;
            $drug->expiryDate = $request->expiryDate;
            $saved = $drug->save();
            if ($saved) {
                return redirect()->back()->with('success', 'New Drug Added Successfully.');
            } else {
                return redirect()->back()->with('error', 'New Drug Added failed,please try again.');
            }
        } else {
            return redirect()->back()->with('error', $validator->getMessageBag()->first());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $drug = Drug::with('patient')->findOrFail($id);
        $data = DB::table('patientdrug')
            ->join('patients', 'patients.id', '=', 'patientdrug.pat_id')
            ->where('drug_id', $drug->id)
            ->get();
        return view('drugs.show', compact(['data', 'drug']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drug $drug)
    {
        //
        return view('drugs.edit', ['drug' => $drug]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drug $drug)
    {
        //
        $drug->name = $request->name;
        $drug->dosage = $request->dosage;
        $drug->productionDate = $request->productionDate;
        $drug->expiryDate = $request->expiryDate;
        $updated = $drug->update();
        if ($updated) {
            return redirect()->back()->with('success', 'Drug Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Drug updated failed,please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $drug = Drug::findOrFail($id);
        $deleted = $drug->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Sucess');
        } else {
            return redirect()->back()->with('error', 'Failed');
        }
    }
}
