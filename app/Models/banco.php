<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class banco extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = "bancos";

    protected $fillable = [
        "tipo_bd",
        "name",
        "hostname",
        "username",
        "password",
        "dbname",
        "descricao"
        ];
    
        protected $date = ['delete_at'];
    
        /* App\Models\cad_dado::create(["dado_id"=>"1","tipo"=>"Achados e Perdidos","pet"=>"Cao","nome"=>"Ricco","descricao"=>"Sumiu a 12 dias.","foto1"=>"","foto2"=>"","foto3"=>"","foto4"=>"","dt_anuncio"=>"2022-08-19 15:21:31"]); */
}
