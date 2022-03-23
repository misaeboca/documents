@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="col-lg-10 mb-5">
                    <h4>Listado de Documentos</h4>
                </div>
                <div class="row">
                    
                    <form class="form-inline" action="{{ route('documents.list') }}" method="GET" accept-charset="UTF-8">
                        
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="mb-2"><b>Tipo</b></label>
                                <select class="select form-control" name="tipo" id="tipo">
                                    <option value="" selected>SELECCIONE</option>

                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->TIP_ID }}">{{ $tipo->TIP_NOMBRE }}</option>
                                    @endforeach
                                </select>
                            </div> 

                            <div class="col-lg-3">
                                <label class="mb-2"><b>Proceso</b></label>
                                <select class="select form-control" name="proceso" id="proceso">
                                    <option value="" selected>SELECCIONE</option>
                                    @foreach ($procesos as $proceso)
                                        <option value="{{ $proceso->PRO_ID }}">{{ $proceso->PRO_NOMBRE }}</option>
                                    @endforeach
                                </select>
    
                            </div>  

                            <div class="col-3">
                                <label class="mb-2"><b>Nombre-Codigo-Contenido</b></label>
                                <input name="buscarpor" class="form-control mr-sm-2" type="text"
                                    placeholder="Buscar por nombre / codigo /contenido " aria-label="Search">
                            </div>
                        
                            <div class="col-lg-3 py-4">
                                <button class="btn btn-primary col-6" href="{{ route('documents.list') }}">Buscar</button>
                                <a class="btn btn-danger" href="{{ route('home') }}">Recargar</a>
                            </div>
                            <div class="col-lg-6 py-4">
                                <a class="btn btn-primary" href="{{ route('documents.create') }}">Agregar Documento</a>
                            </div>
                        </div>
                         
                    </form>

                    
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th width="15%">Nombre</th>
                        <th width="11%">Codigo</th>
                        <th width="32%">Contenido</th>
                        <th width="10%">Tipo</th>
                        <th width="10%">Id Proceso</th>
                        <th width="28%">Accción</th>
                    </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $document->DOC_NOMBRE }}</td>
                            <td>{{ $document->DOC_CODIGO }}</td>
                            <td>{{ $document->DOC_CONTENIDO }}</td>
                            <td>{{ $document->tipo->TIP_NOMBRE }}</td>
                            <td>{{ $document->proceso->PRO_NOMBRE }}</td>
                            <td>
                                <form action="{{ route('documents.destroy', $document->DOC_ID) }}" method="POST">
                                    <a class="btn btn-info"
                                        href="{{ route('documents.show', $document->DOC_ID) }}">Ver</a>
                                    <a class="btn btn-primary"
                                        href="{{ route('documents.edit', $document->DOC_ID) }}">Editar</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {!! $documents->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
