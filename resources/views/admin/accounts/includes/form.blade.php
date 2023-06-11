@section('plugins.Datetimepicker', true)

<div class="row">
    <x-adminlte-input type="text"
                      name="name"
                      label="{{ __('Name') }}"
                      value="{{ old('name', $account->user->name ?? '') }}"
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
    <x-adminlte-select2 name="user_id" class="form-input" fgroup-class="col-md-12" label="Usuário">
        @foreach ($users as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </x-adminlte-select2>
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
