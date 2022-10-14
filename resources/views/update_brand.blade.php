@extends('layout') <!-- подгружаю лайаут-->

@section('title')
    Редактирование бренда
@endsection

<!-- вставляю свой html   -->
@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Редактирование бренда {{$data->brand}}</h1>
    </div>
    @include('message')

    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <form action="{{route('update_brand', $data->id)}}" method="post">

                @csrf

                <input type="text" name="brand" value="{{$data->brand}}" placeholder="Название бренда" class="form-control">
                <button type="submit" class="btn btn-success" style="margin: 10px">Редактировать</button>
            </form>
        </div>
        <div class="col-lg-6 col-xs-12">
            <a href="/brands" class="btn btn-info">Назад к списку Брендов</a>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Бренд</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{$data->id}}</td>
                <td>{{$data->brand}}</td>
            </tr>
        </tbody>
    </table>




@endsection()

