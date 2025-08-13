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
            <p class="subtitle">ScienThush</p>
            <p class="description">
                Hey there, I am Atique Enam - Final-year Computer Science & Engineering student at 
                Daffodil International University, specializing in Artificial Intelligence, Machine Learning, 
                and Educational Data Science, alongside being an active social media content creator with 470K+ followers on Facebook.
            </p>
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
                    Contributing to research that makes machine learning more transparent and actionable.
                </p>
                <div class="project-links">
                    <a href="#contact">Learn More</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>ScienThush Content</h3>
                <p>
                    Since 2019, creating engaging social media content with 470K+ followers. Collaborating with major 
                    brands like Nagad, Bkash, Realme, Oppo, and Suzuki on impactful campaigns.
                </p>
                <div class="project-links">
                    <a href="https://facebook.com/scienthush" target="_blank">View Content</a>
                </div>
            </div>
            
            <div class="project-card">
                <h3>Web Applications</h3>
                <p>
                    Full-stack web applications built with modern technologies like Laravel, Vue.js, and React. 
                    Focusing on user experience and scalable architecture.
                </p>
                <div class="project-links">
                    <a href="#contact">Discuss Project</a>
                </div>
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
                <p>For academic collaboration, brand partnerships, or content creation opportunities</p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>scienthush.official@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Location</h4>
                            <p>Dhaka, Bangladesh</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-users"></i>
                        <div>
                            <h4>Social Media</h4>
                            <p>470K+ Followers</p>
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
