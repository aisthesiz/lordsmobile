@extends('adminlte::page')

@section('title', 'Transferir Contas')

@push('css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content_header')
    <h1>
        Transferir Conta
    </h1>
@stop

@section('content')
    @include('admin.includes.alert')

    <div class="card" x-data="transferAccount">
        <div class="card-header">
            <x-adminlte-input name="lord_account_id" type="number" label="Buscar IGG" placeholder="IGG" igroup-size="sm"
                x-model.number="igg"
            >
                <x-slot name="appendSlot">
                    <x-adminlte-button theme="outline-danger" label="Buscar" x-on:click="searchByIgg"/>
                </x-slot>
                <x-slot name="prependSlot">
                    <div class="input-group-text text-danger">
                        <i class="fas fa-search"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="card-body">
            <div>
                Conta: <span x-text="accountFound.igg"></span><br>
                Usuario: <span x-text="accountFound.user_name"></span><br>
                Usuario Email: <span x-text="accountFound.user_email"></span><br>
            </div>
        </div>

        <div class="card-body border-top">
            <div>
                <x-adminlte-select name="optionsTest1" label="Novo Usuário" x-model.number="newOnner">
                    <option value="0">Selecione um novo usuário</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->email }}</option>
                    @endforeach
                </x-adminlte-select>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-danger" x-on:click="transfer">Tranferir</button>
        </div>
    </div>
@stop

<script>
    function transferAccount() {
        return {
            igg: 0,
            accountFound: {},
            newOnner: 0,
            async searchByIgg(evt) {
                this.accountFound = {};
                const response = await fetch(
                    `{{ route('admin.ajax.account-transfer.find') }}?account=${this.igg}`, {
                        method: 'GET',
                        cache: "no-cache",
                        headers: {
                            "Accept"      : "application/json",
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        redirect: 'error',
                    }
                );
                if (response.status !== 200) {
                    let error = await response.json();
                    alert(error.message);
                    return;
                }
                const account = await response.json();
                this.accountFound = account;
            },
            async transfer() {
                if(this.accountFound.account == undefined) {
                    alert('Selecione uma conta');
                    return;
                }
                if(this.newOnner == undefined || this.newOnner == 0) {
                    alert('Selecione um usuário');
                    return;
                }
                // const formData = new FormData();
                // formData.append('id', this.accountFound.account);
                // formData.append('user_id', this.newOnner);

                const formData = await JSON.stringify({id: this.accountFound.account, user_id: this.newOnner});
                let response = await fetch(
                    `{{ route('admin.ajax.account-transfer.transfer') }}`, {
                        method: 'PUT',
                        cache: "no-cache",
                        headers: {
                            "Accept"      : "application/json",
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        body: formData,
                        redirect: 'error',
                    },
                );
                if(response.status !== 200) {
                    let error = await response.json();
                    alert(error.message);
                    return;
                }
                let result = await response.json();
                alert(result.message);
                this.reset();
            },
            reset() {
                this.accountFound = {};
                this.newOnner = 0;
            }
        }
    }
</script>