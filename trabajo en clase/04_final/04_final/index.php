<?php
include_once('utilities.php');
//$user_access = [];
$total_users = count($user_access);
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Ejemplos de listado en array</h3>
          <p>tabla de conteo</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>

              <table>
                   <thead>
                        <tr>
                           <th>user</th>
                           <th>user_log</th>
                           <th>status</th>
                           <th>user_type</th>
                           <th>usuarios activos</th>
                           <th>usuarios inactivos</th>
                        </tr>
                     </thead>
                     <tbody>        
                        <?php
                        // se incluye el archivo para hacer la conexion con mysql
                        include ("database.php");
                        $usuarios =  new Database();
                        // consulta para contabilizar los usuarios de todas las tablas
                        $res1 = $usuarios->count('user');
                        $res2 = $usuarios->count('user_log');
                        $res3 = $usuarios->count('status');
                        $res4 = $usuarios->count('user_type');
                        $res5 = $usuarios->countStatus('user',true);
                        $res6 = $usuarios->countStatus('user',false);
                        ?>
                     <tr> 
                        <td><?php echo $res1;?></td>
                        <td><?php echo $res2;?></td>
                        <td><?php echo $res3;?></td>
                        <td><?php echo $res4;?></td>
                        <td><?php echo $res5;?></td>
                        <td><?php echo $res6;?></td>
                     </tr>
                     </tbody>
                  </table>


                  <p>User</p>
                <table>
                   <thead>
                        <tr>
                           <th>id</th>
                           <th>email</th>
                           <th>status_id</th>
                           <th>user_type_id</th>
                        </tr>
                     </thead>
                     <tbody>        
                        <?php
                        // consulta para cargar la tabla user
                        $res = $usuarios->full_record('user');
                        
                        foreach ($res->fetch_all(MYSQLI_ASSOC) as $value) {
                        ?>
                     <tr>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['email'];?></td>
                        <td><?php echo $value['status_id'];?></td>
                        <td><?php echo $value['user_type_id'];?></td>  
                     </tr>
                     <?php
                     }
                     ?>
                     </tbody>
                  </table>
                  <br><br>

                  <p>Status</p>
                  <table>
                   <thead>
                        <tr>
                           <th>id</th>
                           <th>name</th>
                        </tr>
                     </thead>
                     <tbody>        
                        <?php
                        // consulta para cargar la tabla staus
                        $res = $usuarios->full_record('status');
                        
                        foreach ($res->fetch_all(MYSQLI_ASSOC) as $value) {
                        ?>
                     <tr>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['name'];?></td>
                     </tr>
                     <?php
                     }
                     ?>
                     </tbody>
                  </table>
                  <br><br>
                  <p>User_log</p>
                  <table>
                   <thead>
                        <tr>
                           <th>id</th>
                           <th>date_logged</th>
                           <th>user_id</th>
                        </tr>
                     </thead>
                     <tbody>        
                        <?php
                        // consulta para cargar la tabla de user_log
                        $res = $usuarios->full_record('user_log');
                        
                        foreach ($res->fetch_all(MYSQLI_ASSOC) as $value) {
                        ?>
                     <tr>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['date_logged'];?></td>
                        <td><?php echo $value['user_id'];?></td>  
                     </tr>
                     <?php
                     }
                     ?>
                     </tbody>
                  </table>
                  <br><br>
                  <p>User_type</p>
                  <table>
                   <thead>
                        <tr>
                           <th>id</th>
                           <th>name</th>
                        </tr>
                     </thead>
                     <tbody>        
                        <?php
                        // consulta para cargar la tabla user_type
                        $res = $usuarios->full_record('user_type');
                        
                        foreach ($res->fetch_all(MYSQLI_ASSOC) as $value) {
                        ?>
                     <tr>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['name'];?></td>
                     </tr>
                     <?php
                     }
                     ?>
                     </tbody>
                  </table>
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>