<?php

namespace App\Http\Controllers;

use App\BookTour;
use App\Tour;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::latest()->paginate(20);
        return  view('client.home', [ 'tours' => $tours]);
    }

    public function profile ()
    {

        $book_tour = User::findorFail(Auth::user()->id)->book_tour;
        return view('client.users.profile', [ 'data' => $book_tour]);
    }
    public function detail ($id)
    {
        $tour = Tour::findorFail($id);
        return view('client.tour_detail', [ 'tour' => $tour ]);
    }
    public function registerForm ()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
