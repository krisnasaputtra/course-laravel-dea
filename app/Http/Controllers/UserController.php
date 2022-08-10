<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_form()
    {

        return view('login', [
            'title' => 'Login Page',

        ]);
    }

    public function register_form()
    {

        return view('register', [
            'title' => 'Register Page',
        ]);
    }

    public function login_validate(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user === null) {
            return redirect()->back()->with('error', 'Login gagal, Email tidak terdaftar');
        }


        $db_password = $user->password;
        $hash_password = Hash::check($request->password, $db_password);

        if ($hash_password) {
            $user->token = Str::random(20);
            $user->save();
            $request->session()->put('token', $user->token);
            if (Auth::attempt($credential)) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Login gagal');
        }
    }

    public function register_action(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validateData['password'] = bcrypt($request->password);

        User::create($validateData);

        return redirect('/login')->with('success', 'User berhasil dibuat');
    }

    public function dashboard_index()
    {
        $posts = Posts::latest()->get();

        return view('Dashboard.index', [
            'title' => 'Dahboard Page',
            'posts' => $posts,
        ]);
    }

    public function dashboard_logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        User::where('token', $request->token)->update([
            'token' => NULL
        ]);

        FacadesSession::pull('token');

        return redirect('/');
    }

    public function post_add(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:50',
            'tags' => 'required|max:10'
        ]);

        $validateData['excerpt'] = Str::limit(strip_tags($request->description, 200));

        Posts::create($validateData);

        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }

    public function post_edit_form($id)
    {
        return view('Dashboard.edit', [
            'title' => 'Edit Page',
            'post' => Posts::find($id),
        ]);
    }

    public function post_update_action(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:50',
            'tags' => 'required|max:10'
        ]);

        $validateData['excerpt'] = Str::limit(strip_tags($request->description, 200));

        Posts::where('id', $request->id)->update($validateData);

        return redirect('/dashboard')->with('success', 'Data berhasil diubah');
    }


    public function post_delete_action(Request $request)
    {
        Posts::find($request->id)->delete();
        return redirect()->back()->with('success', 'Data dihapus');
    }
}