<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// imported
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Config;
use App\Models\Rack;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $school = School::where('id', $user->school_id)->firstOrFail();

        $items = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', 'categories.icon as category_icon', 'items.*')
            ->where('items.school_id', $school->id)
            ->whereNull('items.deleted_at')
            ->orderBy('category_id')
            ->get();

        $groupedItems = $items->groupBy('category_name')
            ->map(function ($items) {
                return $items;
            })
            ->toArray();

        $racks = Rack::where('school_id', $user->school_id)->get();

        return view('main.index', compact('user','groupedItems','racks'));
    }
}
