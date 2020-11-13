<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\handleClientesRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('clientes.index', ['clientes' => Cliente::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('clientes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(handleClientesRequest $request) {
        Cliente::create($request->all());

        return redirect()
            ->route('clientes.index')
            ->with('status', 'Cliente Cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente) {
        return view('clientes.form', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(handleClientesRequest $request, Cliente $cliente) {
        $cliente->update($request->all());

        return redirect()
            ->route('clientes.index')
            ->with('status', 'Cliente Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente) {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('status', 'Cliente Excluído com sucesso!');
    }
}
