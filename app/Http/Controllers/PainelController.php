<?php

namespace App\Http\Controllers;

use App\Models\backup;
use App\Models\banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PainelController extends Controller
{

    public function index()
    {
        $selects = banco::all();

        return view('painel', compact('selects'));

    }
    public function indexJson()
    {
        //return "Index Painel de Listagem de Gravações Backup";
        //return view('painel');

        $listaTabla = DB::table('bancos AS b')->select('c.id AS id_backup','c.banco_id', 'c.status_bkp', 'b.id', 'b.dbname', 'b.hostname', 'b.descricao')
        ->join('backups AS c', 'c.banco_id', '=', 'b.id')
            ->whereIn('c.status_bkp', [1, 2])
            ->paginate(10);

        /*foreach ($listaTabla as $list){
        echo $list->dbname;
        } */
        return $listaTabla;

    }

    public function BackupList(Request $request)
    {
        //Post vindo do Select do modal da página: /painel
        $id = $request->input('SelBanco');

        //Seleciona o banco de dados para colocar na tabela de gravações
        $selTabela = DB::table('bancos AS b')->select('b.*')
            ->where('b.id', $id)->get();

        foreach ($selTabela as $res) {
            //$res->id;
            //Insere na tabela backups o banco_id e o status default da gravação
            $bacukps = new backup();
            $bacukps->banco_id = $res->id;
            $bacukps->status_bkp = 2;
            $bacukps->save();

        }

        return redirect('/painel');

    }

    

    public function teste()
    {

    }

}
