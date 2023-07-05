@extends('adminlte::page')

@section('adminlte::plugins.select2', true)

@section('title', "Contas Lord Mobile")

@push('css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content_header')
    <h1>{{ __('Edit') }}</h1>
@stop

@section('content')
<div x-data="init">
    <div class="card">
        <div class="card-header">
            Coleta
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.gatherResources"
                            x-model="params.gatherSettings.gatherResources">
                        <label for="params.gatherSettings.gatherResources" class="custom-control-label">Coletar Recurso</label>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Quantidade máx. de exército a reunir</label>
                        <input type="number" step="1" class="form-control" id="params.gatherSettings.maxArmysToSend"
                            x-model.number="params.gatherSettings.maxArmysToSend">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.leaveSpareArmy"
                            x-model="params.gatherSettings.leaveSpareArmy">
                        <label for="params.gatherSettings.leaveSpareArmy" class="custom-control-label">Deixar um Exercito Livre</label>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="params.gatherSettings.spareArmyAmount">Quantidade</label>
                        <input type="number" step="1" class="form-control" id="params.gatherSettings.spareArmyAmount"
                            x-model.number="params.gatherSettings.spareArmyAmount">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <p><b>Opções de Colata</b></p>
                </div>
                <div class="row">
                    
                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="params.gatherSettings.useGatherGear"
                                x-model="params.gatherSettings.useGatherGear">
                            <label for="params.gatherSettings.useGatherGear" class="custom-control-label">Usar Equipamento de Coleta?</label>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="params.gatherSettings.recallCamps"
                                x-model="params.gatherSettings.recallCamps">
                            <label for="params.gatherSettings.recallCamps" class="custom-control-label">Acampamento de recall automático?</label>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="params.gatherSettings.targetHigherLevel"
                                x-model="params.gatherSettings.targetHigherLevel">
                            <label for="params.gatherSettings.targetHigherLevel" class="custom-control-label">Alvo de nivel superior em relação ao mais próximo</label>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="params.gatherSettings.clearTiles"
                                x-model="params.gatherSettings.clearTiles">
                            <label for="params.gatherSettings.clearTiles" class="custom-control-label">Somente coletar campos que tenha capacidade</label>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="params.gatherSettings.ignoreLevelForGems"
                                x-model="params.gatherSettings.ignoreLevelForGems">
                            <label for="params.gatherSettings.ignoreLevelForGems" class="custom-control-label">Ignorar configuracao de nivel para Gema?</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="params.gatherSettings.gatherLowestResources"
                                x-model="params.gatherSettings.gatherLowestResources">
                            <label for="params.gatherSettings.gatherLowestResources" class="custom-control-label">Reunir o recurso com valor mais baixo? (Entre os selecionados)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-1">
                    Nivel:
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.levelToGather[0]"
                            x-model="params.gatherSettings.levelToGather[0]">
                        <label for="params.gatherSettings.levelToGather[0]" class="custom-control-label">1</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.levelToGather[1]"
                            x-model="params.gatherSettings.levelToGather[1]">
                        <label for="params.gatherSettings.levelToGather[1]" class="custom-control-label">2</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.levelToGather[2]"
                            x-model="params.gatherSettings.levelToGather[2]">
                        <label for="params.gatherSettings.levelToGather[2]" class="custom-control-label">3</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.levelToGather[3]"
                            x-model="params.gatherSettings.levelToGather[3]">
                        <label for="params.gatherSettings.levelToGather[3]" class="custom-control-label">4</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.levelToGather[4]"
                            x-model="params.gatherSettings.levelToGather[4]">
                        <label for="params.gatherSettings.levelToGather[4]" class="custom-control-label">5</label>
                    </div>
                </div>

            </div>


            <div class="row mt-4">
                <div class="col-sm-1">
                    Tipos:
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.typesToGather[0]"
                            x-model="params.gatherSettings.typesToGather[0]">
                        <label for="params.gatherSettings.typesToGather[0]" class="custom-control-label">Comida</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.typesToGather[1]"
                            x-model="params.gatherSettings.typesToGather[1]">
                        <label for="params.gatherSettings.typesToGather[1]" class="custom-control-label">Pedra</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.typesToGather[2]"
                            x-model="params.gatherSettings.typesToGather[2]">
                        <label for="params.gatherSettings.typesToGather[2]" class="custom-control-label">Madeira</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.typesToGather[3]"
                            x-model="params.gatherSettings.typesToGather[3]">
                        <label for="params.gatherSettings.typesToGather[3]" class="custom-control-label">Minério</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.typesToGather[4]"
                            x-model="params.gatherSettings.typesToGather[4]">
                        <label for="params.gatherSettings.typesToGather[4]" class="custom-control-label">Ouro</label>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.gatherSettings.typesToGather[5]"
                            x-model="params.gatherSettings.typesToGather[5]">
                        <label for="params.gatherSettings.typesToGather[5]" class="custom-control-label">Gema</label>
                    </div>
                </div>

            </div>


            <div class="row mt-4">
                <div class="col-sm-12">
                    <p><b>Misc</b></p>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Alcance da coleta</label>
                        <input type="number" step="1" class="form-control" id="params.gatherSettings.maxSearchArea"
                            x-model.number="params.gatherSettings.maxSearchArea">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tempo Máximo de Viagem</label>
                        <input type="number" step="1" class="form-control" id="params.gatherSettings.maxWalkTime"
                            x-model.number="params.gatherSettings.maxWalkTime">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Atraso coleta (Segundos)</label>
                        <input type="number" step="1" class="form-control" id="params.gatherSettings.sendingDelay"
                            x-model.number="params.gatherSettings.sendingDelay">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Qtd minima do campo de coleta</label>
                        <input type="number" step="1" class="form-control" id="params.gatherSettings.tileMinimum"
                            x-model.number="params.gatherSettings.tileMinimum">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row">

                        <div class="col-sm-3">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="params.gatherSettings.useGatherSchedule"
                                x-model="params.gatherSettings.useGatherSchedule">
                                <label for="params.gatherSettings.useGatherSchedule" class="custom-control-label">Agendamento de Coleta</label>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Colete entre</label>
                                <input type="time" class="form-control" id="params.gatherSettings.gatherStartTime"
                                    x-model.time="params.gatherSettings.gatherStartTime">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>e</label>
                                <input type="time" class="form-control" id="params.gatherSettings.gatherEndTime"
                                    x-model.time="params.gatherSettings.gatherEndTime">
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div class="card-footer">
            <button class="btn btn-info" x-on:click="save($event)">Salvar</button>
        </div>
    </div>

    <div x-show="false" x-cloak>
        <form id="formsetting" action="{{ route('admin.accounts.update.settings', $account) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="params" id="aasdada" />
        </form>
    </div>
</div>
@stop

@push('js')
<script>
    function init() {
        return {
            open: true,
            params: {!! json_encode($account->params) !!},
            paramss: "",
            async save(evt) {
                // this.paramss = await JSON.stringify(this.params);
                document.getElementById('aasdada').value = await JSON.stringify(this.params);
                document.getElementById('formsetting').submit();
            }
        }
    }
</script>
@endpush