@extends('adminlte::page')

@section('content')

    <x-adminlte-small-box title="{{ $totalAccounts }}" text="Contas" icon="fas fa-file-invoice text-dark"
        theme="teal" url="#" url-text="Contas"/>

    <x-adminlte-small-box title="{{ $totalAccountsActivate }}" text="Contas Ativas" icon="fas fa-eye text-dark"
        theme="teal" url="#" url-text="Contas Ativas"/>

    <x-adminlte-small-box title="{{ $totalUsers }}" text="Usuários" icon="fas fa-user text-dark"
        theme="teal" url="{{ route('admin.users.index') }}" url-text="Usuarios"/>

    <x-adminlte-small-box title="{{ $totalAccountsWillInactiveIn15DaysOrLess }}" text="Contas que faltam 15 dias para vencer" icon="fas fa-user text-dark"
        theme="warning" url="{{ route('admin.accounts.index') }}?time_end={{ now()->addDays(15)->format('Y-m-d') }}" url-text="Contas que faltam 15 dias para vencer"/>

@stop