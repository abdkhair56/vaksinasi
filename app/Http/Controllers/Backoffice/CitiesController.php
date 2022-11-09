<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Provinces;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use DB;

class CitiesController extends Controller
{
    public function index(){
        return view('backoffice.cities.index');
    }

    public function data(){
        $model = DB::table('cities as c')
            ->join('provinces as p','c.province_id','=','p.id')
            ->select('c.name','c.id','p.name as province','p.id as p_id')
            ->orderBy('id', 'desc')
            ->get();
        return DataTables::of($model)
        ->addIndexColumn()
        ->addColumn('action', function($model){
            return '<a href="'.route('cities.edit', $model->id).'" class="btn btn-icon btn-primary glow mr-1 mb-1"><i class="fa fa-edit"></i></a>
            <a href="'.route('cities.destroy', $model->id).'" class="btn-delete btn btn-icon btn-danger glow mr-1 mb-1"><i class="fa fa-trash"></i></a>';
        })
        ->editColumn('province', function($model){
        	return $model ? $model->province : '-';
        })
        ->rawColumns(['action','province'])
        ->make(true);
    }

    public function create(){
        return view('backoffice.cities.create', [
            'provinces' => Provinces::all()
        ]);
    }

    public function store(Request $request){
        $rule = [
    		'name' => 'required',
    	];

    	$message = [
    		'name.required' => 'Nama tidak boleh kosong',
            'province_id' => 'Provinsi tidak boleh kosong'
    	];

    	$this->validate($request, $rule, $message);
    	$data = [
			'name' => $request->name,
            'province_id' => $request->province_id,
			'created_at' => Carbon::now()
    	];

        $model = Cities::create($data);
    	if ($model) {
    		Toastr::success('Data added successfully :)','Success', ['timeOut' => 3000]);
    		return redirect()->route('cities.index');
    	}else{
    		Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
    		return redirect()->back();
    	}
    }

    public function edit($id){
        $model = Cities::where('id', $id)->first();
        $provinces =  Provinces::all();
        return view('backoffice.cities.edit', compact('model','provinces'));
    }

    public function update(Request $request, $id){
        $rule = [
            'name' => 'required',
            'province_id' => 'required'
        ];

        $message = [
            'name.required' => 'Nama Kota tidak boleh kosong',
            'name.required' => 'Provinsi tidak boleh kosong',
        ];

        $this->validate($request, $rule, $message);
        $model = Cities::find($id);
        $data = [
            'name' => $request->name,
            'province_id' => $request->province_id,
            'updated_at' => Carbon::now()
        ];


        if ($model->update($data)) {
            Toastr::success('Data update successfully :)','Success', ['timeOut' => 3000]);
            return redirect()->route('cities.index');
        }else{
            Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
            return redirect()->back();
        }
    }

    public function destroy($id){
        $model = Cities::where('id', $id)->first();
    	$model->delete();

        if ($model) {
            return redirect()->route('cities.index');
        } else {
    		return redirect()->back();
        }
    }
}
