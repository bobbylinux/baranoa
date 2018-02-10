@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('patients') !!}">Pazienti</a>
        </li>
        <li class="breadcrumb-item active">Crea Paziente</li>
    </ol>
    <form method="POST" action="{!! url('patients') !!}">
            <div class="row form-group">
                <div class="col-6">
                    <label for="lastname">Cognome</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                           value="">
                </div>
                <div class="col-6">
                    <label for="firstname">Nome</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-3">
                    <label for="taxcode">Codice Fiscale</label>
                    <input type="text" class="form-control" id="taxcode" name="taxcode"
                           value="">
                </div>
                {{ csrf_field() }}
                <div class="col-3">
                    <label for="sex">Sesso</label>
                    {!! Form::select('sex', array('F'=> 'Femmina', 'M' => 'Maschio'), null, array('class' => 'form-control', 'id' => 'sex')) !!}
                </div>
                <div class="col-3">
                    <label for="birthdate">Data di Nascita</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate"
                           value="">
                </div>
                <div class="col-3">
                    <label for="city">Comune di Nascita</label>
                    {!! Form::select('birthcity', $cities, null, array('class' => 'select2 form-control', 'id' => 'birthcity')) !!}
                </div>
            </div>
            <hr>
            <div class="row form-group">
                <div class="col-6">
                    <label for="address">Indirizzo di residenza</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="">
                </div>
                <div class="col-6">
                    <label for="addresscity">Comune di residenza</label>
                    {!! Form::select('addresscity', $cities, null , array('class' => 'select2 form-control', 'id' => 'addresscity')) !!}
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <label for="phonenumber">Numero di telefono</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                           value="">
                </div>
                <div class="col-6">
                    <label for="email">Indirizzo e-mail</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="">
                </div>
            </div>
            <div class="row row-patient-save-btn">
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary btn-block">Salva</button>
                </div>
            </div>
    </form>
@stop