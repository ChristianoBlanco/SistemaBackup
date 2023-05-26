@extends('layouts.app2')

@section('content')

<div class="container">

    <!-- row -->
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5"><b>Gravações em andamento</b></p>
        </div>
    </div>


    <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
            
            <table class="table" id="tabelaGravacoes">
                <thead>
                    <tr>
                        <th scope="col">STATUS</th>
                        <th scope="col">BANCO DE DADOS</th>
                        <th scope="col">HOST</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td>
                          <div class="tm-status-circle moving"></div><?= ' ' ?>
                        </td>
                        <td><?= ' ' ?></td>
                        <td><?= ' ' ?></td>
                        <td><?= ' ' ?></td>
                        <td>
                           <a href="#"><i class="far fa-caret-square-right" style="font-size: 25px;" title="Gravar"></i></a>
                           <a href="#"><i class="fas fa-pause" style="font-size: 25px; margin-left:8px;" title="Pausar"></i></a>
                           <a href="#"><i class="fas fa-times text-danger" style="font-size: 25px; margin-left:8px;" title="Exluir"></i></a>

                        </td>
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