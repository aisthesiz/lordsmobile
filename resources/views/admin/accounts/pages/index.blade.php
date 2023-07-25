@extends('adminlte::page')

@section('title', 'Contas Lord Mobile')

@section('content_header')
    <h1>
        Contas Lord Mobile
    </h1>

@stop

@section('content')
    @include('admin.includes.alert')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Contas Lord Mobile</h3>
            <div class="card-tools">
                {!! $accounts->links() !!}
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 100px">#</th>
                    <th style="width: 100px">Usuário</th>
                    <th style="width: 30px">Ativa</th>
                    <th style="width: 10px">Status</th>
                    <th style="width: 100px">Dt Inicio</th>
                    <th style="width: 100px">Dt Final</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accounts as $item)
                    <tr>
                        <td>{{ $item->lord_account_id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td><input type="checkbox" disabled @if($item->is_active === true) checked @endif/></td>
                        <td class="">
                            @if ($item->time_end->lt(now()))
                                🔴
                            @elseif($item->time_end->lt(now()->addDays(15)))
                                🟠
                            @else
                                🟢
                            @endif
                        </td>
                        <td>{{ $item->time_start?->format('d/m/Y') ?? '-' }}</td>
                        <td>{{ $item->time_end?->format('d/m/Y') ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
