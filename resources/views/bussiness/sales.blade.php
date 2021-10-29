@extends('home')

@section('info')
<div class="container">
  <h5>{{__('messages.Sales') }}</h5>
  <div class="w-100 d-flex justify-content-center pb-3">
    <button class="btn btn-success border border-secondary btnCreate">{{__('messages.Create')}}</button>
  </div>
  @include('partials.alerts')
  <table id="table" class="display responsive nowrap text-center justify-content-center" style="width:100%">
    <thead>
      <tr>
        <th>{{__('messages.Name_Client')}}</th>
        <th>{{__('messages.Phone_Client')}}</th>
        <th>{{__('messages.Facture')}}</th>
        <th>{{__('messages.ValueQuota')}}</th>
        <th>{{__('messages.Actions')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sales as $sale)
      <tr>
        <td class="align-middle">{{$sale->sal_name}}</td>
        <td class="align-middle">{{$sale->sal_pho}}</td>
        <td class="align-middle">{{$sale->sal_fact}}</td>
        <td class="align-middle">{{number_format($sale->sal_vqua,0,',','.')}}</td>
        <td class="align-middle">
          <button class="btn btn-outline-success" onclick="edit('{{$sale->id}}')"><i class="fas fa-keyboard"></i></button>
          <button class="btn btn-outline-danger" onclick="del('{{$sale->id}}')"><i class="fas fa-ban"></i></button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- formulario de creación  -->
  <div class="modal fade" id="newSales">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5>{{__('messages.Sales')}}</h5>
          <button class="btn btn-small btn-info border border-secondary" data-dismiss="modal">&fallingdotseq;</button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sales.store') }}" method="post" class="p-3 container shadow" id="formCreate">
            @include('partials.sale.partialSale')
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary border border-dark">{{__('messages.Save')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- formulario de edición  -->
  <div class="modal fade" id="editSales">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5>{{__('messages.Edit')}} {{__('messages.Sales')}}</h5>
          <button class="btn btn-sm btn-info border border-secondary" data-dismiss="modal">&glj;</button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sales.store') }}" method="post" class="p-3 container shadow" id="formCreate">
            @include('partials.sale.partialSale')
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary border border-dark">{{__('messages.Save')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- formulario de eliminación  -->
  <div class="modal fade" id="delSales">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5>{{__('messages.Delete')}} {{__('messages.Sales')}}</h5>
          <button class="btn btn-sm btn-info border border-secondary" data-dismiss="modal">&glj;</button>
        </div>
        <div class="modal-body">
          <form action="{{ route('sales.store') }}" method="post" class="p-3 container shadow" id="formCreate">
            @include('partials.sale.partialSale')
            <div class="d-flex justify-content-center">
              <button class="btn btn-primary border border-dark">{{__('messages.Save')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@section('script')
<script>
  // ?llama al formulario de edición
  const edit = id => {
    $.ajax({
      "_token": "{{csrf_token()}}",
      type: "POST",
      dataType: "JSON",
      url: "{{route('getSale')}}",
      data: {
        data: id
      },
      success(res) {
        $('input[name=identity_client]').attr("disabled", false);
        $('input[name=valueQuota]').attr("disabled", false)
        $('input[name=name_client]').attr("disabled", false);
        $('input[name=address]').attr("disabled", false);
        $('input[name=phone]').attr("disabled", false);
        $('input[name=email_Client]').attr("disabled", false);
        $('input[name=facture]').attr("disabled", false);
        $('input[name=total]').attr("disabled", false);
        $('input[name=quota]').attr("disabled", false);
        $('textarea[name=obs]').attr("disabled", false);
        $('input[name=identity_client]').val(new Intl.NumberFormat().format(res[0]['sal_ide']));
        $('input[name=valueQuota]').val(new Intl.NumberFormat().format(res[0]['sal_vqua']));
        $('input[name=name_client]').val(res[0]['sal_name']);
        $('input[name=address]').val(res[0]['sal_add']);
        $('input[name=phone]').val(res[0]['sal_pho']);
        $('input[name=email_Client]').val(res[0]['sal_ema']);
        $('input[name=facture]').val(res[0]['sal_fact']);
        $('input[name=total]').val(new Intl.NumberFormat().format(res[0]['sal_total']));
        $('input[name=quota]').val(res[0]['sal_qua']);
        $('textarea[name=obs]').val(res[0]['sal_obs']);
      },
      complete() {
        $('#editSales').modal();
      }
    })
  }

  // !llama al formulario de eliminación
  const del = id => {
    $.ajax({
      "_token": "{{csrf_token()}}",
      type: "POST",
      dataType: "JSON",
      url: "{{route('getSale')}}",
      data: {
        data: id
      },
      success(res) {
        $('input[name=identity_client]').val(new Intl.NumberFormat().format(res[0]['sal_ide']));
        $('input[name=valueQuota]').val(new Intl.NumberFormat().format(res[0]['sal_vqua']));
        $('input[name=name_client]').val(res[0]['sal_name']);
        $('input[name=address]').val(res[0]['sal_add']);
        $('input[name=phone]').val(res[0]['sal_pho']);
        $('input[name=email_Client]').val(res[0]['sal_ema']);
        $('input[name=facture]').val(res[0]['sal_fact']);
        $('input[name=total]').val(new Intl.NumberFormat().format(res[0]['sal_total']));
        $('input[name=quota]').val(res[0]['sal_qua']);
        $('textarea[name=obs]').val(res[0]['sal_obs']);
      },
      complete() {
        $('input[name=identity_client]').attr("disabled", true);
        $('input[name=valueQuota]').attr("disabled", true)
        $('input[name=name_client]').attr("disabled", true);
        $('input[name=address]').attr("disabled", true);
        $('input[name=phone]').attr("disabled", true);
        $('input[name=email_Client]').attr("disabled", true);
        $('input[name=facture]').attr("disabled", true);
        $('input[name=total]').attr("disabled", true);
        $('input[name=quota]').attr("disabled", true);
        $('textarea[name=obs]').attr("disabled", true);
        $('#delSales').modal();
      }
    })
  }

  $('#formCreate').submit(() => {
    $('input[name=valueQuota]').attr("disabled", false);
    $('input[name=name_client]').attr("disabled", false);
    $('input[name=address]').attr("disabled", false);
    $('input[name=phone]').attr("disabled", false);
    $('input[name=email_Client]').attr("disabled", false);
    $('input[name=facture]').attr("disabled", false);
  });

  // TODO:confirma el valor de las cuotas corregir en la edición de la venta se puerde un digito
  $('input[name=quota]').keyup(e => {
    const sale = $('input[name=total]').val().replaceAll(".", "");
    let vQuota = Math.round(parseInt(sale) / parseInt(e.target.value));
    $('input[name=valueQuota]').val(new Intl.NumberFormat().format(vQuota));
    $('input[name=valueQuota]').attr("disabled", true);
  });
  // *mascaras
  $('input[name=identity_client]').mask("#.##0", {
    reverse: true
  });
  $('input[name=total]').mask("#.##0", {
    reverse: true
  });
  $('input[name=valueQuota]').mask("#.##0", {
    reverse: true
  });

  $('input[name=facture]').mask("VL-000000");

  // *busqueda del cliente en base de datos
  $('input[name=identity_client]').change(event => {
    const ide = event.target.value;
    const idePoint = ide.replaceAll(".", "");
    $.ajax({
      "_token": "{{csrf_token()}}",
      type: "POST",
      dataType: "JSON",
      url: "{{ route('dataClient') }}",
      data: {
        data: idePoint
      },
      success(res) {
        $('input[name=name_client]').val(res[0]['cli_name']);
        $('input[name=address]').val(res[0]['cli_add']);
        $('input[name=phone]').val(res[0]['cli_pho']);
        $('input[name=email_Client]').val(res[0]['cli_ema']);
        // !consulta numero de factura
        $.get("{{route('getFacture')}}", function(objectFacture) {
          const last = objectFacture;
          const separateLast = last.split("-");
          let news = parseInt(separateLast[1]) + 1;
          const serie = ("000000" + news).slice(-6);
          $('input[name=facture]').val(`VL-${serie}`);
        })
      },
      complete() {
        $('input[name=name_client]').attr("disabled", true);
        $('input[name=address]').attr("disabled", true);
        $('input[name=phone]').attr("disabled", true);
        $('input[name=email_Client]').attr("disabled", true);
        $('input[name=facture]').attr("disabled", true);
      }
    })
  });

  // ?callback al formulario de creatción de venta
  $('.btnCreate').click(() => {
    $('#newSales').modal();
  });
</script>
@endsection