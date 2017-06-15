@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Add a Contact</h1>
                <p class="lead">Use this form to create a new a contact.</p>
                <hr>

                @include('partials.alerts.errors')

                {!! Form::open(['route' => 'contacts.store']) !!}

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('contact_type', 'Contact Type:', ['class' => 'control-label']) !!}
                            {!! Form::select('contact_type', ['lead' => 'Lead', 'friend' => 'Friend', 'family' => 'Family'], old('contact_type'), ['id' => 'contact_type', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <label for="contact_type_additional_info" class="control-label"
                                   id="contact_type_additional_info"></label>
                            {!! Form::text('contact_type_additional_info', old('contact_type_additional_info'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email_address', 'Email Address:', ['class' => 'control-label']) !!}
                    {!! Form::text('email_address', old('email_address'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('city', 'City:', ['class' => 'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('state', 'State:', ['class' => 'control-label']) !!}
                    {!! Form::select('state', [
                    'AL'=>'Alabama',
                    'AK'=>'Alaska',
                    'AZ'=>'Arizona',
                    'AR'=>'Arkansas',
                    'CA'=>'California',
                    'CO'=>'Colorado',
                    'CT'=>'Connecticut',
                    'DE'=>'Delaware',
                    'DC'=>'District of Columbia',
                    'FL'=>'Florida',
                    'GA'=>'Georgia',
                    'HI'=>'Hawaii',
                    'ID'=>'Idaho',
                    'IL'=>'Illinois',
                    'IN'=>'Indiana',
                    'IA'=>'Iowa',
                    'KS'=>'Kansas',
                    'KY'=>'Kentucky',
                    'LA'=>'Louisiana',
                    'ME'=>'Maine',
                    'MD'=>'Maryland',
                    'MA'=>'Massachusetts',
                    'MI'=>'Michigan',
                    'MN'=>'Minnesota',
                    'MS'=>'Mississippi',
                    'MO'=>'Missouri',
                    'MT'=>'Montana',
                    'NE'=>'Nebraska',
                    'NV'=>'Nevada',
                    'NH'=>'New Hampshire',
                    'NJ'=>'New Jersey',
                    'NM'=>'New Mexico',
                    'NY'=>'New York',
                    'NC'=>'North Carolina',
                    'ND'=>'North Dakota',
                    'OH'=>'Ohio',
                    'OK'=>'Oklahoma',
                    'OR'=>'Oregon',
                    'PA'=>'Pennsylvania',
                    'RI'=>'Rhode Island',
                    'SC'=>'South Carolina',
                    'SD'=>'South Dakota',
                    'TN'=>'Tennessee',
                    'TX'=>'Texas',
                    'UT'=>'Utah',
                    'VT'=>'Vermont',
                    'VA'=>'Virginia',
                    'WA'=>'Washington',
                    'WV'=>'West Virginia',
                    'WI'=>'Wisconsin',
                    'WY'=>'Wyoming',
                    ],
                    old('state'),
                    ['class' => 'form-control' ]) !!}

                </div>

                <div class="form-group">
                    {!! Form::label('postal_code', 'Postal Code:', ['class' => 'control-label']) !!}
                    {!! Form::text('postal_code', old('postal_code'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('phone_number_1', 'Phone Number 1:', ['class' => 'control-label']) !!}
                            {!! Form::text('phone_number_1', old('phone_number_1'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('phone_number_1_type', 'Type:', ['class' => 'control-label']) !!}
                            {!! Form::select('phone_number_1_type', ['mobile' => 'Mobile', 'home' => 'Home', 'office' => 'Office'], old('phone_number_1_type'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('phone_number_2', 'Phone Number 2:', ['class' => 'control-label']) !!}
                            {!! Form::text('phone_number_2', old('phone_number_2'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('phone_number_2_type', 'Type:', ['class' => 'control-label']) !!}
                            {!! Form::select('phone_number_2_type', ['mobile' => 'Mobile', 'home' => 'Home', 'office' => 'Office'], old('phone_number_2_type'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('phone_number_3', 'Phone Number 3:', ['class' => 'control-label']) !!}
                            {!! Form::text('phone_number_3', old('phone_number_3'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('phone_number_3_type', 'Type:', ['class' => 'control-label']) !!}
                            {!! Form::select('phone_number_3_type', ['mobile' => 'Mobile', 'home' => 'Home', 'office' => 'Office'], old('phone_number_3_type'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                {!! Form::submit('Create New Contact', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(window).bind("load", function () {
            var contact_type = $('#contact_type').val();
            if (contact_type == 'lead') {
                $('#contact_type_additional_info').html('Lead Score');
            } else if (contact_type == 'friend') {
                $('#contact_type_additional_info').html('Years Known');
            } else {
                $('#contact_type_additional_info').html('Relationship Type');
            }
        });
        $(function () {

            $('#contact_type').on('change', function () {
                var contact_type = $('#contact_type').val();
                if (contact_type == 'lead') {
                    $('#contact_type_additional_info').html('Lead Score');
                } else if (contact_type == 'friend') {
                    $('#contact_type_additional_info').html('Years Known');
                } else {
                    $('#contact_type_additional_info').html('Relationship Type');
                }
            });
        });
    </script>
@stop

