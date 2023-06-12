<?php

namespace App\Http\Controllers;

use App\Models\backup;
use App\Models\banco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('/painelBanco');
    }
    public function indexJson()
    {

        //$listaTabela = DB::table('bancos AS b')->select('b.*')->paginate(10);
        $listaTabela = banco::paginate(10);

        return $listaTabela;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('/cadbanco');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bancos = new banco();
        $bancos->name =      $request->input('name');
        $bancos->hostname =  $request->input('hostname');
        $bancos->username =  $request->input('username');
        $bancos->password =  $request->input('password');
        $bancos->dbname =    $request->input('dbname');
        $bancos->descricao = $request->input('descricao');
        $bancos->save();
        
        return redirect('/painelBanco')->with('msg_status', 'Dados cadastrados com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bancos = banco::where('id',$id)->first();
        if(isset($bancos)){
            return view('/edibanco', compact('bancos'));
        }
        return redirect('/painelBanco');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bancos = banco::find($id);

        $bancos->name =      $request->input('name');
        $bancos->hostname =  $request->input('hostname');
        $bancos->username =  $request->input('username');
        $bancos->password =  $request->input('password');
        $bancos->dbname =    $request->input('dbname');
        $bancos->descricao = $request->input('descricao');
        $bancos->save();
        
        return redirect('/painelBanco')->with('msg_status', 'Dados alterados com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bancos = banco::find($id);
        $bancos->forcedelete();

        return redirect('/painelBanco')->with('msg_status', 'Exclusão realizada com sucesso !');
    }
}
