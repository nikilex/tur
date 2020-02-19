@extends('admin.layouts.app')

@section('header')

@endsection

@section('content')
<main>
    <div class="container-fluid">
        <div class="row">
            

            @if (session('status'))
            <div class="w-100"></div>
            <div class="col-4 mt-3">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
            @endif

            @if (session('statusDanger'))
            <div class="w-100"></div>
            <div class="col-4 mt-3">
                <div class="alert alert-danger" role="alert">
                    {{ session('statusDanger') }}
                </div>
            </div>
            @endif

            <div class="w-100"></div>

            <form method="post" enctype="multipart/form-data" action="{{ route('resetPassword') }}">
                @csrf

                <div class="col-6 mt-3">
                <h1 class="mt-4">Настройки</h1>
                    <h3>Сменить пароль</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">Старый пароль</label>
                                <input type="password" class="form-control" name="old" required id="old">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="new">Новый пароль</label>
                                <input type="password" class="form-control" name="new" required id="new">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="confirm">Подтверждение пароля</label>
                                <input type="password" class="form-control" name="confirm" required id="confirm">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-6">
                            <div class="form-group" class="col-md-4 col-form-label text-md-right">
                                <button type="text" id="submit" class="btn btn-success btn-block"> Сохранить</button>
                            </div>
                        </div>
                        </form>
                        <div class="w-100"></div>
                        <form method="post" enctype="multipart/form-data" action="{{ route('emailChange') }}">
                            @csrf
                            <div class="col-12 mt-5">
                                <div class="form-group">
                                    <label for="email">Сменить E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>

                            </div>
                            <div class="w-100"></div>
                            <div class="col-8">
                                <div class="form-group" class="col-md-4 col-form-label text-md-right">
                                    <button type="email" id="submit" class="btn btn-success btn-block"> Сохранить</button>
                                </div>
                        </form>
                    </div>
                </div>

            
        </div>

    </div>
</main>
@endsection


@section('footer')

@endsection