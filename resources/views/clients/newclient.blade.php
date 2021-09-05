@extends('home')

@section('info')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      @if(session('ErrorSuccess'))
      <div class="alert alert-danger text-center align-content-center" role="alert">
        <label>{{session('ErrorSuccess')}}</label>
      </div>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: "{{ __('messages.Oop...')}}",
          timer: 1800,
          showConfirmButton: false,
          timerProgressBar: true,
        })
      </script>
      @endif
      <div class="card">
        <div class="card-header text-dark">{{ __('messages.New_Client') }}</div>

        <div class="card-body">
          @include('partials.client.newclient')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection