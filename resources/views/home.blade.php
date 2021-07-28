@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('messages.Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-3">                        
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link w-100 collapsed text-uppercase" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{ __('messages.Users') }}
                                            </button>
                                        </h2>
                                    </div>
        
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush text-center text-dark">
                                                <a type="button"><li class="list-group-item">{{ __('messages.New_User') }}</li></a>
                                                <a type="button"><li class="list-group-item">{{ __('messages.Existing_User') }}</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link w-100 collapsed text-uppercase" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                {{ __('messages.Customers') }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush text-center text-dark">
                                                <a type="button"><li class="list-group-item">{{ __('messages.New_Client') }}</li></a>
                                                <a type="button" href="{{ route('client.index') }}"><li class="list-group-item">{{ __('messages.Existing_Clients') }}</li></a>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link w-100 collapsed text-uppercase" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                {{ __('messages.Information') }}
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8 m-2 ml-3">
                            @yield('info')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection