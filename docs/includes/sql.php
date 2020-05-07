<?php
require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table)
{
  global $db;
  if (tableExists($table)) {
    return find_by_sql("SELECT * FROM " . $db->escape($table));
  }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
  return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_sede($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE Id_sede='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_categoria($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE Id_categoria='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_curso($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE 	Id_cursos='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_matricula($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT *FROM {$db->escape($table)} WHERE Id_Mc='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_asistencia($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT matricula_curso.Id_Mc,users.name,users.Apellido,users.Dni,users.Telefono,user_groups.group_name FROM {$db->escape($table)} INNER JOIN users on matricula_curso.Id_Usuario=users.id INNER JOIN user_groups on users.user_level=user_groups.group_level  WHERE Id_Mc='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}



/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE id=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_id_sede($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE Id_sede=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_id_categoria($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE Id_categoria=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_id_cursos($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE Id_cursos=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_id_matricula($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE Id_Mc=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function asistencia($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $fecha = date("Y-m-d"); //fecha actual
    $query = "INSERT INTO asistencia ("; //consulta sql porpartes 
    $query .= "Id_usuario,Entrada,Fecha";
    $query .= ") VALUES (";
    $query .= " '{$id}', now(),'{$fecha}'";
    $query .= ")";
    $db->query($query);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function asistencia2($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $fecha = date("Y-m-d"); //fecha actual 
    $query  = "UPDATE asistencia SET Salida = now() WHERE Id_Asistencia ='{$id}' And Fecha ='{$fecha}'";
    $db->query($query);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
/*--
------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(id) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}

/*--
------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function contar_por_id_alumno($table)
{
  global $db;
  if (tableExists($table)) {

    $sql    = "SELECT COUNT(id) AS total FROM users WHERE user_level = 3";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}

function contar_por_id_miembro($table)
{
  global $db;
  if (tableExists($table)) {

    $sql    = "SELECT COUNT(id) AS total FROM users WHERE user_level = 4";
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}


























/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table)
{
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM ' . DB_NAME . ' LIKE "' . $db->escape($table) . '"');
  if ($table_exit) {
    if ($db->num_rows($table_exit) > 0)
      return true;
    else
      return false;
  }
}
/*--------------------------------------------------------------*/
/* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
function authenticate($username = '', $password = '')
{
  global $db;
  $username = $db->escape($username);
  $password = $db->escape($password);
  $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    $password_request = sha1($password);
    if ($password_request === $user['password']) {
      return $user['id'];
    }
  }
  return false;
}
/*--------------------------------------------------------------*/
/* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
function authenticate_v2($username = '', $password = '')
{
  global $db;
  $username = $db->escape($username);
  $password = $db->escape($password);
  $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    $password_request = sha1($password);
    if ($password_request === $user['password']) {
      return $user;
    }
  }
  return false;
}


/*--------------------------------------------------------------*/
/* Find current log in user by session id
  /*--------------------------------------------------------------*/
function current_user()
{
  static $current_user;
  global $db;
  if (!$current_user) {
    if (isset($_SESSION['user_id'])) :
      $user_id = intval($_SESSION['user_id']);
      $current_user = find_by_id('users', $user_id);
    endif;
  }
  return $current_user;
}
/*--------------------------------------------------------------*/
/* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
/*-function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT *";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
 -------------------------------------------------------------*/
/* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
function find_all_alumno()
{
  global $db;
  $results = array();
  $sql = "SELECT u.id,Dni,Apellido,Direccion,Telefono,Ref_Nombre,Ref_Celular,name,username,password,g.group_name,status,last_login,correo,tipo_sangre,fecha_nacimiento FROM users u left JOIN user_groups g ON g.group_level=u.user_level WHERE u.user_level=3 ORDER BY u.name ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_miembro()
{
  global $db;
  $results = array();
  $sql = "SELECT u.id,Dni,Apellido,Direccion,Telefono,Ref_Nombre,Ref_Celular,name,username,password,g.group_name,status,last_login,correo,tipo_sangre,fecha_nacimiento FROM users u left JOIN user_groups g ON g.group_level=u.user_level WHERE u.user_level=4 ORDER BY u.name ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_user()
{
  global $db;
  $results = array();
  $sql = "SELECT u.id,Dni,Apellido,Direccion,Telefono,Ref_Nombre,Ref_Celular,name,username,password,g.group_name,status,last_login,correo,tipo_sangre,fecha_nacimiento FROM users u left JOIN user_groups g ON g.group_level=u.user_level WHERE u.user_level<>4 and u.user_level<>3 ORDER BY u.name ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_sedes()
{
  global $db;
  $results = array();
  $sql = "SELECT * FROM sedes ORDER BY Direccion ASC";
  $result = find_by_sql($sql);
  return $result;
}

function find_all_categorias()
{
  global $db;
  $results = array();
  $sql = "SELECT * FROM c_curso ORDER BY Nombre_c ASC";
  $result = find_by_sql($sql);
  return $result;
}

function find_all_curso()
{
  global $db;
  $results = array();
  $sql = "select cursos.Id_cursos,cursos.Nombre_curso, c_curso.Nombre_c, cursos.Fecha_inicio, cursos.Fecha_final, cursos.Detalle, users.name, cursos.Lunes, cursos.Martes, cursos.Miercoles, cursos.Jueves, cursos.Viernes, cursos.Sabado, cursos.Domingo, cursos.Costo_curso from cursos inner join c_curso on cursos.Id_categoria=c_curso.Id_categoria inner join users on cursos.Docente=users.Dni ORDER BY Nombre_curso ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_asistencia_precarga()
{
  global $db;
  $results = array();
  $sql = "SELECT matricula_curso.Id_Mc,users.name,users.Apellido,users.Dni,users.Telefono,user_groups.group_name FROM matricula_curso INNER JOIN users on matricula_curso.Id_Usuario=users.id INNER JOIN user_groups on users.user_level=user_groups.group_level ORDER BY users.name ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_asistencia_precarga2()
{
  $fecha = date("Y-m-d");
  global $db;
  $results = array();
  $sql = "SELECT asistencia.Id_Asistencia,users.name,users.Apellido,users.Dni,users.Telefono,user_groups.group_name FROM asistencia INNER JOIN matricula_curso on asistencia.Id_usuario=matricula_curso.Id_Mc INNER JOIN users on matricula_curso.Id_Usuario=users.id INNER JOIN user_groups on users.user_level=user_groups.group_level WHERE Fecha ='{$fecha}' ORDER BY users.name ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_asistencia_precarga3()
{
  $fecha = date("Y-m-d");
  global $db;
  $results = array();
  $sql = "SELECT asistencia.Id_Asistencia,users.name,users.Apellido,users.Dni,users.Telefono,user_groups.group_name,asistencia.Entrada,asistencia.Salida FROM asistencia INNER JOIN matricula_curso on asistencia.Id_usuario=matricula_curso.Id_Mc INNER JOIN users on matricula_curso.Id_Usuario=users.id INNER JOIN user_groups on users.user_level=user_groups.group_level WHERE Fecha ='{$fecha}' ORDER BY users.name ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_asistencia_precarga4()
{
  $fecha = date("Y-m-d");
  global $db;
  $results = array();
  $sql = "SELECT asistencia.Fecha,asistencia.Id_Asistencia,users.name,users.Apellido,users.Dni,users.Telefono,user_groups.group_name,asistencia.Entrada,asistencia.Salida FROM asistencia INNER JOIN matricula_curso on asistencia.Id_usuario=matricula_curso.Id_Mc INNER JOIN users on matricula_curso.Id_Usuario=users.id INNER JOIN user_groups on users.user_level=user_groups.group_level  ORDER BY asistencia.Fecha ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_matriculas()
{
  global $db;
  $results = array();
  $sql = "select matricula_curso.Id_Mc,users.Apellido,sedes.Direccion,users.name,users.Dni,user_groups.group_name,cursos.Nombre_curso
        ,c_curso.Nombre_c, cursos.Fecha_inicio,cursos.Fecha_final,cursos.Docente
        ,cursos.Lunes,cursos.Martes,cursos.Miercoles,cursos.Jueves,cursos.Viernes
        ,cursos.Sabado,cursos.Domingo,cursos.Costo_curso,matricula_curso.Fecha_Matricula 
        from matricula_curso 
        inner join cursos on matricula_curso.Id_Curso=cursos.Id_cursos 
        inner join users ON matricula_curso.Id_Usuario=users.id 
        INNER JOIN sedes ON matricula_curso.Id_sede=sedes.Id_sede 
        INNER JOIN user_groups on users.user_level=user_groups.group_level 
        INNER JOIN c_curso ON c_curso.Id_categoria=cursos.Id_categoria";
  $result = find_by_sql($sql);
  return $result;
}

function find_all_group()
{
  global $db;
  $results = array();
  $sql = "SELECT * FROM user_groups";
  $result = find_by_sql($sql);
  return $result;
}

/*--------------------------------------------------------------*/
/* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

function updateLastLogIn($user_id)
{
  global $db;
  $date = make_date();
  $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? true : false);
}

/*--------------------------------------------------------------*/
/* Find all Group name
  /*--------------------------------------------------------------*/
function find_by_groupName($val)
{
  global $db;
  $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
  $result = $db->query($sql);
  return ($db->num_rows($result) === 0 ? true : false);
}
/*--------------------------------------------------------------*/
/* Find group level
  /*--------------------------------------------------------------*/
function find_by_groupLevel($level)
{
  global $db;
  $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
  $result = $db->query($sql);
  return ($db->num_rows($result) === 0 ? true : false);
}
/*--------------------------------------------------------------*/
/* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
function page_require_level($require_level)
{
  global $session;
  $current_user = current_user();
  $login_level = find_by_groupLevel($current_user['user_level']);
  //if user not login
  if (!$session->isUserLoggedIn(true)) :
    $session->msg('d', 'Por favor Iniciar sesión...');
    redirect('index.php', false);
  //if Group status Deactive
  /*elseif($login_level['group_status'] === "0"):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('home.php',false);*/
  //cheackin log in User level and Require level is Less than or equal to
  elseif ($current_user['user_level'] <= (int) $require_level) :
    return true;
  else :
    $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
    redirect('home.php', false);
  endif;
}
/*--------------------------------------------------------------*/
/* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
function join_product_table()
{
  global $db;
  $sql  = " SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,c.name";
  $sql  .= " AS categorie,m.file_name AS image";
  $sql  .= " FROM products p";
  $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
  $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
  $sql  .= " ORDER BY p.id ASC";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

function find_product_by_title($product_name)
{
  global $db;
  $p_name = remove_junk($db->escape($product_name));
  $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
  $result = find_by_sql($sql);
  return $result;
}

/*--------------------------------------------------------------*/
/* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
function find_all_product_info_by_title($title)
{
  global $db;
  $sql  = "SELECT * FROM products ";
  $sql .= " WHERE name ='{$title}'";
  $sql .= " LIMIT 1";
  return find_by_sql($sql);
}

/*--------------------------------------------------------------*/
/* Function for Update product quantity
  /*--------------------------------------------------------------*/
function update_product_qty($qty, $p_id)
{
  global $db;
  $qty = (int) $qty;
  $id  = (int) $p_id;
  $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
  $result = $db->query($sql);
  return ($db->affected_rows() === 1 ? true : false);
}
/*--------------------------------------------------------------*/
/* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
function find_recent_product_added($limit)
{
  global $db;
  $sql   = " SELECT p.id,p.name,p.sale_price,p.media_id,c.name AS categorie,";
  $sql  .= "m.file_name AS image FROM products p";
  $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
  $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
  $sql  .= " ORDER BY p.id DESC LIMIT " . $db->escape((int) $limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
function find_higest_saleing_product($limit)
{
  global $db;
  $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
  $sql .= " GROUP BY s.product_id";
  $sql .= " ORDER BY SUM(s.qty) DESC LIMIT " . $db->escape((int) $limit);
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for find all sales
 /*--------------------------------------------------------------*/
function find_all_sale()
{
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit)
{
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT " . $db->escape((int) $limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date, $end_date)
{
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year, $month)
{
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year)
{
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}
