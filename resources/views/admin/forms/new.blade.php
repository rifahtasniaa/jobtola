@extends('admin.layouts.main')
@section('main-container')
    <div class="container-fluid">
        {{ Form::open(array('route' => 'admin.store')) }}
        <div class="row">
            <h3>New Admin Registration</h3>
            <div class="col-12">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>

            <div class="col-12">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>

            <div class="col-12">
                <label for="phone">phone</label>
                <input type="text" name="phone">
            </div>

            <div class="col-12">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>

        </div>
        <button type="submit">Submit</button>
        {{ Form::close() }}
    </div>
@endsection
