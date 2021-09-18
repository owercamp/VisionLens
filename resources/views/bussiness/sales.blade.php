@extends('home')

@section('info')
<div class="container">
  <h5>{{__('messages.Sales') }} </h5>
  <form action="" method="post" class="p-3 container shadow">
    <div class="col-12 row ml-0">
      <div class="col-md-4 col-md-6 col-lg-4">
        <div class="form-group">
          <label>{{__('messages.Identity_Client')}}</label>
          <input type="text" class="form-control form-control-sm">
        </div>
      </div>
      <div class="col-md-4 col-md-6 col-lg-4">
        <div class="form-group">
          <label>{{__('messages.Name_Client')}}</label>
          <input type="text" class="form-control form-control-sm">
        </div>
      </div>
      <div class="col-md-4 col-md-6 col-lg-4">
        <div class="form-group">
          <label>{{__('messages.Address_Client')}}</label>
          <input type="text" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <hr>
    <div class="col-12 row ml-0">
      <div class="col-md-4 col-md-6 col-lg-4">
        <label>{{__('messages.Phone_Client')}}</label>
        <input type="text" class="form-control form-control-sm">
      </div>
      <div class="col-md-4 col-md-6 col-lg-4">
        <label>{{__('messages.Facture')}}</label>
        <input type="text" class="form-control form-control-sm">
      </div>
      <div class="col-md-2 col-md-6 col-lg-2">
        <label>{{__('messages.NumberQuota')}}</label>
        <input type="text" class="form-control form-control-sm">
      </div>
      <div class="col-md-2 col-md-6 col-lg-2">
        <label>{{__('messages.ValueQuota')}}</label>
        <input type="text" class="form-control form-control-sm">
      </div>
    </div>
    <hr>
    <div class="col-12 row ml-0 d-flex justify-content-center">
      <div class="col-lg-6">
        <label>{{__('messages.Observations')}}</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control form-control-md"></textarea>
      </div>
    </div>
  </form>
</div>
@endsection