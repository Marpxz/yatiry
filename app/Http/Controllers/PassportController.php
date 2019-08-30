<?php

namespace Yatiry\Http\Controllers;

use Yatiry\College;
use Yatiry\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yatiry\Http\Resources\College as CollegeResource;
use Yatiry\Http\Resources\Course as CourseResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Yatiry\Notifications\SignupActivate;


class PassportController extends Controller
{

    public function checkcollege(Request $request)
    {
        if ($college = College::find($request->id)) {
            $courses = $college->courses;
            // return response()->json([
            //     'message' => 'Success'
            // ], 201);
            return CourseResource::collection($courses);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'course_id' => 'required',
            'college_id' => 'required',
            'avatar' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'lastname' => $request->lastname,
            'course_id' => $request->course_id,
            'college_id' => $request->college_id,
            'avatar' => $request->avatar,
            'activation_token' => str_random(60),
            'user_type' => 3,
        ]);
        $user->save();
        $user->notify(new SignupActivate($user));
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }

        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'El token es invalido.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();
        return $user;
    }
}
