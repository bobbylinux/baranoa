@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('disciplines') !!}">Discipline</a>
        </li>
        <li class="breadcrumb-item active">Lista discipline disponibili</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Lista discipline
            <a href="#" class="pull-right add-button add-discipline"><i class="fa fa-plus" aria-hidden="true"
                                                                        title="Aggiungi una disciplina"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Descrizione</th>
                        <th>Attiva</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($disciplines as $discipline)
                        <tr>
                            <td>{!! $discipline->description !!}</td>
                            <td>{!! ($discipline->enabled) ? "Sì" : "No" !!}</td>
                            <td>
                                <a class="icon-link edit-discipline" href="{!! url('disciplines/'.$discipline->id) !!}"
                                   title="Modifica Disciplina" data-description="{!! $discipline->description !!}" data-enabled="{!! ($discipline->enabled) ? "1" : "0"  !!}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="icon-link delete-discipline"
                                   href="{!! url('disciplines/'.$discipline->id) !!}" title="Elimina Disciplina"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="modal-delete-discipline" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Elimina disciplina</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('disciplines'), 'method' => 'post', 'id'=>'form-delete-discipline']) !!}
                <div class="modal-body">
                    <p>Si è sicuri di eliminare questa disciplina?<br>Se la disciplina è già collegata ad un medico, non
                        sarà impossibile eliminarla.</p>
                </div>
                {{ method_field('DELETE') }}
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
                    <button id="btn-delete-discipline" class="btn btn-outline-danger">Elimina</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="modal-edit-discipline">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifica disciplina</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => url('disciplines'), 'method' => 'post', 'id' => 'form-edit-discipline']) !!}
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
                            <label for="description">Attiva</label>
                            {!! Form::select('enabled', array(false => 'No', true => 'Sì'), false, array('class'=>'form-control', 'id' => 'enabled')) !!}
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