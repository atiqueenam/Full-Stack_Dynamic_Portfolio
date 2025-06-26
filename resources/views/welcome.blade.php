@extends('index')
@section('main-content')
@push('styles')
<title>Atique- Portfolio</title>

@endpush
    <div>
    <section id="profile-section" class="profile-section-section">
  <div class="abprofile-section modern-about-container">
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
    <h2 class="info-label">A short bio...</h2>

    <p class="about-text" id="about-short">
        I’m Md Atique Enam, also known as ScienThush — a Computer Science & Engineering student at Daffodil International University, with a strong focus on Artificial Intelligence, Machine Learning, and Educational Data Science, alongside an active role as a social media content creator...
    </p>

    <p class="about-text" id="about-full">
        I’m Md Atique Enam, also known as ScienThush — a Computer Science & Engineering student at Daffodil International University, with a strong focus on Artificial Intelligence, Machine Learning, and Educational Data Science, alongside an active role as a social media content creator.<br><br>
        My academic work involves contributing to ongoing research in areas like explainable AI, educational data mining, and precision medicine — applying machine learning techniques to make data-driven insights more transparent and actionable. I’ve been recognized for my academic performance through scholarships and was selected for international academic exchange programs in Japan and India.<br><br>
        Outside the classroom, I’ve built a digital identity as a Facebook-based content creator. Since 2019, I’ve created engaging and socially impactful content under the name ScienThush, reaching wide audiences and collaborating with major brands such as Nagad, Bkash, Realme, Oppo, and Suzuki. My content blends storytelling, awareness, and entertainment — often tied to real-world issues and cultural moments.
    </p>
    <div>
    <a href="https://drive.google.com/file/d/1QsPT1fN8jUIDQ75xaEBJ5Z3xLU_gOmU0/view" target="_blank" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2 view-cv-button">
    <i class="bi bi-file-earmark-person-fill"></i> View CV
</a>
</div>
</div>

</section>


<section id="about" class="about-full-section">
  <div class="about modern-about-container">

    <h2 class="section-title">About Me</h2>

    <div class="info-table">

      <div class="info-row">
        <div class="info-label"><i class="bi bi-person-fill"></i> Name</div>
        <div class="info-content"><strong>Md Atique Enam</strong> (ScienThush)</div>
      </div>

      <div class="info-row">
        <div class="info-label"><i class="bi bi-mortarboard-fill"></i> Education</div>
        <div class="info-content">Final-year Computer Science & Engineering student at <strong>Daffodil International University</strong>.</div>
      </div>

      <div class="info-row">
        <div class="info-label"><i class="bi bi-lightning-fill"></i> Academic Interests</div>
        <div class="info-content"><strong>Artificial Intelligence, Machine Learning, Educational Data Mining</strong>.</div>
      </div>

      <div class="info-row">
        <div class="info-label"><i class="bi bi-award-fill"></i> Achievements</div>
        <div class="info-content">Multiple academic scholarships and participation in <strong>international exchange programs in Japan and India</strong>.</div>
      </div>

      <div class="info-row">
        <div class="info-label"><i class="bi bi-camera-video-fill"></i> Content Creation</div>
        <div class="info-content">Creating humorous, educational, and social videos since <strong>2019</strong>. 470K+ followers on Facebook. Collaborated with brands like <strong>Nagad, Bkash, Realme, Oppo, Suzuki</strong>.</div>
      </div>

      <div class="info-row">
        <div class="info-label"><i class="bi bi-people-fill"></i> Content Style</div>
        <div class="info-content">Storytelling, comedy, and social awareness — portraying relatable characters like myself and my on-screen “father.”</div>
      </div>

    </div>

    <h3 class="skills-title">Skills & Expertise</h3>
    <ul class="skills-list">
      <li><i class="bi bi-mic-fill skill-icon"></i> Public Speaking & Hosting</li>
      <li><i class="bi bi-camera-reels skill-icon"></i> Acting & Scriptwriting</li>
      <li><i class="bi bi-people-fill skill-icon"></i> Team Leadership & Collaboration</li>
      <li><i class="bi bi-brain skill-icon"></i> AI & Machine Learning Research</li>
      <li><i class="bi bi-journal-text skill-icon"></i> Educational Content Design</li>
      <li><i class="bi bi-scissors skill-icon"></i> Video Editing & Storyboarding</li>
    </ul>

  </div>
</section>

<section id="projects">
    <h2>🚀 My Projects</h2>

    <div class="project-cards">
      <div class="card small"><img src="https://source.unsplash.com/100x100/?design" alt="Project"></div>
      <div class="card medium"><img src="https://source.unsplash.com/120x120/?tech" alt="Project"></div>
      <div class="card large"><img src="https://source.unsplash.com/150x150/?startup" alt="Project"></div>
      <div class="card medium"><img src="https://source.unsplash.com/120x120/?code" alt="Project"></div>
      <div class="card small"><img src="https://source.unsplash.com/100x100/?innovation" alt="Project"></div>
    </div>


    

  </section>




    </div>
@endsection


