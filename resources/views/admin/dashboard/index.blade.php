@extends('main')

@section('metasConfig')
    <x-meta-config title='Dashboard' description='' />
@endsection

@section('content')
    @include("admin/dashboard/body/read")
@endsection
