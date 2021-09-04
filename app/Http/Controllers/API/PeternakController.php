<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PeternakController extends Controller
{


    // public function register(Request $request)
    // {

    //     $request->validate([
    //                 'name' => 'required',
    //                 'email' => 'required',
    //                 'password' => 'required',
    //             ]);
    //     $peternak = User::create([
    //                 'name' => $request->name,
    //                 'email' => $request->email,
    //                 'password' => $request->password
    //             ]);
    //     $success['peternak'] =  $peternak;
    //     $success['access-token'] =  $peternak->createToken('access-token')->plainTextToken;

    //     return $this->sendResponse($success, 'User register successfully.');
    // }

    // public function login(Request $request)
    // {
    //     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    //         return $this->sendResponse("unauthorized", ['error'=>'Unauthorised']);
    //     }
    //     else{

    //         $peternak = User::where('email', $request->email)->first();
    //         $peternak = User::where('password', $request->password);
    //         $success['token'] =  $peternak->createToken('token')->plainTextToken;
    //         $success['name'] =  $peternak->name;

    //         return $this->sendError($success, 'User login successfully.');
    //     }
    // }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $peternak = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $token = $peternak->createToken('access-token')->plainTextToken;

        return response()->json([
            'peternak' => $peternak,
            'access-token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $peternak = User::where(['email' => $request->email , 'password' => $request->password])->first();
        if ($peternak) {
            $token = $peternak->createToken('access-token')->plainTextToken;
        return response()->json([
            'peternak' => $peternak,
            'access-token' => $token
        ]);
        } else{
            return response()->json([
                'status_code' => 500,
                'message' => 'Unauthorized'
            ]);
        }
    }




    // public function update(Request $request)
    // {
    //     $currentUser = Auth::user();
    //     $currentUser->name = $request->name;
    //     $currentUser->save();

    //     return response()->json([
    //         'peternak' => $currentUser
    //     ]);
    // }

    // public function logout() {
    //     $currentUser = Auth::user();
    //     $currentUser->tokens()->delete();
    //         return [
    //             'message' => 'Berhasil Log Out'
    //         ];
    //     }

    }
