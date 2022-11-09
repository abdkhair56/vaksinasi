<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vaccinations;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class VaccinationController extends Controller
{
    public function index(){
        return view('backoffice.vaccination.index');
    }

    public function data(){
        $model = Vaccinations::orderBy('id','desc')->get();
        return DataTables::of($model)
        ->addIndexColumn()
        ->addColumn('action', function($model){
            return '<a href="'.route('vaccination.edit', $model->id).'" class="btn btn-icon btn-primary glow mr-1 mb-1"><i class="fa fa-edit"></i></a>
            <a href="'.route('vaccination.destroy', $model->id).'" class="btn-delete btn btn-icon btn-danger glow mr-1 mb-1"><i class="fa fa-trash"></i></a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create(){
        return view('backoffice.vaccination.create');
    }

    public function store(Request $request){
        $rule = [
    		'name' => 'required',
    	];

    	$message = [
    		'name.required' => 'Nama tidak boleh kosong',
    	];

    	$this->validate($request, $rule, $message);
    	$data = [
			'name' => $request->name,
			'created_at' => Carbon::now()
    	];

        $model = Vaccinations::create($data);
    	if ($model) {
    		Toastr::success('Data added successfully :)','Success', ['timeOut' => 3000]);
    		return redirect()->route('vaccination.index');
    	}else{
    		Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
    		return redirect()->back();
    	}
    }

    public function edit($id){
        $model = Vaccinations::where('id', $id)->first();
        return view('backoffice.vaccination.edit', compact('model'));
    }

    public function update(Request $request, $id){
        $rule = [
            'name' => 'required',
        ];

        $message = [
            'name.required' => 'Nama tidak boleh kosong',
        ];

        $this->validate($request, $rule, $message);
        $model = Vaccinations::find($id);
        $data = [
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ];


        if ($model->update($data)) {
            Toastr::success('Data update successfully :)','Success', ['timeOut' => 3000]);
            return redirect()->route('vaccination.index');
        }else{
            Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
            return redirect()->back();
        }
    }

    public function destroy($id){
        $model = Vaccinations::where('id', $id)->first();
    	$model->delete();

        if ($model) {
            return redirect()->route('vaccination.index');
        } else {
    		return redirect()->back();
        }
    }
}
