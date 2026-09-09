@extends('layouts.app')
@section('content')
    <h1>Lista de Alunos</h1>
    @if(count($alunos) > 0)
        <ul>
            @foreach($alunos as $aluno)
                <li>{{ $aluno->nome }}</li>
            @endforeach
        </ul>
    @endif
@endsection