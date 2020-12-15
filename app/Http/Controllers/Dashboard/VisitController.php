<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Visit;
use App\Models\VisitRequest;
use App\Models\User;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::latest()->paginate(10);
        return view('dashboard.visit.index', compact('visits'));
    }

    public function create($id)
    {
        $visitRequest = VisitRequest::find($id);
        $user = User::find($visitRequest->user_id);
        $users = User::all();
        return view('dashboard.visit.create', compact('visitRequest', 'users', 'user'));
    }

    public function store(StoreVisitRequest $request)
    {
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

        VisitRequest::find($request->visitRequest_id)->delete();
        return redirect()->route('admin.visit.index')->with(['success' => 'Visit Added Successfully']);
    }

    public function edit(Visit $visit)
    {
        return view('dashboard.visit.edit', compact('visit'))->with('users', User::all());
    }

    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        $visit->update($request->all());

        return redirect()->route('admin.visit.index')->with(['success' => 'Visit Updated Successfully']);
    }

    public function destroy(Visit $visit)
    {
        Storage::disk('local')->delete('public/images/documents/' . $visit->documents);
        $visit->delete();
        return redirect()->route('admin.visit.index')->with(['success' => 'Visit Deleted Successfully']);
    }
}
