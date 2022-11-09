<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function index(){
        return view('backoffice.user.index');
    }

    public function data(){
        $model = Users::orderBy('id','desc')->get();
        return DataTables::of($model)
        ->addIndexColumn()
        ->addColumn('action', function($model){
            return '<a href="'.route('user.edit', $model->id).'" class="btn btn-icon btn-primary glow mr-1 mb-1"><i class="fa fa-edit"></i></a>
            <a href="'.route('user.destroy', $model->id).'" class="btn-delete btn btn-icon btn-danger glow mr-1 mb-1"><i class="fa fa-trash"></i></a>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create(){
        return view('backoffice.user.create');
    }

    public function store(Request $request){
        $rule = [
    		'name' => 'required',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|min:8',
    	];

    	$message = [
    		'name.required' => 'Nama tidak boleh kosong',
    		'email.required' => 'Email tidak boleh kosong',
    		'password.required' => 'Password tidak boleh kosong',
    	];

    	$this->validate($request, $rule, $message);
    	$data = [
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'created_at' => Carbon::now()
    	];

        $model = Users::create($data);
    	if ($model) {
    		Toastr::success('Data added successfully :)','Success', ['timeOut' => 3000]);
    		return redirect()->route('user.index');
    	}else{
    		Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
    		return redirect()->back();
    	}
    }

    public function edit($id){
        $model = Users::where('id', $id)->first();
        return view('backoffice.user.edit', compact('model'));
    }

    public function update(Request $request, $id){
        $rule = [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|min:8',
    	];

    	$message = [
    		'name.required' => 'Nama tidak boleh kosong',
    		'email.required' => 'Email tidak boleh kosong',
    		'password.required' => 'Password tidak boleh kosong',
    	];

        $this->validate($request, $rule, $message);
        $model = Users::find($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
			'password' => Hash::make($request->password),
            'updated_at' => Carbon::now()
        ];


        if ($model->update($data)) {
            Toastr::success('Data update successfully :)','Success', ['timeOut' => 3000]);
            return redirect()->route('user.index');
        }else{
            Toastr::warning('Data added failed','Warning', ['timeout' => 3000]);
            return redirect()->back();
        }
    }

    public function destroy($id){
        $model = Users::where('id', $id)->first();
    	$model->delete();

        if ($model) {
            return redirect()->route('user.index');
        } else {
    		return redirect()->back();
        }
    }
}
