<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Tipos;
use App\Models\Procesos;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipos::all();
        $procesos = Procesos::all();

        $documents = Document::paginate(5);
        return view('home', compact('documents', 'tipos', 'procesos'));
    }

    public function list(Request $request)
    {
        $tipos = Tipos::all();
        $procesos = Procesos::all();
        $tipo=''; $proceso='';$buscar='';


        if($request->tipo)
            $tipo = $request->tipo;
        
        if($request->proceso)
            $proceso = $request->proceso;
        
        if($request->buscarpor)
            $buscar = $request->buscarpor;


        $documents = Document::buscarTipo($tipo)->Proceso($proceso)->Buscar($buscar)->paginate(5);
        return view('home', compact('documents', 'tipos', 'procesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipos::all();
        $procesos = Procesos::all();

        return view('documents.create', compact('tipos', 'procesos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'DOC_NOMBRE' => 'required',
            'DOC_CONTENIDO' => 'required',
            'DOC_ID_TIPO' => 'required',
            'DOC_ID_PROCESO' => 'required',
        ]);

        $tipo = Tipos::where('TIP_ID', $request->DOC_ID_TIPO)->first();
        $proceso = Procesos::where('PRO_ID', $request->DOC_ID_PROCESO)->first();
        $cadena = $tipo->TIP_PREFIJO . '-' . $proceso->PRO_PREFIJO . '-';

        $cantidad = Document::where('DOC_CODIGO', 'like', '%' . $cadena . '%')->count();

        $document = new Document([
            'DOC_NOMBRE' => $request->DOC_NOMBRE,
            'DOC_CONTENIDO' => $request->DOC_CONTENIDO,
            'DOC_CODIGO' => $cadena . ($cantidad + 1),
            'DOC_ID_TIPO' => $request->DOC_ID_TIPO,
            'DOC_ID_PROCESO' => $request->DOC_ID_PROCESO
        ]);

        $document->save();
        return redirect('/home')->with('success', 'Documento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::where('DOC_ID', $id)->first();
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos = Tipos::all();
        $procesos = Procesos::all();
        $document = Document::where('DOC_ID', $id)->first();
        return view('documents.edit', compact('document', 'tipos', 'procesos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'DOC_NOMBRE' => 'required',
            'DOC_CONTENIDO' => 'required',
            'DOC_ID_TIPO' => 'required',
            'DOC_ID_PROCESO' => 'required',
            'DOC_ID' => 'required'
        ], [
            'DOC_NOMBRE.required' => 'Nombre es requerido',
            'DOC_CONTENIDO.required' => 'El contenido es requerido',
            'DOC_ID_TIPO.required' => 'El tipo es requerido',
            'DOC_ID_PROCESO.required' => 'El proceso es requerido',
            'DOC_ID.required' => 'El id es requerido'
        ]);

        $document = Document::where('DOC_ID', $request->DOC_ID)->first();
        if(!$document)
            return redirect('/home')->with('danger', 'Documento no existe');

        if (($request->DOC_ID_TIPO !== $document->DOC_ID_TIPO)  or ($request->DOC_ID_PROCESO !== $document->DOC_ID_PROCESO)) {
            $tipo = Tipos::where('TIP_ID', $request->DOC_ID_TIPO)->first();
            $proceso = Procesos::where('PRO_ID', $request->DOC_ID_PROCESO)->first();
            $cadena = $tipo->TIP_PREFIJO . '-' . $proceso->PRO_PREFIJO . '-';

            $cantidad = Document::where('DOC_CODIGO', 'like', '%' . $cadena . '%')->count();
            $validatedData['DOC_CODIGO'] = $cadena . ($cantidad + 1);
        }

        Document::where('DOC_ID', $request->DOC_ID)->update($validatedData);
        return redirect('/home')->with('success', 'Documento modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Document::where('DOC_ID', $id)->delete();
        return redirect('/home')->with('success', 'Documento eliminado con exito');
    }
}
