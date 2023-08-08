<?php 

if ($tipo_banco == 1){

    $path = "/xampp/htdocs/Laravel/Sisbackup2/public/BACKUP_BD/2#accountsdb/";
    $diretorio = opendir($path);
    while($arquivo = readdir($diretorio)){    
    //echo "<a href='".$path.$arquivo."/"."'>".$arquivo."</a><br />";
    $arquivo;

    echo $path2 = "/xampp/htdocs/Laravel/Sisbackup2/public/BACKUP_BD/2#accountsdb/".$arquivo."/";
    echo "<br>";
    $diretorio2 = opendir($path2);
     echo $arquivo2 = readdir($diretorio2);


   
}

}else{

}




?>