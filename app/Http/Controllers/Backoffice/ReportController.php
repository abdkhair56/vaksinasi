<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Cities;
use App\Models\HealthFacilities;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        
        if (request()->ajax()) {
            if (!empty($request->cities)) {
                $model = HealthFacilities::with('cities','vaccination','cities.province')
                    ->where('cities_id', $request->cities)
                    ->orWhere('province_id', $request->province)
                    ->orderBy('id','desc')
                    ->get();
            } else {
                $model = HealthFacilities::with('cities','vaccination','cities.province')
                    ->orderBy('id','desc')
                    ->get();
            }
            return DataTables::of($model)
                ->addIndexColumn()
                ->addColumn('type', function($model){
                    if ($model->type == 1) {
                        return '<div class="badge badge-success mr-1 mb-1">Rumah Sakit</div>';
                    } else if($model->type == 2){
                        return '<div class="badge badge-warning mr-1 mb-1">Klinik</div>';
                    } else {
                        return '<div class="badge badge-primary mr-1 mb-1">Puskesmas</div>';
                    } 
                })
                ->editColumn('cities', function($model){
                    return $model->cities->name;
                })
                ->editColumn('vaccination', function($model){
                    return $model->vaccination->name;
                })
                ->rawColumns(['type','cities','vaccination'])
                ->make(true);
        }
        return view('backoffice.report.index', [
            'province' => Provinces::all(),
            'cities'   => Cities::all()
        ]);
    }

    public function data(){
        $model = HealthFacilities::with('cities','vaccination','cities.province')->orderBy('id','desc')->get();
        return DataTables::of($model)
        ->addIndexColumn()
        ->addColumn('action', function($model){
            return '<a href="'.route('health-facilities.edit', $model->id).'" class="btn btn-icon btn-primary glow mr-1 mb-1"><i class="fa fa-edit"></i></a>
            <a href="'.route('health-facilities.destroy', $model->id).'" class="btn-delete btn btn-icon btn-danger glow mr-1 mb-1"><i class="fa fa-trash"></i></a>';
        })
        ->addColumn('type', function($model){
        	if ($model->type == 1) {
        		return '<div class="badge badge-success mr-1 mb-1">Rumah Sakit</div>';
        	} else if($model->type == 2){
        		return '<div class="badge badge-warning mr-1 mb-1">Klinik</div>';
        	} else {
                return '<div class="badge badge-primary mr-1 mb-1">Puskesmas</div>';
            } 
        })
        ->editColumn('cities', function($model){
        	return $model->cities->name;
        })
        ->editColumn('vaccination', function($model){
        	return $model->vaccination->name;
        })
        ->rawColumns(['action','type','cities','vaccination'])
        ->make(true);
    }
}
