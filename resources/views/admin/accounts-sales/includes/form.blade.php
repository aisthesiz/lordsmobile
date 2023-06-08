@section('plugins.BsCustomFileInput', true)
@section('plugins.Summernote', true)
@section('plugins.bootstrapSwitch', true)


<div class="row">
    <x-adminlte-input name="title" label="Titulo" fgroup-class="col-md-6" disable-feedback
        value="{{ old('title', $accountSell->title ?? '') }}" />
    <x-adminlte-input name="might" label="Poder" type="number" fgroup-class="col-md-6" min=1
        value="{{ old('might', $accountSell->might ?? '') }}" />
</div>

<div class="row">
    <x-adminlte-input name="stats_bow" label="Poder Arqueiro" type="number" fgroup-class="col-md-4" min=1
        value="{{ old('stats_bow', $accountSell->stats_bow ?? '') }}" />
    <x-adminlte-input name="stats_horse" label="Poder Cavalaria" type="number" fgroup-class="col-md-4" min=1
        value="{{ old('stats_horse', $accountSell->stats_horse ?? '') }}" />
    <x-adminlte-input name="stats_sword" label="Poder Infantaria" type="number" fgroup-class="col-md-4" min=1
        value="{{ old('stats_sword', $accountSell->stats_sword ?? '') }}" />
</div>

<div class="row">
    <x-adminlte-input name="heroes_payed" label="Herois Pagos" type="number" fgroup-class="col-md-3" min=1
        value="{{ old('heroes_payed', $accountSell->heroes_payed ?? '') }}" />
    <x-adminlte-input name="artifacts" label="Artefatos" type="number" fgroup-class="col-md-3" min=1
        value="{{ old('artifacts', $accountSell->artifacts ?? '') }}" />
    <x-adminlte-input name="skins" label="Skins" type="number" fgroup-class="col-md-3" min=1
        value="{{ old('skins', $accountSell->skins ?? '') }}" />
    <x-adminlte-input name="troops" label="Tropas" type="number" fgroup-class="col-md-3" min=1
        value="{{ old('troops', $accountSell->troops ?? '') }}" />
</div>

<div class="row">
    <x-adminlte-input name="value_sell" label="Valor Venda" type="number" fgroup-class="col-md-4" min="1" step="0.01"
        value="{{ old('value_sell', $accountSell->value_sell ?? '') }}" />
    <x-adminlte-input name="value_sold" label="Valor Vendido" type="number" fgroup-class="col-md-4" min="1" step="0.01"
        value="{{ old('value_sold', $accountSell->value_sold ?? '') }}" />
</div>

<div class="row">
    <x-adminlte-input name="value_fee" label="Valor Comissão para o Revendedor" type="number" fgroup-class="col-md-6" min="1" step="0.01"
        value="{{ old('value_fee', $accountSell->value_fee ?? '') }}" />
    <x-adminlte-input name="value_discount" label="Valor Desconto" type="number" fgroup-class="col-md-6" min="1" step="0.01"
        value="{{ old('value_discount', $accountSell->value_discount ?? '') }}" />
</div>


<div class="row">

    <div class="col-md-4">
        <input type="hidden" name="elite_store" value="0"/>
        <label>
            <span>Elite / Loja</span>
            <input type="checkbox" name="elite_store" value="1"
                {{ old('elite_store', $accountSell->elite_store ?? false) == true ? 'checked' : '' }}
            />
        </label>
    </div>

    <div class="col-md-4">
        <input type="hidden" name="is_verified" value="0"/>
        <label>
            <span>Verificado</span>
            <input type="checkbox" name="is_verified" value="1"
                {{ old('is_verified', $accountSell->is_verified ?? false) == true ? 'checked' : '' }}
            />
        </label>
    </div>

    <div class="col-md-4">
        <input type="hidden" name="is_active" value="0"/>
        <label>
            <span>Ativo</span>
            <input type="checkbox" name="is_active" value="1"
                {{ old('is_active', $accountSell->is_active ?? false) == true ? 'checked' : '' }}
            />
        </label>
    </div>
</div>

{{-- Imagens --}}
@for ($i = 1; $i <= 6; $i++)
    <div>
        @if(isset($accountSell) && !empty($accountSell->{"image_$i"}))
            <button
                class="btn btn-info btn-delete-image"
                data-image="{{ $i }}"
                data-url-delete="{{ route('admin.accounts-sales.delete.image', [$accountSell->id, $i]) }}"
                data-csrf="{{ csrf_token() }}">x</button>
            <img src="{{ Storage::url($accountSell->{"image_$i"}) }}" class="rounded w-25" />
        @endif
        <x-adminlte-input-file name="image_{{ $i }}" label="Imagem {{ $i }}"></x-adminlte-input-file>
    </div>
@endfor


<x-adminlte-textarea name="description" label="Descrição">{{ old('description', $accountSell->description ?? '') }}</x-adminlte-textarea>

@push('js')
<script>
    $( document ).ready(function() {
        $('.btn-delete-image').click((evt) => {
            evt.preventDefault();
            let url = $(evt.target).data('urlDelete');
            let csrf = $(evt.target).data('csrf');
            $.ajax({
                url: url,
                data: {_token: csrf, _method: 'DELETE'},
                type: "DELETE",
            }).done(function() {
                location.reload()
            }).fail(function() {
                alert('Erro');
            })
        });
    });
</script>
@endpush