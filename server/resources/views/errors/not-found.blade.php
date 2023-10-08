<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Azovo API - 404</title>

        <!-- Favicon -->
        <link rel="icon" type="image" href="https://cdn.iconscout.com/icon/free/png-256/free-a-character-alphabet-letter-32849.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@400;800&family=Kanit&family=Montserrat:wght@800&family=Poppins:wght@500&family=Yatra+One&display=swap" rel="stylesheet">

        <!-- ICONS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <!-- Styles -->
    </head>
    <body class="antialiased">

        <!-- ========= Style ========= -->
        <style>
            /* Constants */
            :root{
                --primaryColor: #222;
                --textColor: #fff;
            }
            *{
                padding: 0;
                margin: 0;
            }
            body{
                background-color: var(--primaryColor);
                color: var(--textColor);
            }
            .not-found{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .not-found img{
                width: 500px;
                filter: invert(.865);
            }
        </style>

        <!-- Not Found -->
        <section class="not-found">
            <img src="https://media.giphy.com/avatars/404academy/kGwR3uDrUKPI.gif" alt="">
        </section>
    </body>
</html>
