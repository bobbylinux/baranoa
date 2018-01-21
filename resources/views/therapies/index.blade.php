@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('therapies') !!}">Terapie</a>
        </li>
        <li class="breadcrumb-item active">Lista terapie disponibili</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Lista terapie
            <a href="#" class="pull-right add-button add-therapy"><i class="fa fa-plus" aria-hidden="true" title="Aggiungi una terapia"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Attivo</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($therapies as $therapy)
                        <tr>
                            <td>{!! $therapy->description !!}</td>
                            <td>{!! ($therapy->enabled) ? "Sì" : "No" !!}</td>
                            <td>
                                <a class="icon-link edit-therapy" href="{!! url('therapies/'.$therapy->id) !!}"
                                   title="Modifica Terapia" data-description="{!! $therapy->description !!}" data-enabled="{!! ($therapy->enabled) ? "1" : "0" !!}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="icon-link delete-therapy"
                                   href="{!! url('therapies/'.$therapy->id) !!}" title="Elimina Terapia"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="modal-delete-therapy" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Elimina terapia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('therapies'), 'method' => 'post', 'id'=>'form-delete-therapy']) !!}
                <div class="modal-body">
                    <p>Si è sicuri di eliminare questa terapia?<br>Se la terapia è già collegata ad un accesso, non
                        sarà impossibile eliminarla.</p>
                </div>
                {{ method_field('DELETE') }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
                    <button id="btn-delete-therapy" class="btn btn-outline-danger">Elimina</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal-edit-therapy">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifica terapia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('therapies'), 'method' => 'post', 'id' => 'form-edit-therapy']) !!}
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="description">Descrizione</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   value="">
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
    </div><!-- modal-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-add-therapy">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aggiungi terapia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('therapies'), 'method' => 'post', 'id' => 'form-edit-therapy']) !!}
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="description">Descrizione</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="description">Attivo</label>
                            {!! Form::select('enabled', array(false => 'No', true => 'Sì'), FALSE, array('class'=>'form-control', 'id' => 'enabled')) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-outline-primary">Salva</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- modal -->
@stop