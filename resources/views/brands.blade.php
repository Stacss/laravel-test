@extends('layout') <!-- подгружаю лайаут-->

@section('title')
    Бренды товаров
@endsection


<!-- вставляю свой html   -->
@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Бренды товаров</h1>
        <p class="fs-5 text-muted">Таблица брендов товаров</p>
    </div>
@include('message')
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <a href="/form_add_brand" class="btn btn-success">Добавить</a>

        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Бренд</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        <?$i=0;?>
        @foreach($brands as $row)
            <?$i++;?>

            <tr>
                <th scope="row"><?=$i;?></th>
                <td>{{$row->id}}</td>
                <td>{{$row->brand}}</td>
                <td><a href="{{route('update_brand', $row->id)}}" class="btn btn-success">Обновить</a>
                    <a href="{{route('remove_brand', $row->id)}}" class="btn btn-danger">Удалить</a>
                    <a href="{{route('count_goods', $row->id)}}" class="btn btn-info">Посмотреть товары</a>

                </td>

            </tr>

        @endforeach

        </tbody>
    </table>




@endsection()
