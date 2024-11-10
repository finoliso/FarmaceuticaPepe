<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Receta;
use App\Models\Medicamento;

class RecetasController extends Controller
{
    
    public function index(){
        $recetas = Receta::with('medicamento')->get();
        return view('recetas.index', ['recetas' => $recetas]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'doctor' => 'required|min:5|max:255',
            'instrucciones' => 'required|min:10',
            'id_medicamento' => 'required'
        ]);

        if ($validator->fails()){
            return redirect()->route('recetas-add')->withErrors($validator);
        }

        $receta = new Receta;
        $receta->doctor = $request->doctor;
        $receta->instrucciones = $request->instrucciones;
        $receta->id_medicamento = $request->id_medicamento;
        $receta->save();

        return redirect()->route('recetas')->with('success', 'La receta se ha añadido correctamente');
    }

    public function destroy($id){
        $receta = Receta::find($id);
        $receta->delete();

        return redirect()->route('recetas')->with('success', 'La receta se ha eliminado correctamente');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'doctor' => 'required|min:5|max:255',
            'instrucciones' => 'required|min:10',
            'id_medicamento' => 'required'
        ]);

        if ($validator->fails()){
            return redirect()->route('recetas-edit', ['id'=>$id])->withErrors($validator);
        }

        $receta = Receta::find($id);
        $receta->doctor = $request->doctor;
        $receta->instrucciones = $request->instrucciones;
        $receta->id_medico = $request->id_medico;
        $receta->save();
        
        return redirect()->route('recetas')->with('success', 'La receta se ha editado correctamente');
    }

    public function show($id){
        $receta = Receta::find($id);
        $medicamentos = Medicamento::all();
        return view('recetas.edit', ['receta' => $receta, 'medicamentos' => $medicamentos]);
    }

    public function add(){
        $medicamentos = Medicamento::all();
        return view('recetas.add', ['medicamentos' => $medicamentos]);
    }

}