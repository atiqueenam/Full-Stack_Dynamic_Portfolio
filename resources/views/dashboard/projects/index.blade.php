@extends('index')
@section('main-content')
@push('styles')
<title>Projects - Dashboard</title>
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
  max-width: 1200px;
  margin: 0 auto;
}

.page-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 50px;
}

.page-title {
  font-size: 3rem;
  color: var(--text-light);
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
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

.btn-danger {
  background: transparent;
  border: 2px solid #dc3545;
  color: #dc3545;
  padding: 8px 16px;
  font-size: 0.9rem;
}

.btn-danger:hover {
  background: #dc3545;
  color: white;
}

.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
  gap: 30px;
}

.project-card {
  background: var(--bg-card);
  border: 1px solid rgba(0, 245, 255, 0.3);
  border-radius: 15px;
  padding: 30px;
  backdrop-filter: blur(10px);
  transition: all 0.3s ease;
}

.project-card:hover {
  transform: translateY(-5px);
  border-color: var(--primary-color);
  box-shadow: 0 15px 35px rgba(0, 245, 255, 0.2);
}

.project-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 15px;
}

.project-title {
  color: var(--primary-color);
  font-size: 1.4rem;
  margin: 0;
}

.project-featured {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  color: var(--bg-dark);
  padding: 5px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 600;
}

.project-description {
  color: var(--text-light);
  line-height: 1.6;
  margin-bottom: 15px;
}

.project-tech {
  color: var(--accent-color);
  font-size: 0.9rem;
  margin-bottom: 20px;
}

.project-links {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

.project-link {
  color: var(--primary-color);
  text-decoration: none;
  font-size: 0.9rem;
  padding: 5px 0;
  border-bottom: 1px solid transparent;
  transition: border-color 0.3s ease;
}

.project-link:hover {
  border-bottom-color: var(--primary-color);
}

.project-actions {
  display: flex;
  gap: 10px;
  justify-content: flex-end;
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid rgba(0, 245, 255, 0.2);
}

.project-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 15px;
}

.empty-state {
  text-align: center;
  padding: 60px 20px;
  color: var(--text-muted);
}

