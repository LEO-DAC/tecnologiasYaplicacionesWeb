<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Progra,ación Orientada a Objetos</title>
 <title>CRUD a bd usando POO</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/custom.css">
 <script crs="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script crs="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

</head>
<script type="text/javascript">
   function confirmDelete(){
      var respuesta = confirm("¿Estas seguro de borrar  a este cliente?");

      if(respuesta == true){
          return true;
      }else{
        return false;
      }

   }
</script>
<body>
    <div class= "container">
       <div class = "table-wrapper">
            <div class= "table-title">
                <div class ="row">
                      <div class="col-sm-12"><center><h2>Tabla de <b>Clientes</b></center></h2></div>
 
                </div>
            </div>
            <div class ="row">
                      <div class="col-sm-4">
                           <a href="create.php" class="btn btn-info"><i
                           class=""></i>Agregar cliente   <span class='glyphicon glyphicon-plus'></span></a> 
                      </div>
            </div>
            <br>
            <?php
            include ("database.php");
              $clientes =  new Database();
              $res = $clientes->full_record();
              
              foreach ($res->fetch_all(MYSQLI_ASSOC) as $value) {
             ?>
                <table class="table table-condensed">
                  <tr>
                     <td><?php echo $value['nombres'];?></td>
                     <td><?php echo $value['apellidos'];?></td>
                     <td><?php echo $value['telefono'];?></td>
                     <td><?php echo $value['direccion'];?></td>  
                     <td><?php echo $value['correo_electronico'];?></td>
                      <td></td>
                     <td> <?php echo" <a href='delete.php?id=$value[id]' onclick=' return confirmDelete()' class='btn btn-danger'> <span class='glyphicon glyphicon-trash'></span></a>"?> </td>
                     <td> <?php echo" <a href='Modificar.php?id=$value[id]' class='btn btn-success'><span class='glyphicon glyphicon-wrench'></span></a>"?> </td>
                  </tr>
              <?php
             }
        ?>
          </table>
    </div>
  </div>
</body>
</html>