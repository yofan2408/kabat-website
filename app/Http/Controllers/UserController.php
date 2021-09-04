<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data['title'] = 'Data User';
        $data['q'] = $request->q;
        $data['rows'] = User::where('name', 'like', '%' . $request->q . '%')->get();
        $user = DB::table('users')->paginate(1);
        return view('index', $data, ['user' => $user]);
    }


    public function create(Request $request)
    {
        $data['title'] = 'Tambah User';
        return view('create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('user')->with('success', 'Tambah User Berhasil');
    }

    public function edit(User $user)
    {
        $data['title'] = 'Ubah User';
        $data['row'] = $user;
        return view('edit', $data);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = $request->password;
        $user->save();
        return redirect('user')->with('success', 'Ubah User Berhasil');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user')->with('success', 'Hapus User Berhasil');
    }
}
