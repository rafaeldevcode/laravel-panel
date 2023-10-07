@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action::handle($method)->type }} menus" />
@endsection

@section('content')
    @include("admin/menus/body/{$body}")
@endsection
