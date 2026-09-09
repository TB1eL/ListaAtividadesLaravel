<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Requests\AlunoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate; // Correção para Laravel 11

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $quantidade = Aluno::count();
        $query = Aluno::query();

        if ($request->has('curso_id')) {
            $query->where('curso_id', $request->curso_id);
        }

        if ($request->has('busca')) {
            $query->where('nome', 'like', '%' . $request->busca . '%');
        }

        $alunos = $query->latest()->get();

        return view('alunos.index', compact('alunos', 'quantidade'));
    }

    public function create()
    {
        Gate::authorize('create', Aluno::class);
        
        return view('alunos.create');
    }

    public function store(AlunoRequest $request)
    {
        Gate::authorize('create', Aluno::class);
        
        $dados = $request->validated();
        
        $dados['user_id'] = auth()->id();
        
        Aluno::create($dados);

        return redirect()->route('alunos.index');
    }

    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        Gate::authorize('update', $aluno);
        
        return view('alunos.edit', compact('aluno'));
    }

    public function update(AlunoRequest $request, Aluno $aluno)
    {
        Gate::authorize('update', $aluno);
        
        $aluno->update($request->validated());

        return redirect()->route('alunos.index');
    }

    public function destroy(Aluno $aluno)
    {
        Gate::authorize('delete', $aluno);
        
        $aluno->delete();

        return redirect()->route('alunos.index');
    }
}