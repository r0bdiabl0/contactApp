@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>{{ $contact->name }}</h1>
                <p class="lead">{{ ucfirst($contact->contact_type) }}<br>
                    @if ($contact->contact_type == 'lead')
                        Lead Score: {{ $contact->contact_type_additional_info }}
                    @elseif ($contact->contact_type == 'friend')
                        Years Known: {{ $contact->contact_type_additional_info }}
                    @else
                        Relationship Type: {{ $contact->contact_type_additional_info }}
                    @endif
                </p>
                <hr>
                <h4>Contact Info</h4>
                <address>
                    {{ $contact->address }}<br>
                    {{ $contact->city }}, {{ $contact->state }} {{ $contact->postal_code }}<br>
                    <abbr title="Phone">{{ ucfirst($contact->phone_number_1_type) }}
                        :</abbr> {{ $contact->phone_number_1 }}
                    @if (!empty($contact->phone_number_2))
                        <abbr title="Phone">{{ ucfirst($contact->phone_number_2_type) }}
                            :</abbr> {{ $contact->phone_number_2 }}
                    @endif
                    @if (!empty($contact->phone_number_3))
                        <abbr title="Phone">{{ ucfirst($contact->phone_number_3_type) }}
                            :</abbr> {{ $contact->phone_number_3 }}
                    @endif
                    @if (!empty($contact->email))
                        <a href="mailto:#">{{ $contact->email_address }}</a>
                    @endif
                </address>
                <hr>
                <h4>Current Weather</h4>
                <iframe src="http://api.openweathermap.org/data/2.5/weather?q={{ $contact->city }}&mode=html&appid=5aadbddb1630d75b5974079d3ad7f3d6"
                        frameborder="0"></iframe>
                <hr>

                <a href="{{ route('contacts.index') }}" class="btn btn-info">Return to Contact List</a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Edit Contact</a>

                <div class="pull-right">
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['contacts.destroy', $contact->id]
                    ]) !!}
                    {!! Form::submit('Delete Contact', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
