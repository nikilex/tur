@extends('layouts.app')

@section('header')
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('js/assets/owl.carousel.min.css')}}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')
<div class="container-fluid pr-0 pl-0 mr-0 ml-0">
    <div class="row">
        <div class="col">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    {{$i=1}}
                    @foreach ($sliders as $slider)
                    @if ($i==1)
                    <div class="carousel-item active">
                        @else
                        <div class="carousel-item">
                            @endif
                            <img src="{{ asset ('img/slider/'.$slider->img) }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h1 class="header-slider">{{$slider->name}}</h1>
                                <p class="header-slider-second">{{ $slider->second }}</p>
                            </div>
                        </div>
                        {{$i= $i-1}}
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    </div>
    @endif
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
                                                @for ($i=1; $i<=14; $i++)
                                                <option>{{$i}}</option>  
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
                                                @for ($i=1; $i<=28; $i++)
                                                <option>{{$i}}</option>  
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

    <div class="modal p-0 m-0 fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control br0" placeholder="Телефон" required id="serchTel" name="searchTel">
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


    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h3>О КОМПАНИИ</h3>
                        <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании систем массового участия. Повседневная практика показывает, что дальнейшее развитие различных форм деятельности
                            представляет собой интересный эксперимент проверки систем массового участия</p>
                    </div>
                </div>
                <div class=" row mt-4">
                    <div class="col text-center">
                        <h4 class="number">1872</h4>
                        <p>ПОСТОЯННЫХ КЛИЕНТА
                        </p>
                    </div>
                    <div class="col text-center">
                        <h4 class="number">103</h4>
                        <p>ПОСТОЯННЫХ КЛИЕНТА
                        </p>
                    </div>
                    <div class="col text-center">
                        <h4 class="number">99%</h4>
                        <p>ПОСТОЯННЫХ КЛИЕНТА
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-9 text-center">
                        <a href="#" class="btn btn-success btn-block btn-bron" data-toggle="modal" data-target="#searchModal">
                            <span class="elementor-button-icon elementor-align-icon-left">
                                <i aria-hidden="true" class="fas fa-plane"></i> </span>
                            <span class="elementor-button-text mt-4"></span>ЗАБРОНИРОВАТЬ ПУТЕШЕСТВИЕ</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <diw class="row mb-3">
                    <div class="col text-center">
                        <div class="icon-awesome mb-2">
                            <i class="far fa-clock"></i>
                        </div>

                        <h2 class="text-head">ПРОСТО ЗАКАЗАТЬ</h2>
                        <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании.</p>
                    </div>
                    <div class="col text-center">
                        <div class="icon-awesome mb-2">
                            <i class="fas fa-star"></i>
                        </div>
                        <h2 class="text-head">ДОСТУПНО И ВЫГОДНО</h2>
                        <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании.</p>
                    </div>
                </diw>
                <diw class="row">
                    <div class="col text-center">
                        <div class="icon-awesome mb-2">
                            <i class="far fa-sun"></i>
                        </div>
                        <h2 class="text-head">ЛУЧШИЕ НАПРАВЛЕНИЯ</h2>
                        <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании.</p>
                    </div>
                    <div class="col text-center">
                        <div class="icon-awesome mb-2">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <h2 class="text-head">ПРОФЕССИОНАЛЬНО</h2>
                        <p class="text-editor">Наши менеджеры ежегодно проходят курсы повышения квалификации и посещают рекламные туры</p>
                    </div>
                </diw>
            </div>
        </div>
    </div>
    <div class="run container-fluid mt-5 pb-3">
        <div class="container pt-4 mb-3">
            <div class="row  justify-content-center ">
                <div class="col-12 text-center ">
                    <h2 class="h2">ОСТАВЬТЕ ЗАЯВКУ НА ПОДБОР ТУРА –</h2>
                    <h2 class="h2"> ЭТО ОЧЕНЬ ПРОСТО!</h2>
                </div>
                <div class="col-3 mt-3">
                    <a href="#" class="btn btn-success btn-block btn-bron" data-toggle="modal" data-target="#searchModal">ЗАДАТЬ ВОПРОС</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col text-center">
                <h3 class="header-preim">НАШИ ПРЕИМУЩЕСТВА</h3>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col text-center icon-prem-col">
                <i aria-hidden="true" class="fas fa-plane icon-preim"></i>
                <h5 class="text-head mt-3">БРОНИРУЕМ САМЫЕ ВЫГОДНЫЕ АВИАБИЛЕТЫ</h5>
                <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки иместо обучения кадров играет важную роль в формировании.</p>
            </div>
            <div class="col text-center icon-prem-col">
                <i class="fas fa-hotel icon-preim" aria-hidden="true"></i>
                <h5 class="text-head mt-3">ПОДБИРАЕМ ЛУЧШИЕ <br>ОТЕЛИ</h5>
                <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании.</p>
            </div>
            <div class="col text-center icon-prem-col">
                <i class="fa fa-drivers-license-o icon-preim" aria-hidden="true"></i>
                <h5 class="text-head mt-3">ОФОРМЛЯЕМ ВИЗЫ И ДРУГИЕ ДОКУМЕНТЫ</h5>
                <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании.</p>
            </div>
            <div class="col text-center icon-prem-col">
                <i class="fas fa-car icon-preim" aria-hidden="true"></i>
                <h5 class="text-head mt-3">ПОЛНОСТЬЮ ПЛАНИРУЕМ ВАШЕ ПУТЕШЕСТВИЕ</h5>
                <p class="text-editor">Значимость этих проблем настолько очевидна, что рамки и место обучения кадров играет важную роль в формировании.</p>
            </div>
        </div>
    </div>
    <div class="comment container-fluid mt-5">
        <div class="container mt-5">
            <div class="row pt-5 justify-content-center">
                <div class="col-12 mt-3 text-center">
                    <h2 class="header-comment">ОТЗЫВЫ НАШИХ КЛИЕНТОВ</h2>
                </div>
                <div class="col-12 mt-4 mb-10">
                    <div class="row owl-carousel justify-content-center">
                        <div class="col item">
                            <div class="row justify-content-center text-center">
                                <div class="col-3">
                                    <img class=" img-comment" src="img/comments/110914-hoppus.png" alt="">
                                </div>
                                <div class="col-12 mt-3">
                                    <p>Спасибо турагентству! Мексика прекрасна!!! Стоит посетить все экскурсии, это очень интересно! Прекрасный отель, все было великолепно! Сколько раз летаю, всегда только отличные впечатления!</p>
                                </div>
                                <div class="col-12">
                                    <span class="name-comm">Петр Дашкиев</span><br>
                                    <span class="name-comm-bottom">ДОВОЛЬНЫЙ КЛИЕНТ</span>
                                </div>
                            </div>
                        </div>
                        <div class="col item">
                            <div class="row justify-content-center text-center">
                                <div class="col-3">
                                    <img class=" img-comment" src="img/comments/110914-hoppus.png" alt="">
                                </div>
                                <div class="col-12 mt-3">
                                    <p>Спасибо турагентству! Мексика прекрасна!!! Стоит посетить все экскурсии, это очень интересно! Прекрасный отель, все было великолепно! Сколько раз летаю, всегда только отличные впечатления!</p>
                                </div>
                                <div class="col-12">
                                    <span class="name-comm">Петр Дашкиев</span><br>
                                    <span class="name-comm-bottom">ДОВОЛЬНЫЙ КЛИЕНТ</span>
                                </div>
                            </div>
                        </div>
                        <div class="col item">
                            <div class="row justify-content-center text-center">
                                <div class="col-3">
                                    <img class=" img-comment" src="img/comments/110914-hoppus.png" alt="">
                                </div>
                                <div class="col-12 mt-3">
                                    <p>Спасибо турагентству! Мексика прекрасна!!! Стоит посетить все экскурсии, это очень интересно! Прекрасный отель, все было великолепно! Сколько раз летаю, всегда только отличные впечатления!</p>
                                </div>
                                <div class="col-12">
                                    <span class="name-comm">Петр Дашкиев</span><br>
                                    <span class="name-comm-bottom">ДОВОЛЬНЫЙ КЛИЕНТ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row shadow text-center justify-content-center ">
            <div class="col-12">
                <h2 class="h2-bottom mt-5"> ОСТАВЬТЕ ВАШИ КОНТАКТЫ – МЫ ПОМОЖЕМ ВАМ С ВЫБОРОМ ТУРА</h2>
            </div>
            <div class="col-12 mt-4">
                <p class="p-bottom">Нажимая на кнопку «Перезвоните мне», вы даете согласие на передачу и обработку персональных данных.</p>
            </div>
            <div class="col-3 mt-2 mb-5">
                <button type="button" class="btn btn-primary btn-block btn-bron" data-toggle="modal" data-target="#searchModal">Хочу в путешествие</button>
            </div>
        </div>
    </div>

    @endsection

    @section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="{{ asset ('js/moment-with-locales.js')}}"></script>
    <script src="{{ asset ('js/jquery.maskedinput2.js') }}"></script>
    <script>
        moment.locale('ru');
        $('#serchTel').mask('+7 (999) 999-99-99');
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
        })
    </script>

    @endsection