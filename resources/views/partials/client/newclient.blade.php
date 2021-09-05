<form method="POST" action="{{ route('client.store') }}">
  @csrf

  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name_Client') }}</label>

    <div class="col-md-6">
      <input id="name_client" type="text" class="form-control @error('name_client') is-invalid @enderror" name="name_client" value="{{ old('name_client') }}" required autocomplete="name" autofocus>

      @error('name_client')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="identity" class="col-md-4 col-form-label text-md-right">{{ __('messages.Identity_Client') }}</label>

    <div class="col-md-6">
      <input id="identity_client" type="text" class="form-control @error('identity_client') is-invalid @enderror" name="identity_client" value="{{ old('identity_client') }}" required autocomplete="cc-number">

      @error('identity_client')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('messages.Address_Client') }}</label>

    <div class="col-md-6">
      <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="street-address" value="{{ old('address') }}">

      @error('address')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('messages.Phone_Client') }}</label>

    <div class="col-md-6">
      <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="mobile" value="{{ old('phone') }}">

      @error('phone')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="referred" class="col-md-4 col-form-label text-md-right">{{ __('messages.Referred_Client') }}</label>

    <div class="col-md-6">
      <select name="referred" id="referred" class="form-control @error('referred') is-invalid @enderror" required autocomplete="name">
        <option value="Visión lent">Visión lent</option>
        @foreach( $register as $client)
        <option value="{{ $client->cli_name }}">{{ $client->cli_name }}</option>
        @endforeach
      </select>
    </div>

    @error('referred')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $messages }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group row mb-0 justify-content-center">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-primary">
        {{ __('messages.Register') }}
      </button>
    </div>
  </div>
</form>