<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <!-- globalcss -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <!-- globalcss -->

    <!-- boxicons link -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- boxicons link -->

    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body{
        background-color: #f5f5f5;
    }
    /* navbar-start */
    .nav-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(203, 201, 201);
        font-size: 20px;
        padding: 20px;
        margin-bottom: 12px;
    }

    .nav-wrapper a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        margin: 16px;
    }

    .nav-wrapper li {
        list-style-type: none;
    }

    .nav-wrapper img {
        padding: 0 80px 0 0;
    }

    .userChart img {
        padding: 0 6px;
    }

    .userChart a {
        margin: 0;
        padding: 0;
    }
    /* navbar-end */

    /* main-content-start */
    .saleTittle{
        color: red;
        display: flex;
        justify-content: center;
        font-size: 30px;
        /* margin-bottom: 12px; */
    }
    .container {
        width: 150vmin;
        position: absolute;
        top: 20%;
        left: 10%;
        overflow: hidden;
        border: 16px solid #dfdfdf;
        border-radius: 8px;
        box-shadow: 10px 25px 30px rgba(52, 52, 55, 0.3);
        float: left;
    }


    .wrapper {
        width: 50%;
        height: 50%;
        display: flex;
        position: relative;
        -webkit-animation-name: slide_animation;
        -webkit-animation-duration: 10s;
        -webkit-animation-iteration-count: infinite;
        /* -webkit-animation-direction: alternate; */
        -webkit-animation-play-state: running;
    }

    @-webkit-keyframes slide_animation{
        0%{right:0px;}
        /* 10%{right:0px;} */
        20%{right:675px;}
        30%{right:675px;}
        40%{right:1350px;}
        50%{right:1350px;}
        60%{right:1350px;}
        70%{right:1350px;}
        80%{right:0px;}
        90%{right:0px;}
        100%{right:0px;}
    }

    .trending{
        position: absolute;
        top: 80%;
        left: 6%;
    }

    .card-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        max-width: 1200px;
        padding: 20px;
        position: relative;
        top: 1450px;
        left: 10%;
    }

    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 300px;
        padding: 20px;
        text-align: center;
        margin: 0 10px;
    }

    .card h2 {
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .card p {
        margin-bottom: 20px;
        font-size: 0.9rem;
    }

    .button {
        background-color: rgb(203, 201, 201);
        color: #000000;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    
    /* main-content-end */

    /* footer-for-index-bug-fixed */
    footer{
        margin-top: 1500px;
    }
    </style>
</head>
<body>
    <!-- navbar-start -->
    <x-navbar></x-navbar>
    <!-- navbar-end -->

    <!-- main-content-start -->
    <main>
        <div class="saleTittle">
            <h1>SALE 30% MONTH</h1>
        </div>
    <div class="container">
        <div class="wrapper">
        <img src="../img/Dragonlord placidusax pc.png" alt="sample 1" width="100%" />
        <img src="../img/Yakuza Wallpaper pc v2.png" alt="sample 2" width="100%" />
        <img src="../img/Yakuza Wallpaper pc.png" alt="sample 3" width="100%" />
        <img src="../img/rick-rothenberg-UsSDLVv_PwQ-unsplash.jpg" alt="sample 4" width="100%" />
        </div>
    </div>

    <div class="trending">
        <h1>Trending</h1>
        <a href=""><img src="../img/Dragonlord placidusax pc.png" width="1500px" height="" alt="trendingFoto"></a>
    </div>

    
        <div class="card-container">
            <div class="card">
                <img src="../img/Dragonlord placidusax pc.png" alt="sample1" width="200">
                <h2>Lorem, ipsum.</h2>
                <p>Lorem ipsum dolor sit amet.</p>
                <a href="#"> <!-- belum di route (buat pindah halaman) -->
                    <button class="button">See Detail</button>
                </a>
            </div>
            <div class="card">
                <img src="../img/Dragonlord placidusax pc.png" alt="sample1" width="200">
                <h2>Lorem, ipsum.</h2>
                <p>Lorem ipsum dolor sit amet.</p>
                <a href="#"> <!-- belum di route (buat pindah halaman) -->
                    <button class="button">See Detail</button>
                </a>
            </div>
            <div class="card">
                <img src="../img/Dragonlord placidusax pc.png" alt="sample1" width="200">
                <h2>Lorem, ipsum.</h2>
                <p>Lorem ipsum dolor sit amet.</p>
                <a href="#"> <!-- belum di route (buat pindah halaman) -->
                    <button class="button">See Detail</button>
                </a>
            </div>
            <div class="card">
                <img src="../img/Dragonlord placidusax pc.png" alt="sample1" width="200">
                <h2>Lorem, ipsum.</h2>
                <p>Lorem ipsum dolor sit amet.</p>
                <a href="#"> <!-- belum di route (buat pindah halaman) -->
                    <button class="button">See Detail</button>
                </a>
            </div>
            <div class="card">
                <img src="../img/Dragonlord placidusax pc.png" alt="sample1" width="200">
                <h2>Lorem, ipsum.</h2>
                <p>Lorem ipsum dolor sit amet.</p>
                <a href="#"> <!-- belum di route (buat pindah halaman) -->
                    <button class="button">See Detail</button>
                </a>

            </div>
        </div>
    
    </main>
    <!-- main-content-end -->
    
<!-- footer-start -->
<footer class="footer">

<div class="footer-content">
    <P>SYRIOUS</P>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, nostrum!</p>

    <div class="icons">
        <a href="#"><i class='bx bxl-github'></i></a>
        <a href="#"><i class='bx bxl-instagram' ></i></a>
        </div>
</div>

<div class="footer-content">
    <h4>Lorem.</h4>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
</div>

<div class="footer-content">
    <h4>Lorem.</h4>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
</div>

<div class="footer-content">
    <h4>Lorem.</h4>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
    <li><a href="#">Lorem.</a></li>
</div>
</footer>
<!-- footer-end -->
</body>
</html>
