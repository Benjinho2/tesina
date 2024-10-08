<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('estilo/consejo-truco.css'); ?>">   
    <link rel="shortcut icon" href="<?= base_url('imagenes/imagotipo.ico'); ?>">
    <title>Consejos y Trucos | AquaBot</title>
</head>
<body>
<?= $this->include('common/header') ?>

    <main>
        <section class="consejo">
            <h2>1. Cuidado de tus Plantas</h2>
            <p>Para mantener tus plantas saludables, sigue estos consejos que te damos:</p>
            <ol>
                <li>Usa compost o abono orgánico para mejorar la calidad del suelo y proporcionar nutrientes esenciales.</li>
                <li>Podar regularmente las plantas para promover el crecimiento saludable y prevenir enfermedades.</li>
            </ol>
        </section>

        <section class="consejo">
            <h2>2. Técnicas de Riego Eficiente</h2>
            <p>Para ahorrar agua y asegurar un riego eficiente:</p>
            <ol>
                <li>Utiliza nuestro sistema de riego para dirigir el agua directamente a las raíces de las plantas.</li>
                <li>Implementa nuestros sensores de humedad para monitorizar el nivel de humedad del suelo.</li>
                <li>No utilices otros medios de riego, 
                    nuestro sistema ya detiene el riego cuando el cultivo recibe la cantidad de agua adecuada, 
                    evitando así el crecimiento de hongos.</li>
            </ol>
        </section>

        <section class="consejo">
            <h2>3. Protección contra Plagas</h2>
            <p>Para proteger tus cultivos de plagas:</p>
            <ol>
                <li>Inspecciona tus plantas regularmente para detectar signos de plagas a tiempo.</li>
                <li>Utiliza insecticidas naturales o caseros para mantener cuidadas a las plagas sin dañar el medio ambiente.</li>
                <li>Planta hierbas aromáticas como albahaca y menta que actúan como repelentes naturales de insectos.</li>
            </ol>
        </section>

        <section class="consejo">
            <h2>4. Optimización del Suelo</h2>
            <p>Para mejorar la calidad de tu suelo:</p>
            <ol>
                <li>Realiza pruebas de suelo para determinar sus características y necesidades específicas.</li>
                <li>Añade materia orgánica regularmente para mantener la fertilidad y firmeza del suelo.</li>
                <li>Implementa la rotación de cultivos para evitar el agotamiento de nutrientes y mejorar la salud del suelo.</li>
            </ol>
        </section>
    </main>

<?= $this->include('common/footer') ?>

</head>

</style>
</body>
</html>