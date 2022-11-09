<?php

namespace App\Http\Controllers\Backoffice\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('backoffice.dashboard.index');
    }
}
