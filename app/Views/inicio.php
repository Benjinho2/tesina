<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/inicio.css'); ?>">   
    <title>Inicio</title>
</head>


<body>

  <?= $this->include('common/header') ?>

    <div class="hero">
      <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quasi odio quia earum voluptates! Error ratione explicabo dolor quidem alias delectus quia ea, nisi non, deserunt optio. Neque, reprehenderit maiores.</h1>
      <p>Serving our customers locally, regionally, and nationally</p>
      <a href="#"><button class="button">Contacto</button></a>
    </div>

  <?= $this->include('common/footer') ?>

  <style>
  .hero {
      background-image: url("imagenes/inicio.jpg");
      background-size: cover;
      background-position: center;
      color: #fff;
      text-align: center;
      padding: 100px 0;
      
  }
    
  .hero h1 {
      font-size: 3em;
  }
    
  .hero p {
      font-size: 1.5em;
  }
    
  .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-top: 20px;
      border-radius: 5px;
  }
</style>



</body>

</html>