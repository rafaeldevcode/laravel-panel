@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action::handle($method)->type }} configurações" />
@endsection

@section('content')
    @include("admin/settings/body/form")
@endsection
