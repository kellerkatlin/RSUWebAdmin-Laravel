@extends('layouts.header-login')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center vh-100 gap-5">
    <div>
        <a href="/admin/dashboard" class="text-uppercase btn btn-success btn-lg">Unidad de formación</a>
      
    </div>
    <div>
        <a class="text-uppercase btn btn-success btn-lg">Unidad de producción</a>
    </div>
    <div>
        <a class="text-uppercase btn btn-success btn-lg">Unidad de I+D+I</a>
    </div>
</div>

@endsection
