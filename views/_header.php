<?php
ini_set('display_errors', 1);
session_start();

require_once __DIR__.'/../_.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kalnia&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  <link rel="stylesheet" href="/app.css">
  <title>
    FoodFly
  </title>
</head>


<body class="w-full h-screen text-base font-armino font-light bg-black">


<nav class="flex items-center w-full h-16 px-4 md:px-12 lg:px-44 text-gray-50">
  <a href="/" class="text-xl font-exo ">FoodFly</a>
  
  <div class="hidden md:flex gap-4 mx-auto">
    <a href="/users">Users</a>
    <a href="/orders">Orders</a>
    <a href="/users">Contact us</a>
    <a href="/users">About us</a>
  </div>
  
  <div class=" md:flex gap-4 ml-auto">
    
  <?php if( ! isset($_SESSION['user']) ): ?>
    <a href="/login"><button class="bg-teal-200 text-gray-900 rounded-3xl py-2 px-8 my-4">Login</button></a>
    <a href="/signup"><button class="bg-zinc-800 text-gray-50 rounded-3xl py-2 px-8 my-4">Signup</button></a>
  <?php else: ?>
    <a href="/profile?user_id=<?= $_SESSION['user']['user_id'] ?>"><button class="bg-teal-200 text-gray-900 rounded-3xl py-2 px-8 ml-auto">My profile</button></a>
    <!-- <a href="/profile?user_id=<?= $_SESSION['user']['user_id'] ?>"><button class="bg-teal-200 text-gray-900 rounded-3xl py-2 px-8 ml-auto">My orders</button></a> -->
    <a href="/logout"><button class="bg-zinc-800 text-gray-50 rounded-3xl py-2 px-8 ml-auto">Log out</button></a>
  <?php endif ?>  


  </div>
</nav>

<nav class="w-full bg-teal-200 text-gray-900 flex gap-4 p-6 md:px-12 lg:px-44">

<?php 
    if (isset($_SESSION['user'])) {
      // User is logged in, display navigation based on user role
      if ($_SESSION['user']['user_role'] === 'admin') {
          echo '<a class="my-auto" href="/users">Users</a>
                <a class="my-auto" href="/orders">Orders</a>';
      }elseif ($_SESSION['user']['user_role'] === 'partner') {
        
      }
  }
  ?>
</nav>




