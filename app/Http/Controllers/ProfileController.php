<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        //Data Admin
        $data['title'] = 'Data Admin';
        $data['q'] = $request->q;
        $data['rows'] = Admin::where('name', 'like', '%' . $request->q . '%')->get();
        //Data User
        $data2['title2'] = 'Data User';
        $data2['q2'] = $request->q2;
        $data2['rows2'] = User::where('name', 'like', '%' . $request->q2 . '%')->get();
        $user2 = DB::table('users')->paginate(1);

        return view('profile', $data, $data2);
    }

    public function edit($id)
    {
        $admin = DB::table('admin')->where('id',$id)->get();
        return view('profileedit',['admin' => $admin]);
    }

    public function update(Request $request)
    {
        DB::table('admin')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'password' => Hash::make($request->password),
        ]);
            if ($request->password)
            $password = $request->password;
        return redirect('/profile');
    }
}
