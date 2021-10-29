@if(session('Success'))
<div class="alert alert-success text-center align-content-center" role="alert">
  <label>{{session('Success')}}</label>
</div>
<script>
  Swal.fire({
    icon: 'success',
    title: "{{__('messages.Success')}}",
    text: "{{ __('messages.Successful') }}",
    timer: 1800,
    showConfirmButton: false,
    timerProgressBar: true,
    showClass: {
      popup: 'animate__animated animate__jackInTheBox'
    },
    hideClass: {
      popup: 'animate__animated animate__zoomOutDown'
    }
  });
</script>
@endif
@if(session('Update'))
<div class="alert alert-info text-center align-content-center" role="alert">
  <label>{{session('Update')}}</label>
</div>
<script>
  Swal.fire({
    icon: 'success',
    title: "{{__('messages.Update')}}",
    text: "{{ __('messages.Updateful') }}",
    timer: 1800,
    showConfirmButton: false,
    timerProgressBar: true,
    showClass: {
      popup: 'animate__animated animate__fadeInUp'
    },
    hideClass: {
      popup: 'animate__animated animate__fadeOutBottomRight'
    }
  });
</script>
@endif
@if( session('Error'))
<div class="alert alert-danger text-center align-content-center" role="alert">
  <label>{{session('Error')}}</label>
</div>
<script>
  Swal.fire({
    icon: 'error',
    title: "{{__('messages.Error')}}",
    text: "{{ __('messages.Oop...') }}",
    timer: 1800,
    showConfirmButton: false,
    timerProgressBar: true,
  });
</script>
@endif
@if(session('Delete'))
<div class="alert alert-warning text-center align-content-center" role="alert">
  <label>{{session('Delete')}}</label>
</div>
<script>
  Swal.fire({
    icon: 'success',
    title: "{{__('messages.Delete')}}",
    text: "{{ __('messages.Deleteful') }}",
    timer: 1800,
    showConfirmButton: false,
    timerProgressBar: true,
  });
</script>
@endif