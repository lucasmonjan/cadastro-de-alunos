@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Detalhes do Aluno</h2>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Listar</a>
            <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-primary me-2">Editar</a>
            <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button
                    type="submit"
                    class="btn btn-danger"
                    onclick="return confirm('Tem certeza que deseja eliminar esse registro?')">
                    Eliminar
                </button>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4 shadow-sm">
        <h4>Informações do Aluno</h4>
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nome:</strong> {{ $user->name }}</p>
        <p><strong>E-mail:</strong> {{ $user->email }}</p>
        <p><strong>Cadastrado em:</strong> {{ $user->created_at }}</p>
        <p><strong>Editado em:</strong> {{ $user->updated_at }}</p>
    </div>
</div>
@endsection
