<?php
  function llenar0(&$matriz){
    for ($i=0;$i<15;$i++){
      for ($j=0;$j<6;$j++){
        $matriz[$i][$j]=0;
      }
    }
  }

  function llenar_matriz(&$matriz,$dia, $inicio, $fin){
    for($i=$inicio;$i<$fin;$i++)
      $matriz[$i-7][$dia]="curso";
  }

/*
  ####################################
  #               main               #
  ####################################
*/
  $cadena = "LU 10-12 MI 10-12 VI 08-10 (P) VI 13-15 (L)";
  echo "<h2>Cadena que se esta leyendo: \"".$cadena."\"</h2><br><br>";
  $i=0;
  llenar0($curso_matriz);
  while ($i<strlen($cadena)){
    if ($cadena[$i]=="L"&&$cadena[$i+1]=="U"){
      $dia = 0;
    }elseif ($cadena[$i]=="M"&&$cadena[$i+1]=="A") {
      $dia = 1;
    }elseif ($cadena[$i]=="M"&&$cadena[$i+1]=="I") {
      $dia = 2;
    }elseif ($cadena[$i]=="J"&&$cadena[$i+1]=="U") {
      $dia = 3;
    }elseif ($cadena[$i]=="V"&&$cadena[$i+1]=="I") {
      $dia = 4;
    }elseif ($cadena[$i]=="S"&&$cadena[$i+1]=="A") {
      $dia = 5;
    }elseif ($cadena[$i]=="("&&$cadena[$i+2]==")") {
      $dia = -1;
    }
    if($dia!=-1){
      $i+=3; //se adelanta a la hora inicial
      $inicio = $cadena[$i].$cadena[$i+1];

      $i+=3; //se adelanta a la hora final
      $fin = $cadena[$i].$cadena[$i+1];

      llenar_matriz($curso_matriz,$dia, $inicio, $fin);
    }
    $i+=3;
  }

?>  <table style="width:50%" border="1"><tr>
        <th bgcolor="#D1CCF4"></td>
        <th bgcolor="#D1CCF4">Lunes</th>
        <th bgcolor="#D1CCF4">Martes</th>
        <th bgcolor="#D1CCF4">Miercoles</th>
        <th bgcolor="#D1CCF4">Jueves</th>
        <th bgcolor="#D1CCF4">Viernes</th>
        <th bgcolor="#D1CCF4">Sábado</th>
<?php
  for ($i=0;$i<15;$i++){
    echo "<tr><th>".($i+7)."-".($i+8)."</th>";
    for ($j=0;$j<6;$j++){
      if ($curso_matriz[$i][$j]=="0")
        echo "<td></td>";
      else
        echo "<td bgcolor='#10EAE8'>".$curso_matriz[$i][$j]."</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
?>
