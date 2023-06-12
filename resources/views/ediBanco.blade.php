@extends('layouts.app2')

@section('content')

<div class="container mt-5">
    @if (session('msg_status'))
    <div id="mensagem" class="alert alert-success" autofocus>
        {{ session('msg_status') }}
    </div>
    @endif    
    <!-- row -->
    <div class="row tm-content-row">
        
      <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <form method="POST" action="{{ url('/ediBanco-upd/'.$bancos->id.'')}}" enctype="multipart/form-data" >
                @csrf 
            <div class="form-group col-lg-6" style="float:left" >
              <label for="name">Nome do banco (apelido)</label>
              <input
                id="name"
                name="name"
                type="text"
                value="{{ $bancos->name }}"
                class="form-control"
              />
            </div>
            <div class="form-group col-lg-6" style="float:right" >
              <label for="host">Host</label>
              <input
                id="hostname"
                name="hostname"
                type="text"
                value="{{ $bancos->hostname }}"
                class="form-control"
              />
            </div>
            <div class="form-group col-lg-6" style="float:left">
              <label for="username">Username</label>
              <input
                id="username"
                name="username"
                type="text"
                value="{{ $bancos->username }}"
                class="form-control"
              />
            </div>
            <div class="form-group col-lg-6" style="float:right">
              <label for="password">Password</label>
              <input
                id="password"
                name="password"
                type="text"
                value="{{ $bancos->password }}"
                class="form-control"
              />
            </div>
            <div class="form-group col-lg-6" style="float:left">
              <label for="dbname">Database</label>
              <input
                id="dbname"
                name="dbname"
                type="text"
                value="{{ $bancos->dbname }}"
                class="form-control"
              />
            </div>
            <div class="form-group col-lg-6" style="float:right">
                <label for="descricao">Descrição</label>
                <input
                  id="descricao"
                  name="descricao"
                  type="text"
                  value="{{ $bancos->descricao }}"
                  class="form-control"
                  maxlength="30"
                />
              </div>
        
            <div class="col-2">
              <input type="submit" class="btn btn-primary btn-block text-uppercase" name="bt_grava" value="Atualizar" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection