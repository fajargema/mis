<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        $data = Activity::with('causer')->get()->sortByDesc('created_at');

        return view('pages.admin.log.index', compact('data'));
    }
}
