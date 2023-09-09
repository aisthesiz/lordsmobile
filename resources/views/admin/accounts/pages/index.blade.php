@extends('adminlte::page')

@section('title', 'Contas Lord Mobile')

@section('content_header')
    <h1>
        <a href="{{ route('admin.accounts.index') }}">Contas Lord Mobile</a>
    </h1>

@stop

@section('content')
    @include('admin.includes.alert')

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <form action="{{ route('admin.accounts.index') }}">
                    <x-adminlte-input name="q" igroup-size="md" value="{{ $term }}">
                        <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-danger" type="submit" label="Go!"/>
                        </x-slot>
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-danger">
                                <i class="fas fa-search"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </form>
            </div>
            <div class="card-tools">
                {!! $accounts->links() !!}
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 100px">IGG</th>
                    <th style="width: 100px">Nome</th>
                    <th style="width: 100px">Usuário</th>
                    <th style="width: 30px">Ativa</th>
                    <th style="width: 10px">Status</th>
                    <th style="width: 100px">Dt Inicio</th>
                    <th style="width: 100px">Dt Final</th>
                    <th style="width: 100px">Ativo Em</th>
                    <th style="width: 100px">Desativo Em</th>
                </tr>
                </thead>
                <tbody>

                
                @foreach($accounts as $item)
                    <tr>
                        <td><a href="{{ route('admin.users.edit', $item->user->id) }}">{{ $item->user->name }}</a></td>
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
                        <td>{{ $item->activated_at?->format('d/m/Y') ?? '-' }}</td>
                        <td>{{ $item->deactivated_at?->format('d/m/Y') ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
