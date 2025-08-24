
@extends('index')
@section('main-content')
<style>
.simple-dashboard {
  max-width: 800px;
  margin: 40px auto;
  padding: 30px;
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.dashboard-header {
  text-align: center;
  margin-bottom: 40px;
  padding-bottom: 20px;
  border-bottom: 2px solid #f0f0f0;
}

.user-info {
  background: #f8f9fa;
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 30px;
  text-align: center;
}

.management-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin-bottom: 30px;
}

.management-card {
  background: #fff;
  border: 2px solid #e9ecef;
  border-radius: 8px;
  padding: 20px;
  text-align: center;
  transition: all 0.3s ease;
  text-decoration: none;
  color: #333;
}

.management-card:hover {
  border-color: #007bff;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0,123,255,0.2);
  text-decoration: none;
  color: #007bff;
}

.management-card i {
  font-size: 2rem;
  margin-bottom: 10px;
  color: #007bff;
}

.management-card h3 {
  margin: 10px 0 5px;
  font-size: 1.2rem;
}

.management-card p {
  color: #666;
  font-size: 0.9rem;
  margin: 0;
}

.logout-section {
  text-align: center;
  padding-top: 20px;
  border-top: 1px solid #e9ecef;
}

.btn {
  display: inline-block;
  padding: 12px 24px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-primary {
  background: #007bff;
  color: white;
}

.btn-primary:hover {
  background: #0056b3;
  color: white;
}

.btn-danger {
  background: #dc3545;
  color: white;
}

.btn-danger:hover {
  background: #c82333;
}
</style>

<div class="simple-dashboard">
  <div class="dashboard-header">
    <h1>Portfolio Dashboard</h1>
    <p>Manage your portfolio content</p>
  </div>
  
  <div class="user-info">
    <h3>Welcome, {{ Auth::user()->name ?? 'Admin User' }}</h3>
    <p style="color: #666;">{{ Auth::user()->email }}</p>
  </div>
  
  <div class="management-grid">
    <a href="{{ route('dashboard.personal-details') }}" class="management-card">
      <i class="fas fa-user"></i>
      <h3>Profile</h3>
      <p>Edit personal details</p>
    </a>
    
    <a href="{{ route('dashboard.projects') }}" class="management-card">
      <i class="fas fa-code"></i>
      <h3>Projects</h3>
      <p>Manage portfolio projects</p>
    </a>
    
    <a href="{{ route('dashboard.skills') }}" class="management-card">
      <i class="fas fa-cogs"></i>
      <h3>Skills</h3>
      <p>Update your skills</p>
    </a>
    
    <a href="{{ route('dashboard.education') }}" class="management-card">
      <i class="fas fa-graduation-cap"></i>
      <h3>Education</h3>
      <p>Manage education history</p>
    </a>
    
    <a href="{{ route('dashboard.experiences') }}" class="management-card">
      <i class="fas fa-briefcase"></i>
      <h3>Experience</h3>
      <p>Edit work experience</p>
    </a>
    
    <a href="{{ route('dashboard.achievements') }}" class="management-card">
      <i class="fas fa-trophy"></i>
      <h3>Achievements</h3>
      <p>Manage achievements</p>
    </a>
  </div>
  
  <div style="text-align: center; margin-bottom: 30px;">
    <a href="{{ route('home') }}" class="btn btn-primary">
      <i class="fas fa-eye"></i> View Portfolio
    </a>
  </div>
  
  <div class="logout-section">
    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
      @csrf
      <button type="submit" class="btn btn-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
      </button>
    </form>
  </div>
</div>
@endsection
