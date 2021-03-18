<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('role','EMPLOYEE')->latest()->paginate(20);

        return view('admin.employees.index',[ 'data' => $employees]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    public function detail ()
    {
        return view('admin.employees.detail');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $request->validate([
            'username' => 'unique:users',
        ],[
            'username.unique' => 'Tên đăng nhập đã tồn tại!',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/employee/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $employee->image = $path_upload.$filename;
        }

        $employee->username = $request->username;
        $employee->password = bcrypt($request->password);
        $employee->role = $request->role;
        $employee->sex = $request->sex;
        $employee->birthday = $request->birthday;
        $employee->created_at = date('Y-m-d H:i:s');
        $employee->updated_at = date('Y-m-d H:i:s');
        $employee->save();

        return redirect()->route('admin.employee.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findorFail($id);

        return  view('admin.employees.profile',[ 'data' => $employee ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findorFail($id);

        return  view('admin.employees.edit',[ 'data' => $employee ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findorFail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/employee/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $employee->image = $path_upload.$filename;
        }

//        $employee->username = $request->username;
//        $employee->password = bcrypt($request->password);
//        $employee->role = $request->role;
        $employee->sex = $request->sex;
        $employee->birthday = $request->birthday;
        $employee->updated_at = date('Y-m-d H:i:s');
        $employee->save();

        if ($employee->save()) {
            Session::flash('success', 'Cập nhật thành công!');
            return redirect()->route('employee.detail');
        }else {
            Session::flash('error', 'Cập nhật thất bại!');
            return redirect()->route('employee.detail');
        }
    }
    public function change(Request $request, $id)
    {

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $state = $request->state;
        if ($state == 0 )
        {
            $state = 1;
        }
        else{
            $state = 0;
        }

        $employee = Employee::findorFail($id);
        $employee->state = $state;
        $employee->save();

        if ($employee->save()) {
            Session::flash('success', 'Thay đổi trạng thái thành công!');
            return redirect()->route('admin.employee.show',['employee' => $id]);
        }else {
            Session::flash('error', 'Thay đổi trạng thái thất bại!');
        }


    }

    public function changePasswordForm ()
    {
        return view('admin.employees.password');
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
        $current_password = Auth::user()->password;
        if(Hash::check($request->current_password, $current_password))
        {
            $user_id = Auth::User()->id;
            $obj_user = Employee::findorFail($user_id);
            $obj_user->password = Hash::make($request->password);
            $obj_user->save();

            if ($obj_user->save()) {
                Session::flash('success', 'Cập nhật thành công!');
                return redirect()->route('admin.change.password.form');
            }
        }
        else
        {
            Session::flash('error', 'Mật khẩu hiện tại k đúng!');
            return redirect()->route('admin.change.password.form');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
