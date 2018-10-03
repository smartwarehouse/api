<?php
/*
 * Generate by fatkul nur k
 */
namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiAuthController extends Controller
{

    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function signup(Request $request){
        $this->validate($request, [
            'full_name'     => 'required',
            'email'         => 'required|unique:users',
            'phone_number'  => 'required',
            'password'      => 'required',
        ]);

        /*
        $result = User::create([
            'full_name'      => $request->full_name,
            'email'          => $request->email,
            'phone_number'   => $request->phone_number,
            'password'       => $request->password,
//           'full_name'      => $request->json('full_name'),
//           'email'          => $request->json('email'),
//           'phone_number'   => $request->json('phone_number'),
//           'password'       => $request->json('password'),
//           'roles'          => Roles::where('role','we'),
           'roles'          => 1,
           'created_at'      => time(),
           'updated_at'      => time(),
        ]);

        return response()->json($result);
        */
    }

}
