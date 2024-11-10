<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Medicamento;

class MedicamentosController extends Controller
{
    public function index(){
        $medicamentos = Medicamento::all();

        return view('medicamentos.index', ['medicamentos' => $medicamentos]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:5|max:255',
            'descripcion' => 'max:255',
            'vencimiento' => 'required'
        ]);

        if ($validator->fails()){
            return redirect()->route('medicamentos-add')->withErrors($validator);
        }

        $medicamento = new Medicamento;
        $medicamento->nombre = $request->nombre;
        $medicamento->descripcion = $request->descripcion;
        $medicamento->vencimiento = $request->vencimiento;
        $medicamento->save();

        return redirect()->route('medicamentos')->with('success', 'El medicamento se ha añadido correctamente');
    }

    public function destroy($id){
        $medicamento = Medicamento::find($id);
        foreach ($medicamento->recetas() as $receta) $receta->delete();
        $medicamento->delete();
        return redirect()->route('medicamentos')->with('success', 'El medicamento se ha eliminado correctamente');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:5|max:255',
            'descripcion' => 'max:255',
            'vencimiento' => 'required'
        ]);

        if ($validator->fails()){
            return redirect()->route('medicamentos-edit', ['id'=>$id])->withErrors($validator);
        }

        $medicamento = Medicamento::find($id);
        $medicamento->nombre = $request->nombre;
        $medicamento->descripcion = $request->descripcion;
        $medicamento->vencimiento = $request->vencimiento;
        $medicamento->save();
        
        return redirect()->route('medicamentos')->with('success', 'El medicamento editado correctamente');
    }

    public function show($id){
        $medicamento = Medicamento::find($id);
        return view('medicamentos.edit', ['medicamento' => $medicamento]);
    }

}
