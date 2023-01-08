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
            'roll' => ['required', 'digits:8','numeric'],
            'academic_years' => ['required','numeric'],
            'CNIE' => ['required','string','size:7'],
            'place_of_increase' => ['required','string','max:255'],
            // 'profile_img' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        // $imageName=time().'.'.$request->profile_img->getClientOriginalExtension();
        // $request->profile_img->storeAs('profile_image',$imageName,'public');
         
        $user = Auth::user();

        $user->name= $request->name;
        $user->fname= $request->fname;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->birthday= $request->birthday;
        $user->sector= $request->sector;
        $user->roll= $request->roll;
        $user->blood= $request->blood;
        $user->academic_years= $request->academic_years;
        $user->gender= $request->gender;
        $user->CNIE= $request->CNIE;
        $user->place_of_increase= $request->place_of_increase;
        $user->password= Hash::make($request->password);
        // $user->profile_img=$imageName;
        $user->save();
        return redirect()->back()->with('success','the Profile has been Edit!');
    }


    public function storeImage(Request $request){
        $request->validate([
            'profile_img' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
    
        $imageName=time().'.'.$request->profile_img->extension();
        $request->profile_img->storeAs('profile_image',$imageName,'public');
         
        $users = Auth::user();

        $users->profile_img=$imageName;
        $users->save();
        
        return redirect()->back()->with('success','Image uploaded Successfully!');
    }


    public function pdf(){
        $user = Auth::user();
        view()->share('user',$user);
        $pdf = PDF::loadView('student.pdf');
        return $pdf->download($user->name.$user->person.'.pdf');
    }

}
