<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Show reports page accessible to admin and businessowner
    public function index()
    {
        // You can fetch data here from database and pass to view
        // For now, just return the view

        return view('index');
    }
}
