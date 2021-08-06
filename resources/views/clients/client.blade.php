@extends('home')

@section('info')
@if(session('SuccessClient'))
<div class="alert alert-success text-center align-content-center" role="alert">
    <label>{{session('SuccessClient')}}</label>
</div>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ __('messages.Successful') }}",
        timer: 1800,
        showConfirmButton: false,
        timerProgressBar: true,
    });
</script>
@endif
@if( session('ErrorUpdate'))
<div class="alert alert-danger text-center align-content-center" role="alert">
    <label>{{session('ErrorUpdate')}}</label>
</div>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "{{ __('messages.Oop...') }}",
        timer: 1800,
        showConfirmButton: false,
        timerProgressBar: true,
    });
</script>
@endif
@if(session('DeleteClient'))
<div class="alert alert-secondary text-center align-content-center" role="alert">
    <label>{{session('DeleteClient')}}</label>
</div>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ __('messages.Deleteful') }}",
        timer: 1800,
        showConfirmButton: false,
        timerProgressBar: true,
    });
</script>
@endif
<table id="tableClient" class="display responsive nowrap text-center justify-content-center" style="width:100%">
    <thead>
        <tr>
            <th>{{ __('messages.Number')}}</th>
            <th>{{ __('messages.Name_Client') }}</th>
            <th>{{ __('messages.Identity_Client') }}</th>
            <th>{{ __('messages.Address_Client') }}</th>
            <th>{{ __('messages.Phone_Client') }}</th>
            <th>{{ __('messages.Referred_Client') }}</th>
            <th>{{ __('messages.Actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @php $row = 1; @endphp
        @foreach($clients as $client)
        <tr>
            <td>{{ $row++ }}</td>
            <td>{{ $client->cli_name }}</td>
            <td>{{ $client->cli_ide }}</td>
            <td>{{ $client->cli_add }}</td>
            <td>{{ $client->cli_pho }}</td>
            <td>{{ $client->cli_ref }}</td>
            <td>
                <button type="button" id="EditClient" class="btn btn-outline-secondary" title="{{ __('messages.Edit') }}" data-toggle="modal" data-target="#ClientEdit" onclick="editClient('{{$client->cli_id}}')"><i class="fas fa-edit"></i></button>
                <button type="button" id="DeleteClient" class="btn btn-outline-danger" data-toggle="modal" title="{{ __('messages.Delete') }}" data-target="#ClientDelete" onclick="deleteClient('{{$client->cli_id}}')"><i class="fas fa-user-times"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Edición -->
<div class="modal fade" id="ClientEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-edit border p-2 rounded"></i> {{ __('messages.Edit_Client') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <form method="POST" action="{{ route('client.update') }}" id="formEditClient">
                    @csrf
                    <div class="form-group row justify-content-center">
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

                    <div class="form-group row justify-content-center">
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

                    <div class="form-group row justify-content-center">
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

                    <div class="form-group row justify-content-center">
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

                    <div class="form-group row justify-content-center">
                        <label for="referred" class="col-md-4 col-form-label text-md-right">{{ __('messages.Referred_Client') }}</label>

                        <div class="col-md-6">
                            <select name="referred" id="referred" class="form-control @error('referred') is-invalid @enderror" required autocomplete="name">
                                <option value="Visión lent">Visión lent</option>
                                @foreach( $clients as $client)
                                <option value="{{ $client->cli_name }}">{{ $client->cli_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('referred')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $messages }}</strong>
                        </span>
                        @enderror
                        <input type="hidden" name="id">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="editClose()">{{ __('messages.Close') }}</button>
                <button type="button" class="btn btn-primary" onclick="formSubmit()">{{ __('messages.Save_changes') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminación -->
<div class="modal fade" id="ClientDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-trash-alt border p-2 rounded"></i> {{ __('messages.Delete_Client') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body justify-content-center">
                <form method="POST" action="{{ route('client.destroy') }}" id="formDeleteClient">
                    @csrf
                    <div class="form-group row justify-content-center">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name_Client') }}</label>

                        <div class="col-md-6">
                            <input id="name_client" type="text" class="form-control @error('name_client') is-invalid @enderror" name="name_client" value="{{ old('name_client') }}" required autocomplete="name" disabled>

                            @error('name_client')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="identity" class="col-md-4 col-form-label text-md-right">{{ __('messages.Identity_Client') }}</label>

                        <div class="col-md-6">
                            <input id="identity_client" type="text" class="form-control @error('identity_client') is-invalid @enderror" name="identity_client" value="{{ old('identity_client') }}" required autocomplete="cc-number" disabled>

                            @error('identity_client')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('messages.Address_Client') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="street-address" value="{{ old('address') }}" disabled>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('messages.Phone_Client') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="mobile" value="{{ old('phone') }}" disabled>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="referred" class="col-md-4 col-form-label text-md-right">{{ __('messages.Referred_Client') }}</label>

                        <div class="col-md-6">
                            <select name="referred" id="referred" class="form-control @error('referred') is-invalid @enderror" required autocomplete="name" disabled>
                                <option value="Visión lent">Visión lent</option>
                                @foreach( $clients as $client)
                                <option value="{{ $client->cli_name }}">{{ $client->cli_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('referred')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $messages }}</strong>
                        </span>
                        @enderror
                        <input type="hidden" name="id">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="editClose()">{{ __('messages.Close') }}</button>
                <button type="button" class="btn btn-danger" onclick="deleteShow()">{{ __('messages.Delete') }}</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function deleteShow() {
        Swal.fire({
            text: "{{ __('messages.Delete_Register')}}",
            showDenyButton: true,
            showConfirmButton: true,
            confirmButtonText: "{{ __('messages.Yes_Delete') }}",
            denyButtonText: "{{ __('messages.No_Delete') }}",
            denyButtonColor: "#6c757d",
            confirmButtonColor: "#e3342f",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formDeleteClient').submit();
            } else if (result.isDenied) {
                Swal.fire({
                    text: "{{ __('messages.Del_Cancel') }}",
                    icon: "info",
                    confirmButtonColor: "#6c757d",
                });
            }
        })
    }

    function deleteClient(id) {
        $.get("{{ route('getDeleteClient') }}", {
            data: id
        }, function(objectClient) {
            $('input[name=id]').val(objectClient[0]['cli_id']);
            $('input[name=name_client]').val(objectClient[0]['cli_name']);
            $('input[name=identity_client').val(objectClient[0]['cli_ide']);
            $('input[name=address').val(objectClient[0]['cli_add']);
            $('input[name=phone').val(objectClient[0]['cli_pho']);
            $('select[name=referred]').val(objectClient[0]['cli_ref']);
        });
    }

    function editClient(id) {
        $.get("{{ route('getEditClient') }}", {
            data: id
        }, function(objectClient) {
            $('input[name=id]').val(objectClient[0]['cli_id']);
            $('input[name=name_client]').val(objectClient[0]['cli_name']);
            $('input[name=identity_client').val(objectClient[0]['cli_ide']);
            $('input[name=address').val(objectClient[0]['cli_add']);
            $('input[name=phone').val(objectClient[0]['cli_pho']);
            $('select[name=referred]').val(objectClient[0]['cli_ref']);
        });
    }

    function editClose() {
        $('input[name=id]').val('');
        $('input[name=name_client]').val('');
        $('input[name=identity_client').val('');
        $('input[name=address').val('');
        $('input[name=phone').val('');
        $('select[name=referred]').val('Visión lent');
    }

    function formSubmit() {
        $('#formEditClient').submit();
    }
</script>
@endsection