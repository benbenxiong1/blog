
@extends('layouts.web')

@section('title', '首页')

@section('body')
    @parent

    @include('web.public.heard')

    <div class="container">
        我是身体
    </div>

    @include('web.public.foot')
@endsection

