@extends('index')
@section('main-content')
@push('styles')
<title>Atique Enam - Portfolio | ScienThush</title>
<style>
/* Modern Portfolio Styles */
:root {
  --primary-color: #00f5ff;
  --secondary-color: #ff0080;
  --accent-color: #7b68ee;
  --bg-dark: #0a0a0a;
  --bg-card: rgba(255, 255, 255, 0.05);
  --text-light: #ffffff;
  --text-muted: #b0b0b0;
}

/* Particle Animation Background */
.particles-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #16213e 100%);
  overflow: hidden;
}

.particle {
  position: absolute;
  width: 2px;
  height: 2px;
  background: var(--primary-color);
  border-radius: 50%;
  animation: float 8s infinite ease-in-out;
  opacity: 0.7;
}

@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
  50% { transform: translateY(-100px) rotate(180deg); opacity: 1; }
}

/* Hero Section */
.hero-section {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  background: transparent;
  padding: 50px 20px;
}

.hero-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
  max-width: 1200px;
  width: 100%;
  align-items: center;
}

.hero-text {
  color: var(--text-light);
}

.hero-text h1 {
  font-size: 3.5rem;
  font-weight: 900;
  margin-bottom: 20px;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.hero-text .subtitle {
  font-size: 1.5rem;
  color: var(--accent-color);
  margin-bottom: 15px;
  font-weight: 600;
}

.hero-text .description {
  font-size: 1.1rem;
  line-height: 1.8;
  color: var(--text-muted);
  margin-bottom: 30px;
}

/* Profile Picture */
.hero-image {
  text-align: center;
}

.profile-container {
  position: relative;
  width: 300px;
  height: 400px;
  margin: 0 auto;
  border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color), var(--accent-color));
  padding: 4px;
  animation: profileGlow 3s ease-in-out infinite;
}

.profile-inner {
  width: 100%;
  height: 100%;
  border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
  overflow: hidden;
  position: relative;
  background: var(--bg-dark);
}

.profile-inner img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top;
  filter: brightness(1.1) contrast(1.1);
}

@keyframes profileGlow {
  0%, 100% { box-shadow: 0 0 20px rgba(0, 245, 255, 0.5); }
  50% { box-shadow: 0 0 40px rgba(255, 0, 128, 0.7); }
}

/* About Section */
.about-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.3);
  backdrop-filter: blur(10px);
}

.about-container {
  max-width: 1200px;
  margin: 0 auto;
}

.section-title {
  font-size: 3rem;
  color: var(--text-light);
  text-align: center;
  margin-bottom: 50px;
  position: relative;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 3px;
  background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
}

.about-grid {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 50px;
  align-items: start;
}

.about-text {
  color: var(--text-light);
  font-size: 1.1rem;
  line-height: 1.8;
}

.about-section-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.2);
  border-radius: 15px;
  padding: 30px;
  margin-bottom: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.about-section-card:hover {
  transform: translateY(-5px);
  border-color: var(--primary-color);
  box-shadow: 0 15px 35px rgba(0, 245, 255, 0.2);
}

.about-section-card h3 {
  color: var(--primary-color);
  margin-bottom: 15px;
  font-size: 1.4rem;
  display: flex;
  align-items: center;
  gap: 12px;
}

.about-section-card h3 i {
  color: var(--accent-color);
}

.about-section-card p {
  color: #000000;
  line-height: 1.8;
  margin: 0;
  font-size: 1.05rem;
}

.focus-areas {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
}

.focus-areas h3 {
  color: var(--primary-color);
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.focus-areas ul {
  list-style: none;
  padding: 0;
}

.focus-areas li {
  color: var(--text-muted);
  margin-bottom: 10px;
  padding-left: 20px;
  position: relative;
}

.focus-areas li::before {
  content: '•';
  color: var(--accent-color);
  position: absolute;
  left: 0;
  font-size: 1.5rem;
}

/* Skills Section */
.skills-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.1);
}

