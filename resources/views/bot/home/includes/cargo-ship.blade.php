
<div class="card-body">

    <div class="row">
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.allowTrading"
                    x-model="params.cargoShipSettings.allowTrading">
                <label for="params.cargoShipSettings.allowTrading" class="custom-control-label font-weight-light">Trocar itens do navio de carga</label>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Opções de Troca</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.exchangeRssItemOnly"
                            x-model="params.cargoShipSettings.exchangeRssItemOnly">
                        <label for="params.cargoShipSettings.exchangeRssItemOnly" class="custom-control-label font-weight-light">Trocar apenas itens de recurso</label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.useRssFromBagIfNeeded"
                            x-model="params.cargoShipSettings.useRssFromBagIfNeeded">
                        <label for="params.cargoShipSettings.useRssFromBagIfNeeded" class="custom-control-label font-weight-light">Use recurso do saco, se necessário</label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">
                    <div class="form-group-inline">
                        <label class="font-weight-light">Estrelas minímas do Item</label>
                        <input type="number" step="1" class="form-control-sm" id="params.cargoShipSettings.exchangeMinQuality"
                            x-model.number="params.cargoShipSettings.exchangeMinQuality">
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">Recursos para Negociar:</div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.tradeFood"
                            x-model="params.cargoShipSettings.tradeFood">
                        <label for="params.cargoShipSettings.tradeFood" class="custom-control-label font-weight-light">Comida</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.tradeStone"
                            x-model="params.cargoShipSettings.tradeStone">
                        <label for="params.cargoShipSettings.tradeStone" class="custom-control-label font-weight-light">Pedra</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.tradeWood"
                            x-model="params.cargoShipSettings.tradeWood">
                        <label for="params.cargoShipSettings.tradeWood" class="custom-control-label font-weight-light">Madeira</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.tradeOre"
                            x-model="params.cargoShipSettings.tradeOre">
                        <label for="params.cargoShipSettings.tradeOre" class="custom-control-label font-weight-light">Minério</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.tradeGold"
                            x-model="params.cargoShipSettings.tradeGold">
                        <label for="params.cargoShipSettings.tradeGold" class="custom-control-label font-weight-light">Ouro</label>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-12">Não Negociar</div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreFood"
                            x-model="params.cargoShipSettings.ignoreFood">
                        <label for="params.cargoShipSettings.ignoreFood" class="custom-control-label font-weight-light">Comida</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreStone"
                            x-model="params.cargoShipSettings.ignoreStone">
                        <label for="params.cargoShipSettings.ignoreStone" class="custom-control-label font-weight-light">Pedra</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreWood"
                            x-model="params.cargoShipSettings.ignoreWood">
                        <label for="params.cargoShipSettings.ignoreWood" class="custom-control-label font-weight-light">Madeira</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreOre"
                            x-model="params.cargoShipSettings.ignoreOre">
                        <label for="params.cargoShipSettings.ignoreOre" class="custom-control-label font-weight-light">Minério</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreGold"
                            x-model="params.cargoShipSettings.ignoreGold">
                        <label for="params.cargoShipSettings.ignoreGold" class="custom-control-label font-weight-light">Ouro</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreAnima"
                            x-model="params.cargoShipSettings.ignoreAnima">
                        <label for="params.cargoShipSettings.ignoreAnima" class="custom-control-label font-weight-light">Anima</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreLunite"
                            x-model="params.cargoShipSettings.ignoreLunite">
                        <label for="params.cargoShipSettings.ignoreLunite" class="custom-control-label font-weight-light">Lunita</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.cargoShipSettings.ignoreSpeedUp"
                            x-model="params.cargoShipSettings.ignoreSpeedUp">
                        <label for="params.cargoShipSettings.ignoreSpeedUp" class="custom-control-label font-weight-light">Aceleradores</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>