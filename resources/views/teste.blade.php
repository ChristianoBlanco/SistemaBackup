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


 setTimeout('#setTimePainel' , 1000)




//var intervalo = setInterval(function() { $('#setTimePainel').load(location.href); }, 1000);

//setTimeout(function(){window.location.reload();} , 60000);

/*function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
window.onload = timedRefresh(5000); */

//setTimeout( function () { $( "#testdiv" ).fadeOut(1500); }, 10000);


</script>
<div id="chat"></div>

<?php //echo "<script>setInterval(function() { $('#setTimePainel').load('/teste'); }, 120000);</script>"; ?>
<div id="setTimePainel">
 
 <?= $min = date('s') . 's'; ?>

  
</div>