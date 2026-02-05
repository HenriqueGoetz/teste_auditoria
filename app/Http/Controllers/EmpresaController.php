<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpresaRequest;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    public function store(StoreEmpresaRequest $request)
    {
        $data = $request->validated();
        $data['resultado'] = ($data['creditos_possiveis'] / $data['icms_pago']) * 100;
        $empresa = Empresa::create($data);
        return response()->json($empresa, 201);
    }

    public function index()
    {
        $empresas = Empresa::all();

        return view('empresas', [
            'empresas' => $empresas
        ]);
    }

    public function show(int $id)
    {
        $empresa = Empresa::findOrFail($id);

        return view('relatorio', [
            'empresa' => $empresa
        ]);
    }
}
