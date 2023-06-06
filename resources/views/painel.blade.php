@extends('layouts.app2')

@section('content')


<?php 
    //Caminho do path onde está a função de backup: classBackup.php
    require_once './myfunctions/classBackup.php';
?>
<div class="container" id="container">
    <!-- row -->
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5"><b>Gravações em andamento</b></p>
        </div>

        <!-- Button trigger modal -->
        <div style="width: 200px; margin-top:30px;" >
       <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal" >
           Adicionar Gravação
       </button>
       </div>

       <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Selecione o Banco</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
                <form method="POST" action="{{ url('/select')}}" enctype="multipart/form-data" >
                    @csrf
                    <select id="selBanco" class="custom-select col-md-11" name="SelBanco" style="margin-left: 20px; margin-bottom: 15px;" required>
                        <option selected></option>
                        @foreach ($selects as $select)
                            <option value="{{ $select->id }}">{{ $select->name }}</option>
                        @endforeach
                    </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" name="bt_add" value="Adicionar">
                      </div>

                   
                </form>   
            
        </div>
      
      </div>
    </div>
  </div>

  <!-- End Modal -->

    </div>

    <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
            
            <table class="table" id="tabelaGravacoes">
                <thead>
                    <tr>
                        <th scope="col"># ID</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">BANCO DE DADOS</th>
                        <th scope="col">HOST</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">AÇÕES</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td><?= ' ' ?></td>
                        <td>
                          <!-- div class="tm-status-circle moving" --></div><?= ' ' ?>
                        </td>
                        <td><?= ' ' ?></td>
                        <td><?= ' ' ?></td>
                        <td><?= ' ' ?></td>
                        <td> 
                           <!-- a href="#"><i class="far fa-caret-square-right" style="font-size: 25px;" title="Gravar"></i></a>
                           <a href="#"><i class="fas fa-pause" style="font-size: 25px; margin-left:8px;" title="Pausar"></i></a>
                           <a href="#"><i class="fas fa-times text-danger" style="font-size: 25px; margin-left:8px;" title="Exluir"></i></a -->

                        </td>
                        <td> </td>
                    </tr>
                </tbody>
            </table>

            <br>
            <nav id="paginationNav">
                <ul class="pagination pagination-sm ">
                </ul>
            </nav>
        </div>
    </div>
   <!-- CHAMA A FUNÇÃO DE MONTAR TABELA COM PAGINAÇÃO -->
   <script src="{{ asset('js/scr_paginacao.js') }}"></script>
</div>

@endsection