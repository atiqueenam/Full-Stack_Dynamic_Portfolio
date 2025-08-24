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
  margin-bottom: 30px;
  padding-bottom: 20px;
  border-bottom: 2px solid #f0f0f0;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: 600;
  color: #333;
}

.form-control {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 6px;
  font-size: 14px;
}

.form-control:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
}

textarea.form-control {
  resize: vertical;
  min-height: 100px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.btn-success {
  background: #28a745;
  color: white;
}

.btn-success:hover {
  background: #218838;
}

.btn-secondary {
  background: #6c757d;
  color: white;
}

.btn-secondary:hover {
  background: #545b62;
}

.form-actions {
  display: flex;
  gap: 10px;
  margin-top: 30px;
}

.back-link {
  margin-bottom: 20px;
}

.back-link a {
  color: #007bff;
  text-decoration: none;
}

.back-link a:hover {
  text-decoration: underline;
}

.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}

.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}

.error-list {
  margin: 0;
  padding-left: 20px;
}
</style>

<div class="simple-dashboard">
  <div class="back-link">
    <a href="{{ route('dashboard.projects') }}">← Back to Projects</a>
  </div>

  <div class="dashboard-header">
    <h1>Edit Project</h1>
    <p>Update your project information</p>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Please fix the following errors:</strong>
      <ul class="error-list">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('dashboard.projects.update', $project) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="name">Project Name *</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
    </div>

    <div class="form-group">
      <label for="description">Description *</label>
      <textarea id="description" name="description" class="form-control" required>{{ old('description', $project->description) }}</textarea>
    </div>

    <div class="form-group">
      <label for="type">Project Type *</label>
      <select id="type" name="type" class="form-control" required>
        <option value="">Select Type</option>
        <option value="personal" {{ old('type', $project->type) == 'personal' ? 'selected' : '' }}>Personal</option>
        <option value="client" {{ old('type', $project->type) == 'client' ? 'selected' : '' }}>Client</option>
        <option value="academic" {{ old('type', $project->type) == 'academic' ? 'selected' : '' }}>Academic</option>
      </select>
    </div>

    <div class="form-group">
      <label for="status">Project Status *</label>
      <select id="status" name="status" class="form-control" required>
        <option value="">Select Status</option>
        <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $project->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        <option value="in-progress" {{ old('status', $project->status) == 'in-progress' ? 'selected' : '' }}>In Progress</option>
      </select>
    </div>

    <div class="form-group">
      <label for="tools">Tools/Technologies Used *</label>
      <input type="text" id="tools" name="tools" class="form-control" value="{{ old('tools', is_array($project->tools) ? implode(', ', $project->tools) : $project->tools) }}" required placeholder="e.g., Laravel, Vue.js, Python (comma separated)">
    </div>

    <div class="form-group">
      <label for="github_url">GitHub URL</label>
      <input type="url" id="github_url" name="github_url" class="form-control" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/username/project">
    </div>

    <div class="form-group">
      <label for="demo_url">Live Demo URL</label>
      <input type="url" id="demo_url" name="demo_url" class="form-control" value="{{ old('demo_url', $project->demo_url) }}" placeholder="https://yourproject.com">
    </div>

    <div class="form-group">
      <label for="reference">Reference/Client</label>
      <input type="text" id="reference" name="reference" class="form-control" value="{{ old('reference', $project->reference) }}" placeholder="Client name or reference">
    </div>

    <div class="form-group">
      <label for="keywords">Keywords</label>
      <input type="text" id="keywords" name="keywords" class="form-control" value="{{ old('keywords', is_array($project->keywords) ? implode(', ', $project->keywords) : $project->keywords) }}" placeholder="e.g., responsive, api, database (comma separated)">
    </div>

    <div class="form-group">
      <label for="images">Image URLs</label>
      <input type="text" id="images" name="images" class="form-control" value="{{ old('images', is_array($project->images) ? implode(', ', $project->images) : $project->images) }}" placeholder="Image URLs (comma separated)">
    </div>

    <div class="form-group">
      <label>
        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
        Feature this project on homepage
      </label>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Update Project
      </button>
      <a href="{{ route('dashboard.projects') }}" class="btn btn-secondary">
        <i class="fas fa-times"></i> Cancel
      </a>
    </div>
  </form>
</div>
@endsection