.skills-container {
  max-width: 1200px;
  margin: 0 auto;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.skill-category {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
}

.skill-category h3 {
  color: var(--primary-color);
  margin-bottom: 25px;
  font-size: 1.3rem;
  text-align: center;
}

.skill-item {
  margin-bottom: 20px;
}

.skill-name {
  display: flex;
  justify-content: space-between;
  color: var(--text-light);
  margin-bottom: 8px;
  font-weight: 600;
}

.skill-bar {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  height: 8px;
  overflow: hidden;
}

.skill-progress {
  height: 100%;
  background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
  border-radius: 10px;
  animation: skillLoad 2s ease-in-out;
}

@keyframes skillLoad {
  0% { width: 0%; }
}

/* Projects Section */
.projects-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.3);
}

.projects-container {
  max-width: 1200px;
  margin: 0 auto;
}

.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.project-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.project-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.project-card:hover::before {
  transform: scaleX(1);
}

.project-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 245, 255, 0.2);
}

.project-card h3 {
  color: var(--text-light);
  margin-bottom: 15px;
  font-size: 1.3rem;
}

.project-card p {
  color: var(--text-muted);
  line-height: 1.6;
  margin-bottom: 20px;
}

.project-links a {
  display: inline-block;
  padding: 8px 16px;
  margin-right: 10px;
  background: transparent;
  border: 1px solid var(--primary-color);
  color: var(--primary-color);
  text-decoration: none;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.project-links a:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
}

/* Contact Section */
.contact-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.5);
}

.contact-container {
  max-width: 1200px;
  margin: 0 auto;
}

.contact-content {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
  margin-bottom: 50px;
}

.contact-info h3,
.contact-form h3 {
  color: var(--primary-color);
  margin-bottom: 20px;
  font-size: 1.5rem;
}

.contact-info p {
  color: var(--text-muted);
  font-size: 1.1rem;
  margin-bottom: 30px;
  line-height: 1.6;
}

.contact-details {
  margin-bottom: 30px;
}

.contact-item {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 20px;
  padding: 15px;
  background: var(--bg-card);
  border-radius: 10px;
  border: 1px solid rgba(0, 245, 255, 0.2);
  backdrop-filter: blur(10px);
}

.contact-item i {
  color: var(--primary-color);
  font-size: 1.2rem;
  width: 20px;
  text-align: center;
}

.contact-item h4 {
  color: var(--text-light);
  margin: 0 0 5px 0;
  font-size: 1rem;
}

.contact-item p {
  color: var(--text-muted);
  margin: 0;
  font-size: 0.9rem;
}

.social-links {
  display: flex;
  gap: 15px;
  margin-bottom: 30px;
}

.social-link {
  width: 50px;
  height: 50px;
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--primary-color);
  text-decoration: none;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.social-link:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 245, 255, 0.3);
}

.contact-form {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
}

.form-group {
  position: relative;
  margin-bottom: 25px;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 15px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 8px;
  color: var(--text-light);
  font-size: 1rem;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.form-group input:focus,
.form-group textarea:focus {
  outline: none;
  border-color: var(--primary-color);
  box-shadow: 0 0 10px rgba(0, 245, 255, 0.3);
}

.form-group label {
  position: absolute;
  top: 15px;
  left: 15px;
  color: var(--text-muted);
  font-size: 1rem;
  transition: all 0.3s ease;
  pointer-events: none;
}

.form-group input:focus + label,
.form-group textarea:focus + label,
.form-group input:valid + label,
.form-group textarea:valid + label {
  top: -10px;
  left: 10px;
  font-size: 0.8rem;
  color: var(--primary-color);
  background: var(--bg-dark);
  padding: 0 5px;
}

.submit-btn {
  width: 100%;
  padding: 15px;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  color: var(--bg-dark);
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.submit-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 20px rgba(0, 245, 255, 0.3);
}

.quick-links {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

.contact-link {
  display: inline-block;
  padding: 15px 30px;
  background: transparent;
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
  text-decoration: none;
  border-radius: 50px;
  transition: all 0.3s ease;
  font-weight: 600;
}

.contact-link:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
  box-shadow: 0 0 20px var(--primary-color);
}

/* Gallery Section */
.gallery-section {
  padding: 100px 20px;
  background: rgba(0, 0, 0, 0.2);
}

.gallery-container {
  max-width: 1200px;
  margin: 0 auto;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  margin-top: 50px;
}

.gallery-item {
  position: relative;
  aspect-ratio: 1;
  border-radius: 15px;
  overflow: hidden;
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.gallery-item:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 245, 255, 0.3);
}

