@extends('layouts.app')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('js/assets/owl.carousel.min.css')}}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')

<h2 class="h2-bottom mt-5 mb-5 text-center"> ПОДБЕРЕМ ТУР ПО ПАРАМЕТРАМ</h2>
<div class="container mt-5  " id="search">
    <form method="post" action="/sendhtmlemail">
        @csrf
        <div class="row blue p-2">
            <div class="col-4 pl-1 pr-1">
                <div class="form-group">
                    <label for="where">Куда</label>
                    <select class="form-control br0" id="where" name="where">
                        <option>Турция</option>
                        <option>Тайланд</option>
                        <option>ОАЭ</option>
                        <option>Тунис</option>
                        <option>Испания</option>
                        <option>Греция</option>
                    </select>
                </div>
            </div>
            <div class="col-3 pl-1 pr-1">
                <div class="form-group">
                    <label for="datetimepicker">Период вылета</label>
                    <input type="text" class="form-control br0" id="datetimepicker" name="period">
                </div>
            </div>
            <div class="col-3 pl-1 pr-1">
                <div class="form-group">
                    <label for="night br0">Ночей</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-1 "><label for="from">От</label></div>
                                    <div class="col-9">
                                        <select class="form-control br0" id="from" name="from">
                                            @for ($i=1; $i<=14; $i++) <option>{{$i}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-1"><label for="to">До</label></div>
                                    <div class="col-9">
                                        <select class="form-control br0" id="to" name="to">
                                            @for ($i=1; $i<=28; $i++) <option>{{$i}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-2 pl-1 pr-1">
                <div class="form-group block-search">
                    <button type="button" id="btn" class="br0 btn-search btn btn-success btn-block" data-toggle="modal" data-target="#searchModal">ПОДОБРАТЬ</button>
                </div>
            </div>

        </div>
        <div class="row grey p-3">
            <div class="col-2">
                <div class="form-group">
                    <label for="people">Взрослые</label>
                    <select class="form-control br0" id="people" name="people">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="children">Дети</label>
                    <select class="form-control br0" id="children" name="children">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="eat">Питание</label>
                    <select class="form-control br0" id="eat" name="eat">
                        <option>Любое</option>
                        <option>Всё включено</option>

                        <option>Только завтрак</option>
                        <option>Трехразовое питание</option>
                        <option>Завтраки и ужины</option>
                        <option>Без питания</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control br0" id="category" name="category">
                        <option>Любая</option>
                        <option>5 звезд</option>
                        <option>4 звезды</option>
                        <option>3 звезды</option>
                        <option>2 звезды</option>
                        <option>Apts</option>
                        <option>Villas</option>
                        <option>HV-1</option>
                        <option>HV-2</option>
                    </select>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Форма заявки</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-12 pl-1 pr-1">
                    <div class="form-group">
                        <input type="text" class="form-control br0" placeholder="Имя" required name="searchName">
                    </div>
                </div>
                <div class="col-12 pl-1 pr-1">
                    <div class="form-group">
                        <input type="text" class="form-control br0" placeholder="Телефон" required name="searchTel">
                    </div>
                </div>
                <div class="col-12 pl-1 pr-1">
                    <div class="form-group">
                        <textarea rows="10" cols="45" class="form-control br0" required placeholder="Оставьте здесь свои пожелания к путешествию" name="searchComment"></textarea>
                    </div>
                </div>
                <div class="modal-footer">

                    <div class="text-left">
                        <div class="g-recaptcha" data-sitekey="6LeI_NkUAAAAANlFA0mCCnlRXeBsrMSqM7NLtG8z"></div>
                        <div class="errCapt"></div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="send">Оставить заявку</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection

@section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="{{ asset ('js/moment-with-locales.js')}}"></script>

<script>
    moment.locale('ru');
</script>
<script src="{{ asset ('js/jquery.datetimepicker.full.js')}}"></script>
<script src="{{ asset ('js/owl.carousel.min.js') }}"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    })
</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $('#datetimepicker').daterangepicker({

        "drops": "down",
        locale: {
            format: 'DD.MM.YYYY ',
            "applyLabel": "Сохранить",
            "cancelLabel": "Отменить",
        }
    }, function(start, end, label) {
        console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
    });
</script>

@endsection