<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Azovo API</title>

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
                font-family: 'Poppins';
                background-color: var(--primaryColor);
                color: var(--textColor);
            }
            a{
                text-decoration: none;
                color: var(--textColor);
            }
            /* Nab Bar */
            nav{
                display: flex;
                justify-content: space-between;
                margin: 2em 10%;
            }
            nav .logo{
                display: flex;
                align-items: center;
            }
            nav .logo h3{
                font-weight: normal;
                font-size: 25px;
                margin-left: .5em;
                display: flex;
                align-items: center;
            }
            nav .logo h3 span{
                font-size: 10px;
                background-color: var(--textColor);
                color: var(--primaryColor);
                padding: .3em .5em;
                border-radius: .5em;
                margin-left: .3em;
            }
            nav a:last-child{
                padding: 1em 1.5em;
                color: #b1b1b1;
                border: 2px solid #e6e6e6;
                border-radius: 1.2em;
                font-size: 13px
            }
            /* Content */
            .content{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 70vh;
            }
            .content h1{
                font-size: 120px;
            }
            @media (max-width: 550px) {
                .content h1{
                    font-size: 80px;
                }
            }
            .content h1 span{
                font-size: 20px;
            }
        </style>

        <!-- Nav Bar -->
        <nav>
            <!-- Logo -->
            <a class="logo" href="/">
                <span class="material-symbols-outlined">shopping_bag</span>
                <h3>Azovo <span>API</span></h3>
            </a>
            <a class="logo" href="/https://github.com/BadreddineIbril/Azovo_youcan_challenge" target="_blank">Documentation</a>
        </nav>
        <!-- Content -->
        <div class="content">
            <h1>Azovo <span>[API]</span></h1>
        </div>
    </body>
</html>
