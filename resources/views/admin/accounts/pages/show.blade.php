@extends('adminlte::page')

@section('plugins.jQuery UI', true)
@section('plugins.select2', true)

@section('title', "Contas Lord Mobile")

@push('css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content_header')
    <h1>{{ __('Edit') }} #{{ $account->lord_account_id }}</h1>
@stop

@section('content')

@include('admin.includes.alert')

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('bot.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('bot.index') }}">Contas</a></li>
            <li class="breadcrumb-item active" aria-current="page">#{{ $account->lord_account_id }}</li>
        </ol>
      </nav>
</div>

<div x-data="init">
    <div class="card">

        @include('bot.home.includes.tabs')

        <div class="card-footer">
            <button class="btn btn-info" x-on:click="save($event)">Salvar</button>
        </div>
    </div>

    <div x-show="false" x-cloak>
        <form id="formsetting" action="{{ route('admin.accounts.update.settings', $account) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="params" id="all-settings" />
        </form>
    </div>
</div>
@stop

@push('js')
<script>

    $( function() {
        $( "#tabs" ).tabs();
    } );

    function init() {
        return {
            open: true,
            params: {!! json_encode($account->params) !!},
            async save(evt) {
                document.getElementById('all-settings').value = await JSON.stringify(this.params);
                document.getElementById('formsetting').submit();
            }
        }
    }
</script>
@endpush
