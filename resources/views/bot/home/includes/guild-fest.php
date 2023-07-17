
<div class="card-body">

    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.eventSettings.guildFest.collectRewards"
                    x-model="params.eventSettings.guildFest.collectRewards">
                <label for="params.eventSettings.guildFest.collectRewards" class="custom-control-label font-weight-light">Coletar recompesas (selecionado aleatóriamente)</label>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            Completo
            <span class="badge badge-pill badge-light">complete as missões do Guild Fest(castelo +15 obrigatório)</span>
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.eventSettings.guildFest.gfMissionComplete.completeMissions"
                            x-model="params.eventSettings.guildFest.gfMissionComplete.completeMissions">
                        <label for="params.eventSettings.guildFest.gfMissionComplete.completeMissions" class="custom-control-label font-weight-light">Concluir missões</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.eventSettings.guildFest.gfMissionComplete.mToMailPlayer"
                            x-model="params.eventSettings.guildFest.gfMissionComplete.mToMailPlayer">
                        <label for="params.eventSettings.guildFest.gfMissionComplete.mToMailPlayer" class="custom-control-label font-weight-light">Enviar email para jogador</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="">
                        <input class="" type="text" id="params.eventSettings.guildFest.gfMissionComplete.mMailPlayerName" placeholder="email"
                            x-model="params.eventSettings.guildFest.gfMissionComplete.mMailPlayerName">
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.eventSettings.guildFest.gfMissionComplete.mNonAutoOnly"
                            x-model="params.eventSettings.guildFest.gfMissionComplete.mNonAutoOnly">
                        <label for="params.eventSettings.guildFest.gfMissionComplete.mNonAutoOnly" class="custom-control-label font-weight-light">Apenas os não automáticos</label>
                    </div>
                </div>
            </div>



            <div class="row mt-2">
                <div class="col-sm-2">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="params.eventSettings.guildFest.gfMissionComplete.buyExtraMission"
                            x-model="params.eventSettings.guildFest.gfMissionComplete.buyExtraMission">
                        <label for="params.eventSettings.guildFest.gfMissionComplete.buyExtraMission" class="custom-control-label font-weight-light">Comprar missão extra</label>
                    </div>
                </div>

                <div class="col-sm-5">
                    Item a ser comprado para gastar a moeda da guilda
                </div>
                <div class="col-sm-3">
                    <select class="form-control" x-model.number="params.eventSettings.guildFest.gfMissionComplete.itemToBuy">
                        <option value="1043">1043 - 100 Pontos VIP (40,0k)</option>
                        <option value="1029">1029 - Acelerador de 1 min (3,0k)</option>
                        <option value="1040">1040 - Acelerador de 15 min (36,0k)</option>
                        <option value="1081">1081 - Acelerador de 3h (90,0k)</option>
                        <option value="1042">1042 - Acelerador de 60 min (54,0k)</option>
                        <option value="1131">1131 - Acelerador de Pacto 1 min (6,0k)</option>
                        <option value="1032">1032 - Acelerador de Pacto 15 min (72,0k)</option>
                        <option value="1034">1034 - Acelerador de Pacto 3 h (180,0k)</option>
                        <option value="1033">1033 - Acelerador de Pacto 60 min (108,0k)</option>
                        <option value="1253">1253 - Alterar Apelido (30,0k)</option>
                        <option value="1006">1006 - Alterar Nome de Jogador (15,0k)</option>
                        <option value="2029">2029 Baú de Jóias (99,0k)</option>
                        <option value="2003">2003 - Baú de Material (9,9k)</option>
                        <option value="1057">1057 - Bônus de ATQ Exército (20%) (56,3k)</option>
                        <option value="1037">1037 - Bônus de Coleta de 50% 1d (30,0k)</option>
                        <option value="1126">1126 - Bônus de Coleta de 50% 7d (127,5k)</option>
                        <option value="1070">1070 - Bônus de Comida (25%) 7d (19,2k)</option>
                        <option value="1065">1065 - Bônus de Comida 25% 1d (4,5k)</option>
                        <option value="1058">1058 - Bônus de DEF Exército (20%) (56,3k)</option>
                        <option value="1340">1340 - Bônus de Fusão de Pacto 10% (50,0k)</option>
                        <option value="1067">1067 - Bônus de Madeira (25%) 1d (4,5k)</option>
                        <option value="1072">1072 - Bônus de Madeira (25%) 7d (19,2k)</option>
                        <option value="1068">1068 - Bônus de Minerio (25%) 1d (4,5k)</option>
                        <option value="1073">1073 - Bônus de Minerio (25%) 7d (19,2k)</option>
                        <option value="1069">1069 - Bônus de Ouro (25%) 1d (9,0k)</option>
                        <option value="1074">1074 - Bônus de Ouro (25%) 7d (38,4k)</option>
                        <option value="1066">1066 - Bônus de Pedra (25%) 1d (4,5k)</option>
                        <option value="1071">1071 - Bônus de Pedra (25%) 7d (19,2k)</option>
                        <option value="1060">1060 - Bônus de Tamanho de Exército (240,0k)</option>
                        <option value="1051">1051 - Escudo de 8h (150,0k)</option>
                        <option value="1117">1117 - Fruta da Ressurreição (60,0k)</option>
                        <option value="1110">1110 - Informações Falsas (2x) (18,0k)</option>
                        <option value="1120">1120 - Mudar Tag da Guilda (30,0k)</option>
                        <option value="1256">1256 - Pena de Equipamento (90,0k)</option>
                        <option value="1275">1275 - Pergaminho de Migração (810,0k)</option>
                        <option value="1004">1004 - Realocador (270,0k)</option>
                        <option value="1003">1003 - Realocador Aleatório (60,0k)</option>
                        <option value="1007">1007 - Renomear Guilda (30,0k)</option>
                        <option value="1112">1112 - Reset de Missão Admin (18,0k)</option>
                        <option value="1113">1113 - Reset de Missão da Guilda (24,0k)</option>
                        <option value="1008">1008 - Resetar Talentos (90,0k)</option>
                        <option value="1001">1001 - Retirar Esquadrão (6,0k)</option>
                        <option value="1254">1254 - Tomo de Talento (90,0k)</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-sm-2">
                    <button type="button" x-on:click="fgApplyAll($event)">
                        Applicar a todos
                    </button>
                </div>
                <div class="col-sm-3">
                    <input type="number" step="1" x-model.number="fg.valueForAll">
                </div>
                <div class="col-sm-2">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="fg.minOrMax.1" value="1"
                            x-model.number="fg.minOrMax"/>
                        <label class="form-check-label font-weight-light" for="fg.minOrMax.1">Min pontos</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" id="fg.minOrMax.2" value="2"
                            x-model.number="fg.minOrMax"/>
                        <label class="form-check-label font-weight-light" for="fg.minOrMax.2">Max pontos (max 355)</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4 table-responsive">
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome da Missão</th>
                        <th scope="col"></th>
                        <th scope="col">Min Pontos</th>
                        <th scope="col">Max Pontos</th>
                        <th scope="col">Automatizado?</th>
                    </tr>
                </thead>
                    <template x-for="(item, index) in params.eventSettings.guildFest.gfMissionComplete.missionsToComplete_" :key="index">
                    <tr>
                        <td x-text="missionsNames[index]"></td>
                        <td><input type="checkbox" x-model="item.ToComplete"/></td>
                        <td><input type="number" class="sm" step="1" x-model.number="item.TakeIfHigherThanPoints"/></td>
                        <td><input type="number" max="355" class="sm" step="1" x-model.number="item.MaxPoints"/></td>
                        <td x-text="item.IsAutomated == 0 ? 'Não' : item.IsAutomated == 1 ? 'Parcial' : 'Sim'"></td>
                    </tr>
                    </template>
                </table>
            </div>

        </div>    
    </div>

</div>