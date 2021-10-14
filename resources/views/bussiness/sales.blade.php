@extends('home')

@section('info')
<div class="container">
  <h5>{{__('messages.Sales') }} </h5>
  <form action="" method="post" class="p-3 container shadow">
    @include('partials.sale.partialSale')
    <div class="d-flex justify-content-center">
      <button class="btn btn-primary">{{__('messages.Save')}}</button>
    </div>
  </form>
</div>
@endsection

@section('script')
<script>
  console.log('hola mundo');
</script>
@endsection