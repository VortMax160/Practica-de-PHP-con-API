
<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesion de cURL; ch = cURL handle;
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la peticion y no mostrarlo en pantalla.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la peticion 
    y guardamos el resultado */
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);

?>

<?php include("includes/header.php")?>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de" <?= $data["title"]; ?>
            style="border-radius: 10px;">
    </section>
    <hgroup>
        <h3><?=$data["title"];?> Se estrena en <?= $data["days_until"]; ?> Días</h3>
        <p>Fecha de Estreno: <?= $data["release_date"] ?></p>
        <p>La Siguiente Pelicula es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>

<style>
        :root{
            color-scheme: light dark;
        }
        body{
            display: grid;
            place-content: center; 
        }
        section{
            display: flex;
            justify-content: center;
            text-align: center;
        }
        hgroup{
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        img{
            margin: 0 auto;
        }
</style>
