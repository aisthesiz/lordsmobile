
<div class="card-body">

    <div class="row">
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.rallySettings.joinRallies"
                    x-model="params.rallySettings.joinRallies">
                <label for="params.rallySettings.joinRallies" class="custom-control-label font-weight-light">Juntar-se ao Ninho (apenas Ninho)</label>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group-sm">
                <label for="params.rallySettings.rallyLimit" class="font-weight-light">Limite de Rally</label>
                <input type="number" step="1" class="form-control-sm" id="params.rallySettings.rallyLimit"
                    x-model.number="params.rallySettings.rallyLimit">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group-sm">
                <label for="params.rallySettings.maxWalkTime" class="font-weight-light">Tempo Max de viagem (minutos)</label>
                <input type="number" step="1" class="form-control-sm" id="params.rallySettings.maxWalkTime"
                    x-model.number="params.rallySettings.maxWalkTime">
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header">Opções de Rally</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">Níveis Ninho para ingressar:</div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.levelToAttack[0]"
                            x-model="params.rallySettings.levelToAttack[0]">
                        <label for="params.rallySettings.levelToAttack[0]" class="custom-control-label font-weight-light">1</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.levelToAttack[1]"
                            x-model="params.rallySettings.levelToAttack[1]">
                        <label for="params.rallySettings.levelToAttack[1]" class="custom-control-label font-weight-light">2</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.levelToAttack[2]"
                            x-model="params.rallySettings.levelToAttack[2]">
                        <label for="params.rallySettings.levelToAttack[2]" class="custom-control-label font-weight-light">3</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.levelToAttack[3]"
                            x-model="params.rallySettings.levelToAttack[3]">
                        <label for="params.rallySettings.levelToAttack[3]" class="custom-control-label font-weight-light">4</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.levelToAttack[4]"
                            x-model="params.rallySettings.levelToAttack[4]">
                        <label for="params.rallySettings.levelToAttack[4]" class="custom-control-label font-weight-light">5</label>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.levelToAttack[5]"
                        x-model="params.rallySettings.levelToAttack[5]">
                        <label for="params.rallySettings.levelToAttack[5]" class="custom-control-label font-weight-light">6</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-4">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.checkLab"
                            x-model="params.rallySettings.checkLab">
                        <label for="params.rallySettings.checkLab" class="custom-control-label font-weight-light">Não participe se o laboratório estiver cheio?</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.dontFillRally"
                            x-model="params.rallySettings.dontFillRally">
                        <label for="params.rallySettings.dontFillRally" class="custom-control-label font-weight-light">Não encher o Ninho?</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.noSiege"
                            x-model="params.rallySettings.noSiege">
                        <label for="params.rallySettings.noSiege" class="custom-control-label font-weight-light">Não evitar trabucos</label>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.noT5"
                            x-model="params.rallySettings.noT5">
                        <label for="params.rallySettings.noT5" class="custom-control-label font-weight-light">Não enviar T5</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="form-group-sm">
                        <label for="params.rallySettings.maxRallyTime" class="font-weight-light">Tempo Máximo de Rally</label>
                        <select class="form-control-sm" id="params.rallySettings.maxRallyTime" x-model.number="params.rallySettings.maxRallyTime">
                            <option value="0">5 minutos</option>
                            <option value="1">10 minutos</option>
                            <option value="2">1 hora</option>
                            <option value="3">8 horas</option>
                        </select>
                      </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group-sm">
                        <label for="params.rallySettings.rejoinWaitTime" class="font-weight-light">Tempo de espera antes de retornar se for chutado (em minutos)</label>
                        <input type="number" step="1" class="form-control-sm" id="params.rallySettings.rejoinWaitTime"
                            x-model.number="params.rallySettings.rejoinWaitTime">
                    </div>
                </div>

                <div class="col-sm-12">
                    Tropas a serem enviadas:
                </div>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.rallySettings.rallyTroopType" value="0" 
                            x-model.number="params.rallySettings.rallyTroopType"/>
                        <label class="form-check-label font-weight-light" for="params.rallySettings.rallyTroopType">Enviar 1 tropa</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.rallySettings.rallyTroopType" value="1"
                            x-model.number="params.rallySettings.rallyTroopType"/>
                        <label class="form-check-label font-weight-light" for="params.rallySettings.rallyTroopType">Enviar nível mais alto</label>
                    </div>
                </div>

                <div class="col-sm-12 text-red">
                    Ninho Prioridade:
                </div>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.rallySettings.rallyTroopType" value="3" 
                            x-model.number="params.rallySettings.rallyTroopType"/>
                        <label class="form-check-label font-weight-light" for="params.rallySettings.rallyTroopType">Nivel mais alto</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.rallySettings.rallyTroopType" value="2"
                            x-model.number="params.rallySettings.rallyTroopType"/>
                        <label class="form-check-label font-weight-light" for="params.rallySettings.rallyTroopType">Conforme Recomendado</label>
                    </div>
                </div>

                <div class="col-sm-12 text-red">
                    Ninho Prioridade (1 Tropa):
                </div>
                <div class="col-sm-12">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.rallySettings.rallyTroopType" value="5" 
                            x-model.number="params.rallySettings.rallyTroopType"/>
                        <label class="form-check-label font-weight-light" for="params.rallySettings.rallyTroopType">Nivel mais alto</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="params.rallySettings.rallyTroopType" value="4"
                            x-model.number="params.rallySettings.rallyTroopType"/>
                        <label class="form-check-label font-weight-light" for="params.rallySettings.rallyTroopType">Conforme Recomendado</label>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header">Opções Essencia</div>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.craftEssences"
                            x-model="params.rallySettings.craftEssences">
                        <label for="params.rallySettings.craftEssences" class="custom-control-label font-weight-light">Transmutar Essências Negras</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.rallySettings.keepEssSlotFree"
                            x-model="params.rallySettings.keepEssSlotFree">
                        <label for="params.rallySettings.keepEssSlotFree" class="custom-control-label font-weight-light">Matenha 1 slot livre</label>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group-inline-sm">
                        <label for="params.rallySettings.minEssenceLevel" class="font-weight-light">Excluir essência de nivel inferiar a</label>
                        <input type="number" step="1" class="form-control-sm" id="params.rallySettings.minEssenceLevel"
                            x-model.number="params.rallySettings.minEssenceLevel">
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>