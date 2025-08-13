@extends('index')
@section('main-content')
@push('styles')
<title>Dashboard - Atique Enam Portfolio</title>
<style>
/* Modern Dashboard Styles */
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

/* Dashboard Layout */
.dashboard-container {
  min-height: 100vh;
  padding: 100px 20px 50px;
  position: relative;
}

.dashboard-content {
  max-width: 1200px;
  margin: 0 auto;
}

.dashboard-header {
  text-align: center;
  margin-bottom: 50px;
}

.dashboard-header h1 {
  font-size: 3rem;
  color: var(--text-light);
  margin-bottom: 20px;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.dashboard-header p {
  color: var(--text-muted);
  font-size: 1.1rem;
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.6;
}

.welcome-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 40px;
  backdrop-filter: blur(10px);
  margin-bottom: 50px;
  text-align: center;
}

.welcome-card h2 {
  color: var(--primary-color);
  margin-bottom: 20px;
  font-size: 1.8rem;
}

.welcome-card p {
  color: var(--text-light);
  line-height: 1.8;
  font-size: 1.1rem;
}

.user-info {
  background: var(--bg-card);
  border: 1px solid rgba(123, 104, 238, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
  margin-bottom: 50px;
  display: flex;
  align-items: center;
  gap: 30px;
}

.user-avatar {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  color: var(--bg-dark);
  font-weight: bold;
}

.user-details h3 {
  color: var(--text-light);
  margin-bottom: 10px;
  font-size: 1.4rem;
}

.user-details p {
  color: var(--text-muted);
  margin: 5px 0;
}

.actions-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}

.action-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.action-card::before {
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

.action-card:hover::before {
  transform: scaleX(1);
}

.action-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 245, 255, 0.2);
}

.action-card h3 {
  color: var(--text-light);
  margin-bottom: 15px;
  font-size: 1.3rem;
  display: flex;
  align-items: center;
  gap: 10px;
}

.action-card p {
  color: var(--text-muted);
  line-height: 1.6;
  margin-bottom: 20px;
}

.action-btn {
  display: inline-block;
  padding: 12px 24px;
  background: transparent;
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
  text-decoration: none;
  border-radius: 50px;
  transition: all 0.3s ease;
  font-weight: 600;
}

.action-btn:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
  box-shadow: 0 0 20px var(--primary-color);
}

.logout-section {
  text-align: center;
  margin-top: 50px;
}

.logout-btn {
  background: linear-gradient(45deg, var(--secondary-color), #764ba2);
  color: white;
  border: none;
  padding: 15px 30px;
  border-radius: 50px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  font-size: 1rem;
}

.logout-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 20px rgba(255, 0, 128, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
  .dashboard-header h1 {
    font-size: 2rem;
  }
  
  .actions-grid {
    grid-template-columns: 1fr;
  }
  
  .user-info {
    flex-direction: column;
    text-align: center;
  }
}

/* Success Message */
.success-message {
  background: linear-gradient(45deg, #28a745, #20c997);
  color: white;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 30px;
  border-left: 4px solid #fff;
  backdrop-filter: blur(10px);
}
</style>
@endpush

<!-- Particle Background -->
<div class="particles-container" id="particles"></div>

<div class="dashboard-container">
    <div class="dashboard-content">
        @if (session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="dashboard-header">
            <h1>Admin Dashboard</h1>
            <p>Welcome to your portfolio management center. Control and customize your digital presence with ease.</p>
        </div>

        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? Auth::user()->email, 0, 1)) }}
            </div>
            <div class="user-details">
                <h3>{{ Auth::user()->name ?? 'Admin User' }}</h3>
                <p><i class="fas fa-envelope"></i> {{ Auth::user()->email }}</p>
                <p><i class="fas fa-clock"></i> Last login: {{ Auth::user()->updated_at->format('M d, Y - H:i') }}</p>
            </div>
        </div>

        <div class="welcome-card">
            <h2>Portfolio Management Hub</h2>
            <p>
                From this dashboard, you can manage all aspects of your portfolio including personal details, 
                projects, skills, education, experiences, and achievements. Your portfolio showcases your journey 
                as both an AI researcher and content creator to visitors worldwide.
            </p>
        </div>

        <div class="actions-grid">
            <div class="action-card">
                <h3><i class="fas fa-user-edit"></i> Personal Details</h3>
                <p>Update your personal information, contact details, and professional summary that appears on your portfolio homepage.</p>
                <a href="{{ route('dashboard.personal-details') }}" class="action-btn">Edit Profile</a>
            </div>
            
            <div class="action-card">
                <h3><i class="fas fa-project-diagram"></i> Manage Projects</h3>
                <p>Add, edit, or remove projects from your portfolio. Showcase your AI research, web applications, and content creation work.</p>
                <a href="{{ route('dashboard.projects') }}" class="action-btn">Manage Projects</a>
            </div>
            
            <div class="action-card">
                <h3><i class="fas fa-cogs"></i> Update Skills</h3>
                <p>Keep your skills section current. Add new technologies, programming languages, and content creation tools you've mastered.</p>
                <a href="{{ route('dashboard.skills') }}" class="action-btn">Update Skills</a>
            </div>
            
            <div class="action-card">
                <h3><i class="fas fa-graduation-cap"></i> Education & Experience</h3>
                <p>Manage your educational background, research experience, scholarships, and international program participation.</p>
                <a href="{{ route('dashboard.experiences') }}" class="action-btn">Edit Experience</a>
            </div>
            
            <div class="action-card">
                <h3><i class="fas fa-trophy"></i> Achievements</h3>
                <p>Update your achievements including academic recognitions, brand collaborations, and content creation milestones.</p>
                <a href="{{ route('dashboard.achievements') }}" class="action-btn">Manage Achievements</a>
            </div>
            
            <div class="action-card">
                <h3><i class="fas fa-images"></i> Education</h3>
                <p>Manage your educational background, degrees, institutions, and academic achievements.</p>
                <a href="{{ route('dashboard.education') }}" class="action-btn">Manage Education</a>
            </div>
            
            <div class="action-card">
                <h3><i class="fas fa-eye"></i> View Portfolio</h3>
                <p>See how your portfolio appears to visitors. Review all sections and ensure everything is up to date and engaging.</p>
                <a href="{{ route('home') }}" class="action-btn">View Live Site</a>
            </div>
            
            <div class="action-card">
                <h3><i class="fas fa-chart-line"></i> Analytics</h3>
                <p>Monitor portfolio performance, visitor engagement, and content reach across your digital presence.</p>
                <a href="{{ route('dashboard.analytics') }}" class="action-btn">View Analytics</a>
            </div>
        </div>

        <div class="logout-section">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Particle Generation (same as welcome page)
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
</script>

@endsection
