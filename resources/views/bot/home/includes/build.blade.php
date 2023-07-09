<div class="card-body">

    <div class="row">
        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.buildSettings.autoBuild"
                    x-model="params.buildSettings.autoBuild">
                <label for="params.buildSettings.autoBuild" class="custom-control-label font-weight-light">Auto construir</label>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.buildSettings.buildByLowestLevel"
                    x-model="params.buildSettings.buildByLowestLevel">
                <label for="params.buildSettings.buildByLowestLevel" class="custom-control-label font-weight-light">Nivel mais baixo primeiro</label>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.buildSettings.ignoreSpamTarget"
                    x-model="params.buildSettings.ignoreSpamTarget">
                <label for="params.buildSettings.ignoreSpamTarget" class="custom-control-label font-weight-light">Ignore alvo spam</label>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-3">
            Prioridade na construção:
        </div>
        <div class="col-sm-3">
            <select class="col-sm-8 w-10" x-model="params.buildSettings.buildPriority">
                <option value="0">Castelo</option>
                <option value="1">Recurso</option>
                <option value="2">Academia</option>
                <option value="3">Casar~ao</option>
                <option value="4">Quartel/Enfermaria</option>
                <option value="5">Casa de Monstros</option>
                <option value="6">Familiares</option>
                <option value="7">Entreposto</option>
                <option value="8">Recurso (sem casarao)</option>
                <option value="9">Tesouro</option>
                <option value="10">Oficina</option>
                <option value="11">Sem prioridade</option>
                <option value="12">Forja lunar</option>
            </select>
        </div>
        <div class="col-sm-5">
            <div class="form-group-inline-sm">
                <label for="params.buildSettings.maxBuildLevel" class="font-weight-light">Nivel max da construcao</label>
                <input type="number" step="1" class="sm" id="params.buildSettings.maxBuildLevel"
                    x-model.number="params.buildSettings.maxBuildLevel">
            </div>
        </div>
    </div>
</div>