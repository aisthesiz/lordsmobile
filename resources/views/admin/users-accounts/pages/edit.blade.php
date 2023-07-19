@extends('adminlte::page')

@section('title', "Contas Lord Mobile")

@section('plugins.select2', true)

@section('content_header')
    <h1>{{ __('Edit') }} Contas Lord Mobile</h1>
@stop

@section('content')
    <div class="card">
        {{-- @dd(
            app()->environment(),
            env('APP_NAME'),
            env('APP_ENV'),
            env('APP_KEY'),
            route('admin.user.accounts.update', [$user, $account]),
            app()->environment('local')
        ) --}}
        <form action="{{ route('admin.user.accounts.update', [$user, $account]) }}" method="post" class="form">
            @csrf
            @method('put')
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
