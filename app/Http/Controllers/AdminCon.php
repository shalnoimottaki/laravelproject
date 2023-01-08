<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = User::where('isAdmin','=',true)->paginate(5);
        return view('admin.admin',['etudiants'=>$etudiants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'birthday' => ['required', 'date'],
            'roll' => ['required', 'digits:8','numeric', 'unique:users'],
            'academic_years' => ['required','numeric'],
            'CNIE' => ['required','string','size:7', 'unique:users'],
            'place_of_increase' => ['required','string','max:255']
        ]);
        $user = new User();
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
        $user->password= Hash::make($request->CNIE.'_2022');
        $user->save();
        return redirect()->back()->with('success','the Student has been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
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
            'place_of_increase' => ['required','string','max:255']
        ]);
        $user = User::find($request->id);
        if ($user->email==$request->input('email')) {
            $user->name= $request->input('name');
            $user->fname= $request->input('fname');
            $user->phone= $request->input('phone');
            $user->birthday= $request->input('birthday');
            $user->sector= $request->input('sector');
            $user->roll= $request->input('roll');
            $user->blood= $request->input('blood');
            $user->academic_years= $request->input('academic_years');
            $user->gender= $request->input('gender');
            $user->CNIE= $request->input('CNIE');
            $user->place_of_increase= $request->input('place_of_increase');
            $user->password= Hash::make($request->password);
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255','unique:users'],
                'CNIE' => ['required','string','size:7', 'unique:users'],
                'roll' => ['required', 'digits:8','numeric', 'unique:users']
            ]);
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
            $user->password =Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('success','the Student has been Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success','the Student has been Delete!');
    }
    public function delete2($id)
    {
        User::destroy($id);
        $etudiants = User::where('isAdmin','!=',true);
        return view('admin.admin',['etudiants'=>$etudiants,'success','the Student has been Delete!']);
    }

}
