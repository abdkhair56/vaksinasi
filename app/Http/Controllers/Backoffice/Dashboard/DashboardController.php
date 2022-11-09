<?php

namespace App\Http\Controllers\Backoffice\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HealthFacilities;
use App\Models\Vaccinations;

class DashboardController extends Controller
{
    public function index(){

        $rumah_sakit = HealthFacilities::where('type', 1)->count();
        $klinik = HealthFacilities::where('type', 2)->count();
        $puskesmas = HealthFacilities::where('type', 3)->count();
        $vaksin = Vaccinations::count();
        return view('backoffice.dashboard.index', [
            'rumah_sakit' => $rumah_sakit,
            'klinik' => $klinik,
            'puskesmas' => $puskesmas,
            'vaksin' => $vaksin,
        ]);
    }
}
