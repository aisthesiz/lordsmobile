<div class="row">
    <x-adminlte-input type="text"
                      name="name"
                      label="{{ __('Name') }}"
                      value="{{ old('name', $user->name ?? '') }}"
                      fgroup-class="col-md-12"/>
</div>

<div class="row">
    <x-adminlte-input type="email"
                      name="email"
                      label="Email"
                      value="{{ old('email', $user->email ?? '') }}"
                      fgroup-class="col-md-12"/>
</div>

<div class="row">
    <x-adminlte-input type="cellphone"
                      name="cellphone"
                      label="Celular"
                      value="{{ old('cellphone', $user->cellphone ?? '') }}"
                      placeholder="(99)9999-9999"
                      fgroup-class="col-md-12"/>
</div>

<div class="row">
    <x-adminlte-input type="password"
                      name="password"
                      label="{{ __('Password') }}"
                      fgroup-class="col-md-12"/>
</div>

<div class="row">
    <x-adminlte-input type="password"
                      name="password_confirmation"
                      label="{{ __('Password Confirmation') }}"
                      fgroup-class="col-md-12"/>
</div>

<div class="row">
    <div class="custom-control custom-checkbox">
        <input type="hidden" name="is_admin" value="0" />
        <input
            class="custom-control-input"
            type="checkbox"
            id="is_admin"
            name="is_admin"
            value="1"
            @if(old('is_admin', $user->is_admin ?? false)) checked @endif>
        <label for="is_admin" class="custom-control-label">Administrador</label>
    </div>
</div>

@foreach($roles as $role)
    <div class="custom-control custom-checkbox">
        <input
            class="custom-control-input"
            type="checkbox"
            id="checkbox-{{ $role->id }}"
            name="roles[]"
            value="{{ $role->id }}"
            {{ in_array($role->id, $rolesAssign) ? 'checked' : '' }}>
        <label for="checkbox-{{ $role->id }}" class="custom-control-label">{{ $role->name }}</label>
    </div>
@endforeach
