@extends('home')

@section('info')
@include('partials.alerts')
<table id="table" class="display responsive nowrap text-center justify-content-center" style="width:100%">
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
    @foreach($register as $client)
    <tr>
      <td>{{ $row++ }}</td>
      <td>{{ $client->cli_name }}</td>
      <td>{{ $client->cli_ide }}</td>
      <td>{{ $client->cli_add }}</td>
      <td>{{ $client->cli_pho }}</td>
      <td>{{ $client->cli_ref }}</td>
      <td>
        <button type="button" id="EditClient" class="btn btn-outline-secondary border border-dark" title="{{ __('messages.Edit') }}" data-toggle="modal" onclick="editClient('{{$client->cli_id}}')"><i class="fas fa-edit"></i></button>
        <button type="button" id="DeleteClient" class="btn btn-outline-danger border border-dark" data-toggle="modal" title="{{ __('messages.Delete') }}" onclick="deleteClient('{{$client->cli_id}}')"><i class="fas fa-user-times"></i></button>
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
          @include('partials.client.partialClient')
          <input type="hidden" name="id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal" onclick="editClose()">{{ __('messages.Close') }}</button>
        <button type="button" class="btn btn-primary border border-dark" onclick="formSubmit()">{{ __('messages.Save_changes') }}</button>
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
          @include('partials.client.partialClient')
          <input type="hidden" name="id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary border border-dark" data-dismiss="modal" onclick="editClose()">{{ __('messages.Close') }}</button>
        <button type="button" class="btn btn-danger border border-dark" onclick="deleteShow()">{{ __('messages.Delete') }}</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  const editClient = id => {
    $.ajax({
      "_token": "{{csrf_token()}}",
      type: "POST",
      dataType: "JSON",
      url: "{{route('getClient')}}",
      data: {
        data: id
      },
      success(response) {
        console.log(response);
        $('input[name=name_client]').val(response[0]['cli_name']);
        $('input[name=identity_client]').val(response[0]['cli_ide']);
        $('input[name=address]').val(response[0]['cli_add']);
        $('input[name=phone]').val(response[0]['cli_pho']);
        $('input[name=email_Client]').val(response[0]['cli_ema']);
        $('select[name=referred]').val(response[0]['cli_ref']);
        $('input[name=id]').val(response[0]['cli_id']);
      },
      complete() {
        $('#ClientEdit').modal();
      }
    })
  }

  const deleteClient = id => {
    $.ajax({
      "_token": "{{csrf_token()}}",
      type: "POST",
      dataType: "JSON",
      url: "{{route('getClient')}}",
      data: {
        data: id
      },
      success(response) {
        $('input[name=name_client]').val(response[0]['cli_name']);
        $('input[name=identity_client]').val(new Intl.NumberFormat().format(response[0]['cli_ide']));
        $('input[name=address]').val(response[0]['cli_add']);
        $('input[name=phone]').val(response[0]['cli_pho']);
        $('input[name=email_Client]').val(response[0]['cli_ema']);
        $('select[name=referred]').val(response[0]['cli_ref']);
        $('input[name=id]').val(response[0]['cli_id']);
      },
      complete() {
        $('input[name=name_client]').prop('disabled', true);
        $('input[name=identity_client]').prop('disabled', true);
        $('input[name=address]').prop('disabled', true);
        $('input[name=phone]').prop('disabled', true);
        $('input[name=email_Client]').prop('disabled', true);
        $('select[name=referred]').prop('disabled', true);
        $('#ClientDelete').modal();
      }
    })
  }

  const deleteShow = () => {
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

  const editClose = () => {
    $('input[name=id]').val('');
    $('input[name=name_client]').val('');
    $('input[name=identity_client]').val('');
    $('input[name=address]').val('');
    $('input[name=phone]').val('');
    $('input[name=email_Client]').val('');
    $('select[name=referred]').val('');
  }

  const formSubmit = () => {
    $('#formEditClient').submit();
  }
</script>
@endsection