@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('patients') !!}">Pazienti</a>
        </li>
        <li class="breadcrumb-item active">Ricerca-Inserimento Pazienti</li>
    </ol>
    {!! Form::open(['url' => url('patients'), 'method' => 'get']) !!}
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
            <label for="birthdate">Comune di nascita o stato estero di nascita</label>
            <input type="text" class="form-control" id="birthcity" name="birthcity">
        </div>
    </div>
    <div class="row form-group row-patient-search-btn">
        <div class="col-12">
            <button type="submit" class="btn btn-outline-info btn-block">Ricerca</button>
        </div>
    </div>
    {!! Form::close() !!}

    @if (isset($patients))
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
                                    <a class="icon-link btn-edit-patient"
                                       href="{!! url('patients/'.$patient->id.'/edit') !!}" title="Modifica Anagrafica"><i
                                                class="fa fa-address-card" aria-hidden="true"></i></a>
                                    <a class="icon-link btn-create-access"
                                       href="{!! url('accesses/'. $patient->id.'/before_new_access') !!}" data-id="{!! $patient->id !!}"
                                       title="Nuovo Accesso"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{!! url('patients/create') !!}" class="btn btn-outline-success btn-block">Nuovo Paziente</a>
            </div>
        </div>
    @endif

    <div class="modal" id="modal-new-cycle" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuovo Ciclo Di Cura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Il paziente non ha un ciclo di cura aperto. Ne verrà aperto uno nuovo.</p>
                </div>
                <div class="modal-footer">
                    <a type="button" id="btn-new-cycle" class="btn btn-primary">Conferma</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                </div>
            </div>
        </div>
    </div>
@stop