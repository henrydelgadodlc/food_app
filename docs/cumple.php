<?php
$page_title = 'Cumpleaños';
require_once('includes/load.php');
global $db;
page_require_level(1);
$result = $db->query("SELECT users.id,users.Dni,users.Apellido,users.name,user_groups.group_name,users.fecha_nacimiento 
FROM users 
INNER JOIN user_groups 
ON users.user_level=user_groups.id 
where day(users.fecha_nacimiento)=day(NOW()) and month(users.fecha_nacimiento)=month(NOW())");
   

    $response='';

    while($row=mysqli_fetch_array($result)) {

        /* Formate fecha */
        $fechaOriginal = $row["fecha_nacimiento"];
        $fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));
    
        $response = $response . "<div class='notification-item'>" .
        "<div class='notification-subject'>". $row["name"]." ".$row["Apellido"] ." - ". $row["Dni"] .
        " - <span>". $fechaFormateada ." - ". $row["group_name"] . "</span> </div> </div>";
    }
    if(!empty($response)) {
        print $response;
    }
    
/* $response = $response . "<div class='notification-item'>" .
        "<div class='notification-subject'>". $row["name"]." ".$row["Apellido"] ." - ". $row["Dni"] .
        " - <span>". $fechaFormateada ." - ". $row["group_name"] . "</span> </div>"."<div> <button  class='btn' > Enviar mensaje</button></div>" ."</div>"; */

//START POSITIVO Y LENGTH POSITIVO
/*SELECT users.id,Apellido,users.name,user_groups.group_name,users.fecha_nacimiento 
FROM users 
INNER JOIN user_groups 
ON users.user_level=user_groups.id 
where day(users.fecha_nacimiento)=day(NOW()) and month(users.fecha_nacimiento)=month(NOW())


$resultado = substr("pruebacadenas", 2);
echo $resultado; // imprime "uebacadenas"*/


?>