.empty-state h3 {
  color: var(--text-light);
  margin-bottom: 15px;
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

@media (max-width: 768px) {
  .page-header {
    flex-direction: column;
    gap: 20px;
    text-align: center;
  }
  
  .projects-grid {
    grid-template-columns: 1fr;
  }
}
</style>
@endpush

<div class="particles-container" id="particles"></div>

<div class="dashboard-container">
    <div class="dashboard-content">
        <div class="page-header">
            <h1 class="page-title">Manage Projects</h1>
            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Project
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($projects->count() > 0)
            <div class="projects-grid">
                @foreach($projects as $project)
                    <div class="project-card">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project-image">
                        @endif
                        
                        <div class="project-header">
                            <h3 class="project-title">{{ $project->title }}</h3>
                            @if($project->is_featured)
                                <span class="project-featured">Featured</span>
                            @endif
                        </div>
                        
                        <p class="project-description">{{ Str::limit($project->description, 150) }}</p>
                        
                        @if($project->technologies)
                            <p class="project-tech"><strong>Technologies:</strong> {{ $project->technologies }}</p>
                        @endif
                        
                        <div class="project-links">
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank" class="project-link">
                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                </a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="project-link">
                                    <i class="fab fa-github"></i> GitHub
                                </a>
                            @endif
                        </div>
                        
                        <div class="project-actions">
                            <a href="{{ route('dashboard.projects.edit', $project) }}" class="btn btn-secondary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('dashboard.projects.destroy', $project) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-project-diagram" style="font-size: 4rem; color: var(--primary-color); margin-bottom: 20px;"></i>
                <h3>No Projects Yet</h3>
                <p>Start showcasing your work by adding your first project.</p>
                <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary" style="margin-top: 20px;">
                    <i class="fas fa-plus"></i> Add Your First Project
                </a>
            </div>
        @endif
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
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
            --secondary-bg: #1a1f2e;
            --accent-bg: #252d42;
            --primary-text: #ffffff;
            --secondary-text: #a8b2d1;
            --accent-color: #00d4ff;
            --success-color: #00ff88;
            --warning-color: #ffb347;
            --danger-color: #ff4757;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #00d4ff 0%, #0099cc 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--primary-bg);
            color: var(--primary-text);
            min-height: 100vh;
        }

        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            animation: backgroundMove 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes backgroundMove {
            0%, 100% { transform: translateX(0px) translateY(0px); }
            25% { transform: translateX(20px) translateY(-20px); }
            50% { transform: translateX(-20px) translateY(20px); }
            75% { transform: translateX(20px) translateY(20px); }
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .back-btn {
            padding: 0.75rem 1.5rem;
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            color: var(--primary-text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: var(--glass-bg);
            transform: translateY(-2px);
        }

        .header-content h1 {
            font-size: 2rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .header-content p {
            color: var(--secondary-text);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--gradient-1);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: var(--accent-bg);
            color: var(--primary-text);
            border: 1px solid var(--glass-border);
        }

        .btn-danger {
            background: var(--danger-color);
            color: white;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .project-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-color);
        }

        .project-image {
            height: 200px;
            background: var(--gradient-1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .project-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(0,0,0,0.1) 25%, transparent 25%, transparent 75%, rgba(0,0,0,0.1) 75%);
            background-size: 20px 20px;
        }

        .project-content {
            padding: 2rem;
        }

        .project-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }

        .project-description {
            color: var(--secondary-text);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .tech-tag {
            padding: 0.25rem 0.75rem;
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            font-size: 0.8rem;
            color: var(--accent-color);
        }

        .project-links {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .project-link {
            padding: 0.5rem 1rem;
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            color: var(--primary-text);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .project-link:hover {
            background: var(--glass-bg);
            color: var(--accent-color);
        }

        .project-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-end;
            padding-top: 1rem;
            border-top: 1px solid var(--glass-border);
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .empty-state {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 4rem 2rem;
            text-align: center;
            grid-column: 1 / -1;
        }

        .empty-icon {
            width: 100px;
            height: 100px;
            border-radius: 20px;
            background: var(--gradient-1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin: 0 auto 2rem;
            opacity: 0.6;
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }

        .empty-description {
            color: var(--secondary-text);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
        }

        .alert-success {
            background: rgba(0, 255, 136, 0.1);
            border-color: var(--success-color);
            color: var(--success-color);
        }

        @media (max-width: 768px) {
            .projects-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .header-left {
                flex-direction: column;
                width: 100%;
            }

            .container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    
    <div class="container">
        <div class="header">
            <div class="header-left">
                <a href="{{ route('dashboard') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
                <div class="header-content">
                    <h1>Projects Management</h1>
                    <p>Showcase your work and manage your project portfolio</p>
                </div>
            </div>
            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add New Project
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="projects-grid">
            @forelse($projects as $project)
                <div class="project-card">
                    <div class="project-image">
                        @if($project->image_url)
                            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fas fa-code"></i>
                        @endif
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p class="project-description">{{ Str::limit($project->description, 120) }}</p>
                        
                        @if($project->technologies)
                            <div class="project-tech">
                                @foreach(explode(',', $project->technologies) as $tech)
                                    <span class="tech-tag">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        @endif

                        <div class="project-links">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="project-link">
                                    <i class="fab fa-github"></i>
                                    GitHub
                                </a>
                            @endif
                            @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" class="project-link">
                                    <i class="fas fa-external-link-alt"></i>
                                    Live Demo
                                </a>
                            @endif
                        </div>

                        <div class="project-actions">
                            <a href="{{ route('dashboard.projects.edit', $project) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('dashboard.projects.destroy', $project) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="empty-title">No Projects Yet</h3>
                    <p class="empty-description">
                        Start building your portfolio by adding your first project. 
                        Show off your skills and let potential employers see what you can create!
                    </p>
                    <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Create Your First Project
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        // Auto-hide alerts
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => alert.remove(), 300);
            });
        }, 5000);
    </script>
</body>
</html>
