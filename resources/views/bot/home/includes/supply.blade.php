
<div class="card-body">

    <div class="row">
        <div class="form-group-sm">
            <label for="params.supplySettings.playerToSend" class="font-weight-light">Enviar para:</label>
            <input type="text" class="form-control-sm" id="params.supplySettings.playerToSend"
                x-model.number="params.supplySettings.playerToSend">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.supplySettings.sendResources"
                    x-model="params.supplySettings.sendResources">
                <label for="params.supplySettings.sendResources" class="custom-control-label">Enviar Recurso</label>
            </div>
        </div>
        <div class="col-sm-4">
            <span>Quantidade Reservada</span>
        </div>
        <div class="col-sm-4">
            <span>Suprimento Minimo</span>
        </div>
    </div>
    
    <div class="my-5"></div>

    <div class="row">
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.supplySettings.typesToSend[0]"
                    x-model="params.supplySettings.typesToSend[0]">
                <label for="params.supplySettings.typesToSend[0]" class="custom-control-label">Comida</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.reservedRss[0]"
                    x-model.number="params.supplySettings.reservedRss[0]">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.supplyMin[0]"
                    x-model.number="params.supplySettings.supplyMin[0]">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.supplySettings.typesToSend[1]"
                    x-model="params.supplySettings.typesToSend[1]">
                <label for="params.supplySettings.typesToSend[1]" class="custom-control-label">Pedra</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.reservedRss[1]"
                    x-model.number="params.supplySettings.reservedRss[1]">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.supplyMin[1]"
                    x-model.number="params.supplySettings.supplyMin[1]">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.supplySettings.typesToSend[2]"
                    x-model="params.supplySettings.typesToSend[2]">
                <label for="params.supplySettings.typesToSend[2]" class="custom-control-label">Madeira</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.reservedRss[2]"
                    x-model.number="params.supplySettings.reservedRss[2]">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.supplyMin[2]"
                    x-model.number="params.supplySettings.supplyMin[2]">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.supplySettings.typesToSend[3]"
                    x-model="params.supplySettings.typesToSend[3]">
                <label for="params.supplySettings.typesToSend[3]" class="custom-control-label">Minério</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.reservedRss[3]"
                    x-model.number="params.supplySettings.reservedRss[3]">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.supplyMin[3]"
                    x-model.number="params.supplySettings.supplyMin[3]">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="params.supplySettings.typesToSend[4]"
                    x-model="params.supplySettings.typesToSend[4]">
                <label for="params.supplySettings.typesToSend[4]" class="custom-control-label">Ouro</label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.reservedRss[4]"
                    x-model.number="params.supplySettings.reservedRss[4]">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <input type="number" step="1" class="form-control" id="params.supplySettings.supplyMin[4]"
                    x-model.number="params.supplySettings.supplyMin[4]">
            </div>
        </div>
    </div>


</div>