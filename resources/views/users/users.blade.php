@extends('home')

@section('info')
@if(session('SuccessUser'))
<div class="alert alert-success text-center align-content-center" role="alert">
  <label>{{session('SuccessUser')}}</label>
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
@if(session('DeleteUser'))
<div class="alert alert-secondary text-center align-content-center" role="alert">
  <label>{{session('DeleteUser')}}</label>
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
<table id="tableUser" class="display nowrap responsive text-center w-100">
  <thead>
    <tr>
      <th>{{ __('messages.Number') }}</th>
      <th>{{ __('messages.Users') }}</th>
      <th>{{ __('messages.E-Mail_Address') }}</th>
      <th>{{ __('messages.Actions') }}</th>
    </tr>
  </thead>
  <tbody>
    @php $row = 1; @endphp
    @foreach ($users as $user)
    <tr>
      <td>{{ $row++ }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        <button type="button" class="btn btn-outline-secondary" title="{{ __('messages.Edit') }}" data-toggle="modal" data-target="#UserEdit" onclick="editUser('{{ $user->id }}')"><i class="fas fa-user-edit"></i></button>
        <button type="button" class="btn btn-outline-danger" title="{{ __('messages.Delete') }}" data-toggle="modal" data-target="#UserDelete" onclick="deleteUser('{{ $user->id }}')"><i class="fas fa-trash-alt"></i></button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Modal Edición -->
<div class="modal fade" id="UserEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-edit border p-2 rounded"></i> {{ __('messages.Edit_User') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body justify-content-center">
        <form method="POST" action="{{ route('user.update') }}" id="formEditUser">
          @csrf
          <div class="form-group row justify-content-center">
            <label for="name" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Users') }}</label>

            <div class="col-lg-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row justify-content-center">
            <label for="email" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.E-Mail_Address') }}</label>

            <div class="col-lg-6">
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="cc-number">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
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
<div class="modal fade" id="UserDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-trash-alt border p-2 rounded"></i> {{ __('messages.Delete_User') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body justify-content-center">
        <form method="POST" action="{{ route('user.destroy') }}" id="formDeleteUser">
          @csrf
          <div class="form-group row justify-content-center">
            <label for="name" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.Users') }}</label>

            <div class="col-lg-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" disabled>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row justify-content-center">
            <label for="email" class="col-lg-4 col-form-label text-md-left text-lg-right">{{ __('messages.E-Mail_Address') }}</label>

            <div class="col-lg-6">
              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="cc-number" disabled>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <input type="hidden" name="id">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="editClose()">{{ __('messages.Close') }}</button>
        <button type="button" class="btn btn-danger" onclick="formDeleteSubmit()">{{ __('messages.Delete') }}</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  function deleteUser(id) {
    $.get("{{ route('getUser') }}", {
      data: id
    }, function(objectUser) {
      $('input[name=name]').val(objectUser[0]['name']);
      $('input[name=email]').val(objectUser[0]['email']);
      $('input[name=id]').val(objectUser[0]['id']);
    });
  }

  function editUser(id) {
    $.get("{{ route('getUser') }}", {
      data: id
    }, function(objectUser) {
      $('input[name=name]').val(objectUser[0]['name']);
      $('input[name=email]').val(objectUser[0]['email']);
      $('input[name=id]').val(objectUser[0]['id']);
    });
  }

  function editClose() {
    $('input[name=name]').val("");
    $('input[name=email]').val("");
    $('input[name=id]').val("");
  }

  function formSubmit() {
    $('#formEditUser').submit();
  }

  function formDeleteSubmit() {
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
        $('#formDeleteUser').submit();
      } else if (result.isDenied) {
        Swal.fire({
          text: "{{ __('messages.Del_Cancel') }}",
          icon: "info",
          confirmButtonColor: "#6c757d",
        });
      }
    })
  }
</script>
@endsection