<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with(["scan:id,title", "participant:id,name,email,phone"])
            ->orderBy("created_at", "desc")
            ->get();

        return view("report", compact("attendance"));
    }
}
