@extends('main')

@section('metasConfig')
    <x-meta-config title='Listar menus' description='' />
@endsection

@section('content')
    @include("admin/gallery/body/read")
@endsection
