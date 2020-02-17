@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
<main>
    <div class="container-fluid">
        
        <h1 class="mt-4">Страница добавления тура
            @if (isset($da))
            {{$da}}
        @endif
    </h1>


        @if (isset($files))
            {{$files}}
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('addItem') }}">
        @csrf
        <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name" >Название</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="star">Звездность отеля</label>
                        <input type="text" class="form-control"name="star" id="star">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="date">Дата отправления</label>
                        <input type="text" class="form-control" name="date" id="date">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="city">Город отправления</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="country">Страна прибытия</label>
                        <input type="text" class="form-control" name="country" id="country">
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                        <label for="days">Количество дней</label>
                        <input type="text" class="form-control"  name="days" id="days">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="eat">Тип питания</label>
                        <input type="text" class="form-control"  name="type" id="eat">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="text" class="form-control"  name="price" id="price">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="sale">Скидка</label>
                        <input type="text" class="form-control"  name="sale" id="sale">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="photo">Фото</label>
                        <input type="file" accept="image/jpeg,image/png,image/gif,image/jpg" class="form-control" name="photo" id="photo">
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success btn-block">Создать</button>
                </div>
            </div>
</form>
    </div>
</main>
@endsection

@section('footer')

@endsection