@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action::handle($method)->type }} usuários" />
@endsection

@section('content')
    @include("admin/users/body/{$body}")
@endsection

