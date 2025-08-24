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
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
  padding-bottom: 20px;
  border-bottom: 2px solid #f0f0f0;
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

.btn-warning {
  background: #ffc107;
  color: #212529;
}

.btn-warning:hover {
  background: #e0a800;
}

.btn-danger {
  background: #dc3545;
  color: white;
}

.btn-danger:hover {
  background: #c82333;
}

.btn-sm {
  padding: 5px 12px;
  font-size: 0.875rem;
}

.education-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.education-table th,
.education-table td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #e9ecef;
}

.education-table th {
  background: #f8f9fa;
  font-weight: 600;
}

.education-table tr:hover {
  background: #f8f9fa;
}

.education-actions {
  display: flex;
  gap: 8px;
}

.badge {
  padding: 4px 8px;
  border-radius: 4px;
  font-size: 0.8rem;
  font-weight: 600;
}

.badge-bsc {
  background: #d1ecf1;
  color: #0c5460;
}

.badge-hsc {
  background: #d4edda;
  color: #155724;
}

.badge-ssc {
  background: #fff3cd;
  color: #856404;
}

.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}

.alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
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
</style>

<div class="simple-dashboard">
  <div class="back-link">
    <a href="{{ route('dashboard.index') }}">← Back to Dashboard</a>
  </div>

  <div class="dashboard-header">
    <h1>Manage Education</h1>
    <a href="{{ route('dashboard.education.create') }}" class="btn btn-success">
      <i class="fas fa-plus"></i> Add Education
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if($education->count() > 0)
    <table class="education-table">
      <thead>
        <tr>
          <th>Degree/Type</th>
          <th>Field/Name</th>
          <th>Institution</th>
          <th>Period</th>
          <th>Grade</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($education as $edu)
          <tr>
            <td>
              <span class="badge badge-{{ strtolower($edu->type) }}">
                {{ $edu->type }}
              </span>
            </td>
            <td>
              <strong>{{ $edu->name }}</strong>
            </td>
            <td>{{ $edu->institute }}</td>
            <td>
              {{ $edu->enrolled_year }} - {{ $edu->passing_year }}
            </td>
            <td>{{ $edu->grade }}</td>
            <td class="education-actions">
              <a href="{{ route('dashboard.education.edit', $edu) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
              </a>
              <form method="POST" action="{{ route('dashboard.education.destroy', $edu) }}" 
                    style="display: inline;" 
                    onsubmit="return confirm('Are you sure you want to delete this education record?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div style="text-align: center; padding: 40px; color: #666;">
      <i class="fas fa-graduation-cap" style="font-size: 3rem; margin-bottom: 20px; color: #ddd;"></i>
      <h3>No Education Records Yet</h3>
      <p>Start by adding your educational background.</p>
      <a href="{{ route('dashboard.education.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Your First Education Record
      </a>
    </div>
  @endif
</div>
@endsection
