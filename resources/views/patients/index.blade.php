@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('patients') !!}">Pazienti</a>
        </li>
        <li class="breadcrumb-item active">Ricerca-Inserimento Pazienti</li>
    </ol>
    {!! Form::open(['url' => '', 'method' => 'post']) !!}
    <div class="row">
        <div class="col-6">
            <label for="lastname">Cognome</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="col-6">
            <label for="firstname">Nome</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="taxcode">Codice Fiscale</label>
            <input type="text" class="form-control" id="taxcode" name="taxcode">
        </div>
        <div class="col-4">
            <label for="birthdate">Data di Nascita</label>
            <input type="text" class="form-control" id="birthdate" name="birthdate">
        </div>
        <div class="col-4">
            <label for="city">Comune di Nascita</label>
            <input type="text" class="form-control" id="city" name="city">
        </div>
    </div>
    <div class="row row-patient-search-btn">
        <div class="col-12">
            <button type="button" class="btn btn-outline-info btn-block">Ricerca</button>
        </div>
    </div>
    {!! Form::close() !!}

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Lista Pazienti
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Cognome</th>
                        <th>Nome</th>
                        <th>Data di Nascita</th>
                        <th>Comune di Nascita</th>
                        <th>Codice Fiscale</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@stop