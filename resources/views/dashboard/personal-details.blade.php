@extends('index')
@section('main-content')
@push('styles')
<title>Personal Details - Dashboard</title>
<style>
:root {
  --primary-color: #00f5ff;
  --secondary-color: #ff0080;
  --accent-color: #7b68ee;
  --bg-dark: #0a0a0a;
  --bg-card: rgba(255, 255, 255, 0.05);
  --text-light: #ffffff;
  --text-muted: #b0b0b0;
}

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

.dashboard-container {
  min-height: 100vh;
  padding: 100px 20px 50px;
  position: relative;
}

.dashboard-content {
  max-width: 1000px;
  margin: 0 auto;
}

.page-header {
  text-align: center;
  margin-bottom: 50px;
}

.page-title {
  font-size: 3rem;
  color: var(--text-light);
  margin-bottom: 20px;
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.page-subtitle {
  color: var(--text-muted);
  font-size: 1.2rem;
}

.form-container {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 40px;
  backdrop-filter: blur(10px);
}

.form-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
  margin-bottom: 30px;
}

.form-group-full {
  grid-column: span 2;
}

.form-group {
  position: relative;
  margin-bottom: 25px;
}

.form-group label {
  display: block;
  color: var(--primary-color);
  font-weight: 600;
  margin-bottom: 8px;
  font-size: 1rem;
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

.form-group textarea {
  min-height: 120px;
  resize: vertical;
}

.form-actions {
  display: flex;
  gap: 20px;
  justify-content: center;
  margin-top: 40px;
}

.btn {
  padding: 15px 30px;
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
}

.btn-primary {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  color: var(--bg-dark);
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 20px rgba(0, 245, 255, 0.3);
}

.btn-secondary {
  background: transparent;
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
}

.btn-secondary:hover {
  background: var(--primary-color);
  color: var(--bg-dark);
}

.alert {
  padding: 15px;
  border-radius: 10px;
  margin-bottom: 30px;
  border: 1px solid;
}

.alert-success {
  background: rgba(40, 167, 69, 0.1);
  border-color: #28a745;
  color: #28a745;
}

.current-image {
  max-width: 200px;
  border-radius: 10px;
  border: 2px solid var(--primary-color);
  margin-top: 10px;
}

@media (max-width: 768px) {
  .form-grid {
    grid-template-columns: 1fr;
  }
  
  .form-group-full {
    grid-column: span 1;
  }
  
  .form-actions {
    flex-direction: column;
    align-items: center;
  }
}
</style>
@endpush

<div class="particles-container" id="particles"></div>

<div class="dashboard-container">
    <div class="dashboard-content">
        <div class="page-header">
            <h1 class="page-title">Personal Details</h1>
            <p class="page-subtitle">Update your personal information and contact details</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="form-container">
            <form method="POST" action="{{ route('dashboard.personal-details.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $personalDetails->full_name ?? '') }}" required>
                        @error('full_name')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="title">Professional Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $personalDetails->title ?? '') }}" required>
                        @error('title')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $personalDetails->email ?? '') }}" required>
                        @error('email')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $personalDetails->phone ?? '') }}">
                        @error('phone')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" value="{{ old('location', $personalDetails->location ?? '') }}">
                        @error('location')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="website">Website URL</label>
                        <input type="url" id="website" name="website" value="{{ old('website', $personalDetails->website ?? '') }}">
                        @error('website')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group form-group-full">
                        <label for="bio">Professional Bio</label>
                        <textarea id="bio" name="bio" required>{{ old('bio', $personalDetails->bio ?? '') }}</textarea>
                        @error('bio')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="facebook">Facebook URL</label>
                        <input type="url" id="facebook" name="facebook" value="{{ old('facebook', $personalDetails->facebook ?? '') }}">
                        @error('facebook')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="linkedin">LinkedIn URL</label>
                        <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $personalDetails->linkedin ?? '') }}">
                        @error('linkedin')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="github">GitHub URL</label>
                        <input type="url" id="github" name="github" value="{{ old('github', $personalDetails->github ?? '') }}">
                        @error('github')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="twitter">Twitter URL</label>
                        <input type="url" id="twitter" name="twitter" value="{{ old('twitter', $personalDetails->twitter ?? '') }}">
                        @error('twitter')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="instagram">Instagram URL</label>
                        <input type="url" id="instagram" name="instagram" value="{{ old('instagram', $personalDetails->instagram ?? '') }}">
                        @error('instagram')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="youtube">YouTube URL</label>
                        <input type="url" id="youtube" name="youtube" value="{{ old('youtube', $personalDetails->youtube ?? '') }}">
                        @error('youtube')<span class="error">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="form-group form-group-full">
                        <label for="profile_image">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*">
                        @error('profile_image')<span class="error">{{ $message }}</span>@enderror
                        @if($personalDetails && $personalDetails->profile_image)
                            <img src="{{ asset('storage/' . $personalDetails->profile_image) }}" alt="Current Profile" class="current-image">
                        @endif
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Particle Generation
function createParticles() {
    const container = document.getElementById('particles');
    const particleCount = 50;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 8 + 's';
        particle.style.animationDuration = (Math.random() * 10 + 5) + 's';
        
        const size = Math.random() * 3 + 1;
        particle.style.width = size + 'px';
        particle.style.height = size + 'px';
        
        const colors = ['#00f5ff', '#ff0080', '#7b68ee', '#00ff41'];
        particle.style.background = colors[Math.floor(Math.random() * colors.length)];
        
        container.appendChild(particle);
    }
}

document.addEventListener('DOMContentLoaded', createParticles);
</script>

@endsection
