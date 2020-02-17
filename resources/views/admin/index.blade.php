@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
<main>

    <div class="container-fluid">
        <h1 class="mt-4">Dashboard </h1>
<div class="row">
    <div class="col"> <a href="{{ route('create') }}" class="btn btn-primary">Добавить тур</a> </div>
</div>
<div class="card mb-4 mt-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Изображение</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Город отправления</th>
                                <th>Страна прибытия</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Изображение</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Город отправления</th>
                                <th>Страна прибытия</th>
                                <th>Действие</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        @foreach ($id as $i)

                            <tr>
                                <td><img src="{{ asset ('/storage/'.$i->photo) }}" style="width: 50px"></td>
                                <td><a href="/admin/edit/{{ $i->id }}">{{ $i->name }}</a></td>
                                <td>{{ $i->price }}</td>
                                <td>{{ $i->city}}</td>
                                <td>{{ $i->country }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-5"><a href="/admin/edit/{{ $i->id }}" class="btn btn-success btn-block">Править</a></div>
                                        <div class="col-5">
                                        <form method="post" action="{{ route ('delete') }}">
                                            @csrf
                                                <button type="submit" class="btn btn-danger btn-block">Удалить</button> 
                                                <input type="hidden" value="{{$i->id}}" name="id">
                                            </form>
                                        </div>
                                    </div>
                                    
                                   
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('footer')

@endsection