@extends('layouts.app')

@section('content')
    <h1>Detalhes do Aluno</h1>

    <div style="margin-bottom: 20px;">
        <p><strong>ID:</strong> {{ $aluno->id }}</p>
        <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
        <p><strong>Curso:</strong> {{ $aluno->curso?->nome }}</p>
    </div>

    <a href="/alunos">Voltar para a lista</a> | 
    <a href="/alunos/{{ $aluno->id }}/edit">Editar este aluno</a>
@endsection