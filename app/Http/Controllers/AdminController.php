<?php

namespace App\Http\Controllers;

use App\BookTour;
use App\Tour;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_tour = BookTour::where('state', '<', 3)->count();
        $numTour = Tour::count();
        $numEmployee = Employee::where('role','employee')->count();
        $numUser = User::where('role','guest')->count(); //

        $data = [
            'book_tour' => $book_tour,
            'numTour' => $numTour,
            'numEmployee' => $numEmployee,
            'numUser' => $numUser
        ];

        return view('admin.dashboard',  $data);
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

    public function changePassword (Request $request)
    {


        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ],[
            'current_password.required' => 'Mật khẩu hiện tại không được để chống',
            'password.required' => 'Mật khẩu mới không được để chống ',
            'password_confirmation.required' => 'Nhập lại mật khẩu không được để chống '
        ]);
        dd(123);
        $current_password = Auth::User()->password;
        if(Hash::check($request->current_password, $current_password))
        {
            $user_id = Auth::User()->id;
            $obj_user = User::findorFail($user_id);
            $obj_user->password = Hash::make($request->password);
            $obj_user->save();

            if ($obj_user->save()) {
                Session::flash('success', 'Cập nhật thành công!');
                return redirect()->route('client.profile');
            }else {

            }
        }
        else
        {
            Session::flash('error', 'Mật khẩu hiện tại k đúng!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
