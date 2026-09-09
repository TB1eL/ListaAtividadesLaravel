@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Lista de Alunos</h1>
        
        <a href="/alunos/create" class="text-blue-500 underline mb-4 inline-block">Cadastrar Novo Aluno</a>
        <br><br>

        @if(count($alunos) > 0)
            <ul class="list-disc pl-5">
                @foreach($alunos as $aluno)
                    <li class="mb-2">
                        {{ $aluno->nome }} - {{ $aluno->curso?->nome }}
                        <a href="/alunos/{{ $aluno->id }}" class="text-green-500 ml-2">Ver</a> | 
                        <a href="/alunos/{{ $aluno->id }}/edit" class="text-yellow-500 ml-2">Editar</a> | 
                        <form action="/alunos/{{ $aluno->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Excluir</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection