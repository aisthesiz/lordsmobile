@section('plugins.BsCustomFileInput', true)
@section('plugins.Summernote', true)
@section('plugins.bootstrapSwitch', true)




<div class="row">
    <x-adminlte-input name="title" label="Titulo" fgroup-class="col-md-6" disable-feedback value="" />
    <x-adminlte-input name="might" label="Poder" type="number" fgroup-class="col-md-6" min=1 />
</div>

<div class="row">
    <x-adminlte-input name="stats_bow" label="Poder Arqueiro" type="number" fgroup-class="col-md-4" min=1 />
    <x-adminlte-input name="stats_horse" label="Poder Cavalaria" type="number" fgroup-class="col-md-4" min=1 />
    <x-adminlte-input name="stats_sword" label="Poder Infantaria" type="number" fgroup-class="col-md-4" min=1 />
</div>

<div class="row">
    <x-adminlte-input name="heroes_payed" label="Herois Pagos" type="number" fgroup-class="col-md-3" min=1 />
    <x-adminlte-input name="artifacts" label="Artefatos" type="number" fgroup-class="col-md-3" min=1 />
    <x-adminlte-input name="skins" label="Skins" type="number" fgroup-class="col-md-3" min=1 />
    <x-adminlte-input name="troops" label="Tropas" type="number" fgroup-class="col-md-3" min=1 />
</div>

<div class="row">
    <x-adminlte-input name="value_sell" label="Valor Venda" type="number" fgroup-class="col-md-4" min="1"
        step="0.01" />
    <x-adminlte-input name="value_discount" label="Valor Desconto" type="number" fgroup-class="col-md-4" min="1"
        step="0.01" />
    <x-adminlte-input name="value_sold" label="Valor Vendido" type="number" fgroup-class="col-md-4" min="1"
        step="0.01" />
</div>

<div class="row">
    <x-adminlte-input name="value_fee" label="Valor Comissão para o Revendedor" type="number" fgroup-class="col-md-6"
        min="1" step="0.01" />
    <x-adminlte-input name="value_discount" label="Valor Desconto" type="number" fgroup-class="col-md-6" min="1"
        step="0.01" />
</div>


<div class="row">

    <div class="col-md-4">
        <input type="hidden" name="elite_store" value="0"/>
        <x-adminlte-input-switch name="elite_store" label="Elite / Loja" data-on-text="SIM" data-off-text="NÃO" checked/>
        {{-- <x-adminlte-input type="checkbox" name="elite_store" value="1" checked></x-adminlte-checkbox> --}}
    </div>


    <div class="col-md-4">
        <input type="hidden" name="is_verified" value="0" />
        <x-adminlte-input-switch name="is_verified" label="Verificado" data-on-text="SIM" data-off-text="NÃO" checked/>
        {{-- <x-adminlte-input type="checkbox" name="is_verified" label="Verificado" value="1" checked></x-adminlte-checkbox> --}}
    </div>

    <div class="col-md-4">
        <input type="hidden" name="is_active" value="0" />
        <x-adminlte-input-switch name="is_active" label="Ativo" data-on-text="SIM" data-off-text="NÃO" checked/>
        {{-- <x-adminlte-input type="checkbox" name="is_active" label="Ativo" value="1" checked></x-adminlte-checkbox> --}}
    </div>
</div>

<div>
    @isset($accountSell)
        <img src="{{ Storage::url($accountSell->image_1) }}" />
    @endisset
    <x-adminlte-input-file name="image_1" label="Imagem 1"></x-adminlte-input-file>
</div>

<x-adminlte-input-file name="image_2" label="Imagem 2"></x-adminlte-input-file>
<x-adminlte-input-file name="image_3" label="Imagem 3"></x-adminlte-input-file>
<x-adminlte-input-file name="image_4" label="Imagem 4"></x-adminlte-input-file>
<x-adminlte-input-file name="image_5" label="Imagem 5"></x-adminlte-input-file>
<x-adminlte-input-file name="image_6" label="Imagem 6"></x-adminlte-input-file>

<x-adminlte-textarea name="description" label="Descrição"></x-adminlte-textarea>
