<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credential;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Pega apenas as credenciais que pertencem ao usuário autenticado
    $credentials = auth()->user()->credentials;

    // Retorna a view e passa a variável 'credentials' para ela
    return view('credentials.index', compact('credentials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            // A única responsabilidade deste método é exibir a view com o formulário.
            return view('credentials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validação: Garante que os dados enviados são válidos. Se não forem, o Laravel volta automaticamente para o formulário mostrando os erros.
        $validated = $request->validate([
        'service_name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'required|string',
        ]);

        // 2. Criação: Cria a credencial associada ao usuário logado. A criptografia acontece automaticamente no Model, como já configuramos.
        $request->user()->credentials()->create($validated);

        // 3. Redirecionamento: Devolve o usuário para a lista, com uma mensagem de sucesso.
        return redirect()->route('credentials.index')->with('success', 'Credencial salva com sucesso!');
        }

    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Credential $credential)
    {
        return view('credentials.edit', compact('credential'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Credential $credential)
    {
        // 1. Validação (senha é opcional)
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string', // 'nullable' permite que o campo seja enviado vazio
        ]);

        // 2. Se a senha não foi enviada, removemos do array para não sobrescrever com um valor vazio
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        // 3. Atualiza os dados no banco
        $credential->update($validated);

        // 4. Redireciona de volta para a lista com uma mensagem de sucesso
        return redirect()->route('credentials.index')->with('success', 'Credencial atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
