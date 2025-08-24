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

.dashboard-header h1 {
  color: #333;
  margin-bottom: 10px;
}

.form-group {
  margin-bottom: 25px;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
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
  margin-right: 10px;
}

.btn-success {
  background: #28a745;
  color: white;
}

.btn-success:hover {
  background: #218838;
  color: white;
}

.btn-secondary {
  background: #6c757d;
  color: white;
}

.btn-secondary:hover {
  background: #545b62;
  color: white;
}

.form-actions {
  margin-top: 30px;
  padding-top: 20px;
  border-top: 1px solid #eee;
  text-align: right;
}

.alert {
  padding: 12px;
  border-radius: 6px;
  margin-bottom: 20px;
}

.alert-danger {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
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
</style>

<div class="simple-dashboard">
  <a href="{{ route('dashboard.experiences') }}" class="back-btn">← Back to Experiences</a>
  
  <div class="dashboard-header">
    <h1>Add New Experience</h1>
    <p>Add your work experience and professional background</p>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Please fix the following errors:</strong>
      <ul style="margin: 10px 0 0 0;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('dashboard.experiences.store') }}">
    @csrf
    
    <div class="form-group">
      <label for="type">Experience Type *</label>
      <select id="type" name="type" class="form-control" required>
        <option value="">Select Type</option>
        <option value="job" {{ old('type') == 'job' ? 'selected' : '' }}>Full-time Job</option>
        <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
        <option value="freelance" {{ old('type') == 'freelance' ? 'selected' : '' }}>Freelance</option>
        <option value="volunteer" {{ old('type') == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
      </select>
    </div>

    <div class="form-group">
      <label for="designation">Job Title/Designation *</label>
      <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation') }}" required placeholder="e.g., Software Developer, Marketing Manager">
    </div>

    <div class="form-group">
      <label for="organization">Company/Organization *</label>
      <input type="text" id="organization" name="organization" class="form-control" value="{{ old('organization') }}" required placeholder="e.g., ABC Company, XYZ Organization">
    </div>

    <div class="form-group">
      <label for="from_date">Start Date *</label>
      <input type="date" id="from_date" name="from_date" class="form-control" value="{{ old('from_date') }}" required>
    </div>

    <div class="form-group">
      <label for="to_date">End Date</label>
      <input type="date" id="to_date" name="to_date" class="form-control" value="{{ old('to_date') }}" placeholder="Leave blank if currently working">
      <small style="color: #666; font-size: 12px;">Leave blank if you're currently working here</small>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Add Experience
      </button>
      <a href="{{ route('dashboard.experiences') }}" class="btn btn-secondary">
        <i class="fas fa-times"></i> Cancel
      </a>
    </div>
  </form>
</div>
@endsection
