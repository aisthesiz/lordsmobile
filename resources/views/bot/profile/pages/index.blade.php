@extends('adminlte::page')

@section('title', __('Usuário'))

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')

    @include('admin.includes.alert')

    <div class="card">
        <form action="{{ route('bot.profile') }}" method="post" class="form">
            @csrf
            @method('put')
            <div class="card-header">
                <h5>Informações Básicas</h5>
            </div>
            <div class="card-body">
                    @include('bot.profile.includes.form')
            </div>
            <div class="card-footer">
                <x-adminlte-button theme="primary" type="submit" label="Salvar" icon="fas fa-save"/>
            </div>
        </form>
    </div>
@stop
