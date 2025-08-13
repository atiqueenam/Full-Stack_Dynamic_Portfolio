<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management - Portfolio Dashboard</title>
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
            max-width: 1200px;
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

        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }

        .profile-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            height: fit-content;
        }

        .avatar-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--gradient-2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            margin: 0 auto 1rem;
        }

        .upload-btn {
            padding: 0.5rem 1rem;
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            color: var(--primary-text);
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-btn:hover {
            background: var(--glass-bg);
        }

        .stats-mini {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .stat-mini {
            text-align: center;
            padding: 1rem;
            background: var(--accent-bg);
            border-radius: 10px;
        }

        .stat-mini-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--accent-color);
        }

        .stat-mini-label {
            font-size: 0.8rem;
            color: var(--secondary-text);
            margin-top: 0.25rem;
        }

        .form-container {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
        }

        .form-section {
            margin-bottom: 2rem;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--accent-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-text);
            font-weight: 500;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            color: var(--primary-text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-color);
            background: var(--glass-bg);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
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

        .btn-secondary:hover {
            background: var(--glass-bg);
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--glass-border);
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

        .alert-error {
            background: rgba(255, 71, 87, 0.1);
            border-color: var(--danger-color);
            color: var(--danger-color);
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
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
            <a href="{{ route('dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to Dashboard
            </a>
            <div class="header-content">
                <h1>Profile Management</h1>
                <p>Update your personal information and professional details</p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <ul style="margin: 0.5rem 0 0 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="profile-grid">
            <!-- Profile Overview -->
            <div class="profile-card">
                <div class="avatar-section">
                    <div class="avatar">
                        {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                    </div>
                    <button class="upload-btn">
                        <i class="fas fa-camera"></i> Change Photo
                    </button>
                </div>
                
                <div class="stats-mini">
                    <div class="stat-mini">
                        <div class="stat-mini-value">{{ $user->created_at ? $user->created_at->diffForHumans() : 'Recently' }}</div>
                        <div class="stat-mini-label">Member Since</div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-value">{{ $user->updated_at ? $user->updated_at->diffForHumans() : 'Recently' }}</div>
                        <div class="stat-mini-label">Last Updated</div>
                    </div>
                </div>
            </div>

            <!-- Profile Form -->
            <div class="form-container">
                <form method="POST" action="{{ route('dashboard.profile.update') }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-section">
                        <div class="section-title">
                            <i class="fas fa-user"></i>
                            Personal Information
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone', $user->phone) }}">
                            </div>
                            <div class="form-group">
                                <label for="student_id" class="form-label">Student ID</label>
                                <input type="text" id="student_id" name="student_id" class="form-input" value="{{ old('student_id', $user->student_id) }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
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
