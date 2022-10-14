@extends('layout') <!-- подгружаю лайаут-->

@section('title')
    Авто
@endsection


<!-- вставляю свой html   -->
@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Товары</h1>
        <p class="fs-5 text-muted">Выберете необходимую табдицу для работы.</p>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <p>переход в таблицу брендов</p>
            <a href="/brands" class="btn btn-secondary">Бренды</a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <p>переход в таблицу товаров</p>
            <a href="/braтds" class="btn btn-secondary">Товары</a>
        </div>
    </div>

@endsection()
