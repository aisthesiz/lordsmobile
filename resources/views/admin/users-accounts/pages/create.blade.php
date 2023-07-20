@extends('adminlte::page')

@section('title',"Contas Lord Mobile")

@section('content_header')
    <h1>Criar uma conta para {{ $user->name }}</h1>
@stop

@section('content')

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.user.accounts.index', $user) }}">Contas</a></li>
            </ol>
        </nav>
    </div>

    @include('admin.includes.alert')

    <div class="card">
        <form action="{{ route('admin.user.accounts.store', $user) }}" method="post" class="form" autocomplete="off">
            @csrf
            <div class="card-header">
                <h5>{{ __('Basic Information') }}</h5>
            </div>
            <div class="card-body">
                @include('admin.users-accounts.includes.form')
            </div>
            <div class="card-footer">
                <x-adminlte-button theme="primary" type="submit" label="{{ __('Save') }}" icon="fas fa-save"/>
            </div>
        </form>
    </div>
@stop
