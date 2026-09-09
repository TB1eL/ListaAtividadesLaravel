<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

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

        $query->latest();
        $alunos = $query->get();

        return view('alunos.index', compact('alunos', 'quantidade'));
    }
    
    public function create() {}
    public function store(Request $request) {}
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
