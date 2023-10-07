@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action::handle($method)->type }} dashboard" />
@endsection

@section('content')
    @include("admin/dashboard/body/read")
@endsection
