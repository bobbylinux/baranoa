@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('doctors') !!}">Medici</a>
        </li>
        <li class="breadcrumb-item active">Lista medici disponibili</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Lista medici
            <a href="#" class="pull-right add-button add-doctor"><i class="fa fa-plus" aria-hidden="true" title="Aggiungi un medico"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Disciplina</th>
                        <th>Attivo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{!! $doctor->last_name !!} {!! $doctor->first_name !!}</td>
                            <td>{!! $doctor->discipline->description !!}</td>
                            <td>{!! ($doctor->enabled) ? "Sì" : "No" !!}</td>
                            <td>
                                <a class="icon-link edit-doctor" href="{!! url('doctors/'.$doctor->id) !!}"
                                   title="Modifica Medico" data-last-name="{!! $doctor->last_name !!}" data-first-name="{!! $doctor->first_name !!}" data-discipline="{!! $doctor->discipline->id !!}" data-enabled="{!! ($doctor->enabled) ? "1" : "0" !!}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="icon-link delete-doctor"
                                   href="{!! url('doctors/'.$doctor->id) !!}" title="Elimina Medico"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="modal-delete-doctor" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Elimina medico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('doctors'), 'method' => 'post', 'id'=>'form-delete-doctor']) !!}
                <div class="modal-body">
                    <p>Si è sicuri di eliminare questo medico?<br>Se il medico è già collegata ad un accesso, non
                        sarà impossibile eliminarlo.</p>
                </div>
                {{ method_field('DELETE') }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
                    <button id="btn-delete-doctor" class="btn btn-outline-danger">Elimina</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal-edit-doctor">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifica medico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('doctors'), 'method' => 'post', 'id' => 'form-edit-doctor']) !!}
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="lastname">Cognome</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                   value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="firstname">Nome</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                   value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="description">Disciplina</label>
                            {!! Form::select('discipline', $disciplines, 1, array('class'=>'form-control', 'id' => 'discipline')) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="description">Attivo</label>
                            {!! Form::select('enabled', array(false => 'No', true => 'Sì'), FALSE, array('class'=>'form-control', 'id' => 'enabled')) !!}
                        </div>
                    </div>
                </div>
                {{ method_field('PUT') }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-outline-primary">Salva</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop