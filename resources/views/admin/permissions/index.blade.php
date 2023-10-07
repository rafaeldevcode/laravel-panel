@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action::handle($method)->type }} permissões" />
@endsection

@section('content')
    @include("admin/permissions/body/{$body}")
@endsection
