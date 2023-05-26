<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\banco;
use App\Models\backup;

class PainelController extends Controller

{

    public function index(){

        return view('painel');

    }
    public function indexJson()
    {
      //return "Index Painel de Listagem de Gravações Backup";
      //return view('painel');

      $listaTabla = DB::table('bancos AS b')->select('c.banco_id', 'c.status_bkp', 'b.id', 'b.dbname', 'b.hostname', 'b.descricao')->join('backups AS c','c.banco_id','=','b.id')
      ->whereIn('c.status_bkp', [1,2])
      ->paginate(10);

      /*foreach ($listaTabla as $list){
        echo $list->dbname;
      } */
      return $listaTabla;


    }
}
