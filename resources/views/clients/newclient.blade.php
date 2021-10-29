@extends('home')

@section('info')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      @include('partials.alerts')
      <div class="card">
        <div class="card-header text-dark">{{ __('messages.New_Client') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('client.store') }}">
            @include('partials.client.partialClient')
            <div class="form-group row mb-0 justify-content-center">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary border border-dark">
                  {{ __('messages.Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection