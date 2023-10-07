@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action::handle($method)->type }} galeria" />
@endsection

@section('content')
    @include("admin/gallery/body/read")
@endsection
