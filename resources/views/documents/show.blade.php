@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-10">
                <h4>Detalle del  Documento</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body bg-ligth">
             
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span class="col-6 h6"><b>Nombre:</b></span>
                        <span class="col-6">{{ $document->DOC_NOMBRE }}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="col-6 h6"><b>Codigo:</b></span>
                        <span class="col-6">{{ $document->DOC_CODIGO }}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="col-6 h6"><b>Contenido:</b></span>
                        <span class="col-6">{{ $document->DOC_CONTENIDO }}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="col-6 h6"><b>Tipo:</b></span>
                        <span class="col-6">{{ $document->tipo->TIP_NOMBRE}}</span>
                    </li>
                    <li class="list-group-item">
                        <span class="col-6 h6"><b>Proceso:</b></span>
                        <span class="col-6">{{ $document->proceso->PRO_NOMBRE }}</span>
                    </li>
     
                    <li class="list-group-item"></li>
                </ul>
                 <!-- Buttons -->
                <div class="d-sm-flex justify-content-end mb-2">
                    <a href="{{ route('home') }}" class="btn  btn-danger me-2 mb-0">Regresar</a>
                </div>

            </div>
           
        </div>

    </div>
@endsection
