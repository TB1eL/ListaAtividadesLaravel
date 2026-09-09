@extends('layouts.app')

@section('content')
    <h1>Editar Aluno</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/alunos/{{ $aluno->id }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label for="nome">Nome do Aluno:</label><br>
            <input type="text" name="nome" id="nome" value="{{ old('nome', $aluno->nome) }}">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="curso_id">ID do Curso:</label><br>
            <input type="number" name="curso_id" id="curso_id" value="{{ old('curso_id', $aluno->curso_id) }}">
        </div>

        <button type="submit">Atualizar Aluno</button>
    </form>
    
    <br>
    <a href="/alunos">Voltar para a lista</a>
@endsection