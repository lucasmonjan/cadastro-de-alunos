@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Cadastrar Aluno</h2>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Listar Alunos</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user-store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                placeholder="Nome Completo do Aluno"
                value="{{ old('name') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                placeholder="Digite o Email do Aluno"
                value="{{ old('email') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha:</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="Senha do Aluno (mínimo 6 caracteres)"
                required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
</div>
@endsection
