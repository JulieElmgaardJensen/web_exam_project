<?php
require_once __DIR__.'/../_.php';

try{

  _validate_user_email();
  _validate_user_password();

  $db = _db();
  $q = $db->prepare('
    SELECT * FROM users
    WHERE user_email = :user_email
  ');

  $q->bindValue(':user_email', $_POST['user_email']);
  $q->execute();
  $user = $q->fetch();

  if( ! $user ){
    throw new Exception('invalid credentials', 400);
  }

  if( ! password_verify($_POST['user_password'], $user['user_password']) ){
    throw new Exception('wrong password', 400);
  }

  session_start();
  $_SESSION['user'] = [
    'user_id' => $user['user_id'],
    'user_name' => $user['user_name'],
    'user_email' => $user['user_email'],
    'user_role' => $user['user_role'],
    'user_deleted_at' => $user['user_deleted_at'],
    'user_is_blocked' => $user['user_is_blocked']
  ];

  echo json_encode($_SESSION['user']);


}catch(Exception $e){
  try{
    if( ! $e->getCode() || ! $e->getMessage()){ throw new Exception(); }
    http_response_code($e->getCode());
    echo json_encode(['info'=>$e->getMessage()]);
  }catch(Exception $ex){
    http_response_code(500);
    echo json_encode($ex);    
  }
}

