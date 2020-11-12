@extends('layouts.main')

@section('title')
  Loja Dona Maria - {{ isset($cliente) ? 'Editar Cliente'  : 'Novo Cliente'}}
@endsection

@section('content')
  <div class="card">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h2 class="h5 m-0">{{ isset($cliente) ? 'Editar Cliente'  : 'Novo Cliente'}}</h2>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ isset($cliente) ? route('clientes.update', $cliente) : route('clientes.store')}}" method="post">
        @csrf
        @if (isset($cliente))
          @method('PUT')
        @endif
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome do Cliente"
                value="{{ isset($cliente) ? $cliente->nome : '' }}">
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control" name="email" placeholder="Email do Cliente"
                value="{{ isset($cliente) ? $cliente->email : '' }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="data">Data de Nascimento</label>
              <input type="date" id="data" class="form-control" name="data_nascimento" placeholder="Nascimento do Cliente"
                value="{{ isset($cliente) ? $cliente->data_nascimento->format('Y-m-d') : '' }}">
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" id="telefone" class="form-control" name="telefone" placeholder="Telefone do Cliente"
                value="{{ isset($cliente) ? $cliente->telefone : '' }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="cep">Cep</label>
              <input type="text" id="cep" class="form-control" name="cep" placeholder="Cep do Cliente"
                value="{{ isset($cliente) ? $cliente->cep : '' }}">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input type="text" id="endereco" class="form-control" name="endereco" placeholder="Endereço do Cliente"
                value="{{ isset($cliente) ? $cliente->endereco : '' }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" id="bairro" class="form-control" name="bairro" placeholder="Bairro do Cliente"
                value="{{ isset($cliente) ? $cliente->bairro : '' }}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <div class="form-group">
                <label for="ponto_referencia">Ponto de Referência</label>
                <textarea type="text" id="ponto_referencia" class="form-control" name="ponto_referencia"
                  placeholder="Ponto de Referência do Endereço">{{ isset($cliente) ? $cliente->ponto_referencia : '' }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-12">
            <div class="text-right">
              <button class="btn btn-{{isset($cliente) ? 'info' : 'success'}}" type="submit">
                @if (isset($cliente))
                  Atualizar
                @else
                  Cadastrar
                @endif
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
    <script>
      const cep = document.querySelector('#cep');
      const endereco = document.querySelector('#endereco');
      const bairro = document.querySelector('#bairro');

      cep.onblur = async () =>  {
        if (cep.value) {
          endereco.disabled = true;
          bairro.disabled = true;

          try {
            const response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`);
            const data = await response.json();

            endereco.value = data.logradouro;
            bairro.value = data.bairro;
          } catch(err) {
            console.error(err);
          } finally {
            endereco.disabled = false;
            bairro.disabled = false;
            
            endereco.focus();
          }
        }
      }
    </script>
@endsection