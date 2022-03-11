<?php

global $settings;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo $settings['siteurl']; ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="<?php echo $settings['siteurl']; ?>/assets/css/blog.css" rel="stylesheet">
</head>

<body>

  <div class="container-fluid">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand h1 mt-1 text-success" href="<?php echo $settings['siteurl'];?>">Tech Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto align-items-end">

            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $settings['siteurl'];?>">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Technology</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Science</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">New Launches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $settings['siteurl']; ?>/pages/write">Write a Blog</a>
            </li>
          </ul>
          <a type="button" class="btn btn-outline-success mx-1" href="<?php echo $settings['siteurl'];?>/pages/login">Login/SignUp </a>
        </div>
      </nav>

    </header>


  </div>
