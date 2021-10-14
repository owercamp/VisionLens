@csrf
<div class="col-12 row ml-0 justify-content-around">
  <div class="col-lg-4">
    <div class="form-group">
      <label>{{__('messages.Identity_Client')}}</label>
      <input type="text" class="form-control form-control-sm @error('identity_client') is-invalid @enderror" name="identity_client" value="{{old('identity_client')}}">
      @error('identity_client')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group">
      <label>{{__('messages.Name_Client')}}</label>
      <input type="text" class="form-control form-control-sm @error('name_client') is-invalid @enderror" name="name_client" value="{{old('name_client')}}">

      @error('name_client')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group">
      <label>{{__('messages.Address_Client')}}</label>
      <input type="text" class="form-control form-control-sm  @error('address') is-invalid @enderror" name="address" value="{{old('address')}}">

      @error('address')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
</div>
<hr>
<div class="col-12 row ml-0 justify-content-around">
  <div class="col-lg-4">
    <label>{{__('messages.Phone_Client')}}</label>
    <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}">

    @error('phone')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="col-lg-4">
    <label>{{__('messages.Facture')}}</label>
    <input type="text" class="form-control form-control-sm @error('facture') is-invalid @enderror" name="facture" value="{{old('facture')}}">

    @error('facture')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="col-lg-4">
    <label>{{__('messages.Email_Client')}}</label>
    <input type="text" class="form-control form-control-sm @error('email_Client') is-invalid @enderror" name="email_Client" value="{{old('email_Client')}}">

    @error('email_Client')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="col-lg-4">
    <label>{{__('messages.NumberQuota')}}</label>
    <input type="text" class="form-control form-control-sm @error('quota') is-invalid @enderror" name="quota" value="{{old('quota')}}">

    @error('quota')
    <span class="invalid-feedback" role="alert">
      <strong>{{$message}}</strong>
    </span>
    @enderror
  </div>
  <div class="col-lg-4">
    <label>{{__('messages.ValueQuota')}}</label>
    <input type="text" class="form-control form-control-sm @error('valueQuota') is-invalid @enderror" name="valueQuota" value="{{old('valueQuota')}}">

    @error('valueQuota')
    <span class="invalid-feedback" role="alert">
      <strong>{{$message}}</strong>
    </span>
    @enderror
  </div>
</div>
<hr>
<div class="col-12 row ml-0 d-flex justify-content-center">
  <div class="col-lg-6">
    <label>{{__('messages.Observations')}}</label>
    <textarea name="obs" id="" cols="30" rows="10" class="form-control form-control-md @error('obs') is-invalid @enderror">{{old('obs')}}</textarea>
  </div>
</div>
<hr>