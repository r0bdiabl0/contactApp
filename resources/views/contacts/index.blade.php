@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Contacts</h1>
                <p class="lead">Manage your contacts.</p>
                <hr>
                <a class="btn btn-default actionButton" href="{{ route('contacts.create') }}"> New Contact </a>
                <hr>
                <h4>Search</h4>
                <form method="get" class="form-inline">
                    <div class="form-group">
                        <label for="contact_type">Contact Type</label>
                        <select name="contact_type" id="contact_type" class="form-control">
                            <option>Select...</option>
                            <option value="lead">Lead</option>
                            <option value="friend">Friend</option>
                            <option vale="family">Family</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="search">Name or Email</label>
                        <input type="text" class="form-control" name="search" id="search"
                               placeholder="jane.doe@example.com">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                <hr>
                @if($contacts->count() > 0)


                    <table id="contactTable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td><a class="btn btn-default actionButton"
                                       href="{{ route('contacts.show', $contact->id) }}">
                                        View </a>
                                    <a
                                            class="btn btn-default actionButton"
                                            href="{{ route('contacts.edit', $contact->id) }}">
                                        Edit </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>
                        No contacts.
                    </p>
                @endif
            </div>
        </div>
    </div>

@stop
