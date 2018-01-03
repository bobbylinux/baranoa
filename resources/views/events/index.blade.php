@extends('../layouts/main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('events') !!}">Calendario</a>
        </li>
        <li class="breadcrumb-item active">Calendario</li>
    </ol>
    <div class="col-12">
    <div id='calendar'></div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="create-event">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-label">Crea nuovo accesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="patient">Paziente</label>
                            <input type="text" name="patient" class="form-control" id="patient">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-outline-primary">Conferma</button>
                </div>
            </div>
        </div>
    </div>
@stop