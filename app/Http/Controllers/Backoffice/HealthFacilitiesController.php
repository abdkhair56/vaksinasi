<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use App\Models\HealthFacilities;
use App\Models\Vaccinations;
use App\Models\Cities;
use App\Models\Provinces;

class HealthFacilitiesController extends Controller
{
    public function index(){
        return view('backoffice.health_facilities.index');
    }

    public function data(){
        $model = HealthFacilities::with('cities','vaccination')->orderBy('id','desc')->get();
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

    public function create(){
        return view('backoffice.health_facilities.create', [
            'cities' => Cities::all(),
            'province' => Provinces::all(),
            'vaccination' => Vaccinations::all()
        ]);
    }

    public function store(Request $request){
        $rule = [
    		'name'  => 'required|unique:health_facilities,name',
            'phone' => 'required',
            'address' => 'required',
            'type'  => 'required',
            'cities_id' => 'required',
            'province_id' => 'required',
            'quota'     => 'required',
            'vaccination_id' => 'required'
    	];
        

    	$message = [
    		'name.required' => 'Nama tidak boleh kosong',
    		'phone.required' => 'Nomor Telp tidak boleh kosong',
    		'address.required' => 'Alamat Telp tidak boleh kosong',
    		'type.required' => 'Tipe Faskes tidak boleh kosong',
    		'cities_id.required' => 'Kota tidak boleh kosong',
    		'province_id.required' => 'Provinsi tidak boleh kosong',
    		'quota.required' => 'Kuota tidak boleh kosong',
    		'vaccination_id.required' => 'Vaksin tidak boleh kosong',
    	];

    	$this->validate($request, $rule, $message);
    	$data = [
			'name'          => $request->name,
            'phone'         => $request->phone, 
            'address'       => $request->address,
            'type'          => $request->type,
            'cities_id'     => $request->cities_id,
            'province_id'   => $request->province_id,
            'quota'         => $request->quota,
            'vaccination_id'=> $request->vaccination_id, 
			'created_at'    => Carbon::now()
    	];
        $model = HealthFacilities::create($data);
    	if ($model) {
    		Toastr::success('Data added successfully :)','Success', ['timeOut' => 3000]);
    		return redirect()->route('health-facilities.index');
    	}else{
    		Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
    		return redirect()->back();
    	}
    }

    public function edit($id){
        $model = HealthFacilities::where('id', $id)->first();
        $cities = Cities::all();
        $vaccination = Vaccinations::all();
        return view('backoffice.health_facilities.edit', compact('model','cities','vaccination'));
    }

    public function update(Request $request, $id){
        $model = HealthFacilities::find($id);
        if ($model->name == $request->name) {
            $rule = [
                'name'  => 'required',
                'phone' => 'required',
                'address' => 'required',
                'type'  => 'required',
                'cities_id' => 'required',
                'province_id.required' => 'Provinsi tidak boleh kosong',
                'quota'     => 'required',
                'vaccination_id' => 'required'
            ];
        } else {
            $rule = [
                'name'  => 'required|unique:health_facilities,name',
                'phone' => 'required',
                'address' => 'required',
                'type'  => 'required',
                'cities_id' => 'required',
                'province_id.required' => 'Provinsi tidak boleh kosong',
                'quota'     => 'required',
                'vaccination_id' => 'required'
            ];
        }

    	$message = [
    		'name.required' => 'Nama tidak boleh kosong',
    		'phone.required' => 'Nomor Telp tidak boleh kosong',
    		'address.required' => 'Alamat Telp tidak boleh kosong',
    		'type.required' => 'Tipe Faskes tidak boleh kosong',
    		'cities_id.required' => 'Kota tidak boleh kosong',
    		'province_id.required' => 'Provinsi tidak boleh kosong',
    		'quota.required' => 'Kuota tidak boleh kosong',
    		'vaccination_id.required' => 'Vaksin tidak boleh kosong',
    	];

        $this->validate($request, $rule, $message);
        
        $data = [
            'name'          => $request->name,
            'phone'         => $request->phone, 
            'address'       => $request->address,
            'type'          => $request->type,
            'cities_id'     => $request->cities_id,
            'province_id'     => $request->province_id,
            'quota'         => $request->quota,
            'vaccination_id'=> $request->vaccination_id, 
            'updated_at' => Carbon::now()
        ];


        if ($model->update($data)) {
            Toastr::success('Data update successfully :)','Success', ['timeOut' => 3000]);
            return redirect()->route('health-facilities.index');
        }else{
            Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
            return redirect()->back();
        }
    }

    public function destroy($id){
        $model = HealthFacilities::where('id', $id)->first();
    	$model->delete();

        if ($model) {
            return redirect()->route('health-facilities.index');
        } else {
    		return redirect()->back();
        }
    }
}
