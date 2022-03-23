@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-10">
                <h4>Agregar Nuevo Documento</h4>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <!-- /.card-header -->
            <div class="card-body bg-ligth">
                <form method="post" id="_form_register" action="{{ route('documents.store') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data" class="needs-validation">
                    {{ csrf_field() }}

                    <div class="row mb-2">
                        <div class="col-12">
                            <label class="mb-2"><b>NOMBRE DEL DOCUMENTO</b></label>
                            <input type="text" name="DOC_NOMBRE" id="DOC_NOMBRE"
                                class="form-control {{ $errors->has('DOC_NOMBRE') ? 'is-invalid' : '' }}"
                                value="{{ old('value') }}" placeholder="NOMBRE DEL DOCUMENTO" autofocus required>

                            @if ($errors->has('DOC_NOMBRE'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('DOC_NOMBRE') }}</strong>
                                </div>
                            @endif

                            <div class="invalid-feedback">
                                <strong>Campo requerido</strong>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12">
                            <label class="mb-2"><b>CONTENIDO</b></label>
                            <input type="text" name="DOC_CONTENIDO" id="DOC_CONTENIDO"
                                class="form-control {{ $errors->has('DOC_CONTENIDO') ? 'is-invalid' : '' }}"
                                value="{{ old('value') }}" placeholder="CONTENIDO DEL DOCUMENTO" autofocus required>

                            @if ($errors->has('DOC_CONTENIDO'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('DOC_CONTENIDO') }}</strong>
                                </div>
                            @endif

                            <div class="invalid-feedback">
                                <strong>Campo requerido</strong>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12">
                            <label class="mb-2"><b>TIPO</b></label>
        
                            <select class="select form-control" name="DOC_ID_TIPO" id="DOC_ID_TIPO">
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->TIP_ID }}">{{ $tipo->TIP_NOMBRE }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('DOC_ID_TIPO'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('DOC_ID_TIPO') }}</strong>
                                </div>
                            @endif

                            <div class="invalid-feedback">
                                <strong>Campo requerido</strong>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12">
                            <label class="mb-2"><b>PROCESO</b></label>
                  
                            <select class="select form-control" name="DOC_ID_PROCESO" id="DOC_ID_PROCESO">
                                @foreach ($procesos as $proceso)
                                    <option value="{{ $proceso->PRO_ID }}">{{ $proceso->PRO_NOMBRE }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('DOC_ID_PROCESO'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('DOC_ID_PROCESO') }}</strong>
                                </div>
                            @endif

                            <div class="invalid-feedback">
                                <strong>Campo requerido</strong>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-4 float-right">
                        <div class="col-sm-12">
                            <a href="{{ route('home') }}" class="btn btn-danger" id="btn_cancel" value="cancel">CANCELAR
                            </a>
                            <button type="submit" class="btn btn-primary" id="_btn_save" value="create">GUARDAR
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
