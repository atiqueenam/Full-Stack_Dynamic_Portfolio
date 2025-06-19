<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Website</title>
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

    <div class="container">
        <header class="menu">
            <div class="title"><b>Atique's Portfolio</b></div>
            <nav>
                <a href="#">Home</a>
                <a href="#">About me</a>
                <a href="#">Projects</a>
                <a href="#">More</a>
                <a href="#" class="contact-button">Contact now</a>
            </nav>
        </header>

        <section class="profile-section">
            <div class="welcome-left">
                <h1 class="welcome-text">
                    Hey there,<br> I am <span>Atique Enam</span><br>
                    A professional <span>Content Creator</span>.
                </h1>
            </div>
            <div class="profile-right-image">
                <img src="assets/images/atq4.png" alt="Profile Picture" class="profile-pic">
            </div>
        </section>

        <section class="main-image-section">
    <div class="main-image-left">
        <img src="assets/images/atq1.jpg" alt="Atique Enam" class="main-image">
    </div>

    <div class="about-side">
        <h2>About Me</h2>

        <p class="about-text" id="about-short">
            I’m Md Atique Enam, also known as ScienThush — a Computer Science & Engineering student at Daffodil International University, with a strong focus on Artificial Intelligence, Machine Learning, and Educational Data Science, alongside an active role as a social media content creator...
        </p>

        <p class="about-text" id="about-full">
            I’m Md Atique Enam, also known as ScienThush — a Computer Science & Engineering student at Daffodil International University, with a strong focus on Artificial Intelligence, Machine Learning, and Educational Data Science, alongside an active role as a social media content creator.<br><br>
            My academic work involves contributing to ongoing research in areas like explainable AI, educational data mining, and precision medicine — applying machine learning techniques to make data-driven insights more transparent and actionable. I’ve been recognized for my academic performance through scholarships and was selected for international academic exchange programs in Japan and India.<br><br>
            Outside the classroom, I’ve built a digital identity as a Facebook-based content creator. Since 2019, I’ve created engaging and socially impactful content under the name ScienThush, reaching wide audiences and collaborating with major brands such as Nagad, Bkash, Realme, Oppo, and Suzuki. My content blends storytelling, awareness, and entertainment — often tied to real-world issues and cultural moments.
        </p>

        <button id="toggle-about" class="toggle-button">See More</button>
    </div>
</section>

    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
