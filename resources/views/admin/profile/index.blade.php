@extends('main')

@section('metasConfig')
    <x-meta-config title="{{ $action::handle($method)->type }} perfil" />
@endsection

@section('content')
    @include("admin/profile/body/form")
    @include('admin/profile/partials/profile-popup')
@endsection

@section('scripts')
    <script type="text/javascript">
        getFields();
        showPass();
    </script>
@endsection
