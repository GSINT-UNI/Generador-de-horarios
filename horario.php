<?php
function llenar0(&$matriz){
  for ($i=0;$i<15;$i++){
    for ($j=0;$j<6;$j++){
      $matriz[$i][$j]=0;
    }
  }
}

llenar0($matriz0);
$curso1[0]=$matriz0;

$curso1[0][1][1]=1;
$curso1[0][2][1]=1;
$curso1[0][4][1]=1;
$curso1[0][5][1]=1;

$curso1[0][1][3]=1;
$curso1[0][2][3]=1;
$curso1[0][4][3]=1;
$curso1[0][5][3]=1;

$curso1[1]=$matriz0;

$curso1[1][1][2]=1;
$curso1[1][2][2]=1;
$curso1[1][4][2]=1;
$curso1[1][5][2]=1;

$curso1[1][1][5]=1;
$curso1[1][2][5]=1;
$curso1[1][4][5]=1;
$curso1[1][5][5]=1;


$curso2[0]=$matriz0;

$curso2[0][3][1]=1;
$curso2[0][4][1]=1;
$curso2[0][5][1]=1;

$curso2[0][1][5]=1;
$curso2[0][2][5]=1;
$curso2[0][4][5]=1;
$curso2[0][5][5]=1;


$curso2[1]=$matriz0;

$curso2[1][3][4]=1;
$curso2[1][4][4]=1;
$curso2[1][5][4]=1;

$curso2[1][1][5]=1;
$curso2[1][2][5]=1;
$curso2[1][4][5]=1;
$curso2[1][5][5]=1;


$curso3[0]=$matriz0;

$curso3[0][5][2]=1;
$curso3[0][6][2]=1;

//Curso de Consti_B

$curso3[1]=$matriz0;

$curso3[1][3][4]=1;
$curso3[1][4][4]=1;

//Curso de Consti_C

$curso3[2]=$matriz0;

$curso3[2][9][4]=1;
$curso3[2][10][4]=1;

//curso 4 arquitectura
$curso4[0]=$matriz0;

$curso4[0][2][1]=1;
$curso4[0][3][1]=1;

$curso4[0][5][4]=1;
$curso4[0][6][4]=1;


$curso4[1]=$matriz0;

$curso4[1][1][0]=1;
$curso4[1][2][0]=1;

$curso4[1][1][2]=1;
$curso4[1][2][2]=1;


$curso4[2]=$matriz0;

$curso4[2][9][5]=1;
$curso4[2][10][5]=1;

$curso4[2][8][4]=1;
$curso4[2][9][4]=1;


function aumentar(&$matriz,$nuevo){
  for ($i=0;$i<15;$i++){
    for ($j=0;$j<6;$j++){
        $matriz[$i][$j]=$matriz[$i][$j] + $nuevo[$i][$j];
        if($matriz[$i][$j]>1)
          return false;
    }
  }
  return true;
}

function imprime_color($color){

  switch ($color) {
    case 1:
      $bg = "#0351D3";
      break;
    case 2:
      $bg = "#F03209";
    break;
    case 3:
      $bg = "#03D305";
    break;
    case 4:
      $bg = "#8110EA";
    break;
    case 5:
      $bg = "#10EAE8";
    break;
    case 6:
      $bg = "#28C680";
    break;
    case 7:
      $bg = "#E119D5";
    break;
    case 8:
      $bg = "#6C8B77";
    break;
  }

  echo "<td bgcolor='".$bg."'>";
}

