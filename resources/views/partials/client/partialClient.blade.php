@csrf
<div class="form-group row">
  <label for="name" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Name_Client') }}</label>

  <div class="col-lg-6">
    <input id="name_client" type="text" class="form-control @error('name_client') is-invalid @enderror" name="name_client" value="{{ old('name_client') }}" autocomplete="name" autofocus>

    @error('name_client')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="identity" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Identity_Client') }}</label>

  <div class="col-lg-6">
    <input id="identity_client" type="text" class="form-control @error('identity_client') is-invalid @enderror" name="identity_client" value="{{ old('identity_client') }}" autocomplete="cc-number">

    @error('identity_client')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="address" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Address_Client') }}</label>

  <div class="col-lg-6">
    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="street-address" value="{{ old('address') }}">

    @error('address')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="phone" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Phone_Client') }}</label>

  <div class="col-lg-6">
    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="mobile" value="{{ old('phone') }}">

    @error('phone')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="phone" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Email_Client') }}</label>

  <div class="col-lg-6">
    <input id="email_Client" type="text" class="form-control @error('email_Client') is-invalid @enderror" name="email_Client" autocomplete="email" value="{{ old('email_Client') }}">

    @error('email_Client')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group row">
  <label for="referred" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Referred_Client') }}</label>

  <div class="col-lg-6">
    <select name="referred" id="referred" class="form-control @error('referred') is-invalid @enderror">
      <option value="Visión lens">{{__('Visión lens')}}</option>
      @foreach( $register as $client)
      <option value="{{ $client->cli_name }}">{{ $client->cli_name }}</option>
      @endforeach
    </select>

    @error('referred')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>