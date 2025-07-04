<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles')
    <title>Document</title>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&family=Montserrat&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">




</head>
<body>
    <header class="menu">
            <div><img src="assets/images/logo.png" alt="logo" class="logo"></div>
            <nav>
                <a href="#">Home</a>
                <a href="#about">About me</a>
                <a href="#projects">Projects</a>
                <a href="#">More</a>
                <a href="#contact" class="contact-button">Contact now</a>
            </nav>
        </header>
    @yield('main-content')
    <footer class="footer">
    <div class="footer-container">
        <p>Connect with me on social media</p>
        <div class="social-icons">
            <a href="https://facebook.com/scienthush" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/scienthush" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@scienthush" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href="https://www.youtube.com/@scienthush" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="mailto:atiqueenam@gmail.com"><i class="fas fa-envelope"></i></a>
        </div>
        <p class="footer-credit">© {{ date('Y') }} Atique Enam | ScienThush</p>
    </div>
</footer>

     <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>