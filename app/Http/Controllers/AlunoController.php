<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(AlunoRequest $request)
    {
        $quantidade = Aluno::count();
        $query = Aluno::query();

        if ($request->has('curso_id')) {
            $query->where('curso_id', $request->curso_id);
        }

        if ($request->has('busca')) {
            $query->where('nome', 'like', '%' . $request->busca . '%');
        }

        $query->latest();
        $alunos = $query->get();

        return view('alunos.index', compact('alunos', 'quantidade'));
    }

    public function create() {}

    public function store(AlunoRequest $request) {
        Aluno::create($request->all());
        return redirect()->route('alunos.index');
    }

    public function show($id) {}
    public function edit($id) {}
    public function update(AlunoRequest $request, $id) {}
    public function destroy($id) {}
}
