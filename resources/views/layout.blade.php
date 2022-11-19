<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Majesty Developer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
<header>
<?php
       if (isset($_SESSION['isUser'])) {
        echo '
        <div class="title-block">
        <h1 class = "title" > Majesty Developer: ' . $_SESSION['userFullname']. '</h1>
        </div>
        ';
       } else {
           echo'
           <div class="title-block">
           <h1 class = "title" > Majesty Developer: (not authorized) </h1>
           </div>
           ';
      
       }
?> 
</header>

  <nav>
    <ul class="content__links">
    <li ><a class="link " href="/myblog">My Blog</a></li>
    @if(Auth::user())
                    <li class="nav-item">
                        <a class="link" href="/redactor">Редактор</a>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="/load">Загрузка файлов</a>
                    </li>
    @endif
    @if(!Auth::user())
                    <li class="nav-item">
                        <a class="link" href="/login">Авторизация</a>
                    </li>
    @endif 
    </ul>
  </nav>


<section class="content container">
   @yield('content')
</section>

  
</body>
<script src="/public/scripts/jquery-3.6.0.min.js"></script>
<script src="/public/scripts/script.js"></script>

</html>