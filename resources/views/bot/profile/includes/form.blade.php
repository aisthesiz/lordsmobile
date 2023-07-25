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
