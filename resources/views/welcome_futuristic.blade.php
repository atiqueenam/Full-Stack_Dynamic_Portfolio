@extends('index')
@section('main-content')
@push('styles')
<title>Atique Enam - Futuristic Portfolio</title>
<style>
/* Futuristic Welcome Page Styles */
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
.futuristic-hero {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  background: transparent;
}

.hero-content {
  text-align: center;
  z-index: 10;
  max-width: 800px;
  padding: 0 20px;
}

.glitch-text {
  font-size: 4rem;
  font-weight: 900;
  color: var(--text-light);
  text-transform: uppercase;
  letter-spacing: 3px;
  position: relative;
  animation: glitch 2s infinite;
  margin-bottom: 20px;
}

.glitch-text::before,
.glitch-text::after {
  content: attr(data-text);
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.glitch-text::before {
  animation: glitch-1 0.5s infinite;
  color: var(--primary-color);
  z-index: -1;
}

.glitch-text::after {
  animation: glitch-2 0.5s infinite;
  color: var(--secondary-color);
  z-index: -2;
}

@keyframes glitch {
  0%, 100% { transform: translate(0); }
  20% { transform: translate(-2px, 2px); }
  40% { transform: translate(-2px, -2px); }
  60% { transform: translate(2px, 2px); }
  80% { transform: translate(2px, -2px); }
}

@keyframes glitch-1 {
  0%, 100% { transform: translate(0); }
  20% { transform: translate(-2px, 2px); }
  40% { transform: translate(-2px, -2px); }
  60% { transform: translate(2px, 2px); }
  80% { transform: translate(2px, -2px); }
}

@keyframes glitch-2 {
  0%, 100% { transform: translate(0); }
  20% { transform: translate(2px, -2px); }
  40% { transform: translate(2px, 2px); }
  60% { transform: translate(-2px, -2px); }
  80% { transform: translate(-2px, 2px); }
}

.subtitle {
  font-size: 1.5rem;
  color: var(--text-muted);
  margin-bottom: 30px;
  opacity: 0;
  animation: fadeInUp 1s ease 0.5s forwards;
}

.typing-text {
  border-right: 2px solid var(--primary-color);
  animation: typing 3s steps(40, end), blink 0.75s step-end infinite;
  white-space: nowrap;
  overflow: hidden;
}

@keyframes typing {
  from { width: 0; }
  to { width: 100%; }
}

@keyframes blink {
  from, to { border-color: transparent; }
  50% { border-color: var(--primary-color); }
}

@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Holographic Profile Picture */
.holo-profile {
  position: relative;
  width: 300px;
  height: 300px;
  margin: 40px auto;
  border-radius: 50%;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color), var(--accent-color));
  padding: 4px;
  animation: hologramRotate 10s linear infinite;
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
  filter: brightness(1.2) contrast(1.1);
}

@keyframes hologramRotate {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* Neon Buttons */
.neon-btn {
  display: inline-block;
  padding: 15px 30px;
  margin: 10px;
  color: var(--text-light);
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: 600;
  border: 2px solid var(--primary-color);
  border-radius: 50px;
  background: transparent;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.neon-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
  transition: left 0.5s;
}

.neon-btn:hover {
  color: var(--bg-dark);
  box-shadow: 0 0 30px var(--primary-color);
  border-color: var(--primary-color);
}

.neon-btn:hover::before {
  left: 100%;
}

/* Futuristic About Section */
.about-futuristic {
  padding: 100px 0;
  background: rgba(0, 0, 0, 0.3);
  backdrop-filter: blur(10px);
  margin: 50px 0;
}

.cyber-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.info-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.info-card::before {
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

.info-card:hover::before {
  transform: scaleX(1);
}

.info-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 245, 255, 0.2);
}

.card-icon {
  font-size: 3rem;
  color: var(--primary-color);
  margin-bottom: 20px;
  display: block;
}

.card-title {
  color: var(--text-light);
  font-size: 1.5rem;
  margin-bottom: 15px;
  font-weight: 600;
}

.card-text {
  color: var(--text-muted);
  line-height: 1.6;
}

/* Skills Showcase */
.skills-showcase {
  padding: 80px 0;
  text-align: center;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
  max-width: 1000px;
  margin: 50px auto 0;
  padding: 0 20px;
}

