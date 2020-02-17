<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Items extends Model
{
    use Notifiable;


    public $table = 'item';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'star', 'date', 'city', 'country', 'days', 'type', 'price', 'sale', 'photo',
    ];
}
