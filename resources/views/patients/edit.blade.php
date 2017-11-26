@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('patients') !!}">Pazienti</a>
        </li>
        <li class="breadcrumb-item active">Modifica Paziente</li>
    </ol>
    {!! Form::open(['url' => url('patients'), 'method' => 'get']) !!}
    @foreach($patients as $patient)
        <div class="row form-group">
            <div class="col-6">
                <label for="lastname">Cognome</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                       value="{!! $patient->last_name !!}">
            </div>
            <div class="col-6">
                <label for="firstname">Nome</label>
                <input type="text" class="form-control" id="firstname" name="firstname"
                       value="{!! $patient->first_name !!}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-4">
                <label for="taxcode">Codice Fiscale</label>
                <input type="text" class="form-control" id="taxcode" name="taxcode" value="{!! $patient->tax_code !!}">
            </div>
            <div class="col-4">
                <label for="birthdate">Data di Nascita</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate"
                       value="{!! $patient->date_of_birth !!}">
            </div>
            <div class="col-4">
                <label for="city">Comune di Nascita</label>
                {!! Form::select('birthcity', $cities, $patient->city_id, array('class' => 'select2 form-control', 'id' => 'birthcity')) !!}
            </div>
        </div>

        @foreach($patient->details as $detail)
            <div class="row form-group">
                <div class="col-4">
                    <label for="address">Indirizzo di residenza</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="{!! $detail->address !!}">
                </div>
            </div>
        @endforeach

        <div class="row row-patient-save-btn">
            <div class="col-12">
                <button type="submit" class="btn btn-outline-primary btn-block">Salva</button>
            </div>
        </div>
    @endforeach

    {!! Form::close !!}
@stop