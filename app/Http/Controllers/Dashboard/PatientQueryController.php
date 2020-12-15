<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientQueryRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PatientQuery;
use App\Models\User;

class PatientQueryController extends Controller
{
    public function index()
    {
        $patientQueries = PatientQuery::paginate(10);
        return view('dashboard.patientQuery.index', compact('patientQueries'));
    }

    public function create()
    {
        return view('dashboard.patientQuery.create')->with('users', User::all());
    }

    public function store(Request $request)
    {
        $patientQuery = PatientQuery::create([
            'user_id' => $request->user_id,
            'question' => $request->question,
            'question_date' => Carbon::now(),
        ]);
        return redirect()->route('admin.patient_query.index')->with(['success' => 'Patient Query Added Successfully']);
    }

    public function edit(PatientQuery $patientQuery)
    {
        $user = User::where('id', $patientQuery->user_id)->first();
        return view('dashboard.patientQuery.edit', compact('patientQuery', 'user'));
    }

    public function update(Request $request, PatientQuery $patientQuery)
    {

        $patientQuery->update([
            'response' => $request->response,
            'response_date' => Carbon::now(),
        ]);
        $patientQuery->save();
        return redirect()->route('admin.patient_query.index')->with(['success' => 'Patient Query Updated Successfully']);
    }

    public function destroy(PatientQuery $patientQuery)
    {
        $patientQuery->delete();
        return back();
    }
}
