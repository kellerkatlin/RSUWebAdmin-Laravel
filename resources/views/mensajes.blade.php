@extends('layouts.app')
@section('content')
    <div class="container">
        <h1> Proceso {{ $proceso }} </h1>

        <a href="{{ route('reportevoluntario') }}">
        <button class="btn btn-primary"> Regresar </button></a>
        <br>
        <div class="alert alert-success">{{ $mensaje }}</div>
    </div>
@endsection
