<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project - Portfolio Dashboard</title>
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
            max-width: 800px;
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

        .form-required {
            color: var(--danger-color);
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
            font-family: inherit;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-hint {
            font-size: 0.85rem;
            color: var(--secondary-text);
            margin-top: 0.5rem;
        }

        .tech-input-container {
            position: relative;
        }

        .tech-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
            border-top: none;
            border-radius: 0 0 10px 10px;
            max-height: 200px;
            overflow-y: auto;
            z-index: 10;
            display: none;
        }

        .tech-suggestion {
            padding: 0.75rem 1rem;
            cursor: pointer;
            transition: background 0.2s ease;
            font-size: 0.9rem;
        }

        .tech-suggestion:hover {
            background: var(--glass-bg);
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

        .alert-error {
            background: rgba(255, 71, 87, 0.1);
            border-color: var(--danger-color);
            color: var(--danger-color);
        }

        .preview-card {
            background: var(--accent-bg);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 1rem;
        }

        .preview-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        .preview-text {
            color: var(--secondary-text);
            font-size: 0.9rem;
            line-height: 1.5;
        }

        @media (max-width: 768px) {
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
            <a href="{{ route('dashboard.projects.index') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to Projects
            </a>
            <div class="header-content">
                <h1>Add New Project</h1>
                <p>Showcase your latest work and achievements</p>
            </div>
        </div>

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

        <div class="form-container">
            <form method="POST" action="{{ route('dashboard.projects.store') }}">
                @csrf
                
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-info-circle"></i>
                        Project Information
                    </div>
                    
                    <div class="form-group">
                        <label for="title" class="form-label">
                            Project Title <span class="form-required">*</span>
                        </label>
                        <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
                        <div class="form-hint">Choose a clear, descriptive name for your project</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="form-label">
                            Description <span class="form-required">*</span>
                        </label>
                        <textarea id="description" name="description" class="form-input form-textarea" required>{{ old('description') }}</textarea>
                        <div class="form-hint">Describe what your project does, the problem it solves, and key features</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="technologies" class="form-label">
                            Technologies Used <span class="form-required">*</span>
                        </label>
                        <div class="tech-input-container">
                            <input type="text" id="technologies" name="technologies" class="form-input" value="{{ old('technologies') }}" placeholder="e.g., Laravel, Vue.js, MySQL, Docker" required>
                            <div class="tech-suggestions" id="techSuggestions"></div>
                        </div>
                        <div class="form-hint">Separate technologies with commas (e.g., Laravel, Vue.js, MySQL)</div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-link"></i>
                        Project Links
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="github_url" class="form-label">GitHub Repository</label>
                            <input type="url" id="github_url" name="github_url" class="form-input" value="{{ old('github_url') }}" placeholder="https://github.com/username/project">
                            <div class="form-hint">Link to your source code repository</div>
                        </div>
                        <div class="form-group">
                            <label for="live_url" class="form-label">Live Demo</label>
                            <input type="url" id="live_url" name="live_url" class="form-input" value="{{ old('live_url') }}" placeholder="https://your-project.com">
                            <div class="form-hint">Link to the live version of your project</div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="image_url" class="form-label">Project Image</label>
                        <input type="url" id="image_url" name="image_url" class="form-input" value="{{ old('image_url') }}" placeholder="https://example.com/project-screenshot.jpg">
                        <div class="form-hint">URL to a screenshot or logo of your project</div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('dashboard.projects.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Technology suggestions
        const commonTechs = [
            'JavaScript', 'TypeScript', 'Python', 'PHP', 'Java', 'C#', 'C++', 'Go', 'Rust', 'Swift',
            'React', 'Vue.js', 'Angular', 'Svelte', 'Next.js', 'Nuxt.js',
            'Node.js', 'Express.js', 'Laravel', 'Django', 'Flask', 'Spring Boot', 'ASP.NET',
            'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite',
            'Docker', 'Kubernetes', 'AWS', 'Azure', 'GCP', 'Heroku',
            'Git', 'GitHub', 'GitLab', 'Bitbucket',
            'HTML', 'CSS', 'SASS', 'SCSS', 'Tailwind CSS', 'Bootstrap',
            'Webpack', 'Vite', 'Parcel', 'Rollup',
            'Jest', 'Cypress', 'Selenium', 'PHPUnit'
        ];

        const techInput = document.getElementById('technologies');
        const techSuggestions = document.getElementById('techSuggestions');

        techInput.addEventListener('input', function() {
            const value = this.value.toLowerCase();
            const lastTech = value.split(',').pop().trim();
            
            if (lastTech.length < 2) {
                techSuggestions.style.display = 'none';
                return;
            }

            const matches = commonTechs.filter(tech => 
                tech.toLowerCase().includes(lastTech) && 
                !value.includes(tech.toLowerCase())
            );

            if (matches.length > 0) {
                techSuggestions.innerHTML = matches.slice(0, 8).map(tech => 
                    `<div class="tech-suggestion" onclick="addTech('${tech}')">${tech}</div>`
                ).join('');
                techSuggestions.style.display = 'block';
            } else {
                techSuggestions.style.display = 'none';
            }
        });

        function addTech(tech) {
            const currentValue = techInput.value;
            const techs = currentValue.split(',').map(t => t.trim());
            techs[techs.length - 1] = tech;
            techInput.value = techs.join(', ') + ', ';
            techSuggestions.style.display = 'none';
            techInput.focus();
        }

        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!techInput.contains(e.target) && !techSuggestions.contains(e.target)) {
                techSuggestions.style.display = 'none';
            }
        });

        // Form validation and preview
        const form = document.querySelector('form');
        const titleInput = document.getElementById('title');
        const descInput = document.getElementById('description');

        function updatePreview() {
            // You could add a live preview here if needed
        }

        titleInput.addEventListener('input', updatePreview);
        descInput.addEventListener('input', updatePreview);
    </script>
</body>
</html>
