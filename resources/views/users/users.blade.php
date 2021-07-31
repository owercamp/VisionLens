@extends('home')

@section('info')
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
                    <a type="button" href="" title="{{ __('messages.Edit') }}"><i class="fas fa-user-edit btn btn-outline-secondary"></i></a>
                    <a type="button" href="" title="{{ __('messages.Delete') }}"><i class="fas fa-trash-alt btn btn-outline-danger"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection