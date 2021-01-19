<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Employee;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        //validate du lieu
//        $request->validate([
//            'email' => 'required|string|email|max:255',
//            'password' => 'required|string|min:6'
//        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('employee')->attempt($data)) {

            return redirect()->route('admin.dashboard');

        } else {

            return redirect()->back()->with('msg', 'Tên đăng nhập hoặc mật khẩu không chính xác');
        }




    }

}
