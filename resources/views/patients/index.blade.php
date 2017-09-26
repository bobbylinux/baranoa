@extends('../layouts.main')
@section('content')
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{!! url('patients') !!}">Pazienti</a>
        </li>
        <li class="breadcrumb-item active">Lista dei pazienti</li>
    </ol>
@stop