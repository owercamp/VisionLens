@extends('home')

@section('info')
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
                <a href="" title="{{ __('messages.Edit') }}"><i class="fas fa-edit btn btn-outline-secondary"></i></a>
                <a href="" title="{{ __('messages.Delete') }}"><i class="fas fa-user-times btn btn-outline-danger"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection