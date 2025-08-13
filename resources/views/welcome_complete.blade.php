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
  width: 350px;
  height: 350px;
  margin: 0 auto;
  border-radius: 50%;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color), var(--accent-color));
  padding: 4px;
  animation: profileGlow 3s ease-in-out infinite;
}

.profile-inner {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  overflow: hidden;
  position: relative;
  background: var(--bg-dark);
}

.profile-inner img {
  width: 100%;
  height: 100%;
  object-fit: cover;
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
  margin-bottom: 30px;
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
  text-align: center;
}

.contact-container {
  max-width: 800px;
  margin: 0 auto;
}

.contact-info {
  margin-bottom: 40px;
}

.contact-info p {
  color: var(--text-muted);
  font-size: 1.2rem;
  margin-bottom: 30px;
}

.contact-links {
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
    height: 250px;
  }
  
  .about-grid {
    grid-template-columns: 1fr;
  }
  
  .skills-grid {
    grid-template-columns: 1fr;
  }
  
  .projects-grid {
    grid-template-columns: 1fr;
  }
  
  .contact-links {
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
                Computer Science & Engineering student at Daffodil International University, 
                specializing in Artificial Intelligence, Machine Learning, and Educational Data Science, 
                alongside being an active social media content creator with 470K+ followers on Facebook.
            </p>
            <div class="contact-links" style="justify-content: flex-start;">
                <a href="https://facebook.com/scienthush" target="_blank" class="contact-link">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="mailto:scienthush.official@gmail.com" class="contact-link">
                    <i class="fas fa-envelope"></i> Email
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
                    <p>
                        I'm Md Atique Enam, also known as ScienThush — a Computer Science & Engineering student at 
                        Daffodil International University, with a strong focus on Artificial Intelligence, Machine Learning, 
                        and Educational Data Science, alongside an active role as a social media content creator.
                    </p>
                    
                    <p>
                        My academic work involves contributing to ongoing research in areas like explainable AI, 
                        educational data mining, and precision medicine — applying machine learning techniques to make 
                        data-driven insights more transparent and actionable. I've been recognized for my academic 
                        performance through scholarships and was selected for international academic exchange programs 
                        in Japan and India.
                    </p>
                    
                    <p>
                        Outside the classroom, I've built a digital identity as a Facebook-based content creator. 
                        Since 2019, I've created engaging and socially impactful content under the name ScienThush, 
                        reaching wide audiences and collaborating with major brands such as Nagad, Bkash, Realme, 
                        Oppo, and Suzuki. My content blends storytelling, awareness, and entertainment — often tied 
                        to real-world issues and cultural moments.
                    </p>
                    
                    <p>
                        With a blend of technical skills and creative communication, I aim to bridge academic insight 
                        with public impact — whether through research or relatable content.
                    </p>
                </div>
            </div>
            
            <div class="focus-areas">
                <h3>Key Focus Areas</h3>
                <ul>
                    <li>Artificial Intelligence & Explainable Machine Learning</li>
                    <li>Educational & Health Data Science Applications</li>
                    <li>Research Collaboration & Knowledge Sharing</li>
                    <li>Digital Content Strategy & Video Production</li>
                    <li>Social Media Branding & Audience Engagement</li>
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
                        <span>Storytelling</span>
                        <span>93%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-progress" style="width: 93%;"></div>
                    </div>
                </div>
                <div class="skill-item">
                    <div class="skill-name">
                        <span>Brand Collaboration</span>
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

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="contact-container">
        <h2 class="section-title">Let's Connect</h2>
        
        <div class="contact-info">
            <p>For academic collaboration or brand partnerships</p>
            
            <div class="contact-links">
                <a href="https://facebook.com/scienthush" target="_blank" class="contact-link">
                    <i class="fab fa-facebook-f"></i> Facebook
                </a>
                <a href="mailto:scienthush.official@gmail.com" class="contact-link">
                    <i class="fas fa-envelope"></i> Email
                </a>
                <a href="https://bd.linkedin.com/in/atiqueenam" target="_blank" class="contact-link">
                    <i class="fab fa-linkedin"></i> LinkedIn
                </a>
                <a href="https://www.youtube.com/@scienthush" target="_blank" class="contact-link">
                    <i class="fab fa-youtube"></i> YouTube
                </a>
                <a href="https://www.instagram.com/scienthush" target="_blank" class="contact-link">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
                <a href="https://x.com/scienthush" target="_blank" class="contact-link">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
            </div>
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
</script>

@endsection
