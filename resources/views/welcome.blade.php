@extends('layout') <!-- подгружаю лайаут-->


<!-- вставляю свой html   -->
@section('title')
    Главная страница
@endsection

@section('main_content')

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Работа с товарами</h1>
        <p class="fs-5 text-muted">Перейдя по кнопке ниже можно ознакомиться с различными товарами и их брендами.</p>
        <a href="/all_tables" class="btn btn-primary">Посмотреть</a>
    </div>

@endsection()
