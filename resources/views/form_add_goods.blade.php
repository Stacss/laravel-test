
@extends('layout') <!-- подгружаю лайаут-->

@section('title')
    Добавление бренда
@endsection


<!-- вставляю свой html   -->
@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Добавление товаров</h1>

    </div>

    @if($errors->any())

        <div>
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>

    @endif
@include('message')

        <form action="add_goods" method="post">
            @csrf
            <label for="brand_id">Бренд товара (обязательно для заполнения)</label>
            <select name="brand_id" id="brand_id" class="form-select">
                <option selected value="">Выберите Бренд</option>

                @foreach($brand as $row)

                    <option value="{{$row->id}}">{{$row->brand}}</option>

                @endforeach

            </select>
            <label for="goods">Наименование товара</label>
            <input type="text" name="goods" id="goods" placeholder="Наименование товара" class="form-control">
            <button type="submit" class="btn btn-success" style="margin: 10px">Добавить</button>
        </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Бренд</th>
            <th scope="col">Товар</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        <?$i=0;?>

        @foreach($name as $row)

            <?$i++;?>

            <tr>
                <th scope="row"><?=$i;?></th>
                <td>{{$row->id}}</td>
                <td>
                    @foreach($brand as $rowBrand)
                        @if ($rowBrand->id == $row->brand_id )
                            {{$rowBrand->brand}}
                        @endif
                    @endforeach
                </td>
                <td>{{$row->name}}</td>
                <td><a href="{{route('update_goods', $row->id)}}" class="btn btn-success">Обновить</a> <a href="{{route('remove_goods', $row->id)}}" class="btn btn-danger">Удалить</a></td>
            </tr>

        @endforeach

        </tbody>

    </table>




@endsection()
