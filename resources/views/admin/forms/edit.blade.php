@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">
        {{ Form::open(array('route' => 'admin.store')) }}
        <input type="hidden" name="id" value="{{$admin->id}}">
        <div class="row">
            <h3>{{$admin->name}} Information (Admin)</h3>
            <div class="col-12">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$admin->name}}">
            </div>

            <div class="col-12">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{$admin->email}}">
            </div>

            <div class="col-12">
                <label for="phone">phone</label>
                <input type="text" name="phone" value="{{$admin->phone}}">
            </div>

            <div class="col-12">
                <label for="password">Password</label>
                <input type="password" name="password" value="{{$admin->password}}">
            </div>

        </div>
        <button type="submit">Submit</button>
        {{ Form::close() }}
            <div class="btn btn-sm btn-primary">
                <a href="{{ route('admin.index') }}" class="d-flex justify-content-center text-white">
                    Back
                </a>
            </div>
    </div>
@endsection
