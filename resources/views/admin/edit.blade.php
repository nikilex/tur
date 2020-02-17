@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Страница редактирования тура</h1>
        @if (isset($data))
            {{$data}}
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('addItem') }}">
        @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name" >Название</label>
                        <input type="text" class="form-control" name="name" value="{{ $item->name }}" id="name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="star">Звездность отеля</label>
                        <input type="text" class="form-control"value="{{ $item->star }}" name="star" id="star">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="date">Дата отправления</label>
                        <input type="text" class="form-control" value="{{ $item->date }}"name="date" id="date">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="city">Город отправления</label>
                        <input type="text" class="form-control" value="{{ $item->city }}"name="city" id="city">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="country">Страна прибытия</label>
                        <input type="text" class="form-control"value="{{ $item->country }}" name="country" id="country">
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                        <label for="days">Количество дней</label>
                        <input type="text" class="form-control" value="{{ $item->days}}" name="days" id="days">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="eat">Тип питания</label>
                        <input type="text" class="form-control" value="{{ $item->type }}" name="type" id="eat">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" class="form-control" value="{{ $item->price}}" name="price" id="price">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="sale">Скидка</label>
                        <input type="text" class="form-control" value="{{ $item->sale }}" name="sale" id="sale">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="photo">Фото</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success btn-block">Сохранить</button>
                </div>
            </div>
</form>
    </div>
</main>
@endsection

@section('footer')

@endsection