<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Settings;
use App\Models\Pricing;
use App\Models\VisitRequest;
use App\Models\HomeExRequest;
use App\Models\PatientQuery;
use App\Models\Visit;

class MainController extends Controller
{
    public function settings()
    {
        $settings = Settings::all();
        return response()->json([1, 'Successful Data', $settings]);
    }

    public function pricing()
    {
        $pricing = Pricing::all();
        return response()->json(['pricing' => $pricing]);
    }

    public function visitRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'date' => 'required',
            'last_visit' => 'nullable',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $visitRequest  = VisitRequest::create([
            'user_id' => auth()->user()->id,
            'type' => $request->type,
            'date' => $request->date,
            'last_visit' => $request->last_visit,
        ]);
        return response()->json([
            'message' => 'visit Request successfully created',
            'visitRequest' => $visitRequest,
        ]);
    }

    public function HomeExRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'required_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $homeRequest  = HomeExRequest::create([
            'user_id' => auth()->user()->id,
            'required_date' => $request->required_date,
        ]);
        return response()->json([
            'message' => 'Home Request successfully created',
            'homeRequest' => $homeRequest,
        ]);
    }

    public function patientQuery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $patientQuery  = PatientQuery::create([
            'user_id' => auth()->user()->id,
            'question' => $request->question,
            'question_date' => Carbon::now(),
        ]);
        return response()->json([
            'message' => 'PatientQuery successfully created',
            'patientQuery' => $patientQuery,
        ]);
    }

    public function accepted(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'type' => 'required',
            'date' => 'required',
            'conclusion' => 'required',
            'documents' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $visit = $request->all();
        $visit = Visit::create([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'date' => $request->date,
            'conclusion' => $request->conclusion,
        ]);
        if (request()->hasFile('documents')) {
            $docs = $request->documents;
            foreach ($docs as $doc) {
                $document = Image::make($doc)->encode('jpg');
                Storage::disk('local')->put('public/images/documents/' . $doc->hashName(), (string)$document, 'public');
                $visit->files()->create([
                    'file' => $doc->hashName(),
                ]);
            }
        }
        return response()->json([
            'msg' => 'Visits successfully created',
            'visit' => $visit
        ]);
    }

    public function Visits(Request $request)
    {

        $visits = Visit::all();
        return response()->json([
            'visits' => $visits,
        ]);
    }
}
