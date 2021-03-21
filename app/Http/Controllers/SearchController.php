<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchTours (Request $request)
    {
        $tours = Tour::where('name', 'like', '%' . $request->get('p') . '%')->get();
        return view('admin.tours.index', [ 'data' => $tours]);
    }
}
