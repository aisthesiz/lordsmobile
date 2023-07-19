@section('plugins.Datetimepicker', true)

<div class="row">
    <x-adminlte-input type="text"
                      name="name"
                      label="{{ __('Name') }}"
                      value="{{ old('name', $account->name ?? '') }}"
                      fgroup-class="col-md-12"/>
</div>

<div class="row">
    <x-adminlte-input type="text"
                      name="lord_account_id"
                      label="{{ __('Bot Account ID') }}"
                      value="{{ old('lord_account_id', $account->lord_account_id ?? '') }}"
                      fgroup-class="col-md-12"/>
</div>

<div class="row">
    Usuário: {{ $user->name }}
</div>

<div class="row">
    <x-adminlte-input-date
        id="time_start"
        name="time_start"
        label="Data de Inicio"
        required
        autocomplete="off"
        value="{{ old('time_start', isset($account) ? $account->time_start->format('Y/m/d H:i') : now()->format('Y/m/d ') . '00:00') }}"
    ></x-adminlte-input-date>
</div>

<div class="row">
    <x-adminlte-input-date
        id="time_end"
        name="time_end"
        label="Data de Encerramento"
        required
        autocomplete="off"
        value="{{ old('time_end', isset($account) ? $account->time_end->format('Y/m/d H:i') : now()->addMonth()->format('Y/m/d ') . '00:00') }}"
    ></x-adminlte-input-date>
</div>

<div class="row">
    <div class="custom-control custom-checkbox">
        <input type="hidden" name="is_active" value="0" />
        <input
            class="custom-control-input"
            type="checkbox"
            id="is_active"
            name="is_active"
            value="1"
            {{ old('is_active', $account->is_active ?? '') == '1' ? 'checked="checked"' : '' }}>
        <label for="is_active" class="custom-control-label">Ativa</label>
    </div>
</div>

