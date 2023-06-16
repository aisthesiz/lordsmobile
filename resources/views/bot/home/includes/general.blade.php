
<div class="card-body">

    <div class="card">
        <div class="card-header">
            Aceleração
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.useSpeedUps"
                            x-model="params.speedUpSettings.useSpeedUps">
                        <label for="params.speedUpSettings.useSpeedUps" class="custom-control-label">Usar Aceleração</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoBuildingSpeedUp"
                            x-model="params.speedUpSettings.autoBuildingSpeedUp">
                        <label for="params.speedUpSettings.autoBuildingSpeedUp" class="custom-control-label">Edifícios</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoResearchSpeedUp"
                            x-model="params.speedUpSettings.autoResearchSpeedUp">
                        <label for="params.speedUpSettings.autoResearchSpeedUp" class="custom-control-label">Pesquisa</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoTrainingSpeedUp"
                            x-model="params.speedUpSettings.autoTrainingSpeedUp">
                        <label for="params.speedUpSettings.autoTrainingSpeedUp" class="custom-control-label">Treinamento</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoHealingSpeedUp"
                            x-model="params.speedUpSettings.autoHealingSpeedUp">
                        <label for="params.speedUpSettings.autoHealingSpeedUp" class="custom-control-label">Cura</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoTrapSpeedUp"
                            x-model="params.speedUpSettings.autoTrapSpeedUp">
                        <label for="params.speedUpSettings.autoTrapSpeedUp" class="custom-control-label">Traps</label>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoMergingSpeedUp"
                            x-model="params.speedUpSettings.autoMergingSpeedUp">
                        <label for="params.speedUpSettings.autoMergingSpeedUp" class="custom-control-label">Fusão de Pacto</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoLunarGearSpeedUp"
                            x-model="params.speedUpSettings.autoLunarGearSpeedUp">
                        <label for="params.speedUpSettings.autoLunarGearSpeedUp" class="custom-control-label">Lunar Gear</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoWallSpeedUp"
                            x-model="params.speedUpSettings.autoWallSpeedUp">
                        <label for="params.speedUpSettings.autoWallSpeedUp" class="custom-control-label">Reparação Muralha</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoTrapRepairSpeedUp"
                            x-model="params.speedUpSettings.autoTrapRepairSpeedUp">
                        <label for="params.speedUpSettings.autoTrapRepairSpeedUp" class="custom-control-label">Reparação de Armadilha</label>
                    </div>
                </div>
            </div>


            <div class="row mt-2">
                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.autoGearSpeedUp"
                            x-model="params.speedUpSettings.autoGearSpeedUp">
                        <label for="params.speedUpSettings.autoGearSpeedUp" class="custom-control-label">Equip</label>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.generalForBuildOnly"
                            x-model="params.speedUpSettings.generalForBuildOnly">
                        <label for="params.speedUpSettings.generalForBuildOnly" class="custom-control-label">Use velocidades nromais apenas para construção</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.speedUpSettings.waitForHelp"
                            x-model="params.speedUpSettings.waitForHelp">
                        <label for="params.speedUpSettings.waitForHelp" class="custom-control-label">Aguarde até que a ajuda esteja completa</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="params.speedUpSettings.maxSpeedUpExcess">Max Acelerador Excesso</label>
                        <input type="text" class="form-control" id="params.speedUpSettings.maxSpeedUpExcess"
                            x-model="params.speedUpSettings.maxSpeedUpExcess">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Avançado</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="params.connectionSettings.otherLoginTime">Outro tempo de reconexão de login (em segundos)</label>
                        <input type="number" step="1" class="form-control" id="params.connectionSettings.otherLoginTime"
                            x-model.number="params.connectionSettings.otherLoginTime">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>