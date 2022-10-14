@extends('layout') <!-- подгружаю лайаут-->

@section('title')
    Редактирование товара
@endsection


<!-- вставляю свой html   -->
@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Редактирование товара {{$data->name}}</h1>
    </div>
    @include('message')




    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <form action="{{route('update_goods', $data->id)}}" method="post">
                @csrf

                <label for="brand_id">Бренд товара (обязательно для заполнения)</label>
                <select name="brand_id" id="brand_id" class="form-select">
                    <option selected value="{{$brand_id}}"> {{$brand_name}}</option>

                    @foreach($brand as $row)

                        <option value="{{$row->id}}">{{$row->brand}}</option>

                    @endforeach

                </select>

                <input type="text" name="goods" value="{{$data->name}}" placeholder="Название бренда" class="form-control">
                <button type="submit" class="btn btn-success" style="margin: 10px">Редактировать</button>
            </form>
        </div>
        <div class="col-lg-6 col-xs-12">
            <a href="/goods" class="btn btn-info">Назад к списку товаров</a>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Бренд</th>
            <th scope="col">Наименование</th>

        </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row">1</th>
                <td>{{$data->id}}</td>
                <td>{{$brand_name}}</td>
                <td>{{$data->name}}</td>

            </tr>

        </tbody>
    </table>




@endsection()

