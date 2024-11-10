@extends('menu')

@section('content')

<div class="container w-40 border p-4 mt-4">
    <form method="post" action="{{route('recetas-add')}}">
    @csrf

    @error('doctor')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror
    @error('instrucciones')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <div class="mb-3">
        <label class="form-label">Doctor</label> 
        <label class="form-label" style="color:red;">*</label>
        <input type="text" class="form-control" name = "doctor">
    </div>
    <div class="mb-3">
        <label class="form-label">Instrucciones</label>
        <input type="text" class="form-control" name = "instrucciones">
    </div>
    <div class="mb-3">
        <label class="form-label">Medicamento</label>
        <label class="form-label" style="color:red;">*</label>
        <select name="id_medicamento">
            @foreach ($medicamentos as $medicamento)
            <option value="{{$medicamento->id}}">{{$medicamento->nombre}}</option>
            @endforeach
        </select>
    </div>
    <a href="{{route('recetas')}}" class="btn btn-light">Volver</a>
    <input type="submit" class="btn btn-primary" value="Agregar">

    </form>
</div>
@endsection