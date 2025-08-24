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
  <a href="{{ route('dashboard.education') }}" class="back-btn">← Back to Education</a>
  
  <div class="dashboard-header">
    <h1>Add New Education</h1>
    <p>Add your educational qualifications and achievements</p>
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

  <form method="POST" action="{{ route('dashboard.education.store') }}">
    @csrf
    
    <div class="form-group">
      <label for="type">Education Type *</label>
      <select id="type" name="type" class="form-control" required>
        <option value="">Select Type</option>
        <option value="SSC" {{ old('type') == 'SSC' ? 'selected' : '' }}>SSC</option>
        <option value="HSC" {{ old('type') == 'HSC' ? 'selected' : '' }}>HSC</option>
        <option value="Diploma" {{ old('type') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
        <option value="BSc" {{ old('type') == 'BSc' ? 'selected' : '' }}>BSc</option>
        <option value="BA" {{ old('type') == 'BA' ? 'selected' : '' }}>BA</option>
        <option value="MSc" {{ old('type') == 'MSc' ? 'selected' : '' }}>MSc</option>
        <option value="MA" {{ old('type') == 'MA' ? 'selected' : '' }}>MA</option>
        <option value="PhD" {{ old('type') == 'PhD' ? 'selected' : '' }}>PhD</option>
        <option value="Other" {{ old('type') == 'Other' ? 'selected' : '' }}>Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="name">Degree/Course Name *</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g., Computer Science, Business Administration">
    </div>

    <div class="form-group">
      <label for="institute">Institute/University *</label>
      <input type="text" id="institute" name="institute" class="form-control" value="{{ old('institute') }}" required placeholder="e.g., ABC University, XYZ College">
    </div>

    <div class="form-group">
      <label for="enrolled_year">Enrolled Year *</label>
      <input type="number" id="enrolled_year" name="enrolled_year" class="form-control" value="{{ old('enrolled_year') }}" required min="1900" max="2030" placeholder="e.g., 2020">
    </div>

    <div class="form-group">
      <label for="passing_year">Passing Year *</label>
      <input type="number" id="passing_year" name="passing_year" class="form-control" value="{{ old('passing_year') }}" required min="1900" max="2030" placeholder="e.g., 2024">
    </div>

    <div class="form-group">
      <label for="grade">Grade/Result *</label>
      <input type="text" id="grade" name="grade" class="form-control" value="{{ old('grade') }}" required placeholder="e.g., A+, 3.75/4.00, First Class">
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-success">
        <i class="fas fa-save"></i> Add Education
      </button>
      <a href="{{ route('dashboard.education') }}" class="btn btn-secondary">
        <i class="fas fa-times"></i> Cancel
      </a>
    </div>
  </form>
</div>
@endsection
