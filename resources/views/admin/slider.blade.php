@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
<main>
    <div class="container-fluid">

        <h1 class="mt-4">Страница редактирования слоганов
            @if (isset($da))
            {{$da}}
            @endif
        </h1>
        @if (session('status'))
            <div class="w-100"></div>
            <div class="col-4 mt-3">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
            @endif

        @if (isset($files))
        {{$files}}
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('sliderUpdate') }}">
            @csrf
            <div class="row">
                @foreach($sliders as $slider)
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">{{$slider->title}}</label>
                            <input type="text" class="form-control"  name="nameSlider{{ $slider->id }}" value="{{ $slider->name }}" id="name">
                            <input type="hidden" name="slider{{ $slider->id }}" value="{{ $slider->id }}">
                        </div>
                    </div>
                    <div class="w-100"></div> 
                @endforeach
                <div class="col-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block"> Сохранить</button>
                    </div>
                </div> 
            </div>
        </form>
    </div>
</main>
@endsection

@section('footer')

@endsection