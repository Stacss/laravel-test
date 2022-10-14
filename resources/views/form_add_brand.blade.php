@extends('layout') <!-- подгружаю лайаут-->

@section('title')
    Форма добавление бренда
@endsection

<!-- вставляю свой html   -->
@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Добавление брендов</h1>
    </div>

    @if($errors->any())

        <div>
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>

    @endif

@include('message')

        <form action="add_brand" method="post">

            @csrf

            <input type="text" name="brand" placeholder="Название бренда" class="form-control">
            <button type="submit" class="btn btn-success" style="margin: 10px">Добавить</button>
        </form>

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
                <td><a href="{{route('update_brand', $row->id)}}" class="btn btn-success">Обновить</a> <a href="{{route('remove_brand', $row->id)}}" class="btn btn-danger">Удалить</a></td>
            </tr>

        @endforeach

        </tbody>
    </table>

@endsection()
