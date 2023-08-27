@extends('admin.layouts.main')
@section('main-container')
        <table class="table" id="table">
            <thead>
            <tr>
                <th>#</th>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $index=>$admin)
            <tr>
                <td>{{$index + 1}}</td>
                @foreach($headers as $attribute)
                    <td>{{ $admin->{$attribute} }}</td>
                @endforeach
                <td>
                    <a href="{{ route('admin.edit', ['admin' => $admin]) }}">
                        <i class="fa fa-solid fa-pen"></i>
                    </a>&nbsp;&nbsp;
                    <a href="{{ route('admin.delete', ['admin' => $admin]) }}">
                        <i class="fa fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <a href="{{ route('admin.create') }}" class="d-flex justify-content-center">
        <div class="btn btn-sm btn-primary">
            Add new
        </div>
    </a>
@endsection
