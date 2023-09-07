@extends('adminlte::page')

@section('plugins.jQuery UI', true)
@section('plugins.select2', true)
@section('plugins.toastr', true)

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
        <form id="formsetting" action="{{ route('bot.accounts.update.settings', $account) }}" method="post">
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
            async save(evt) {
                evt.preventDefault();
                let response = await fetch("{{ route('bot.accounts.update.settings', $account) }}",{
                    method: 'PUT',
                    cache: "no-cache",
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    redirect: 'error',
                    body: await JSON.stringify(this.params),
                });

                if(response.status == 200) {
                    toastr.success('Configurações Salvas com Sucesso');
                } else {
                    toastr.error('Configurações não foram salvas. Recarregue a pagina');
                }
            },
            numberLimit(evt) {
                let number = parseInt(evt.target.value);
                let maxValue = parseInt(evt.target.getAttribute('data-maxvalue'));
                if(number > maxValue) {
                    evt.target.value = maxValue;
                }
            },
            fgApplyAll(evt) {
                let list = Object.keys(this.params.eventSettings.guildFest.gfMissionComplete.missionsToComplete_);
                list.map(index => {
                    if(this.fg.minOrMax == 1) {
                        this.params.eventSettings.guildFest.gfMissionComplete.missionsToComplete_[index].TakeIfHigherThanPoints = this.fg.valueForAll;
                    } else {
                        this.params.eventSettings.guildFest.gfMissionComplete.missionsToComplete_[index].MaxPoints = this.fg.valueForAll;
                    }
                });
            },
            emptyString(value) {
                if(value == undefined) {
                    return '';
                }
                return value;
            },
            troopsChapter: 7,
            open: true,
            fg: {
                valueForAll: 100,
                minOrMax: 1
            },
            missionsNames: {{ Js::from($missionsNames) }},
            params: {{ Js::from($account->params) }},
            monsters: [
                {index: '0', name: 'Frostwing', strongAgainst: 'Físico e Magico'},
                {index: '1', name: 'Gargantua', strongAgainst: 'Alto PDEF'},
                {index: '2', name: 'Snow Beast', strongAgainst: 'Alto MDEF'},
                {index: '3', name: 'Jade Wyrm', strongAgainst: 'Alto PDEF'},
                {index: '4', name: 'Gryphon', strongAgainst: 'Físico e Magico'},
                {index: '5', name: 'Mega Maggot', strongAgainst: 'Alto PDEF'},
                {index: '6', name: 'Terrorthorn', strongAgainst: 'Alto MDEF'},
                {index: '7', name: 'Hell Drider', strongAgainst: 'Physical and Magic'},
                {index: '8', name: 'Noceros', strongAgainst: 'High PDEF'},
                {index: '9', name: 'Grim Reaper', strongAgainst: 'High MDEF'},
                {index: '10', name: 'Saberfang', strongAgainst: 'High PDEF'},
                {index: '11', name: 'Hardrox', strongAgainst: 'High PDEF'},
                {index: '12', name: 'Pumpkinator', strongAgainst: 'Physical and Magic'},
                {index: '13', name: 'Tidal Titan', strongAgainst: 'High PDEF'},
                {index: '14', name: 'Bon Appeti', strongAgainst: 'High MDEF'},
                {index: '15', name: 'Queen Bee', strongAgainst: 'High MDEF'},
                {index: '16', name: 'Blackwing', strongAgainst: 'High MDEF'},
                {index: '17', name: 'Mecha Trojan', strongAgainst: 'High PDEF'},
                {index: '18', name: 'Serpent Gladiator', strongAgainst: 'High PDEF'},
                {index: '19', name: 'Necrosis', strongAgainst: 'High PDEF'},
                {index: '20', name: 'Goblin', strongAgainst: 'Physical and Magic'},
            ],
        }
    }
</script>
@endpush
