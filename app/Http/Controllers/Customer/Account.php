<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use App\Http\CommonFunction\CommonFunction;

class Account extends Controller
{

    //start authenticate
    public function login()
    {
        return view('customer.account.login');
    }
    public function doLogin(UserLoginRequest $request)
    {
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => 0]);
        if ($check == true) {
            $commonFunction = new CommonFunction();
            return $commonFunction->handleNotifyAndRedirect('success', 'Login Sucessfully', 'home.index');
        } else {
            $commonFunction = new CommonFunction();
            return $commonFunction->handleNotifyAndBack('error', 'Login Failed');
        }
    }
    public function register()
    {
        return view('customer.account.register');
    }
    //end authenticate


    public function saveUser(UserRegisterRequest $request)
    {
        $password = Hash::make($request->password);
        ModelsUser::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password,
            'level' => 0,
        ]);

        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Sign Up Successfully !', 'user.login');
    }

    public function sign_out()
    {
        Auth::logout();
        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Logout Sucessfully', 'home.index');
    }

    public function profile(){
        return view('customer.profile_user.index');
    }

    public function editUser(UserUpdateRequest $request)
    {
        $user_id = Auth::user()->id;
        $user = ModelsUser::find($user_id);
        if ($request->has('image')) {
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/user'), $file_name);
        } else {
            $file_name = $user->avatar;
        }

        ModelsUser::find($user_id)->update([
            'avatar' => $file_name,
            "name" => $request->name,
            "email" => $request->email,
            'level' => 0,
        ]);

        $commonFunction = new CommonFunction();
        return $commonFunction->handleNotifyAndRedirect('success', 'Update profile Successfully !', 'user.profile');
    }
}
