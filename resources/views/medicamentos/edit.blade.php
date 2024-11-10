@extends('menu')

@section('content')

<div class="container w-40 border p-4 mt-4">
    <form method="post" action="{{route('medicamentos-edit', ['id'=>$medicamento->id])}}">
    @csrf

    @if(session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

    @error('nombre')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror
    @error('descripcion')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror
    @error('vencimiento')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <div class="mb-3">
        <label class="form-label">Nombre</label> 
        <label class="form-label" style="color:red;">*</label>
        <input type="text" class="form-control" name = "nombre" value="{{$medicamento->nombre}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Descripcion</label>
        <input type="text" class="form-control" name = "descripcion" value = "{{$medicamento->descripcion}}">
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Vencimiento</label>
        <label class="form-label" style="color:red;">*</label>
        <input type="date" class="form-control" name = "vencimiento" value = "{{$medicamento->vencimiento}}">
    </div>
    <a href="{{route('medicamentos')}}" class="btn btn-light">Volver</a>
    <input type="submit" class="btn btn-primary" value="Editar">

    </form>
</div>
@endsection