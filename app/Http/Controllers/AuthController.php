<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;


class AuthController extends Controller
{
    public function signup(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
 
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $user->save();
 
        return response()->json([
            'status' => 'success',
        ]);
    }
 
    public function login(Request $request) : JsonResponse
    {
       try{
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ]);
        }
 
        $credentials = request(['email', 'password']);
 
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'fails',
                'message' => 'Unauthorized'
            ], 401);
        }
 
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
 
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
 
        $token->save();
 
        return response()->json([
            'status' => 'success',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
        }catch(\Exception $e){
            return $this->jsonError($e);
        }
    }
 
    public function logout(Request $request): JsonResponse
    {
        try {
            $request->user()->token()->delete();
            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }
 
    public function user(Request $request): JsonResponse
    {   
        // dd(\ACL::ROLE_ADMIN);   
        try {
            $user = \Auth::user();
            return $this->jsonData(new UserResource($user));
        } catch (\Exception $e) {
            return $this->jsonError($e);
        }
    }
}
