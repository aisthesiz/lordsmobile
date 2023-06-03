@extends('adminlte::page')

@section('title', 'Contar a Venda')

@section('content_header')
    <h1>{{ __('Create a new') }} Contas a Venda</h1>
@stop

@section('content')
    @include('admin.includes.alert')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Different Width</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">

            @include('admin.accounts-sales.includes.form')

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Cadastrar</button>
        </div>
    </div>
@stop
