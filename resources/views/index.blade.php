<!-- importing common layout PHP page -->
@extends('layout.app')
<!-- which place this contents should be place --> 
@section('contents')
<!-- if session has have message it will display success message -->
@if(session() -> has('success'))
  <div class="alert alert-success">
    {{session()->get('success')}} <!-- getting session message for access session message  -->
  </div>
@endif

<div class="index-table-container">
  <div class="index-table-head-card">
    <h1 class="index-table-head">Employee List</h1>
    <a
      href="{{route('employee.create')}}"
      class="index-create-btn"
    >
      Create Employee
    </a>
  </div>
  <table class="index-emp-table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Joining Date</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
    <!-- display all employee lists -->
    @foreach($employees as $employee)
      <tr>
        <td>{{ $employee -> id }}</td>
        <td>{{ $employee -> name }}</td>
        <td>{{ $employee -> email }}</td>
        <td>{{ $employee -> joining_date }}</td>
        <td>
          <span class="{{ $employee -> is_active == '1' ? 'index-table-active' : 'index-table-unactive' }}">
            {{ $employee -> is_active == '1' ? 'Active' : 'Inactive' }}
          </span>
        </td>
        <td>
          <div class="index-table-action-but-card">
            <a
              href="{{route('employee.show', $employee->id)}}"
              class="index-action-but index-show-but"
            >
              Show
            </a>
            <a
              href="{{route('employee.edit', $employee->id)}}"
              class="index-action-but index-edit-but"
            >
              Edit
            </a>
            <form action="{{ route('employee.destroy', $employee -> id) }}" method="POST">
              <!-- form method delete -->
              @method('DELETE')
              @csrf
              <button type="submit" class="index-action-but index-delete-but">Delete</button>
            </form>
          </div>
        </td>
      </tr>
    <!-- end of the foreach loop -->
    @endforeach
  </table>
  <!-- pagenation links -->
  {{ $employees -> links() }}
</div>

<!-- end the section-->
@endsection