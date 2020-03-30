<?php

namespace App\Http\Controllers;
use App\Patient;
use Illuminate\Http\Request;
use App\Reports;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::latest()->paginate(5);
        return redirect('home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'national_id' => 'required',
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'mobile_number' => 'required'
        ]);
        Patient::create($request->all());
        return redirect('home')->with('success', 'New patient created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        //user reports
        $reportsData = Reports::where('patient_id', '=', $id)->orderBy('created_at', 'DESC')->get();

        return view('patient.details', compact('patient', 'reportsData'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patient.edit', compact('patient'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'national_id' => 'required',
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'mobile_number' => 'required'
        ]);
        $patient = Patient::find($id);
        $patient->national_id = $request->get('national_id');
        $patient->name = $request->get('name');
        $patient->age = $request->get('age');
        $patient->gender = $request->get('gender');
        $patient->mobile_number = $request->get('mobile_number');
        $patient->save();
        return redirect('home')->with('success', 'Patient details updated successfully');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect('home')->with('success', 'Patient details deleted successfully');
    }

    public function report($id)
    {
        //getting patient id --> id is patient id 
        return view('confirm_values', compact('id'));
    }
}
