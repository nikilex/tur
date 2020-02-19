@extends('layouts.app')

@section('header')

@endsection

@section('content')
<div class="container mt-5">
    <h2 class="h2-bottom mt-5 mb-5 text-center"> ВОСПОЛЬЗУЙТЕСЬ НАШИМИ СПЕЦИАЛЬНЫМИ ПРЕДЛОЖЕНИЯМИ</h2>
    <div class="row shadow pt-4 pb-4 justify-content-center">

        @if (isset($items))

        @foreach ($items as $item)

        <div class="item-sale mt-3">
            <div class="TVHotImageWrap">
                <img src="{{ asset ('/storage/'.$item->photo) }}" class="img-item">
                <div class="TVHotDiscount"> {{$item->sale}}</div>
            </div>

            <div class="description TVHotInfoBlock">
                <div class=" header-item mt-3"> {{$item->name}}</div>
                <div class="TVHotStarWrap mt-1 mb-1">
                    @for ($i=1;$i<=$item->star;$i++)
                        <div class="TVHotStar-ES"></div>
                        @endfor
                </div>
                <p>
                    {{$item->country}}<br>
                    {{$item->city}}<br>
                    {{$item->date}}, {{$item->days}}<br>
                </p>
                <p><s>
                        @if (strlen (trim($item->price)) >= 6)
                            {{substr_replace(trim($item->price), " ", 3, 0)}}
                        @elseif (strlen (trim($item->price)) <= 4) 
                            {{substr_replace(trim($item->price), " ", 1, 0)}} 
                        @else 
                            {{substr_replace(trim($item->price), " ", 2, 0)}} 
                        @endif </s> </p> <div class="TVHotPriceBlock">
                            <div class="TVHotNewPrice">


                                @if (strlen (round(intval(str_replace(" ","",$item->price)) - ( intval(str_replace(" ","",$item->price)) * intval( str_replace(" ","",$item->sale)) / 100)))>5)

                                    {{ substr_replace(round(intval(str_replace(" ","",$item->price)) - ( intval(str_replace(" ","",$item->price)) * intval( str_replace(" ","",$item->sale)) / 100)), " ", 3, 0)}}

                                @elseif (strlen (round(intval(str_replace(" ","",$item->price)) - ( intval(str_replace(" ","",$item->price)) * intval( str_replace(" ","",$item->sale)) / 100))) <= 4)
                                    {{ substr_replace(round(intval(str_replace(" ","",$item->price)) - ( intval(str_replace(" ","",$item->price)) * intval( str_replace(" ","",$item->sale)) / 100)), " ", 1, 0)}}
                                @else
                                    {{ substr_replace(round(intval(str_replace(" ","",$item->price)) - ( intval(str_replace(" ","",$item->price)) * intval( str_replace(" ","",$item->sale)) / 100)), " ", 2, 0)}}
                                @endif
                            </div>
            </div>
            <button class="btn btn-success btn-block send" data-item="{{ $item->id }}" data-toggle="modal" data-target="#itemModal">Выбрать</button>
        </div>
    </div>
    @endforeach

    @endif

</div>
</div>

<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Форма заявки</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/sendhtmlemail">
                    @csrf
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
                        <div class="g-recaptcha" data-sitekey="6LeI_NkUAAAAANlFA0mCCnlRXeBsrMSqM7NLtG8z"></div>
                        <div class="errCapt"></div>
                        <input type="hidden" name="id" id="id" value="">
                        <button type="submit" class="btn btn-primary" id="send">Оставить заявку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('footer')
<script>
    $('.send').click(function() {
        $('#id').val($(this).data('item'));
    });
</script>

@endsection