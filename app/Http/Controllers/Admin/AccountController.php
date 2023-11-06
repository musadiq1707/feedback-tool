<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {
        return view('admin.account');
    }

    public function update(AccountRequest $request)
    {
        $input = $request->all();
        $user_id = auth()->id();
        $user = User::find($user_id);
        $user->name=$input['name'];
        if (!empty($input['password'])) {
            if(Hash::check($input['current-password'], $user->password)) {
                $user->password = Hash::make($input['password']);
            } else {
                return failure_response([],[],"Invalid old password");
            }
        }
        $user->save();

        return success_response([],trans('notification.record_update', ['parameter' => 'Profile']));
    }
}
