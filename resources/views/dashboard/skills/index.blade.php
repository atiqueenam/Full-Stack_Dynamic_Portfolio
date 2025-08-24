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

.skills-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.skills-table th,
.skills-table td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #e9ecef;
}

.skills-table th {
  background: #f8f9fa;
  font-weight: 600;
}

.skills-table tr:hover {
  background: #f8f9fa;
}

.skill-actions {
  display: flex;
  gap: 8px;
}

.badge {
  padding: 4px 8px;
  border-radius: 4px;
  font-size: 0.8rem;
  font-weight: 600;
}

.badge-technical {
  background: #d1ecf1;
  color: #0c5460;
}

.badge-soft {
  background: #d4edda;
  color: #155724;
}

.badge-beginner {
  background: #f8d7da;
  color: #721c24;
}

.badge-intermediate {
  background: #fff3cd;
  color: #856404;
}

.badge-expert {
  background: #d4edda;
  color: #155724;
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
    <h1>Manage Skills</h1>
    <a href="{{ route('dashboard.skills.create') }}" class="btn btn-success">
      <i class="fas fa-plus"></i> Add New Skill
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if($skills->count() > 0)
    <table class="skills-table">
      <thead>
        <tr>
          <th>Skill Name</th>
          <th>Category</th>
          <th>Type</th>
          <th>Level</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($skills as $skill)
          <tr>
            <td>
              <strong>{{ $skill->name }}</strong>
            </td>
            <td>{{ $skill->category }}</td>
            <td>
              <span class="badge badge-{{ $skill->type }}">
                {{ ucfirst($skill->type) }}
              </span>
            </td>
            <td>
              <span class="badge badge-{{ $skill->level }}">
                {{ ucfirst($skill->level) }}
              </span>
            </td>
            <td class="skill-actions">
              <a href="{{ route('dashboard.skills.edit', $skill) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
              </a>
              <form method="POST" action="{{ route('dashboard.skills.destroy', $skill) }}" 
                    style="display: inline;" 
                    onsubmit="return confirm('Are you sure you want to delete this skill?')">
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
      <i class="fas fa-cogs" style="font-size: 3rem; margin-bottom: 20px; color: #ddd;"></i>
      <h3>No Skills Yet</h3>
      <p>Start by adding your technical and soft skills.</p>
      <a href="{{ route('dashboard.skills.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Your First Skill
      </a>
    </div>
  @endif
</div>
@endsection
