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
                <a href="#skills">Skills</a>
                <a href="#gallery">Gallery</a>
                <a href="#contact" class="contact-button">Contact now</a>
                @guest
                    <a href="{{ route('login') }}" style="margin-left: 20px; font-size: 12px; opacity: 0.7; color: #ccc; text-decoration: none;">Admin</a>
                @else
                    <a href="{{ route('dashboard') }}" style="margin-left: 20px; background: #667eea; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: #764ba2; color: white; padding: 8px 16px; border-radius: 5px; border: none; cursor: pointer;">Logout</button>
                    </form>
                @endguest
            </nav>
        </header>
    @yield('main-content')
    <footer class="footer">
    <div class="footer-container">
        <p>Connect with me on social media</p>
        <div class="social-icons">
            <a href="https://facebook.com/scienthush" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/scienthush" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://bd.linkedin.com/in/atiqueenam" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.youtube.com/@scienthush" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://x.com/scienthush" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="mailto:atiqueenam@gmail.com"><i class="fas fa-envelope"></i></a>
        </div>
        <p class="footer-credit">© {{ date('Y') }} Atique Enam | ScienThush</p>
    </div>
</footer>

     <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>