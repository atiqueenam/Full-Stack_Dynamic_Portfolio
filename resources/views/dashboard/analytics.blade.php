@extends('index')
@section('main-content')
<style>
.simple-dashboard {
  max-width: 1000px;
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

.dashboard-header h1 {
  color: #333;
  margin-bottom: 10px;
}

.dashboard-header p {
  color: #666;
  margin: 0;
}

.analytics-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  margin-bottom: 40px;
}

.analytics-card {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
  text-align: center;
}

.analytics-card.secondary {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  box-shadow: 0 4px 15px rgba(245, 87, 108, 0.3);
}

.analytics-card.tertiary {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
}

.analytics-card.quaternary {
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  box-shadow: 0 4px 15px rgba(67, 233, 123, 0.3);
}

.analytics-card h3 {
  margin: 0 0 15px 0;
  font-size: 18px;
  opacity: 0.9;
}

.analytics-card .number {
  font-size: 48px;
  font-weight: 700;
  margin: 0;
}

.analytics-card .label {
  margin: 15px 0 0 0;
  font-size: 14px;
  opacity: 0.8;
}

.chart-section {
  background: #f8f9fa;
  padding: 30px;
  border-radius: 12px;
  margin-top: 40px;
}

.chart-section h3 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;
}

.chart-placeholder {
  height: 300px;
  background: white;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 2px dashed #ddd;
  color: #666;
  font-size: 18px;
}

.back-btn {
  display: inline-block;
  background: #007bff;
  color: white;
  padding: 12px 24px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  margin-bottom: 30px;
  transition: all 0.3s ease;
}

.back-btn:hover {
  background: #0056b3;
  color: white;
  transform: translateY(-2px);
}

.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
  margin-top: 30px;
}

.stat-item {
  background: white;
  padding: 20px;
  border-radius: 8px;
  text-align: center;
  border-left: 4px solid #007bff;
}

.stat-item h4 {
  margin: 0 0 10px 0;
  color: #333;
  font-size: 16px;
}

.stat-item .value {
  font-size: 24px;
  font-weight: 700;
  color: #007bff;
}
</style>

<div class="simple-dashboard">
  <a href="{{ route('dashboard.index') }}" class="back-btn">← Back to Dashboard</a>
  
  <div class="dashboard-header">
    <h1>Portfolio Analytics</h1>
    <p>Track your portfolio performance and engagement metrics</p>
  </div>

  <div class="analytics-grid">
    <div class="analytics-card">
      <h3>Total Projects</h3>
      <div class="number">{{ \App\Models\Project::where('user_id', auth()->id())->count() }}</div>
      <p class="label">Active Projects</p>
    </div>
    
    <div class="analytics-card secondary">
      <h3>Skills Acquired</h3>
      <div class="number">{{ \App\Models\Skill::where('user_id', auth()->id())->count() }}</div>
      <p class="label">Technical & Soft Skills</p>
    </div>
    
    <div class="analytics-card tertiary">
      <h3>Work Experience</h3>
      <div class="number">{{ \App\Models\Experience::where('user_id', auth()->id())->count() }}</div>
      <p class="label">Professional Experiences</p>
    </div>
    
    <div class="analytics-card quaternary">
      <h3>Achievements</h3>
      <div class="number">{{ \App\Models\Achievement::where('user_id', auth()->id())->count() }}</div>
      <p class="label">Awards & Certifications</p>
    </div>
  </div>

  <div class="chart-section">
    <h3>Portfolio Growth Overview</h3>
    <div class="chart-placeholder">
      📊 Chart visualization coming soon
    </div>
  </div>

  <div class="chart-section">
    <h3>Skills Distribution</h3>
    <div class="stats-grid">
      @foreach(\App\Models\Skill::where('user_id', auth()->id())->selectRaw('category, COUNT(*) as count')->groupBy('category')->get() as $category)
      <div class="stat-item">
        <h4>{{ $category->category }}</h4>
        <div class="value">{{ $category->count }}</div>
      </div>
      @endforeach
      
      @if(\App\Models\Skill::where('user_id', auth()->id())->count() == 0)
      <div class="stat-item">
        <h4>No Skills Added</h4>
        <div class="value">0</div>
      </div>
      @endif
    </div>
  </div>

  <div class="chart-section">
    <h3>Project Status</h3>
    <div class="stats-grid">
      @foreach(\App\Models\Project::where('user_id', auth()->id())->selectRaw('status, COUNT(*) as count')->groupBy('status')->get() as $status)
      <div class="stat-item">
        <h4>{{ ucfirst($status->status) }}</h4>
        <div class="value">{{ $status->count }}</div>
      </div>
      @endforeach
      
      @if(\App\Models\Project::where('user_id', auth()->id())->count() == 0)
      <div class="stat-item">
        <h4>No Projects Added</h4>
        <div class="value">0</div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
