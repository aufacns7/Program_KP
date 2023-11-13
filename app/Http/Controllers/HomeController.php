<?php

namespace App\Http\Controllers;

Use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function dashboard ()
    {
        return view('dashboard');
    }

    public function main_dashboard (Request $request) 
    {
        $data = new User;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')
            ->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('main_dashboard',compact('data','request'));    
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'nama' => 'required',
            'password' => 'required',
        ]);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']      = $request->email;
        $data['name']       = $request->nama;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        return redirect()->route('admin.main_dashboard');
    }

    public function edit(Request $request,$id)
    {
        $data = User::find($id);
        return view('edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'email'      => 'required|email',
            'nama'       => 'required',
            'password'   => 'nullable',
        ]);
        
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']      = $request->email;
        $data['name']       = $request->nama;

        if($request->password){
            $data['password']   = Hash::make($request->password);
        }
        

        User::whereId($id)->update($data);

        return redirect()->route('admin.main_dashboard');    
    }


    public function delete(Request $request,$id)
    {
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.main_dashboard'); 
    }
}


