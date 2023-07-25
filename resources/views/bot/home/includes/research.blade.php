
<div class="card-body">
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.researchSettings.autoResearch"
                    x-model="params.researchSettings.autoResearch">
                <label for="params.researchSettings.autoResearch" class="custom-control-label font-weight-light">Pesquisa Automática</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/economy.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[0].Key == 1">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[0].Enabled"
                    x-model="params.researchSettings.researchPriority_[0].Enabled">
                    <label for="params.researchSettings.researchPriority_[0].Enabled" class="custom-control-label font-weight-light">Economia</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/defence.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[1].Key == 2">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[1].Enabled"
                    x-model="params.researchSettings.researchPriority_[1].Enabled">
                    <label for="params.researchSettings.researchPriority_[1].Enabled" class="custom-control-label font-weight-light">Defense</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/military.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[2].Key == 3">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[2].Enabled"
                    x-model="params.researchSettings.researchPriority_[2].Enabled">
                    <label for="params.researchSettings.researchPriority_[2].Enabled" class="custom-control-label font-weight-light">Militar</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/monster_hunt.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[3].Key == 5">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[3].Enabled"
                    x-model="params.researchSettings.researchPriority_[3].Enabled">
                    <label for="params.researchSettings.researchPriority_[3].Enabled" class="custom-control-label font-weight-light">Cassa Monstros</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/defence.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[4].Key == 7">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[4].Enabled"
                    x-model="params.researchSettings.researchPriority_[4].Enabled">
                    <label for="params.researchSettings.researchPriority_[4].Enabled" class="custom-control-label font-weight-light">Evolir Defesas</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/military.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[5].Key == 8">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[5].Enabled"
                    x-model="params.researchSettings.researchPriority_[5].Enabled">
                    <label for="params.researchSettings.researchPriority_[5].Enabled" class="custom-control-label font-weight-light">Atualizar Força Militar</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/army_leadership.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[6].Key == 9">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[6].Enabled"
                    x-model="params.researchSettings.researchPriority_[6].Enabled">
                    <label for="params.researchSettings.researchPriority_[6].Enabled" class="custom-control-label font-weight-light">Liderança do Exercito</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/military_command.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[7].Key == 10">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[7].Enabled"
                    x-model="params.researchSettings.researchPriority_[7].Enabled">
                    <label for="params.researchSettings.researchPriority_[7].Enabled" class="custom-control-label font-weight-light">Comando Militar</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/familiars.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[8].Key == 11">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[8].Enabled"
                        x-model="params.researchSettings.researchPriority_[8].Enabled">
                    <label for="params.researchSettings.researchPriority_[8].Enabled" class="custom-control-label font-weight-light">Familiares</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/sigils.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[9].Key == 12">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[9].Enabled"
                        x-model="params.researchSettings.researchPriority_[9].Enabled">
                    <label for="params.researchSettings.researchPriority_[9].Enabled" class="custom-control-label font-weight-light">Selos</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/wonder_battles.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[10].Key == 13">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[10].Enabled"
                        x-model="params.researchSettings.researchPriority_[10].Enabled">
                    <label for="params.researchSettings.researchPriority_[10].Enabled" class="custom-control-label font-weight-light">Batalhas no Wonder</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/familiar_battles.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[11].Key == 14">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[11].Enabled"
                        x-model="params.researchSettings.researchPriority_[11].Enabled">
                    <label for="params.researchSettings.researchPriority_[11].Enabled" class="custom-control-label font-weight-light">Batalhas de familiar</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/gear.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[12].Key == 15">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[12].Enabled"
                        x-model="params.researchSettings.researchPriority_[12].Enabled">
                    <label for="params.researchSettings.researchPriority_[12].Enabled" class="custom-control-label font-weight-light">Equipamento</label>
                </div>
            </div>
        </template>
    </div>

    <div class="row">
        <div class="col-sm-1">
            <img style="width: 30px" src="{{ url('assets/images/research_icons/wonder_battles.jpg') }}"/>
        </div>
        <template x-if="params.researchSettings.researchPriority_[13].Key == 16">
            <div class="col-sm-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="params.researchSettings.researchPriority_[13].Enabled"
                        x-model="params.researchSettings.researchPriority_[13].Enabled">
                    <label for="params.researchSettings.researchPriority_[13].Enabled" class="custom-control-label font-weight-light">Batalhas Avançadas do Wonder</label>
                </div>
            </div>
        </template>
    </div>
</div>