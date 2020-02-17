<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use Illuminate\Support\Facades\Storage;
use File;

class AdminController extends Controller
{
    public function index(){
        $items = Items::select()->get();
        return view('admin.index', ['id' => $items]);
    }

    public function add(){
        
        return view('admin.add');
    }

    public function edit($id){
        $item = Items::select()->where('id',$id)->first();
        if (isset($item)){
        return view('admin.edit',['item' => $item]);
        } else {
            $items = Items::select()->get();
            return view('admin.index', ['id' => $items]);
        }
    }

    public function create(Request $data)
    {
        
        $path = $data->file('photo')->store('', 'public');

        Items::create([
                'name' => $data['name'],
                'star' => $data['star'], 
                'date' => $data['date'], 
                'city' => $data['city'], 
                'country' => $data['country'], 
                'days' => $data['days'], 
                'type' => $data['type'], 
                'price' => $data['price'], 
                'sale' => $data['sale'],
                'photo' => $path
                
            ]);
            return view('admin.add', ['data' => $data, 'files' => $path]);
    }

    protected function update(Request $data)
    {
        $path = $data->file('photo')->store('uploads/turs/', 'public');
         Items::where('id', $data['id'])
                    ->update([
                    'name' => $data['name'],
                    'star' => $data['star'], 
                    'date' => $data['date'], 
                    'city' => $data['city'], 
                    'country' => $data['country'], 
                    'days' => $data['days'], 
                    'type' => $data['type'], 
                    'price' => $data['price'], 
                    'sale' => $data['sale'], 
                    'photo' => $path
        ]);
        return view('admin.edit', ['data' => $data, 'files' => $path]);
    }

    protected function delete(Request $data)
    {
        Items::destroy($data['id']);
        $items = Items::select()->get();
        return view('admin.index', ['id' => $items]);
    }
}
