<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \PDF;
class StudentCon extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('student.profile')->with('user',$user);
    }
    public function update(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_img' => ['image', 'mimes:jpg,jpeg,png,bmp,gif,svg', 'max:2048'],
        ]);
        $imageName=time().'.'.$request->profile_img->extension();
        $request->profile_img->storeAs('profile_image',$imageName,'public');

        $user = Auth::user();

        $user->name= $request->name;
        $user->fname= $request->fname;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->birthday= $request->birthday;
        $user->sector= $request->sector;
        $user->password= Hash::make($request->password);
        $user->profile_img=$imageName;
        $user->save();
        return redirect()->back()->with('Success','the Student has been Edit!');
    }
    public function pdf(){
        $user = Auth::user();
        view()->share('user',$user);
        $pdf = PDF::loadView('student.pdf');
        return $pdf->download($user->name.$user->person.'.pdf');
    }

}
