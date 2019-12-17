<!--

    =========================================================
    * Argon Dashboard - v1.1.0
    =========================================================
    
    * Product Page: https://www.creative-tim.com/product/argon-dashboard
    * Copyright 2019 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)
    
    * Coded by Creative Tim
    
    =========================================================
    
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('judul') - Ini Lho ITS! 2020
    </title>
    <!-- Favicon -->
    <link href="images/logokecil.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="auth/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="auth/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="auth/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <style>
        body {
            background-image: url("/images/fogs.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="main-content">
        @yield('konten')
    </div>
    <!--   Core   -->
    <script src="auth/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="auth/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    @yield('js')
</body>

</html>