@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('contacts.index') }}" class="btn btn-info">View Contacts</a>
                        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add New Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
