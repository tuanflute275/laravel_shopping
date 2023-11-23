<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use App\Http\CommonFunction\CommonFunction;

class User extends Controller
{

    public function logon()
    {
        return view('admin.login');
    }

    public function doLogon(UserLoginRequest $request)
    {
        $commonFunction = new CommonFunction();
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => 1]);
        if ($check == true) {
            return $commonFunction->handleNotifyAndRedirect('success', 'Login Successfully', 'admin.index');
        } else {
            return redirect()->back()->with('error', 'Login Failed');
        }
    }

    public function sign_up()
    {
        return view('admin.signup');
    }

    public function saveUser(UserRegisterRequest $request)
    {
        $commonFunction = new CommonFunction();
        $password = Hash::make($request->password);
        ModelsUser::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password,
            'level' => 1,
        ]);

        return $commonFunction->handleNotifyAndRedirect('success', 'Sing Up Successfully', 'admin.user.index');
    }

    public function sign_out()
    {
        $commonFunction = new CommonFunction();
        Auth::logout();
        return $commonFunction->handleNotifyAndRedirect('success', 'Sing Out Successfully', 'admin.logon');
    }


    public function index()
    {
        $users = ModelsUser::search()->filter()->orderBy('id', 'desc')->paginate(5)->withQueryString();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }


    public function store(UserCreateRequest $request)
    {
        $request->validated();
        $file_name = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads/user'), $file_name);
        $password = Hash::make($request->password);
        $commonFunction = new CommonFunction();
        ModelsUser::create([
            'avatar' => $file_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'level' => $request->level,
            'description' => $request->description,
        ]);
        return $commonFunction->handleNotifyAndRedirect('success', 'Insert Data Successfully', 'admin.user.index');
    }


    public function show($id)
    {
        $user = ModelsUser::find($id);
        return view('admin.user.detail', compact('user'));
    }


    public function edit($id)
    {
        $users = ModelsUser::all();
        $user = ModelsUser::find($id);
        return view('admin.user.edit', compact('user', 'users'));
    }


    public function update(UserUpdateRequest $request, $id)
    {
        $user = ModelsUser::find($id);
        $request->validated();
        $file_name = $user->avatar;
        $commonFunction = new CommonFunction();

        if ($request->has('image')) {
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/user'), $file_name);
        } else {
            $file_name = $user->avatar;
        }

        ModelsUser::find($id)->update([
            'avatar' => $file_name,
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);
        return $commonFunction->handleNotifyAndRedirect('success', 'Update Data Successfully', 'admin.user.index');
    }

    public function destroy(ModelsUser $user)
    {
        $commonFunction = new CommonFunction();
        try {
            $user->delete();
            return $commonFunction->handleNotifyAndRedirect('success', 'Delete Successfully', 'admin.user.index');
        } catch (\Throwable $th) {
            return $commonFunction->handleNotifyAndRedirect('error', 'Deletion failed', 'admin.user.index');
        }
    }

    public function recycle_bin()
    {
        $users = ModelsUser::onlyTrashed()->paginate(10);
        return view('admin.user.trash', compact('users'));
    }

    public function restored($id)
    {
        $commonFunction = new CommonFunction();
        ModelsUser::onlyTrashed()->find($id)->restore();
        return $commonFunction->handleNotifyAndRedirect('success', 'Restore Successfully', 'admin.user.index');
    }
    public function force_delete($id)
    {
        $commonFunction = new CommonFunction();
        ModelsUser::onlyTrashed()->find($id)->forceDelete();
        return $commonFunction->handleNotifyAndRedirect('success', 'Delete Successfully', 'admin.user.index');
    }
}
