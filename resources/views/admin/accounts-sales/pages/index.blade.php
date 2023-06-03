@extends('adminlte::page')

@section('title', __('Contas a Venda'))

@section('content_header')
    <h1>{{ __('Contas a Venda') }} <a href="{{ route('admin.accounts-sales.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    </h1>
@stop

@section('content')
    @include('admin.includes.alert')
    <ul></ul>
    @foreach ($accountsSales as $accountSell)
        <li><a href="{{ route('admin.accounts-sales.edit', $accountSell->id) }}">{{ $accountSell->title }}</a></li>
    @endforeach
    </ul>
@stop
