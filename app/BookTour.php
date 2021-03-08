<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTour extends Model
{
    protected $table = 'book_tour';
    public function khachhang()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function tour()
    {
        return $this->belongsTo('App\Tour', 'tour_id', 'id');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employee_id', 'id');
    }

}
