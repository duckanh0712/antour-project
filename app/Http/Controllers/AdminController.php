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
//        validate du lieu
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ],[
            'username.required' => 'Chưa nhập tên đăng nhập',

            'password.required' => 'Chưa nhập mật khẩu',
            'password.min' => 'mật khẩu tối thiểu 6 ký tự'
        ]);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        // check success
        if (Auth::attempt($data)) {

            if (Auth::user()->state == 0){
                return redirect()->route('admin.login')->with('erorr' , 'tài khoản đã bị khóa hãy liên lạc với bạn quản trị để giải quyết');
            }
            if (Auth::user()->role != 'GUEST') {
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('client.home');
            }

        }
        else {
            return redirect()->back()->with('error', 'Tên đăng nhập  hoặc mật khẩu không chính xác');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
