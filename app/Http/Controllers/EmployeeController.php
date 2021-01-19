<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $employees = Employee::select('id','name','image','state','role','created_at')->latest()->paginate(20);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:employees',
//            'phone' => 'required|unique:employees',
//            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
//            'username' => 'required|unique:employees',
//            'password' => 'required',
//            'role' => 'required',
//            'sex' => 'required',
//            'birthday' => 'required'
//
//        ],[
//            'name.required' => 'Tên không được để trống',
//            'image.image' => 'Ảnh không đúng định dạng',
//            'email.required' => 'Email không được để trống',
//            'email.email' => 'Không đúng định dạng email',
//            'email.unique' => 'Email đã đăng ký 1 tài khoản khác',
//            'phone.required' => 'SĐT không được để trống',
//            'phone.unique' => 'SĐT đã đăng ký 1 tài khoản khác',
//            'password.required ' => 'Mật khẩu không được để trống',
//            'role.required' => 'Quyền tài khoản chưa được trọn',
//            'sex.reruired' => 'Giới tính chưa được trọn',
//            'birthday.required' => 'Ngày sinh không được để trống'
//        ]);

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

        return  view('admin.employees.profile',[ 'data' => $employee ]);
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
        //
    }
    public function change(Request $request, $id)
    {

        date_default_timezone_set("Asia/Ho_Chi_Minh");
            $state = $request->state;
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('employees')->where('id', $id)->update([
            'state' => (!$state),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updateData) {
            Session::flash('success', 'Thay đổi trạng thái thành công!');
            return redirect()->route('admin.employee.show',['employee' => $id]);
        }else {
            Session::flash('error', 'Thay đổi trạng thái thất bại!');
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
