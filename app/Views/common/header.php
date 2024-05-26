<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('public/estilo/header.css'); ?>">
    <title>Header</title>  
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="http://localhost/tesina/public/">Inicio</a></li>
            </ul>
            <ul class="auth">
                <li><a href="http://localhost/tesina/public/autenticacion/login">Login</a></li>
                <li><a href="http://localhost/tesina/public/autenticacion/register">Register</a></li>
            </ul>
        </nav>
    </header>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
    }

    .container {
        width: 50%;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    header {
        background-color: #333;
        padding: 10px 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    header nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }
    header nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
    }
    header nav ul li {
        margin: 0 15px;
    }
    header nav ul li a {
        color: #ffffff;
        text-decoration: none;
        font-size: 1.2em;
    }
    header nav ul li a:hover {
        text-decoration: underline;
    }
    header nav ul.auth {
        margin-left: auto;
    }


</style>
    
</body>

</html>