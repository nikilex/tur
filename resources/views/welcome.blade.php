@extends('layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('js/assets/owl.carousel.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/slider/2.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1 class="shadow">First slide label</h1>
                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/slider/2.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1 class="shadow">Second slide label</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img/slider/2.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h1 class="shadow">Third slide label</h1>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                </div>
                            </div>
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
        <div class="container mt-5  " id="search">
            <div class="row blue p-2">
                <div class="col-4 pl-1 pr-1">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Куда</label>
                        <select class="form-control br0" id="exampleFormControlSelect1">
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
                        <input type="text" class="form-control br0" id="datetimepicker">
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
                                            <select class="form-control br0" id="from">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                  </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-1"><label for="from">До</label></div>
                                        <div class="col-9">
                                            <select class="form-control br0" id="from">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
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
                        <button type="button" id="btn" class="br0 btn-search btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">ПОДОБРАТЬ</button>
                    </div>
                </div>

            </div>
            <div class="row grey p-3">
                <div class="col-2">
                    <div class="form-group">
                        <label for="people">Взрослые</label>
                        <select class="form-control br0" id="people">
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
                        <select class="form-control br0" id="children">
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
                        <select class="form-control br0" id="eat">
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
                        <select class="form-control br0" id="category">
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
                            <a href="#" class="btn btn-success btn-block btn-bron">
                                <span class="elementor-button-icon elementor-align-icon-left">
                                        <i aria-hidden="true" class="fas fa-plane"></i>			</span>
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
                        <a href="#" class="btn btn-success btn-block btn-bron">ЗАДАТЬ ВОПРОС</a>
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
                    <button type="button" class="btn btn-primary btn-block btn-bron">Хочу в путешествие</button>
                </div>
            </div>
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