<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.autoHunting"
                    x-model="params.monsterSettings.autoHunting">
                <label
                    for="params.monsterSettings.autoHunting"
                    class="custom-control-label font-weight-light">Mostros de caça</label>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group-sm">
                <label for="params.monsterSettings.maxWalkTime" class="font-weight-light">Tempo Max de viagem (segundos)</label>
                <input
                    type="number"
                    step="1"
                    class="form-control-sm"
                    id="params.monsterSettings.maxWalkTime"
                    x-model.number="params.monsterSettings.maxWalkTime"
                    data-maxvalue="600"
                    max="600"
                    x-on:change="numberLimit($event)"
                >
            </div>
        </div>
    </div>
    <div class="row mt-4">
        
        <div class="col-12">
            <h3>Opções de caça</h3>
        </div>
        
        
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.useEnergyItems"
                    x-model="params.monsterSettings.useEnergyItems">
                <label
                    for="params.monsterSettings.useEnergyItems"
                    class="custom-control-label font-weight-light">Use itens de energia</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.useBoots"
                    x-model="params.monsterSettings.useBoots">
                <label
                    for="params.monsterSettings.useBoots"
                    class="custom-control-label font-weight-light">Usar botas aladas (roubar)</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.sendMonstersToChat"
                    x-model="params.monsterSettings.sendMonstersToChat">
                <label
                    for="params.monsterSettings.sendMonstersToChat"
                    class="custom-control-label font-weight-light">Enviar monstros incabados para o chat da Guilda</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.avoidGuildConflict"
                    x-model="params.monsterSettings.avoidGuildConflict">
                <label
                    for="params.monsterSettings.avoidGuildConflict"
                    class="custom-control-label font-weight-light">Evitar conflito de Guilda</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.allowSaberfang"
                    x-model="params.monsterSettings.allowSaberfang">
                <label
                    for="params.monsterSettings.allowSaberfang"
                    class="custom-control-label font-weight-light">Use Presa Afiada Skill (se possível)</label>
            </div>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-sm-2">
            Prioridade de caça:
        </div>
        <div class="col-sm-3">
            <select class="" x-model.number="params.monsterSettings.huntMode">
                <option value="0">Qualquer</option>
                <option value="1">Saúde completa</option>
                <option value="2">Menor Saúde</option>
                <option value="3">Roubar</option>
            </select>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-2">
            Níveis para caçar:
        </div>

        <div class="col-sm-1">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.huntLevels[0]"
                    x-model="params.monsterSettings.huntLevels[0]">
                <label for="params.monsterSettings.huntLevels[0]" class="custom-control-label">1</label>
            </div>
        </div>

        <div class="col-sm-1">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.huntLevels[1]"
                    x-model="params.monsterSettings.huntLevels[1]">
                <label for="params.monsterSettings.huntLevels[1]" class="custom-control-label">2</label>
            </div>
        </div>

        <div class="col-sm-1">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.huntLevels[2]"
                    x-model="params.monsterSettings.huntLevels[2]">
                <label for="params.monsterSettings.huntLevels[2]" class="custom-control-label">3</label>
            </div>
        </div>

        <div class="col-sm-1">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.huntLevels[3]"
                    x-model="params.monsterSettings.huntLevels[3]">
                <label for="params.monsterSettings.huntLevels[3]" class="custom-control-label">4</label>
            </div>
        </div>

        <div class="col-sm-1">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.huntLevels[4]"
                    x-model="params.monsterSettings.huntLevels[4]">
                <label for="params.monsterSettings.huntLevels[4]" class="custom-control-label">5</label>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-sm-2">
            Tipos para caçar:
        </div>

        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.monsterTypes[0]"
                    x-model="params.monsterSettings.monsterTypes[0]">
                <label for="params.monsterSettings.monsterTypes[0]" class="custom-control-label">Magia e Física</label>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.monsterTypes[2]"
                    x-model="params.monsterSettings.monsterTypes[2]">
                <label for="params.monsterSettings.monsterTypes[2]" class="custom-control-label">MDEF alto</label>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.monsterSettings.monsterTypes[1]"
                    x-model="params.monsterSettings.monsterTypes[1]">
                <label for="params.monsterSettings.monsterTypes[1]" class="custom-control-label">PDEF alto</label>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-5">
            <div class="form-group-sm">
                <label for="params.monsterSettings.energyPercentage" class="font-weight-light">Iniciar a caça quando a energia for maior que (%)</label>
                <input
                    type="number"
                    step="1"
                    class="form-control-sm"
                    id="params.monsterSettings.energyPercentage"
                    x-model.number="params.monsterSettings.energyPercentage"
                    data-maxvalue="100"
                    max="100"
                    x-on:change="numberLimit($event)"
                >
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.comboPrediction"
                    x-model="params.monsterSettings.comboPrediction">
                <label
                    for="params.monsterSettings.comboPrediction"
                    class="custom-control-label font-weight-light">Usar combo para matar</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.oneKillHunt"
                    x-model="params.monsterSettings.oneKillHunt">
                <label
                    for="params.monsterSettings.oneKillHunt"
                    class="custom-control-label font-weight-light">Pare após matar 1 monstro</label>
            </div>
        </div>
    </div>

    {{-- <div class="row mt-4">
        <div class="col-sm-3">Caçar Monstros Selecionados</div>
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input"
                    type="checkbox"
                    id="asdfdsdftfds"
                    x|model="">
                <label
                    for="asdfdsdftfds"
                    class="custom-control-label font-weight-light">Selecionar Todos</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/economy.jpg') }}"/>
        </div>
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input
                    class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.monstersToHunt_['0']"
                    x-model="params.monsterSettings.monstersToHunt_['0']" />
                <label for="params.monsterSettings.monstersToHunt_['0']"
                    class="custom-control-label font-weight-light">Frostwing</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/economy.jpg') }}"/>
        </div>
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input
                    class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.monstersToHunt_['1']"
                    x-model="params.monsterSettings.monstersToHunt_['1']" />
                <label for="params.monsterSettings.monstersToHunt_['1']"
                    class="custom-control-label font-weight-light">Gargantua</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/economy.jpg') }}"/>
        </div>
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input
                    class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.monstersToHunt_['2']"
                    x-model="params.monsterSettings.monstersToHunt_['2']" />
                <label for="params.monsterSettings.monstersToHunt_['2']"
                    class="custom-control-label font-weight-light">Snow Beast</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/economy.jpg') }}"/>
        </div>
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input
                    class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.monstersToHunt_['3']"
                    x-model="params.monsterSettings.monstersToHunt_['3']" />
                <label for="params.monsterSettings.monstersToHunt_['3']"
                    class="custom-control-label font-weight-light">Jade Wyrm</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/economy.jpg') }}"/>
        </div>
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input
                    class="custom-control-input"
                    type="checkbox"
                    id="params.monsterSettings.monstersToHunt_['4']"
                    x-model="params.monsterSettings.monstersToHunt_['4']" />
                <label for="params.monsterSettings.monstersToHunt_['4']"
                    class="custom-control-label font-weight-light">Gryphon</label>
            </div>
        </div>
    </div> --}}

    <table>
        <thead>
            <tr>
                <th>Caçar</th>
                <th></th>
                <th>Nome</th>
                <th>Forte Contra</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="(monster, index) in monsters" :key="index">
                <tr>
                    <td>
                        <input
                            type="checkbox"
                            x-model="params.monsterSettings.monstersToHunt_[monster.index]" />
                    </td>
                    <td><img style="width: 40px" :src="'/assets/images/monsters_icon/' + monster.index + '.webp'" alt="Monster Image"></td>
                    <td x-text="monster.name"></td>
                    <td x-text="monster.strongAgainst"></td>
                </tr>
            </template>
        </tbody>
    </table>
</div>
