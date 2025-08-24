<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Dashboard - Futuristic Control Center</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #0a0e1a;
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
            --gradient-3: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
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
            overflow-x: hidden;
        }

        /* Animated background */
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

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: var(--secondary-bg);
            backdrop-filter: blur(20px);
            border-right: 1px solid var(--glass-border);
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid var(--glass-border);
        }

        .sidebar-header h1 {
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .nav-menu {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.5rem 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: var(--secondary-text);
            text-decoration: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover, .nav-link.active {
            background: var(--glass-bg);
            color: var(--accent-color);
            transform: translateX(5px);
        }

        .nav-link i {
            margin-right: 1rem;
            font-size: 1.2rem;
            width: 25px;
        }

        /* Main content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            padding: 2rem;
        }

        /* Header */
        .header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header-left p {
            color: var(--secondary-text);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Stats grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            background: var(--gradient-1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--secondary-text);
            font-size: 1rem;
        }



        .chart-header {
            margin-bottom: 1.5rem;
        }

        .chart-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .chart-subtitle {
            color: var(--secondary-text);
            font-size: 0.9rem;
        }

        /* Recent activity */
        .recent-activity {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid var(--glass-border);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--gradient-2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .activity-time {
            color: var(--secondary-text);
            font-size: 0.85rem;
        }

        /* Quick actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .action-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .action-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-color);
        }

        .action-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: var(--gradient-1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
        }

        .action-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .action-desc {
            color: var(--secondary-text);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 10px;
            background: var(--gradient-1);
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 212, 255, 0.3);
        }

        .btn-secondary {
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .charts-section {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }
        }

        /* Progress bars */
        .progress-bar {
            width: 100%;
            height: 8px;
            background: var(--accent-bg);
            border-radius: 4px;
            overflow: hidden;
            margin: 0.5rem 0;
        }

        .progress-fill {
            height: 100%;
            background: var(--gradient-1);
            transition: width 1s ease;
        }

        /* Success message */
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

        /* Loading animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid var(--glass-border);
            border-radius: 50%;
            border-top-color: var(--accent-color);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Skill pills */
        .skill-pill {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            margin: 0.25rem;
            font-size: 0.85rem;
            color: var(--accent-color);
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h1><i class="fas fa-rocket"></i> Portfolio</h1>
        </div>
        <nav class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link active">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.personal-details') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.projects') }}" class="nav-link">
                    <i class="fas fa-code"></i>
                    Projects
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.skills') }}" class="nav-link">
                    <i class="fas fa-cogs"></i>
                    Skills
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.education') }}" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    Education
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.experiences') }}" class="nav-link">
                    <i class="fas fa-briefcase"></i>
                    Experience
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.achievements') }}" class="nav-link">
                    <i class="fas fa-trophy"></i>
                    Achievements
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.info') }}" class="nav-link">
                    <i class="fas fa-info-circle"></i>
                    Website Info
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.analytics') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    Analytics
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="fas fa-eye"></i>
                    View Portfolio
                </a>
            </div>
            <div class="nav-item">
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="nav-link" style="width: 100%; background: none; border: none; text-align: left;">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <h1>Welcome back, {{ Auth::user()->name ?? 'Developer' }}!</h1>
                <p>Here's your portfolio performance overview</p>
            </div>
            <div class="header-right">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-code"></i>
                </div>
                <div class="stat-value">{{ $projectsCount ?? 0 }}</div>
                <div class="stat-label">Active Projects</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="stat-value">{{ $skillsCount ?? 0 }}</div>
                <div class="stat-label">Skills Mastered</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="stat-value">{{ $experiencesCount ?? 0 }}</div>
                <div class="stat-label">Work Experience</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-value">{{ $achievementsCount ?? 0 }}</div>
                <div class="stat-label">Achievements</div>
            </div>
        </div>


        <!-- Recent Activity -->
        <div class="recent-activity">
            <h3 style="margin-bottom: 1.5rem;">Recent Activity</h3>
            @if(isset($recentProjects) && $recentProjects->count() > 0)
                @foreach($recentProjects->take(5) as $project)
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Added project: {{ $project->title ?? 'New Project' }}</div>
                        <div class="activity-time">{{ $project->created_at ? $project->created_at->diffForHumans() : 'Recently' }}</div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Welcome to your dashboard!</div>
                        <div class="activity-time">Start by adding your first project</div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="action-title">Add New Project</div>
                <div class="action-desc">Showcase your latest work and achievements</div>
                <a href="{{ route('dashboard.projects.create') }}" class="btn">Create Project</a>
            </div>
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-edit"></i>
                </div>
                <div class="action-title">Update Profile</div>
                <div class="action-desc">Keep your personal information up to date</div>
                <a href="{{ route('dashboard.personal-details') }}" class="btn btn-secondary">Edit Profile</a>
            </div>
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="action-title">Add Skills</div>
                <div class="action-desc">Document your technical expertise and abilities</div>
                <a href="{{ route('dashboard.skills.create') }}" class="btn">Add Skills</a>
            </div>
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="action-title">View Analytics</div>
                <div class="action-desc">Analyze your portfolio performance and growth</div>
                <a href="{{ route('dashboard.analytics') }}" class="btn btn-secondary">View Analytics</a>
            </div>
        </div>
    </div>

    <script>
        // Skills Distribution Chart
        const skillsCtx = document.getElementById('skillsChart').getContext('2d');
        const skillsData = {!! json_encode($skillCategories ?? []) !!};
        
        new Chart(skillsCtx, {
            type: 'doughnut',
            data: {
                labels: skillsData.map(item => item.category || 'Uncategorized'),
                datasets: [{
                    data: skillsData.map(item => item.count || 0),
                    backgroundColor: [
                        'rgba(102, 126, 234, 0.8)',
                        'rgba(118, 75, 162, 0.8)',
                        'rgba(0, 212, 255, 0.8)',
                        'rgba(255, 107, 107, 0.8)',
                        'rgba(0, 255, 136, 0.8)',
                        'rgba(255, 179, 71, 0.8)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#a8b2d1',
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                }
            }
        });

        // Growth Chart
        const growthCtx = document.getElementById('growthChart').getContext('2d');
        new Chart(growthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Projects',
                    data: [1, 2, 3, 5, 8, 12],
                    borderColor: 'rgba(102, 126, 234, 1)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Skills',
                    data: [3, 5, 8, 12, 15, 20],
                    borderColor: 'rgba(0, 212, 255, 1)',
                    backgroundColor: 'rgba(0, 212, 255, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: '#a8b2d1'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#a8b2d1'
                        },
                        grid: {
                            color: 'rgba(168, 178, 209, 0.1)'
                        }
                    },
                    y: {
                        ticks: {
                            color: '#a8b2d1'
                        },
                        grid: {
                            color: 'rgba(168, 178, 209, 0.1)'
                        }
                    }
                }
            }
        });

        // Mobile sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }

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
