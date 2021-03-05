<?php

namespace App\Http\Controllers;

use App\BookTour;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookTourController extends Controller
{
    public function index ()
    {

    }
    public function store (Request  $request)
    {
        $tour = Tour::findorFail($request->tour_id);
        $slot = $tour->max_members - $tour->members;
        if (  $slot <= 0){
            Session::flash('error',' Chỉ còn '.$slot.' chỗ chống.');
            return redirect()->route('client.tour.detail', [ 'id' => $request->tour_id ]);
        }
       $book_tour = new BookTour();
        $book_tour->tour_id = $request->tour_id;
        $book_tour->user_id = Auth::user()->id;
        $book_tour->members = $tour->members + $request->members;
        $book_tour->total_price = $request->members * $tour->price;
        $book_tour->state = 0;

        $book_tour->save();
        return redirect()->route('client.profile');

    }
}
