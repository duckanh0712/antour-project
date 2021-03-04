<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::where('role','guest')->latest()->paginate(20);

        return view('admin.users.index',[ 'data' => $users]);
    }
    public function login()
    {
        return view('client.users.login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');

    }

    public function change(Request $request, $id)
    {

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $state = $request->state;
        //Thực hiện câu lệnh update với các giá trị $request trả về
        $updateData = DB::table('users')->where('id', $id)->update([
            'state' => (!$state),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updateData) {
            Session::flash('success', 'Thay đổi trạng thái thành công!');
            return redirect()->route('admin.user.show',['user' => $id]);
        }else {
            Session::flash('error', 'Thay đổi trạng thái thất bại!');
        }


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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/user/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $user->image = $path_upload.$filename;
        }

        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->sex = $request->sex;
        $user->role =$request->role;
        $user->birthday = $request->birthday;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect()->route('admin.user.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorFail($id);

        return  view('client.users.profile',[ 'data' => $user ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);

        return view('client.users.edit', [ 'data' => $user]);
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
        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/user/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $user->image = $path_upload.$filename;
        }
//
//        $user->username = $request->username;
//        $user->password = bcrypt($request->password);
        $user->sex = $request->sex;
        $user->birthday = $request->birthday;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        if ($user->save()) {
            Session::flash('success', 'Thay đổi trạng thái thành công!');
            return redirect()->route('admin.user.show',['user' => $id]);
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
