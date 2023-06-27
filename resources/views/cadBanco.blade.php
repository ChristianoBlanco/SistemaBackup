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
           <form method="POST" action="{{ url('/cadBanco-inc')}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group col-lg-6" >
                  <label for="name">Tipo do banco</label>
                  <select id="selBanco" class="custom-select col-md-11" name="tipobanco"  required>
                    <option selected></option>
                    <option value="1">MySQL</option>
                    <option value="2">SQL Server</option>
                </select>
                </div>     
            <div class="form-group col-lg-6" style="float:left" >
              <label for="name">Nome do banco (apelido)</label>
              <input
                id="name"
                name="name"
                type="text"
                class="form-control"
                required
              />
            </div>
            <div class="form-group col-lg-6" style="float:right" >
              <label for="host">Host</label>
              <input
                id="hostname"
                name="hostname"
                type="text"
                class="form-control"
                required
              />
            </div>
            <div class="form-group col-lg-6" style="float:left">
              <label for="username">Username</label>
              <input
                id="username"
                name="username"
                type="text"
                class="form-control"
                required
              />
            </div>
            <div class="form-group col-lg-6" style="float:right">
              <label for="password">Password</label>
              <input
                id="password"
                name="password"
                type="text"
                class="form-control"
              />
            </div>
            <div class="form-group col-lg-6" style="float:left">
              <label for="dbname">Database</label>
              <input
                id="dbname"
                name="dbname"
                type="text"
                class="form-control"
                required
              />
            </div>
            <div class="form-group col-lg-6" style="float:right">
                <label for="descricao">Descrição</label>
                <input
                  id="descricao"
                  name="descricao"
                  type="text"
                  class="form-control"
                  maxlength="30"
                />
              </div>
        
            <div class="col-2">
              <input type="submit" class="btn btn-primary btn-block text-uppercase" name="bt_grava" value="Gravar" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @endsection