@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('physiotherapists') !!}">Fisioterapisti</a>
        </li>
        <li class="breadcrumb-item active">Lista fisioterapisti disponibili</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Lista fisioterapisti
            <a href="#" class="pull-right add-button add-physiotherapist"><i class="fa fa-plus" aria-hidden="true" title="Aggiungi un fisioterapista"></i>
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
                    @foreach($physiotherapists as $physiotherapist)
                        <tr>
                            <td>{!! $physiotherapist->last_name !!} {!! $physiotherapist->first_name !!}</td>
                            <td>{!! ($physiotherapist->enabled) ? "Sì" : "No" !!}</td>
                            <td>
                                <a class="icon-link edit-physiotherapist" href="{!! url('physiotherapists/'.$physiotherapist->id) !!}"
                                   title="Modifica Fisioterapista" data-last-name="{!! $physiotherapist->last_name !!}" data-first-name="{!! $physiotherapist->first_name !!}" data-enabled="{!! ($physiotherapist->enabled) ? "1" : "0" !!}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="icon-link delete-physiotherapist"
                                   href="{!! url('physiotherapists/'.$physiotherapist->id) !!}" title="Elimina Fisioterapista"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="modal-delete-physiotherapist" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Elimina fisioterapista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('physiotherapists'), 'method' => 'post', 'id'=>'form-delete-physiotherapist']) !!}
                <div class="modal-body">
                    <p>Si è sicuri di eliminare questo fisioterapista?<br>Se il fisioterapista è già collegata ad un accesso, non
                        sarà impossibile eliminarlo.</p>
                </div>
                {{ method_field('DELETE') }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
                    <button id="btn-delete-physiotherapist" class="btn btn-outline-danger">Elimina</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal-edit-physiotherapist">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifica fisioterapista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('physiotherapists'), 'method' => 'post', 'id' => 'form-edit-physiotherapist']) !!}
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

    <div class="modal" tabindex="-1" role="dialog" id="modal-add-physiotherapist">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aggiungi fisioterapista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('physiotherapists'), 'method' => 'post', 'id' => 'form-edit-physiotherapist']) !!}
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
    </div>
@stop