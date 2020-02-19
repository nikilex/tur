<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function redirectTo($request)
    {
        return route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


    public function index()
    {

        $items = Items::select()->paginate(5);
        return view('admin.index', ['id' => $items]);
    }

    public function resetPassword(Request $data)
    {
        if (Hash::check($data->new, Auth::user()->password)) {
            return redirect('admin/settings')->with('statusDanger', 'Старый пароль введён не верно!');
        } else {
            if ($data['new'] != $data['confirm']) {
                return redirect('admin/settings')->with('statusDanger', 'Пароли не совпадают!');
            } else {
                if (strlen($data['new']) < 8) {
                    return redirect('admin/settings')->with('statusDanger', 'Пароль должен быть более 8 символов!');
                } else {
                    User::where('id', Auth::user()->id)->update([
                        'password' => Hash::make($data['new'])
                    ]);
                    Auth::logout();
                    return redirect('admin');
                }

                return redirect('admin/settings')->with('status', 'Пароль успешно изменён!');
            }
        }
    }

    public function emailChange(Request $data)
    {
        if (isset($data->email)) {
            User::where('id', Auth::user()->id)->update(['email' => $data->email]);
            return redirect('admin/settings')->with('status', 'E-mail успешно изменён!');
        } else {
            return redirect('admin/settings')->with('status', 'E-mail введён не верно!');
        }
    }

    public function settings()
    {

        return view('admin.settings');
    }

    public function slider()
    {
        $sliders = DB::table('slider')->select()->get();

        return view('admin.slider', ['sliders' => $sliders]);
    }


    public function add()
    {

        return view('admin.add');
    }

    public function edit($id)
    {
        $item = Items::select()->where('id', $id)->first();
        if (isset($item)) {

            return view('admin.edit', ['item' => $item]);
        } else {
            $items = Items::select()->get();
            return view('admin.index', ['id' => $items]);
        }
    }

    public function create(Request $data)
    {
        $path = 'nophoto.png';
        if (isset($data['photo']) != '') {
            $path = $data->file('photo')->store('', 'public');
        }

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

        return redirect('admin')->with('status', 'Тур успешно создан!');
        // return view('admin.add', ['data' => $data, 'files' => $path]);
    }

    public function update(Request $data)
    {
        //$path = $data->file('photo')->store('uploads/turs/', 'public');
        $items = Items::select()->where('id', $data['id'])->first();
        if (isset($data['photo'])) {
            if ($items->photo != 'nophoto.png') {
                Storage::delete('/public/' . $items->photo);
            }
            $path = $data->file('photo')->store('', 'public');
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
                    'photo' =>  $path

                ]);
        } else {
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
                    'photo' =>  $items->photo

                ]);
        }
        return redirect('admin')->with('status', 'Изменения успешно сохранены!');
    }

    protected function delete(Request $data)
    {

        $items = Items::select()->get();
        $item = Items::select()->where('id', $data['id'])->first();
        if ($item->photo != 'nophoto.png') {
            Storage::delete('/public/' . $item->photo);
        }
        Items::destroy($data['id']);
        return redirect('admin')->with('statusDelete', 'Тур удалён!');
    }

    public function sliderUpdate(Request $data)
    {
        if (isset($data)) {

            DB::table('slider')->where('id', $data->slider1)->update([
                'name' => $data->nameSlider1,
            ]);
            DB::table('slider')->where('id', $data->slider2)->update([
                'name' => $data->nameSlider2,
            ]);
            DB::table('slider')->where('id', $data->slider3)->update([
                'name' => $data->nameSlider3,
            ]);
        }
        return redirect('/admin/slider')->with('status', 'Изменения успешно сохранены!');
    }
}
