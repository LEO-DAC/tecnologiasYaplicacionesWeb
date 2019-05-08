
  <?php
    // se incluye la clase para manejar datos de alumnos
 include "Promedio.php";

 
    
        $contador=0;
        //arreglo de nombres
        $nombres= array("Leonardo","Jose","Miguel","Luis","Carlos","Fernando","Paola","Jessica","Juan","Hector");
        //ciclo para asignar nombres y calificaciones aleatorias
        while($contador<10){           

             $arreglo[$contador]= new Promedio();
             $contador2=0;
             $nombre = $nombres[rand(0,9)];

             if($contador==0){
                $arreglo[$contador]->setNombre($nombre);
            }

             while($contador2<=$contador && $contador>0){
                    if($contador==$contador2){
                        $arreglo[$contador]->setNombre($nombre);
                        break;
                        }

                    if($nombre!=$arreglo[$contador2]->getNombre()){
                        $contador2++;         
                   }else{
                     $nombre = $nombres[rand(0,9)];
                     $contador2=0;
                   }
                   
             }

          //   $arreglo[$contador]->setNombre("Leonardo");
             $arreglo[$contador]->setCalif1(rand(0,100));
             $arreglo[$contador]->setCalif2(rand(0,100));
             $arreglo[$contador]->setCalif3(rand(0,100));
             $arreglo[$contador]->calcularPromedio();
             $arreglo[$contador]->toString();
             $contador++;

        }

  
  ?>



