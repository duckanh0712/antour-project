<?php

namespace App\Http\Controllers;

use AdvanceSearch\AdvanceSearchProvider\Search;
use App\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::latest()->paginate(20);
        return view('admin.tours.index', [ 'data' => $tours]);
    }
    public  function  search ()
    {
       $data =  Search::search(
            "Tour" ,
            'name' ,
            "chu"  ,
            ['id' , 'name', 'image','address','description','members','max_members','start_date','end_date'],
            'id',
            false
        )->get();
       dd($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
//        $request->validate([
//            'start_date' => 'after:tomorrow',
//            'end_date' => 'after:start_date'
//        ],[
//            'start_date.after' => 'Ngày bắt đầu không đúng.',
//            'end_date.after' => 'Ngày kết thúc không đúng.'
//        ]);


        $tour = new Tour();
        $tour->name = $request->name;
        $tour->address = $request->address;
        $tour->members = 0;
        $tour->price = $request->price;
        $tour->max_members = $request->max_members;
        $tour->description = $request->description;
        $tour->start_date = $request->start_date;
        $tour->end_date = $request->end_date;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/tour/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $tour->image = $path_upload.$filename;
        }
        $tour->save();

        return redirect()->route('admin.tour.index');
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

        $tour = Tour::findorFail($id);
        return view('admin.tours.edit', [ 'data' => $tour ]);
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
        $tour = Tour::findorFail($id);
        $tour->name = $request->name;
        $tour->address = $request->address;
        $tour->max_members = $request->max_members;
        $tour->description = $request->description;
        $tour->start_date = $request->start_date;
        $tour->end_date = $request->end_date;

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/tour/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $tour->image = $path_upload.$filename;
        }
        $tour->save();

        return redirect()->route('admin.tour.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tour::destroy($id);
        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        $dataResp = [
            'status' => true
        ];

        return response()->json($dataResp, 200);

    }
}
