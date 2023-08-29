<div class="card-body">
    <h3>Tropas</h3>
    <div class="row mb-3">
        <div class="col-sm-2">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.troopSettings.autoTrainTroops"
                    x-model="params.troopSettings.autoTrainTroops">
                <label
                    for="params.troopSettings.autoTrainTroops"
                    class="custom-control-label font-weight-light">Treinar Tropas</label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.troopSettings.rotateTraining"
                    x-model="params.troopSettings.rotateTraining">
                <label
                    for="params.troopSettings.rotateTraining"
                    class="custom-control-label font-weight-light">Treino Ciclico</label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.troopSettings.autoHealTroops"
                    x-model="params.troopSettings.autoHealTroops">
                <label
                    for="params.troopSettings.autoHealTroops"
                    class="custom-control-label font-weight-light">Curar Tropas</label>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.troopSettings.autoHealSanctuary"
                    x-model="params.troopSettings.autoHealSanctuary">
                <label
                    for="params.troopSettings.autoHealSanctuary"
                    class="custom-control-label font-weight-light">Curar Santuário</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="params.troopSettings.barrackTrainingLimit">Limite de trinamento de quartel</label>
                <input type="number" step="1" class="form-control" id="params.troopSettings.barrackTrainingLimit"
                    x-model.number="params.troopSettings.barrackTrainingLimit">
                <p>Deixe zero para capacidade total do quartel</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h3>Capitulo 8</h3>
        </div>
    </div>

    <div class="row">
        <div class="custom-control custom-checkbox mt-2">
            <input class="custom-control-input"
                type="checkbox"
                id="params.miscSettings.rotateTraining"
                x-model="params.miscSettings.rotateTraining">
            <label
                for="params.miscSettings.rotateTraining"
                class="custom-control-label font-weight-light">Ataque nível de conflito</label>
        </div>
        <div class="custom-control custom-checkbox mt-2">
            <input class="custom-control-input"
                type="checkbox"
                id="params.miscSettings.autoAttackFireTrial"
                x-model="params.miscSettings.autoAttackFireTrial">
            <label
                for="params.miscSettings.autoAttackFireTrial"
                class="custom-control-label font-weight-light">Prova de fogo (Auto.)</label>
        </div>
        <div class="custom-control custom-checkbox mt-2">
            <input class="custom-control-input"
                type="checkbox"
                id="params.miscSettings.recallTroopsForSkirmish"
                x-model="params.miscSettings.recallTroopsForSkirmish">
            <label
                for="params.miscSettings.recallTroopsForSkirmish"
                class="custom-control-label font-weight-light">Puxar tropas para Capítulo</label>
        </div>
        <div class="col-sm-12 mt-2">
            <div class="form-group">
                <label for="params.miscSettings.skirmishTroopPercent">Ataque conflito quando a tropa em (%):</label>
                <input type="number" step="1" class="form-control" id="params.miscSettings.skirmishTroopPercent"
                    x-model.number="params.miscSettings.skirmishTroopPercent">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome da Tropa</th>
                        <th>Quantidade Para Treinar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td>Guerreiro</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][0]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][0]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Arqueiro</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][1]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][1]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Cavalaria</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][2]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][2]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Balista</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][3]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][3]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Gladiador</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][4]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][4]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Guarda Atirador</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][5]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][5]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Montaria Reptiliana</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][6]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][6]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Catapulta</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][troopsChapter]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][troopsChapter]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Guarda Real</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][8]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][8]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Atirador Camuflado</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][9]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][9]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Cavalaria Real</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][10]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][10]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Trabuco de fogo</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][11]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][11]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Guerreiro Lendário</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][12]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][12]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Canhoneiro Lendário</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][13]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][13]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Montaria Draconiana</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][14]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][14]">
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Arrasador</td>
                        <td>
                            <input
                                type="number"
                                min="0"
                                step="1"
                                class="form-control-sm"
                                id="params.troopSettings.troopData[troopsChapter][15]"
                                x-model.number="params.troopSettings.troopData[troopsChapter][15]">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
