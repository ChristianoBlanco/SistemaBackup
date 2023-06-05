<?php 
  function meuteste(){
    $d = date('H:i:s');
      echo $d; 
      echo "</br>";
  }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
  //var intervalo = setInterval(function() { $('#setTimePainel'); }, 60000);

  //window.setTimeout("location.reload()", 700);
/*  let retornoPHP = '<?php meuteste(); ?>' ;

  setInterval(myFunc,2000);

  function myFunc() {
  document.getElementById("setTimePainel").innerHTML += retornoPHP;
  
} */

var intervalo = setInterval(function() { $('#setTimePainel').load('/teste'); }, 1000);

</script>

<div id="setTimePainel">
 teste
    
</div>