@extends('layouts.dash')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tipos de Usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('tipo_u.create') }}"> Crear nuevo tipo</a>
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Tipo de Usuario</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($tipo_u as $tipo)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tipo->tipo_u }}</td>
            <td>
                <form action="{{ route('tipo_u.destroy', $tipo->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('tipo_u.show', $tipo->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('tipo_u.edit', $tipo->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

{!! $tipo_u->links() !!}
@endsection
