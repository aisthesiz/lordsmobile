
<div class="card-body">

    <div class="row">
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.heroSettings.autoHireHeros"
                    x-model="params.heroSettings.autoHireHeros">
                <label for="params.heroSettings.autoHireHeros" class="custom-control-label font-weight-light">Contrate Novos Heroes</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.heroSettings.autoEnhanceHeros"
                    x-model="params.heroSettings.autoEnhanceHeros">
                <label for="params.heroSettings.autoEnhanceHeros" class="custom-control-label font-weight-light">Aprimorar Heroes</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.heroSettings.useLevelUpItems"
                    x-model="params.heroSettings.useLevelUpItems">
                <label for="params.heroSettings.useLevelUpItems" class="custom-control-label font-weight-light">Usar Itens Exp Heroes</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.heroSettings.autoUpgradeHeros"
                    x-model="params.heroSettings.autoUpgradeHeros">
                <label for="params.heroSettings.autoUpgradeHeros" class="custom-control-label font-weight-light">Atualizar Heroes</label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.heroSettings.reviveDeadLeader"
                    x-model="params.heroSettings.reviveDeadLeader">
                <label for="params.heroSettings.reviveDeadLeader" class="custom-control-label font-weight-light">Reviver o Lider Morto</label>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">Configuração de Palco</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.heroStageSettings.AutoAttackHeroStages"
                            x-model="params.heroStageSettings.AutoAttackHeroStages">
                        <label for="params.heroStageSettings.AutoAttackHeroStages" class="custom-control-label font-weight-light">Fases do heroes de ataque automático</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.heroSettings.useBraveheartItems"
                            x-model="params.heroSettings.useBraveheartItems">
                        <label for="params.heroSettings.useBraveheartItems" class="custom-control-label font-weight-light">Use itens carações valentes</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    Heroes para usar:
                </div>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.heroStageSettings.heroSelection" value="3" 
                            x-model.number="params.heroStageSettings.heroSelection"/>
                        <label class="form-check-label font-weight-light" for="params.heroStageSettings.heroSelection">Mais alto aprimorado</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.heroStageSettings.heroSelection" value="2"
                            x-model.number="params.heroStageSettings.heroSelection"/>
                        <label class="form-check-label font-weight-light" for="params.heroStageSettings.heroSelection">Enviar nível mais alto</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.heroStageSettings.heroSelection" value="1"
                            x-model.number="params.heroStageSettings.heroSelection"/>
                        <label class="form-check-label font-weight-light" for="params.heroStageSettings.heroSelection">Nivel mais alto</label>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    Estagio de ataque sequencialmente:
                </div>
                <div class="col-sm-6">
                    <select class="col-sm-3" x-model="params.heroStageSettings.seqAttackStageType">
                        <option value="0">Normal</option>
                        <option value="1">Elite</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.heroStageSettings.selectedChapter.QuickFightStage"
                            x-model="params.heroStageSettings.selectedChapter.QuickFightStage">
                        <label for="params.heroStageSettings.selectedChapter.QuickFightStage" class="custom-control-label font-weight-light">Varredura 1x</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.heroStageSettings.selectedChapter.useVipSweep"
                            x-model="params.heroStageSettings.selectedChapter.useVipSweep">
                        <label for="params.heroStageSettings.selectedChapter.useVipSweep" class="custom-control-label font-weight-light">Varredura 10x</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.heroStageSettings.priorityMode"
                            x-model="params.heroStageSettings.priorityMode">
                        <label for="params.heroStageSettings.priorityMode" class="custom-control-label font-weight-light">Usar prioridade herios</label>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <div class="card">
        <div class="card-header">
            Configuracoes do Caliseu
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.arenaSettings.attackArena"
                            x-model="params.arenaSettings.attackArena">
                        <label for="params.arenaSettings.attackArena" class="custom-control-label font-weight-light">Coliseu de ataque automático</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.arenaSettings.attackGuildmates"
                            x-model="params.arenaSettings.attackGuildmates">
                        <label for="params.arenaSettings.attackGuildmates" class="custom-control-label font-weight-light">Atacar aliádos da guilda</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.arenaSettings.collectGems"
                            x-model="params.arenaSettings.collectGems">
                        <label for="params.arenaSettings.collectGems" class="custom-control-label font-weight-light">Colete gemas da areana</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.arenaSettings.buyExtraAttempts"
                            x-model="params.arenaSettings.buyExtraAttempts">
                        <label for="params.arenaSettings.buyExtraAttempts" class="custom-control-label font-weight-light">Compre tentativas extras (usar gemas)</label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group-inline-sm">
                        <label for="params.arenaSettings.minWinChance" class="font-weight-light">Chace de vencer: Min %</label>
                        <input type="number" step="1" class="sm" id="params.arenaSettings.minWinChance"
                            x-model.number="params.arenaSettings.minWinChance">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group-inline-sm">
                        <label for="params.arenaSettings.maxWinChance" class="font-weight-light">Max %</label>
                        <input type="number" step="1" class="sm" id="params.arenaSettings.maxWinChance"
                            x-model.number="params.arenaSettings.maxWinChance">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">Heroes para usar:</div>
                <div class="col-sm-3">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.arenaSettings.arenaHeroType" value="-" disabled="disabled"
                            x-model.number="params.arenaSettings.arenaHeroType"/>
                        <label class="form-check-label font-weight-light" for="params.arenaSettings.arenaHeroType">Selecionar Heroes</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.arenaSettings.arenaHeroType" value="2" 
                            x-model.number="params.arenaSettings.arenaHeroType"/>
                        <label class="form-check-label font-weight-light" for="params.arenaSettings.arenaHeroType">Selecionado Automaticamente</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.arenaSettings.arenaHeroType" value="1" 
                            x-model.number="params.arenaSettings.arenaHeroType"/>
                        <label class="form-check-label font-weight-light" for="params.arenaSettings.arenaHeroType">Mehores Heroes</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-3">Defensores a serem usados:</div>
                <div class="col-sm-3">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.arenaSettings.arenaDefenderType" value="0"
                            x-model.number="params.arenaSettings.arenaDefenderType"/>
                        <label class="form-check-label font-weight-light" for="params.arenaSettings.arenaDefenderType">Nao mudar</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.arenaSettings.arenaDefenderType" value="1" 
                            x-model.number="params.arenaSettings.arenaDefenderType"/>
                        <label class="form-check-label font-weight-light" for="params.arenaSettings.arenaDefenderType">Selecionado Automaticamente</label>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>