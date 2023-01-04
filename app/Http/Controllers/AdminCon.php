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
        ]);
        $user = new User();
        $user->name= $request->name;
        $user->fname= $request->fname;
        $user->email= $request->email;
        $user->phone= $request->phone;
        $user->birthday= $request->birthday;
        $user->sector= $request->sector;
        $user->password= Hash::make($request->name.'2022');
        $user->save();
        return redirect()->back()->with('Success','the Student has been Added!');
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
            // 'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'birthday' => ['required', 'date'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::find($request->id);
        if ($user->email==$request->input('email')) {
            $user->name= $request->input('name');
            $user->fname= $request->input('fname');
            $user->phone= $request->input('phone');
            $user->birthday= $request->input('birthday');
            $user->sector= $request->input('sector');
            // $user->password= $request->input('password');
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255','unique:users']
            ]);
            $user->name= $request->name;
            $user->fname= $request->fname;
            $user->email= $request->email;
            $user->phone= $request->phone;
            $user->birthday= $request->birthday;
            $user->sector= $request->sector;
            // $user->password =Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('Success','the Student has been Edit!');
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
        return redirect()->back()->with('Success','the Student has been Delete!');
    }
    public function delete2($id)
    {
        User::destroy($id);
        $etudiants = User::where('isAdmin','!=',true);
        return view('admin.admin',['etudiants'=>$etudiants,'success','the Student has been Delete!']);
    }

}
