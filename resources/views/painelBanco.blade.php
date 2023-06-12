@extends('layouts.app2')

@section('content')

<div class="container" id="container">
    
    <!-- row -->
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5"><b>Bancos de Dados</b></p>
        </div>

        <!-- Link incluir Banco de dados -->
        <div style="width: 200px; margin-top:30px;" >
           <a href="{{ url('/cadBanco')}}" class="btn btn-success btn-block">Adicionar BD</a>
       </div>

    </div>

    <div class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
            @if (session('msg_status'))
             <div id="mensagem" class="alert alert-success" autofocus>
               {{ session('msg_status') }}
            </div>
            @endif
            <table class="table" id="tabelaGravacoes">
                <thead>
                    <tr>
                        <th scope="col"># ID</th>
                        <th scope="col">NOME DO BANCO</th>
                        <th scope="col">HOST</th>
                        <th scope="col">DESCRICAO</th>
                        <th scope="col">AÇÕES</th>
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
   <script src="{{ asset('js/scr_paginacaoBanco.js') }}"></script>
</div>

@endsection