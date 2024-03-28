<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Traits\ValidationTrait;
use App\Traits\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Client;

class AuthController extends Controller
{
    use ValidationTrait;
    use APIResponseTrait;
    public function login(Request $request)
    {
        try {
            //validation
            $rules = [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8|max:255'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            //login
            $credintials = $request->only(['email', 'password']);
            $token = Auth::guard('client')->attempt($credintials);
            if (!$token) {
                return $this->returnError('E001', 'بيانات تسجيل الدخول غير صحيحة');
            }
            // return data
            else {
                $client = Auth::guard('client')->user();
                $client->token = $token;
                return $this->returnData('client', $client, 'تم تسجيل الدخول بنجاح');
            }
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
    }

    public function logout(Request $request)
    {

            try {
                $token = $request->header('token');
        if ($token) {
                JWTAuth::setToken($token)->invalidate();
                return $this->returnSuccessMessage("تم تسجيل الخروج بنجاح", "success1");
            }
            } catch (TokenInvalidException $e) {
                return $this->returnError($e->getCode(), "يوجد خطأ ما ");
            }

    }


    public function register(Request $request)
    {
        try {
            //validation
            $rules = [
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|string|min:8|max:255|confirmed',
                'password_confirmation' => 'required|string|min:8|max:255',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //registering user
            $client = new client();
            $client->fill($request->all());
            $client->password = bcrypt($request->password);
            $client->save();
            //instant login
            $credintials = $request->only(['email', 'password']);
            $token = Auth::guard('client')->attempt($credintials);
            if (!$token) {
                return $this->returnError('E001', 'بيانات تسجيل الدخول غير صحيحة');
            }
            // return data
            else {
                $client = Auth::guard('client')->user();
                $client->token = $token;
                return $this->returnData('client', $client, 'تم تسجيل الدخول بنجاح');
            }
        } catch (TokenInvalidException $e) {
            return $this->returnError("", "يوجد خطأ ما ");
        }
    }

    public function userProfile(){
        try{
            $user  = Auth::guard('client')->user();
            return $this->returnData('user', $user);
        } catch (TokenInvalidException $e) {
            return $this->returnError("", "يوجد خطأ ما ");

        }

    }
}
