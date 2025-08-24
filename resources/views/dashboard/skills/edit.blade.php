@extends('index')
@section('main-content')
<style>
.simple-dashboard {
  max-width: 600px;
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
    <a href="{{ route('dashboard.skills') }}">← Back to Skills</a>
  </div>

  <div class="dashboard-header">
    <h1>Edit Skill</h1>
    <p>Update your skill information</p>
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

  <form method="POST" action="{{ route('dashboard.skills.update', $skill) }}">
    @csrf
    @method('PUT')
    
    <div class="form-group">
      <label for="name">Skill Name *</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $skill->name) }}" required placeholder="e.g., Laravel, Python, Communication">
    </div>

    <div class="form-group">
      <label for="category">Category *</label>
      <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $skill->category) }}" required placeholder="e.g., Web Development, AI & Machine Learning, Professional Skills">
    </div>

    <div class="form-group">
      <label for="type">Skill Type *</label>
      <select id="type" name="type" class="form-control" required>
        <option value="">Select Type</option>
        <option value="technical" {{ old('type', $skill->type) == 'technical' ? 'selected' : '' }}>Technical</option>
        <option value="soft" {{ old('type', $skill->type) == 'soft' ? 'selected' : '' }}>Soft Skill</option>
      </select>
    </div>

    <div class="form-group">
      <label for="level">Skill Level *</label>
      <select id="level" name="level" class="form-control" required>
        <option value="">Select Level</option>
        <option value="beginner" {{ old('level', $skill->level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
        <option value="intermediate" {{ old('level', $skill->level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
        <option value="expert" {{ old('level', $skill->level) == 'expert' ? 'selected' : '' }}>Expert</option>
      </select>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Update Skill
      </button>
      <a href="{{ route('dashboard.skills') }}" class="btn btn-secondary">
        <i class="fas fa-times"></i> Cancel
      </a>
    </div>
  </form>
</div>
@endsection
