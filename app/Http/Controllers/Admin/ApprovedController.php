<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateApprovedRequest;
use App\Models\Approved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        } else {
            $approveds = Approved::all();
            return view('approved.index', compact('approveds'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateApprovedRequest $request)
    {
        $data = $request->validated();

        $data['school_id'] = Auth::user()->school_id;

        $approved = Approved::create($data);
        $approved->save();

        return redirect()->route('approved.index');
    }

    public function delete(Approved $approved)
    {
        $approved->delete(); // soft delete
        return redirect()->route('approved.index');
    }

    public function trashed()
    {
        $approveds = Approved::onlyTrashed()->get();
        return view('approved.trashed', compact('approveds'));
    }

    public function forceDelete($id)
    {
        $approved = Approved::onlyTrashed()->where('id', $id)->firstOrFail();
        $approved->forceDelete();
        return redirect()->route('approved.trashed');
    }
}