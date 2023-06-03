@extends('adminlte::page')

@section('title', "Contas Lord Mobile")

@section('plugins.select2', true)

@section('content_header')
    <h1>{{ __('Edit') }} Contas Lord Mobile</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-head">{{ $account->lord_account_id }}</div>
        <form action="{{ route('admin.accounts.update.settings', $account) }}" method="post" class="form">
            @csrf
            @method('put')

            {{-- @dd(json_decode(json_encode($settings), true)); --}}

            <label>
                <span>gatherResources</span>
                <input type="hidden"
                    name="setting[gatherSettings][gatherResources]"
                    value="false" />
                <input
                    type="checkbox"
                    name="setting[gatherSettings][gatherResources]"
                    value="true"
                />
            </label>
            <div class="card-footer"></div>
            <button type="submit" class="btn btn-info">Salvar</button>
        </form>
    </div>
@stop