.skill-orb {
  width: 120px;
  height: 120px;
  margin: 0 auto 20px;
  border-radius: 50%;
  background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  color: var(--bg-dark);
  font-weight: bold;
  animation: pulse 2s infinite;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.skill-orb:hover {
  transform: scale(1.1);
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

/* Section Titles */
.section-title-futuristic {
  font-size: 3rem;
  color: var(--text-light);
  text-align: center;
  margin-bottom: 50px;
  position: relative;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.section-title-futuristic::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 3px;
  background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
}

/* Responsive Design */
@media (max-width: 768px) {
  .glitch-text {
    font-size: 2.5rem;
  }
  
  .holo-profile {
    width: 200px;
    height: 200px;
  }
  
  .cyber-grid {
    grid-template-columns: 1fr;
  }
  
  .skills-grid {
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  }
}
</style>
@endpush

<!-- Particle Background -->
<div class="particles-container" id="particles"></div>

<!-- Hero Section -->
<section class="futuristic-hero">
    <div class="hero-content">
        <div class="holo-profile">
            <div class="profile-inner">
                <img src="assets/images/atq4.png" alt="Atique Enam">
            </div>
        </div>
        
        <h1 class="glitch-text" data-text="ATIQUE ENAM">ATIQUE ENAM</h1>
        
        <div class="subtitle">
            <span class="typing-text">AI Researcher • Content Creator • Full Stack Developer</span>
        </div>
        
        <div style="margin-top: 40px;">
            <a href="#about" class="neon-btn">Explore Profile</a>
            <a href="{{ route('login') }}" class="neon-btn" style="border-color: var(--secondary-color);">Enter Dashboard</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-futuristic">
    <div class="container">
        <h2 class="section-title-futuristic">System Profile</h2>
        
        <div class="cyber-grid">
            <div class="info-card">
                <i class="fas fa-brain card-icon"></i>
                <h3 class="card-title">AI Researcher</h3>
                <p class="card-text">
                    Specializing in Artificial Intelligence, Machine Learning, and Educational Data Science. 
                    Contributing to cutting-edge research in explainable AI and precision medicine.
                </p>
            </div>
            
            <div class="info-card">
                <i class="fas fa-video card-icon"></i>
                <h3 class="card-title">Content Creator</h3>
                <p class="card-text">
                    470K+ followers as ScienThush. Creating impactful content since 2019, 
                    collaborating with major brands like Nagad, Bkash, Realme, and Suzuki.
                </p>
            </div>
            
            <div class="info-card">
                <i class="fas fa-graduation-cap card-icon"></i>
                <h3 class="card-title">Academic Excellence</h3>
                <p class="card-text">
                    Computer Science & Engineering student at Daffodil International University. 
                    Multiple scholarships and international exchange programs in Japan and India.
                </p>
            </div>
            
            <div class="info-card">
                <i class="fas fa-code card-icon"></i>
                <h3 class="card-title">Full Stack Developer</h3>
                <p class="card-text">
                    Expert in modern web technologies including Laravel, Vue.js, React, and Node.js. 
                    Building scalable applications with cutting-edge technologies.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Skills Showcase -->
<section class="skills-showcase">
    <h2 class="section-title-futuristic">Core Systems</h2>
    
    <div class="skills-grid">
        <div class="skill-item">
            <div class="skill-orb">AI</div>
            <h4 style="color: var(--text-light);">Artificial Intelligence</h4>
        </div>
        <div class="skill-item">
            <div class="skill-orb">ML</div>
            <h4 style="color: var(--text-light);">Machine Learning</h4>
        </div>
        <div class="skill-item">
            <div class="skill-orb">WEB</div>
            <h4 style="color: var(--text-light);">Web Development</h4>
        </div>
        <div class="skill-item">
            <div class="skill-orb">DATA</div>
            <h4 style="color: var(--text-light);">Data Science</h4>
        </div>
        <div class="skill-item">
            <div class="skill-orb">UI/UX</div>
            <h4 style="color: var(--text-light);">Design</h4>
        </div>
        <div class="skill-item">
            <div class="skill-orb">CLOUD</div>
            <h4 style="color: var(--text-light);">Cloud Computing</h4>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" style="padding: 80px 0;">
    <h2 class="section-title-futuristic">Project Matrix</h2>
    
    <div class="cyber-grid">
        <div class="info-card">
            <i class="fas fa-robot card-icon"></i>
            <h3 class="card-title">AI Research Projects</h3>
            <p class="card-text">
                Explainable AI systems, educational data mining, and precision medicine applications.
            </p>
        </div>
        
        <div class="info-card">
            <i class="fas fa-globe card-icon"></i>
            <h3 class="card-title">Web Applications</h3>
            <p class="card-text">
                Full-stack applications built with modern frameworks and cutting-edge technologies.
            </p>
        </div>
        
        <div class="info-card">
            <i class="fas fa-mobile-alt card-icon"></i>
            <h3 class="card-title">Mobile Solutions</h3>
            <p class="card-text">
                Cross-platform mobile applications with intuitive user experiences.
            </p>
        </div>
        
        <div class="info-card">
            <i class="fas fa-chart-line card-icon"></i>
            <h3 class="card-title">Data Analytics</h3>
            <p class="card-text">
                Advanced analytics solutions for educational and healthcare domains.
            </p>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section id="contact" style="padding: 80px 0; text-align: center; background: rgba(0, 0, 0, 0.5);">
    <h2 class="section-title-futuristic">Initialize Contact</h2>
    <p style="color: var(--text-muted); font-size: 1.2rem; margin-bottom: 30px;">
        Ready to collaborate on groundbreaking projects?
    </p>
    <div style="margin-top: 40px;">
        <a href="mailto:atique@example.com" class="neon-btn">Send Transmission</a>
        <a href="tel:+880123456789" class="neon-btn" style="border-color: var(--secondary-color);">Voice Contact</a>
    </div>
    
    <div style="margin-top: 50px; color: var(--text-muted);">
        <p><strong>Email:</strong> atique@example.com</p>
        <p><strong>Phone:</strong> +880-123-456789</p>
        <p><strong>Location:</strong> Dhaka, Bangladesh</p>
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

// Add interactive hover effects to skill orbs
document.querySelectorAll('.skill-orb').forEach(orb => {
    orb.addEventListener('mouseenter', function() {
        this.style.animationDuration = '0.5s';
    });
    
    orb.addEventListener('mouseleave', function() {
        this.style.animationDuration = '2s';
    });
});

// Glitch text effect on hover
document.querySelector('.glitch-text').addEventListener('mouseenter', function() {
    this.style.animationDuration = '0.1s';
});

document.querySelector('.glitch-text').addEventListener('mouseleave', function() {
    this.style.animationDuration = '2s';
});
</script>

@endsection
