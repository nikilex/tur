<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Illuminate\Support\Facades\Storage;
use File;

class SaleController extends Controller
{
    public function index(){
        $items = Items::select()->get();
        return view('sale', ['items' => $items]);
    }
}
