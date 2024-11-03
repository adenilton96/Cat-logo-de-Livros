<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        // Recebe os valores dos filtros
        $livros = Livro::query();

        // Aplicando filtros
        $this->applyFilters($livros, $request);

        // Ordenação e paginação
        $livros = $livros->orderBy('id', 'asc')->paginate(10);

        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $livro = $this->validateAndCreateLivro($request);

        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $this->validateAndUpdateLivro($request, $livro);

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro deletado com sucesso!');
    }

    // Métodos auxiliares
    private function applyFilters($livros, Request $request)
    {
        if ($titulo = $request->input('titulo')) {
            $livros->where('titulo', 'like', '%' . $titulo . '%');
        }

        if ($autor = $request->input('autor')) {
            $livros->where('autor', 'like', '%' . $autor . '%');
        }

        if ($editora = $request->input('editora')) {
            $livros->where('editora', 'like', '%' . $editora . '%');
        }

        if ($genero = $request->input('genero')) {
            $livros->where('genero', $genero);
        }

        if ($data = $request->input('data')) {
            $livros->whereDate('publicacao', $data);
        }
    }

    private function validateAndCreateLivro(Request $request)
    {
        $request->validate($this->validationRules());

        $livro = new Livro();
        $this->fillLivroData($livro, $request);

        $livro->save();
        return $livro;
    }

    private function validateAndUpdateLivro(Request $request, Livro $livro)
    {
        $request->validate($this->validationRules());

        $this->fillLivroData($livro, $request);
        $livro->save();
    }

    private function fillLivroData(Livro $livro, Request $request)
    {
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->publicacao = $request->publicacao;
        $livro->editora = $request->editora;
        $livro->genero = $request->genero;
        $livro->descricao = $request->descricao;
        $imagem = $this->handleImageUpload($request);
        if($imagem){
            $livro->imagem = $imagem;
        }
       
    }

    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            return base64_encode(file_get_contents($request->file('imagem')->getRealPath()));
        }

        return null; // Ou retornar o valor atual da imagem, se necessário
    }

    private function validationRules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'publicacao' => 'required|date|after_or_equal:1900-01-01|before_or_equal:' . date('Y-m-d'),
            'editora' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
