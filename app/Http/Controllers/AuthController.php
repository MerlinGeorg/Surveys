<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SurveyUserInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|between:2,100',
                'image'    => 'required|image',
                'email'    => 'required|email|unique:users',
                'phone' => 'required|digits:10',
                'city' => 'required|string'
            ]
        );

        if ($validator->fails()) {

            return view('registrationForm', ['errors' => $validator->errors()->all()]);
        }
        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();
        $path=$image->storeAs('images', $fileName, ['disk' => 'public']);
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$path,
            'phone'=>$request->phone,
            'city'=>$request->city,
        ];
       
        $user = User::create($data);
       
        if (!empty($user)) {
            return redirect()->route('userProfile', $user['id']);
        }
        return redirect()->route('/');
    }

    public function userProfile(int $id)
    {
        $user = User::find($id);
      //  dd($user);
        $submissions=SurveyUserInput::with('surveys:id,question')->where('userId',$id)->get()->toArray();
       // dd($submissions);
        if(empty($submissions)){
            return view('userProfile', ['user'=>$user,'submissions'=>false]);
        }
        return view('userProfile', ['user'=>$user,'submissions'=>true]);
    }

    public function logout()
    {
        $this->guard()->logout();

        return redirect('/');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
