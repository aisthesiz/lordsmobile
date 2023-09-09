@extends('adminlte::page')

@section('title', __('Users'))

@section('content_header')
    <h1>
        <a href="{{ route('admin.users.index') }}">Usuários</a>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
    </h1>

@stop

@section('content')
    @include('admin.includes.alert')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <form action="{{ route('admin.users.index') }}">
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
                {!! $users->links() !!}
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 300px">Nome</th>
                    <th style="width: 40%">Email</th>
                    <th style="width:120px">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form class="form form-inline" action="{{ route('admin.users.destroy', $user->id) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <div class="form-group clearfix">
                                    <a class="btn text-blue" href="{{ route('admin.users.edit', $user->id) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <a class="btn text-blue" href="{{ route('admin.user.accounts.index', $user) }}"><i
                                            class="fas fa-file-invoice"></i></a>
                                    <button type="submit" class="btn text-red"
                                            href="{{ route('admin.users.edit', $user->id) }}"><i
                                            class="fas fa-user-times"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {!! $users->links() !!}
        </div>
    </div>
@stop
