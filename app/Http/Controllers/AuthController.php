<?php

/**
 * @Author: C Yongky Pranowo
 * @Date:   2019-11-30 23:32:03
 * @Last Modified by:   C Yongky Pranowo
 * @Last Modified time: 2019-11-30 23:32:27
 */

namespace App\Http\Controllers;
use App\Models\MstUser;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class AuthController extends BaseController 
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }
    /**
     * Create a new token.
     * 
     * @param  \App\MstUser   $MstUser
     * @return string
     */
    protected function jwt(MstUser $MstUser) {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $MstUser->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60*60 // Expiration time
        ];
        
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    } 
    /**
     * Authenticate a MstUser and return the token if the provided credentials are correct.
     * 
     * @param  \App\MstUser   $MstUser 
     * @return mixed
     */
    public function authenticate(MstUser $MstUser) {
        $this->validate($this->request, [
            'user_email'     => 'required|email',
            'user_password'  => 'required'
        ]);
        // Find the MstUser by email
        $MstUser = MstUser::where('user_email', $this->request->input('user_email'))->first();
        if (!$MstUser) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'message' => 'user_email does not exist.'
            ], 400);
        }
        
        // Verify the user_password and generate the token
        if (Hash::check($this->request->input('user_password'), $MstUser->user_password)) {
            return response()->json([
                'token' => $this->jwt($MstUser)
            ], 200);
        }
        // Bad Request response
        return response()->json([
            'message' => 'user_email or user_password is wrong.'
        ], 400);
    }
}