.gallery-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.gallery-item:hover img {
  transform: scale(1.1);
}

.gallery-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
  color: var(--text-light);
  padding: 20px;
  transform: translateY(100%);
  transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
  transform: translateY(0);
}

.gallery-overlay h4 {
  font-size: 1.2rem;
  margin-bottom: 5px;
  color: var(--primary-color);
}

.gallery-overlay p {
  font-size: 0.9rem;
  color: var(--text-muted);
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-content {
    grid-template-columns: 1fr;
    text-align: center;
  }
  
  .hero-text h1 {
    font-size: 2.5rem;
  }
  
  .profile-container {
    width: 250px;
    height: 320px;
  }
  
  .about-grid {
    grid-template-columns: 1fr;
  }
  
  .about-section-card {
    padding: 20px;
  }
  
  .about-section-card h3 {
    font-size: 1.2rem;
  }
  
  .skills-grid {
    grid-template-columns: 1fr;
  }
  
  .projects-grid {
    grid-template-columns: 1fr;
  }
  
  .gallery-grid {
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
  
  .contact-content {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  
  .quick-links {
    flex-direction: column;
    align-items: center;
  }
}
</style>
@endpush

<!-- Particle Background -->
<div class="particles-container" id="particles"></div>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Atique Enam</h1>
            <p class="subtitle">ScienThush | AI Researcher | Content Creator</p>
            <p class="description">
                Hey there, I am Atique Enam - Final-year Computer Science & Engineering student at 
                Daffodil International University, specializing in Artificial Intelligence, Machine Learning, 
                and Educational Data Science, alongside being an active social media content creator with 470K+ followers on Facebook.
            </p>
            <p class="description" style="margin-bottom: 20px; color: var(--accent-color); font-style: italic;">
                "Bridging the gap between cutting-edge AI research and accessible digital content creation, 
                I strive to make technology both innovative and relatable to global audiences."
            </p>
            <div class="stats-section" style="display: flex; gap: 30px; margin-bottom: 30px; flex-wrap: wrap;">
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: var(--primary-color);">470K+</div>
                    <div style="color: var(--text-muted); font-size: 0.9rem;">Social Followers</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: var(--secondary-color);">5+</div>
                    <div style="color: var(--text-muted); font-size: 0.9rem;">Years Experience</div>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 2rem; font-weight: bold; color: var(--accent-color);">10+</div>
                    <div style="color: var(--text-muted); font-size: 0.9rem;">Brand Partnerships</div>
                </div>
            </div>
            <div class="contact-links" style="justify-content: flex-start;">
                <a href="https://facebook.com/scienthush" target="_blank" class="contact-link">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="mailto:scienthush.official@gmail.com" class="contact-link">
                    <i class="fas fa-envelope"></i> Email
                </a>
                <a href="https://drive.google.com/file/d/1QsPT1fN8jUIDQ75xaEBJ5Z3xLU_gOmU0/view" target="_blank" class="contact-link">
                    <i class="fas fa-file-alt"></i> View CV
                </a>
            </div>
        </div>
        
        <div class="hero-image">
            <div class="profile-container">
                <div class="profile-inner">
                    <img src="assets/images/atq4.png" alt="Atique Enam">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="about-container">
        <h2 class="section-title">About Me</h2>
        
        <div class="about-grid">
            <div>
                <div class="about-text">
                    <div class="about-section-card">
                        <h3><i class="fas fa-user-graduate"></i> Academic Journey</h3>
                        <p>
                            I'm Md Atique Enam, also known as ScienThush — a Computer Science & Engineering student at 
                            Daffodil International University, with a strong focus on Artificial Intelligence, Machine Learning, 
                            and Educational Data Science, alongside an active role as a social media content creator.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-microscope"></i> Research Excellence</h3>
                        <p>
                            My academic work involves contributing to ongoing research in areas like explainable AI, 
                            educational data mining, and precision medicine — applying machine learning techniques to make 
                            data-driven insights more transparent and actionable. I've been recognized for my academic 
                            performance through multiple scholarships and was selected for international academic exchange programs 
                            in Japan and India.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-video"></i> Content Creation Journey</h3>
                        <p>
                            Outside the classroom, I've built a digital identity as a Facebook-based content creator. 
                            Since 2019, I've created engaging and socially impactful content under the name ScienThush, 
                            reaching wide audiences with 470K+ followers and collaborating with major brands such as Nagad, 
                            Bkash, Realme, Oppo, and Suzuki. My content blends storytelling, comedy, and social awareness — 
                            often portraying relatable characters and addressing real-world issues.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-lightbulb"></i> Creative Vision</h3>
                        <p>
                            My content style focuses on storytelling, comedy, and social awareness — portraying relatable 
                            characters like myself and my on-screen "father." With a blend of technical skills and creative 
                            communication, I aim to bridge academic insight with public impact — whether through research 
                            or relatable content that resonates with diverse audiences.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-globe"></i> Global Recognition & Impact</h3>
                        <p>
                            With over 470,000+ followers across social media platforms, my content has reached millions of viewers 
                            worldwide. I've been featured in various media outlets and have collaborated with leading brands including 
                            Nagad, Bkash, Realme, Oppo, and Suzuki. My work demonstrates the power of combining technical expertise 
                            with creative storytelling to create meaningful impact in both academic and social media spheres.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-award"></i> Awards & Recognition</h3>
                        <p>
                            Throughout my academic journey, I have been honored with multiple scholarships and academic excellence awards 
                            from Daffodil International University. I was selected for prestigious international academic exchange programs 
                            in Japan and India, representing my institution and country. These recognitions reflect my dedication to both 
                            academic excellence and innovative thinking in the field of Computer Science and AI.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-handshake"></i> Professional Philosophy</h3>
                        <p>
                            I believe in the convergence of technology and humanity. My approach combines rigorous technical research 
                            with accessible communication, making complex AI concepts understandable to broader audiences. Whether 
                            developing explainable AI systems or creating viral content, I focus on transparency, social impact, 
                            and ethical responsibility in all my endeavors.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-rocket"></i> Future Aspirations</h3>
                        <p>
                            My vision extends beyond current achievements. I aim to establish myself as a leading researcher in 
                            explainable AI while continuing to innovate in digital content creation. I'm working towards contributing 
                            to breakthrough research in educational data science and precision medicine, while expanding my content 
                            creation platform to inspire the next generation of tech enthusiasts and content creators globally.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="focus-areas">
                <h3>Key Focus Areas</h3>
                <ul>
                    <li><i class="bi bi-brain"></i> AI & Machine Learning Research</li>
                    <li><i class="bi bi-mortarboard-fill"></i> Educational Data Mining</li>
                    <li><i class="bi bi-award-fill"></i> Academic Excellence & Scholarships</li>
                    <li><i class="bi bi-camera-video-fill"></i> Video Production & Content Creation</li>
                    <li><i class="bi bi-people-fill"></i> Social Media Strategy & Brand Collaboration</li>
                    <li><i class="bi bi-mic-fill"></i> Public Speaking & Acting</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Professional Background Section -->
<section id="background" class="about-section" style="background: rgba(10, 10, 40, 0.4);">
    <div class="about-container">
        <h2 class="section-title">Professional Background</h2>
        
        <div class="about-grid">
            <div>
                <div class="about-text">
                    <div class="about-section-card">
                        <h3><i class="fas fa-university"></i> Academic Excellence</h3>
                        <p>
                            Currently pursuing Computer Science & Engineering at Daffodil International University with a 
                            specialized focus on Artificial Intelligence and Machine Learning. Maintaining outstanding academic 
                            performance with multiple merit-based scholarships and consistently ranking among top students. 
                            My coursework includes advanced topics in AI, data structures, algorithms, and software engineering.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-plane"></i> International Exposure</h3>
                        <p>
                            Selected for prestigious international academic exchange programs in Japan and India, representing 
                            my university and country. These experiences provided invaluable exposure to global academic standards, 
                            cross-cultural collaboration, and advanced research methodologies. The programs enhanced my 
                            perspective on technology's role in solving global challenges.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-chart-line"></i> Content Creation Metrics</h3>
                        <p>
                            Built a substantial digital presence with 470,000+ followers on Facebook, generating millions of 
                            views across content pieces. Average engagement rates significantly exceed industry standards, 
                            with content regularly achieving viral status. Successful brand partnerships have resulted in 
                            measurable impact for collaborating companies including Nagad, Bkash, and major tech brands.
                        </p>
                    </div>
                    
                    <div class="about-section-card">
                        <h3><i class="fas fa-tools"></i> Technical Expertise</h3>
                        <p>
                            Proficient in multiple programming languages including Python, Java, and JavaScript. Experienced 
                            with machine learning frameworks like TensorFlow, PyTorch, and Scikit-learn. Strong background in 
                            web development using Laravel, Vue.js, and modern frontend technologies. Database management 
                            experience with MySQL and data analysis using pandas, NumPy, and visualization libraries.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="focus-areas">
                <h3>Core Competencies</h3>
                <ul>
                    <li><i class="fas fa-code"></i> Full-Stack Development</li>
                    <li><i class="fas fa-database"></i> Data Science & Analytics</li>
                    <li><i class="fas fa-robot"></i> Machine Learning Implementation</li>
                    <li><i class="fas fa-video"></i> Professional Video Production</li>
                    <li><i class="fas fa-pen"></i> Content Strategy & Scriptwriting</li>
                    <li><i class="fas fa-users"></i> Team Leadership & Management</li>
                    <li><i class="fas fa-presentation"></i> Public Speaking & Workshops</li>
                    <li><i class="fas fa-handshake"></i> Brand Collaboration & Marketing</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Achievements & Milestones Section -->
<section id="milestones" class="about-section" style="background: rgba(0, 0, 0, 0.2);">
    <div class="about-container">
        <h2 class="section-title">Achievements & Milestones</h2>
        
        <div class="achievements-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            <div class="about-section-card">
                <h3><i class="fas fa-trophy"></i> Academic Honors</h3>
                <ul style="color: var(--text-light); padding-left: 20px;">
                    <li style="color: var(--text-light);">Multiple Merit-based Scholarships (2021-2024)</li>
                    <li style="color: var(--text-light);">Dean's List Recognition for Academic Excellence</li>
                    <li style="color: var(--text-light);">International Exchange Program Selection (Japan & India)</li>
                    <li style="color: var(--text-light);">Outstanding Performance in AI & ML Coursework</li>
                    <li style="color: var(--text-light);">Research Paper Contributions in Educational Data Science</li>
                </ul>
            </div>
            
            <div class="about-section-card">
                <h3><i class="fas fa-star"></i> Content Creation Milestones</h3>
                <ul style="color: var(--text-light); padding-left: 20px;">
                    <li style="color: var(--text-light);">470,000+ Social Media Followers</li>
                    <li style="color: var(--text-light);">Millions of Views Across Content Portfolio</li>
                    <li style="color: var(--text-light);">Successful Brand Partnerships with Major Companies</li>
                    <li style="color: var(--text-light);">Viral Content Creation with Social Impact</li>
                    <li style="color: var(--text-light);">Community Building and Audience Engagement Excellence</li>
                </ul>
            </div>
            
            <div class="about-section-card">
                <h3><i class="fas fa-briefcase"></i> Professional Development</h3>
                <ul style="color: var(--text-light); padding-left: 20px;">
                    <li style="color: var(--text-light);">Leadership Roles in University Projects</li>
                    <li style="color: var(--text-light);">Cross-cultural Collaboration Experience</li>
                    <li style="color: var(--text-light);">Technical Workshop Presentations</li>
                    <li style="color: var(--text-light);">Mentoring Junior Students in Programming</li>
                    <li style="color: var(--text-light);">Open Source Contributions and Projects</li>
                </ul>
            </div>
            
            <div class="about-section-card">
                <h3><i class="fas fa-heart"></i> Social Impact</h3>
                <ul style="color: var(--text-light); padding-left: 20px;">
                    <li style="color: var(--text-light);">Educational Content for Tech Awareness</li>
                    <li style="color: var(--text-light);">Social Issues Advocacy through Content</li>
                    <li style="color: var(--text-light);">Inspiring Youth in STEM Fields</li>
                    <li style="color: var(--text-light);">Cultural Bridge Building through Content</li>
                    <li style="color: var(--text-light);">Technology Literacy Promotion</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="skills-section">
    <div class="skills-container">
        <h2 class="section-title">Skills & Expertise</h2>
        
        <div class="skills-grid">
            <div class="skill-category">
                <h3><i class="fas fa-brain"></i> AI & Machine Learning</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Python</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>TensorFlow</span>
                        <span>85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Scikit-learn</span>
                        <span>88%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 88%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Data Analysis</span>
                        <span>92%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 92%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="skill-category">
                <h3><i class="fas fa-code"></i> Web Development</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Laravel</span>
                        <span>95%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 95%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Vue.js</span>
                        <span>88%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 88%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>JavaScript</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>MySQL</span>
                        <span>85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="skill-category">
                <h3><i class="fas fa-video"></i> Content Creation</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Video Production</span>
                        <span>95%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 95%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Social Media Strategy</span>
                        <span>98%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 98%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Storytelling & Acting</span>
                        <span>93%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 93%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Public Speaking</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
            
            <div class="skill-category">
                <h3><i class="fas fa-users"></i> Professional Skills</h3>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Team Leadership</span>
                        <span>88%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 88%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Scriptwriting</span>
                        <span>85%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 85%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Video Editing</span>
                        <span>92%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 92%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Educational Content Design</span>
                        <span>90%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="projects-section">
    <div class="projects-container">
        <h2 class="section-title">Projects & Research</h2>
        
        <div class="projects-grid">
            <div class="project-card">
                <h3>AI Research Projects</h3>
                <p>
                    Working on explainable AI systems, educational data mining, and precision medicine applications. 
                    Contributing to research that makes machine learning more transparent and actionable. Current focus 
                    includes developing interpretable models for educational assessment and healthcare prediction systems.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Technologies:</strong> Python, TensorFlow, PyTorch, Scikit-learn, Pandas
                </div>
                <div class="project-links">
                    <a href="#contact">Learn More</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>ScienThush Content Platform</h3>
                <p>
                    Since 2019, creating engaging social media content with 470K+ followers. Collaborating with major 
                    brands like Nagad, Bkash, Realme, Oppo, and Suzuki on impactful campaigns. Content focuses on 
                    technology awareness, social issues, and educational entertainment reaching millions globally.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Metrics:</strong> 470K+ Followers, Millions of Views, 95% Engagement Rate
                </div>
                <div class="project-links">
                    <a href="https://facebook.com/scienthush" target="_blank">View Content</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Full-Stack Web Applications</h3>
                <p>
                    Full-stack web applications built with modern technologies like Laravel, Vue.js, and React. 
                    Focusing on user experience and scalable architecture. Projects include portfolio management systems, 
                    e-commerce platforms, and educational web applications with AI integration.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Stack:</strong> Laravel, Vue.js, MySQL, JavaScript, Bootstrap, API Development
                </div>
                <div class="project-links">
                    <a href="#contact">Discuss Project</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Educational Data Science</h3>
                <p>
                    Research in educational data mining focusing on student performance prediction, learning analytics, 
                    and personalized education systems. Developing models that help educational institutions improve 
                    learning outcomes through data-driven insights and AI-powered recommendations.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Focus Areas:</strong> Learning Analytics, Performance Prediction, Recommendation Systems
                </div>
                <div class="project-links">
                    <a href="#contact">Research Details</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Brand Collaboration Campaigns</h3>
                <p>
                    Strategic content creation and marketing campaigns for leading brands including financial services, 
                    technology companies, and automotive brands. Campaigns consistently achieve high engagement rates 
                    and measurable business impact through creative storytelling and audience connection.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Partners:</strong> Nagad, Bkash, Realme, Oppo, Suzuki, and more
                </div>
                <div class="project-links">
                    <a href="#contact">Collaboration Inquiry</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Open Source Contributions</h3>
                <p>
                    Active contributor to open source projects in AI/ML and web development domains. Sharing knowledge 
                    through code repositories, technical documentation, and community engagement. Focus on making 
                    advanced technologies accessible to developers and researchers worldwide.
                </p>
                <div style="margin: 15px 0; color: var(--accent-color);">
                    <strong>Areas:</strong> Machine Learning Libraries, Web Frameworks, Educational Tools
                </div>
                <div class="project-links">
                    <a href="#contact">View Repositories</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="about-section" style="background: rgba(0, 0, 0, 0.4);">
    <div class="about-container">
        <h2 class="section-title">What People Say</h2>
        <p style="text-align: center; color: var(--text-muted); margin-bottom: 50px; font-size: 1.1rem;">
            Feedback from colleagues, collaborators, and community members
        </p>
        
        <div class="testimonials-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            <div class="about-section-card">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)); display: flex; align-items: center; justify-content: center; color: var(--bg-dark); font-weight: bold; margin-right: 15px;">
                        DU
                    </div>
                    <div>
                        <h4 style="color: var(--text-light); margin: 0;">University Colleague</h4>
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.9rem;">Computer Science Department</p>
                    </div>
                </div>
                <p style="color: #000000; font-style: italic;">
                    "Atique's approach to combining AI research with practical applications is remarkable. His ability to 
                    explain complex concepts in simple terms makes him an excellent collaborator and mentor."
                </p>
            </div>
            
            <div class="about-section-card">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(45deg, var(--secondary-color), var(--accent-color)); display: flex; align-items: center; justify-content: center; color: var(--bg-dark); font-weight: bold; margin-right: 15px;">
                        BC
                    </div>
                    <div>
                        <h4 style="color: var(--text-light); margin: 0;">Brand Collaborator</h4>
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.9rem;">Marketing Professional</p>
                    </div>
                </div>
                <p style="color: #000000; font-style: italic;">
                    "Working with ScienThush has been incredible. His content consistently delivers high engagement rates 
                    and genuine audience connection. He understands both technology and human psychology perfectly."
                </p>
            </div>
            
            <div class="about-section-card">
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <div style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(45deg, var(--accent-color), var(--primary-color)); display: flex; align-items: center; justify-content: center; color: var(--bg-dark); font-weight: bold; margin-right: 15px;">
                        CF
                    </div>
                    <div>
                        <h4 style="color: var(--text-light); margin: 0;">Community Follower</h4>
                        <p style="color: var(--text-muted); margin: 0; font-size: 0.9rem;">Content Enthusiast</p>
                    </div>
                </div>
                <p style="color: #000000; font-style: italic;">
                    "ScienThush's content is not just entertaining but educational. His way of addressing social issues 
                    while maintaining humor and relatability is inspiring. He's genuinely making a positive impact."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="gallery-section">
    <div class="gallery-container">
        <h2 class="section-title">Gallery</h2>
        <p style="text-align: center; color: var(--text-muted); margin-bottom: 50px; font-size: 1.1rem;">
            A glimpse into my journey as both a researcher and content creator
        </p>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="assets/images/atq1.jpg" alt="Atique Enam - Academic" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Academic Journey</h4>
                    <p>Research & Development</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/atq2.jpg" alt="Atique Enam - Content Creation" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Content Creation</h4>
                    <p>Behind the Scenes</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/atq3.jpg" alt="Atique Enam - Professional" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Professional Work</h4>
                    <p>Brand Collaborations</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/img1.jpg" alt="Project Development" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Development</h4>
                    <p>Technical Projects</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/img2.jpg" alt="Team Collaboration" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Collaboration</h4>
                    <p>Team Projects</p>
                </div>
            </div>
            
            <div class="gallery-item">
                <img src="assets/images/img3.jpg" alt="Innovation" loading="lazy">
                <div class="gallery-overlay">
                    <h4>Innovation</h4>
                    <p>Creative Solutions</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="contact-container">
        <h2 class="section-title">Let's Connect</h2>
        
        <div class="contact-content">
            <div class="contact-info">
                <h3>Get In Touch</h3>
                <p>For academic collaboration, research partnerships, brand collaborations, content creation opportunities, or speaking engagements</p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Professional Email</h4>
                            <p>scienthush.official@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Location</h4>
                            <p>Dhaka, Bangladesh | Available for Remote Collaboration</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-users"></i>
                        <div>
                            <h4>Social Media Reach</h4>
                            <p>470K+ Followers | Millions of Monthly Views</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <h4>Academic Status</h4>
                            <p>Final Year CSE Student | AI/ML Research Focus</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-handshake"></i>
                        <div>
                            <h4>Collaboration Areas</h4>
                            <p>Research Projects | Brand Campaigns | Tech Talks | Mentoring</p>
                        </div>
                    </div>
                </div>
                
                <div class="social-links">
                    <a href="https://facebook.com/scienthush" target="_blank" class="social-link">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://bd.linkedin.com/in/atiqueenam" target="_blank" class="social-link">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://www.youtube.com/@scienthush" target="_blank" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://www.instagram.com/scienthush" target="_blank" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://x.com/scienthush" target="_blank" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            
            <div class="contact-form">
                <h3>Send a Message</h3>
                <form id="contactForm">
                    <div class="form-group">
                        <input type="text" id="name" name="name" required>
                        <label for="name">Your Name</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" id="email" name="email" required>
                        <label for="email">Your Email</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" id="subject" name="subject" required>
                        <label for="subject">Subject</label>
                    </div>
                    
                    <div class="form-group">
                        <textarea id="message" name="message" rows="5" required></textarea>
                        <label for="message">Your Message</label>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
        
        <div class="quick-links">
            <a href="https://drive.google.com/file/d/1QsPT1fN8jUIDQ75xaEBJ5Z3xLU_gOmU0/view" target="_blank" class="contact-link">
                <i class="fas fa-file-alt"></i> Download CV
            </a>
            <a href="mailto:scienthush.official@gmail.com" class="contact-link">
                <i class="fas fa-envelope"></i> Direct Email
            </a>
        </div>
    </div>
</section>

<script>
// Particle Generation
function createParticles() {
    const container = document.getElementById('particles');
    const particleCount = 50;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        // Random position
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        
        // Random animation delay and duration
        particle.style.animationDelay = Math.random() * 8 + 's';
        particle.style.animationDuration = (Math.random() * 10 + 5) + 's';
        
        // Random size
        const size = Math.random() * 3 + 1;
        particle.style.width = size + 'px';
        particle.style.height = size + 'px';
        
        // Random color
        const colors = ['#00f5ff', '#ff0080', '#7b68ee', '#00ff41'];
        particle.style.background = colors[Math.floor(Math.random() * colors.length)];
        
        container.appendChild(particle);
    }
}

// Initialize particles when page loads
document.addEventListener('DOMContentLoaded', createParticles);

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Skill bar animation on scroll
const observerOptions = {
    threshold: 0.3,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const skillBars = entry.target.querySelectorAll('.skill-progress');
            skillBars.forEach(bar => {
                bar.style.animation = 'skillLoad 2s ease-in-out forwards';
            });
        }
    });
}, observerOptions);

document.querySelectorAll('.skill-category').forEach(category => {
    observer.observe(category);
});

// Contact form functionality
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const name = formData.get('name');
    const email = formData.get('email');
    const subject = formData.get('subject');
    const message = formData.get('message');
    
    // Create mailto link
    const mailtoLink = `mailto:scienthush.official@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`)}`;
    
    // Open email client
    window.location.href = mailtoLink;
    
    // Show success message
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
    submitBtn.style.background = 'linear-gradient(45deg, #28a745, #20c997)';
    
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.style.background = 'linear-gradient(45deg, var(--primary-color), var(--secondary-color))';
        this.reset();
    }, 3000);
});
</script>

@endsection
