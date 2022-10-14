@extends('layout') <!-- подгружаю лайаут-->

@section('title')
    Товары
@endsection

<!-- вставляю свой html   -->
@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Товары бренда</h1>
        <p class="fs-5 text-muted">Список товары выбранного бренда</p>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Товар</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        <?$i=0;?>
        @foreach($goods as $row)
            <?$i++;?>

            <tr>
                <th scope="row"><?=$i;?></th>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td><a href="{{route('update_goods', $row->id)}}" class="btn btn-success">Обновить</a>
                    <a href="{{route('remove_goods', $row->id)}}" class="btn btn-danger">Удалить</a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

@endsection()
