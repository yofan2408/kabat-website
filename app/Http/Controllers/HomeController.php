<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Catatan;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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

        $note['title'] = "catatan";
        $note['note'] = Catatan::get();

        return view('home', $data, $note, );
    }

    public function store(Request $request)
    {
        $note = new Catatan;
        $note->text = $request->text;
        $note->save();
        return redirect('home');
    }

    public function destroy($id){
        $post = Catatan::find($id);
        $post->delete();
        return redirect('/home');
    }
}
