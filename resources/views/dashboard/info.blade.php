<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Information - Portfolio Dashboard</title>
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

        /* Container */
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Header */
        .header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header p {
            color: var(--secondary-text);
            font-size: 1.1rem;
        }

        /* Form container */
        .form-container {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-text);
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            background: var(--secondary-bg);
            color: var(--primary-text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Button styles */
        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--gradient-2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 212, 255, 0.4);
        }

        .btn-secondary {
            background: var(--accent-bg);
            color: var(--primary-text);
            margin-right: 1rem;
        }

        .btn-secondary:hover {
            background: var(--secondary-bg);
            color: var(--primary-text);
        }

        /* Success message */
        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: rgba(0, 255, 136, 0.1);
            border: 1px solid var(--success-color);
            color: var(--success-color);
        }

        /* Buttons container */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>
    
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-info-circle"></i> Website Information</h1>
            <p>Manage general website information and settings</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="form-container">
            <form action="{{ route('dashboard.info.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="portfolio"><i class="fas fa-briefcase"></i> Portfolio Title</label>
                    <input type="text" class="form-control" id="portfolio" name="portfolio" 
                           value="{{ old('portfolio', $info->portfolio ?? '') }}" 
                           placeholder="e.g., My Professional Portfolio">
                    @error('portfolio')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="designation"><i class="fas fa-user-tie"></i> Professional Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" 
                           value="{{ old('designation', $info->designation ?? '') }}" 
                           placeholder="e.g., Full Stack Developer, Software Engineer">
                    @error('designation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
                    <input type="text" class="form-control" id="address" name="address" 
                           value="{{ old('address', $info->address ?? '') }}" 
                           placeholder="Your location or address">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description"><i class="fas fa-align-left"></i> Portfolio Description</label>
                    <textarea class="form-control" id="description" name="description" 
                              placeholder="Brief description about your portfolio or professional summary...">{{ old('description', $info->description ?? '') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ScienThush Section -->
                <h3 style="color: var(--accent-color); margin: 2rem 0 1rem; border-bottom: 2px solid var(--glass-border); padding-bottom: 0.5rem;">
                    <i class="fas fa-video"></i> ScienThush Content Creator Section
                </h3>

                <div class="form-group">
                    <label for="show_scienthush_section">
                        <input type="checkbox" id="show_scienthush_section" name="show_scienthush_section" 
                               {{ old('show_scienthush_section', $info->show_scienthush_section ?? false) ? 'checked' : '' }}>
                        <i class="fas fa-toggle-on"></i> Show ScienThush Section on Portfolio
                    </label>
                    @error('show_scienthush_section')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="scienthush_description"><i class="fas fa-info"></i> ScienThush Description</label>
                    <textarea class="form-control" id="scienthush_description" name="scienthush_description" 
                              placeholder="Description of your ScienThush content creator work...">{{ old('scienthush_description', $info->scienthush_description ?? '') }}</textarea>
                    @error('scienthush_description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="scienthush_facebook_url"><i class="fab fa-facebook"></i> Facebook Page URL</label>
                    <input type="url" class="form-control" id="scienthush_facebook_url" name="scienthush_facebook_url" 
                           value="{{ old('scienthush_facebook_url', $info->scienthush_facebook_url ?? '') }}" 
                           placeholder="https://facebook.com/scienthush">
                    @error('scienthush_facebook_url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="scienthush_youtube_url"><i class="fab fa-youtube"></i> YouTube Channel URL</label>
                    <input type="url" class="form-control" id="scienthush_youtube_url" name="scienthush_youtube_url" 
                           value="{{ old('scienthush_youtube_url', $info->scienthush_youtube_url ?? '') }}" 
                           placeholder="https://youtube.com/@scienthush">
                    @error('scienthush_youtube_url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="scienthush_featured_videos"><i class="fas fa-play-circle"></i> Featured Videos</label>
                    <textarea class="form-control" id="scienthush_featured_videos" name="scienthush_featured_videos" 
                              placeholder="Enter video URLs, one per line (Facebook or YouTube links)">{{ old('scienthush_featured_videos', is_array($info->scienthush_featured_videos ?? null) ? implode("\n", $info->scienthush_featured_videos) : '') }}</textarea>
                    <small style="color: var(--secondary-text); margin-top: 0.5rem; display: block;">
                        Enter each video URL on a new line. Supports Facebook and YouTube video links.
                    </small>
                    @error('scienthush_featured_videos')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Information
                    </button>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
