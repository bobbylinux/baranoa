@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('patients') !!}">Pazienti</a>
        </li>
        <li class="breadcrumb-item active">Ricerca-Inserimento Pazienti</li>
    </ol>
    {!! Form::open(['url' => url('/patients'), 'method' => 'get']) !!}
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
            <input type="date" class="form-control" id="birthdate" name="birthdate">
        </div>
        <div class="col-4">
            <label for="city">Comune di Nascita</label>
            {!! Form::select('birthcity', $cities, null, array('class' => 'select2 form-control', 'id' => 'birthcity')) !!}
        </div>
    </div>
    <div class="row row-patient-search-btn">
        <div class="col-12">
            <button type="submit" class="btn btn-outline-info btn-block">Ricerca</button>
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
                    @foreach($patients as $patient)
                        <tr>
                            <td>{!! $patient->last_name !!}</td>
                            <td>{!! $patient->first_name !!}</td>
                            <td>{!! $patient->date_of_birth !!}</td>
                            <td>{!! $patient->city->name !!}</td>
                            <td>{!! $patient->tax_code !!}</td>
                            <td>
                                <a class="icon-link" href="{!! url('patients/'.$patient->id.'/edit') !!}" title="Modifica Anagrafica"><i class="fa fa-address-card" aria-hidden="true"></i></a>
                                <a class="icon-link" href="#" title="Nuovo Accesso"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@stop