function imprimir($secciones, $n_pos,$cursos,$nombre){
  echo "posibilidad ".$n_pos."<br><ul>";
  for ($i=0; $i < count($secciones);$i++){
    echo "<li>curso ".$i.": ".$secciones[$i]."</li>";
  }
  //echo "1: ".$secciones[0]." 2: ".$secciones[1]." 3: ".$secciones[2]."<br>";//imprimir tablas
  echo "</ul>";
?>  <table style="width:50%" border="1"><tr>
        <th bgcolor="#D1CCF4"></td>
        <th bgcolor="#D1CCF4">Lunes</th>
        <th bgcolor="#D1CCF4">Martes</th>
        <th bgcolor="#D1CCF4">Miercoles</th>
        <th bgcolor="#D1CCF4">Jueves</th>
        <th bgcolor="#D1CCF4">Viernes</th>
        <th bgcolor="#D1CCF4">Sábado</th>
<?php
  llenar0($matriz);
  for ($sel=0;$sel< count($secciones);$sel++){
    $nuevo = $cursos[$sel][$secciones[$sel]];
    for ($i=0;$i<15;$i++){
      for ($j=0;$j<6;$j++){
          if($nuevo[$i][$j]==1){
            //$matriz[$i][$j]=$matriz[$i][$j]+$sel+1;
            $matriz[$i][$j]=($sel+1).".".$nombre[$sel];
          }else {
            if ($sel==0)
              $matriz[$i][$j]=0;
          }
      }
    }
  }
  for ($i=0;$i<15;$i++){
    echo "<tr><th>".($i+7)."-".($i+8)."</th>";
    for ($j=0;$j<6;$j++){
        if ($matriz[$i][$j]!=0)
          imprime_color($matriz[$i][$j][0]);
        else
          echo "<td>";
        if ($matriz[$i][$j]!=0){
          $n_curso = explode(".", $matriz[$i][$j]);
          echo $n_curso[1]."</td>";
        }else
          echo "</td>";

    }
    echo "</tr>";
  }
  echo "</table>";
}



function correcto($seccion,$k,$cursos){
  llenar0($horario);
  if ($k==0){
    return true;
  }
  if($seccion[$k]>count($cursos[$k])-1)
    return false;
  for ($l=0;$l<=$k;$l++){
    for ($i=0;$i<15;$i++){
      for ($j=0;$j<6;$j++){
          $horario[$i][$j]=$horario[$i][$j] + $cursos[$l][$seccion[$l]][$i][$j];
      }
    }
  }
  /*
  for ($m=0;$m<15;$m++){
    for ($n=0;$n<6;$n++){
        echo $horario[$m][$n];
    }
    echo "<br>";
  }

  echo "<br>";
  */
  for ($i=0;$i<15;$i++){
    for ($j=0;$j<6;$j++){
        if($horario[$i][$j]>1)
          return false;
    }
  }
  /*
  for ($i=0;$i<=$k;$i++)
    echo "curso ".$i.": ".$seccion[$i]." ";
  echo "<br>este es el correcto↑<br>";
  echo "<br>";
  */
  return true;
}


//main
//$cursos=array($curso1,$curso2,$curso3,$curso4);
$nombre=["mate2","progra","consti","arqui"];
$cursos=[$curso1,$curso2,$curso3,$curso4];
for ($i=0;$i<count($cursos);$i++)
  $secciones[$i]=-1;
//$secciones=array(-1,-1,-1);
//echo "<br>cursos: ".count($cursos[2])."<br>";
$n_pos=0;
$k=0;
while($k>=0){
  $secciones[$k]=$secciones[$k]+1;
  /*echo "probando con k = $k <br>secciones:(";
  for ($t=0;$t<count($secciones);$t++)
    echo $secciones[$t].",";
  echo ")<br>";
  */
  while(!correcto($secciones,$k,$cursos)){
    $secciones[$k]=$secciones[$k]+1;
    //echo "cambiando a seccion ".$secciones[$k]." de el curso ".$k."<br>";
    if($secciones[$k]>count($cursos[$k])-1)
      break;
  }
  if($secciones[$k]>count($cursos[$k])-1){
    $k=$k-1;
    $secciones[$k+1]=-1;
  }
  else{
    if($k==count($secciones)-1){
      imprimir($secciones,$n_pos++,$cursos,$nombre);
    }
    else{
      $k=$k+1;
      $secciones[$k]=-1;
    }
  }


}

?>
