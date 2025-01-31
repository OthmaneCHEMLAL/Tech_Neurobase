<?php

// In app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {
        // You could pass additional data here if necessary
        return view('backend.dashboard.index');
    }
}
