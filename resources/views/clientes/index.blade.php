@extends('layouts.main')

@section('title')
Loja Dona Maria - Clientes
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="h5 m-0">Clientes Cadastrados</h2>
            <a href="{{ route('clientes.create') }}" class="btn btn-success">Novo</a>
        </div>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @forelse ($clientes as $cliente)
                <li class="list-group-item">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="h6 m-0">{{ $cliente->nome }}</h4>
                        <div>
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-info btn-sm">
                                Editar
                            </a>
                            <form class="d-inline" action="{{ route('clientes.destroy', $cliente) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">Nenhum cliente cadastrado até o momento.</li>
            @endforelse
        </ul>
        @if ($clientes->count())    
            <div class="mt-3">
                {{ $clientes->links() }}
            </div>
        @endif
    </div>
</div>
@endsection