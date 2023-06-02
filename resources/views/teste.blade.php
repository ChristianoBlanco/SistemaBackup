<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
  //var intervalo = setInterval(function() { $('#setTimePainel'); }, 60000);

  //window.setTimeout("location.reload()", 700);

  $(document).ready(function () {
  setInterval(f, 700);
});


</script>
<div id="setTimePainel">
    <?php  
      $d = date('H:i:s');
      echo $d; 
    ?>
    
</div>