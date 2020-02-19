<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Заявка с сайта</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="{{ asset('css/style6.css') }}" rel="stylesheet">
</head>
<body style="margin: 0; padding: 0;">
<div class="container">
    <div class="row">
        <div class="col mt-5">
            ФИО: {{$request->searchName}}<br>
            Телефон: {{$request->searchTel}}<br>
            Коментарий: {{$request->searchComment}}<br>

           <br>
           <h3>Детали заявки</h3>
@if ($items!='')
<table border="1" style="border-collapse: collapse; width: 100%;">
<tbody>
<tr>
<td style="width: 50%;">Наименование тура:</td>
<td style="width: 50%;">{{$items->name}}</td>
</tr>
<tr>
<td style="width: 50%;"> Дата вылета:</td>
<td style="width: 50%;">{{$items->date}}</td>
</tr>
<tr>
<td style="width: 50%;">Количество дней: </td>
<td style="width: 50%;">{{$items->days}}</td>
</tr>
<tr>
<td style="width: 50%;"> Цена со скидкой:</td>
<td style="width: 50%;">{{substr_replace(round(intval( str_replace(" ","",$items->price ))-( intval(str_replace(" ","",$items->price))*intval(str_replace(" ","",$items->sale))/100)), " ", 2, 0)}}</td>
</tr>
<tr>
<td style="width: 50%;"> Процент скидки:</td>
<td style="width: 50%;">{{$items->sale}}</td>
</tr>
</tbody>
</table>
@endif


@if (isset($request->where))
<table border="1" style="width: 100%; border-collapse: collapse;">
<tbody>
<tr>
<td style="width: 50%;">Куда:</td>
<td style="width: 50%;">{{$request->where}}</td>
</tr>
<tr>
<td style="width: 50%;">Период вылета:</td>
<td style="width: 50%;">{{$request->period}}</td>
</tr>
<tr>
<td style="width: 50%;">Ночей:</td>
<td style="width: 50%;">от - {{$request->from}} до - {{$request->to}}</td>
</tr>
<tr>
<td style="width: 50%;">Взрослые:</td>
<td style="width: 50%;">{{$request->people}}</td>
</tr>
<tr>
<td style="width: 50%;">Дети:</td>
<td style="width: 50%;">{{$request->children}}</td>
</tr>
<tr>
<td style="width: 50%;">Питание:</td>
<td style="width: 50%;">{{$request->eat}}</td>
</tr>
<tr>
<td style="width: 50%;">Категория:</td>
<td style="width: 50%;">{{$request->category}}</td>
</tr>
@endif
        </div>
    </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>