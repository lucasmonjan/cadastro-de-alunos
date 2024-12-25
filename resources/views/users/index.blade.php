@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Listar Alunos</h2>
        <a href="{{ route('user.create') }}" class="btn btn-success">Cadastrar</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @forelse ($users as $user)
                <div class="mb-3">
                    <h5 class="card-title">ID: {{ $user->id }}</h5>
                    <p class="card-text">
                        <strong>Nome:</strong> {{ $user->name }}<br>
                        <strong>E-mail:</strong> {{ $user->email }}
                    </p>
                    <div class="d-flex">
                        <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-primary btn-sm me-2">Visualizar</a>
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" onsubmit="return confirm('Tem certeza que deseja eliminar esse registro?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
                <hr>
            @empty
          gvtgvlt
          gt\po  g    <p class="text-muted">Nenhum aluno encontrado.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
