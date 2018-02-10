@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('patients') !!}">Pazienti</a>
        </li>
        <li class="breadcrumb-item active">Modifica Paziente</li>
    </ol>
    <form method="POST" action="{!! url('patients/' . $patient->id) !!}">
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
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-3">
                <label for="taxcode">Codice Fiscale</label>
                <input type="text" class="form-control" id="taxcode" name="taxcode"
                       value="{!! $patient->tax_code !!}">
            </div>
            <div class="col-3">
                <label for="sex">Sesso</label>
                {!! Form::select('sex', array('F'=> 'Femmina', 'M' => 'Maschio'), $patient->sex, array('class' => 'form-control', 'id' => 'sex')) !!}
            </div>
            <div class="col-3">
                <label for="birthdate">Data di Nascita</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate"
                       value="{!! $patient->date_of_birth !!}">
            </div>
            <div class="col-3">
                <label for="city">Comune di Nascita</label>
                {!! Form::select('birthcity', $cities, $patient->city_id, array('class' => 'select2 form-control', 'id' => 'birthcity')) !!}
            </div>
        </div>
        <hr>
        <div class="row form-group">
            <div class="col-6">
                <label for="address">Indirizzo di residenza</label>
                <input type="text" class="form-control" id="address" name="address"
                       value="{!! $patient->lastDetail->address !!}">
            </div>
            <div class="col-6">
                <label for="addresscity">Comune di residenza</label>
                {!! Form::select('addresscity', $cities, $patient->lastDetail->city_id, array('class' => 'select2 form-control', 'id' => 'addresscity')) !!}
            </div>
        </div>
        <div class="row form-group">
            <div class="col-6">
                <label for="phonenumber">Numero di telefono</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                       value="{!! $patient->lastDetail->phone_number !!}">
            </div>
            <div class="col-6">
                <label for="email">Indirizzo e-mail</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="{!! $patient->lastDetail->email !!}">
            </div>
        </div>
        <div class="row row-patient-save-btn">
            <div class="col-12">
                <button type="submit" class="btn btn-outline-primary btn-block">Salva</button>
            </div>
        </div>
    </form>
@stop