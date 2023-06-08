@extends('adminlte::page')

@section('title', __('Contas a Venda'))

@section('content_header')
    <h1>{{ __('Contas a Venda') }} <a href="{{ route('admin.accounts-sales.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    </h1>
@stop

@section('content')
    @include('admin.includes.alert')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista de Contas a Venda</h3>
        <div class="card-tools">
            {!! $accountsSales->links() !!}
        </div>
    </div>

    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 100px">#</th>
                    <th style="width: 100px">{{ __('Titulo') }}</th>
                    <th style="width: 100px">{{ __('Might') }}</th>
                    <th style="width: 100px">{{ __('Esp/Arc/Cav') }}</th>
                    <th style="width: 30px">{{ __('Ativa') }}</th>
                    <th style="width:120px">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($accountsSales as $item)
                <tr>
                    <td><img src="{{ Storage::url($item->image_1) }}" width="50px" /></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->might }}</td>
                    <td>{{ $item->stats_sword}}/{{ $item->stats_bow}}/{{ $item->stats_horse}}</td>
                    <td><input type="checkbox" disabled @if($item->is_active === true) checked @endif/></td>
                    <td>
                        <form class="form-inline" action="{{ route('admin.accounts-sales.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('admin.accounts-sales.edit', $item->id) }}" class="btn text-green border"><i class="fa fa-eye"></i></a>
                            <button type="submit" class="btn text-red border"><i class="fa fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
