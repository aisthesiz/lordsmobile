@extends('adminlte::page')

@section('title', "Contas Lord Mobile")

@section('content_header')
    <h1>{{ __('Edit') }} Contas Lord Mobile</h1>
@stop

@section('content')

<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('bot.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('bot.index') }}">Contas</a></li>
        </ol>
      </nav>
</div>

@include('admin.includes.alert')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Contas Lord Mobile</h3>
        <div class="card-tools">
            {!! $accounts->links() !!}
        </div>
    </div>

    <div class="card-body p-0 table-responsive w-1/1">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 30px">No.</th>
                    <th style="width: 30px">Nome</th>
                    <th style="width: 30px">Ativa</th>
                    <th style="width: 100px">Inicio</th>
                    <th style="width: 100px">Final</th>
                    <th style="width:120px">Visualizar</th>
                </tr>
            </thead>
            <tbody>
            @foreach($accounts as $item)
                <tr>
                    <td class="align-middle">{{ $loop->index + 1 }}</td>
                    <td class="align-middle"><a href="{{ route('bot.accounts.show', $item->id) }}">{{ $item->name }}</a></td>
                    <td class="align-middle">
                        @if($item->is_active === true)
                            🟢
                        @else
                            🔴
                        @endif
                    </td>
                    <td class="align-middle">{{ $item->time_start?->format('d/m/Y') ?? '-' }}</td>
                    <td class="align-middle">{{ $item->time_end?->format('d/m/Y') ?? '-' }}</td>
                    <td class="align-middle">
                        <a href="{{ route('bot.accounts.show', $item->id) }}" class="btn text-green border"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
