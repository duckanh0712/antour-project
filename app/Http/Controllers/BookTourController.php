<?php

namespace App\Http\Controllers;
use Session;
use App\BookTour;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookTourController extends Controller
{
    public function index ()
    {
        $book_tour = BookTour::where('state','<', 3)->latest()->paginate(20);
        return view('admin.book-tour.index', [ 'data' => $book_tour ]);

    }
    public function store (Request  $request)
    {
        $tour = Tour::findorFail($request->tour_id);
        $slot = $tour->max_members - $tour->members;
        if (  $slot <= 0){
            Session::flash('error',' không còn chỗ chống.');
            return redirect()->route('client.tour.detail', [ 'id' => $request->tour_id ]);
        }
        $book_tour = new BookTour();
        $book_tour->tour_id = $request->tour_id;
        $book_tour->user_id = Auth::user()->id;
        if ($slot >0 && $slot == $request->members ){
            $book_tour->members = (int)$request->members;
        }
        else{
            Session::flash('error','chỉ còn '.$slot.' chỗ chống.');
            return redirect()->route('client.tour.detail', [ 'id' => $request->tour_id ]);
        }

        $book_tour->total_price = $request->members * $tour->price;
        $book_tour->state = 0;
//        dd($book_tour);
        $tour->members = $tour->members + $book_tour->members;
        DB::beginTransaction();
        try {
            $book_tour->save();
            $tour->save();
            DB::commit();
            return redirect()->route('client.profile');
        }catch (Exception $exception){
            DB::rollBack();
            return redirect()->route('client.profile');
        }

    }
    public function approve (Request $request)
    {

        $id = $request->id_book_tour;

        $book_tour = BookTour::findorFail($id);
        $book_tour->state = 1;
        $book_tour->employee_id = Auth::user()->id;

        $book_tour->save();
        return redirect()->route('admin.book-tour.index');
    }

    public function paymentForm ($id) {

        $book_tour = BookTour::findorFail($id);
        return view('admin.book-tour.pay', [ 'data' => $book_tour ]);



    }
    public function  payment ($id)
    {

        $book_tour = BookTour::findorFail($id);
        $book_tour->state = 3;
        $book_tour->save();
        if (  $book_tour->save()) {
            Session::flash('success', ' Khách hàng '.$book_tour->khachhang->name.' thanh toán thành công!');
            return redirect()->route('admin.book-tour.index');
        }else {
            Session::flash('error',  'khách hàng '.$book_tour->khachhang->name.' thanh toán thất bại');
            return redirect()->route('admin.book-tour.index');
        }
    }

    public function statistics()
    {

        $book_tour = BookTour::where('state' , 3 )->latest()->paginate(20);
        $price = 0;
        foreach ( $book_tour as $key => $item){
            $price = $price + $item->total_price;
        }
        return view('admin.statistics.index', [ 'data' => $book_tour , 'total_price' => $price]);
    }
}
