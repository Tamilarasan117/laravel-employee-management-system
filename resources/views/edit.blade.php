<!-- importing common layout PHP page -->
@extends('layout.app')
<!-- which place this contents should be place --> 
@section('contents')

@if(session() -> has('success'))
  <div class="alert alert-success">
    {{session()->get('success')}} <!-- getting session message for access session message  -->
  </div>
@endif

<div class="form-container">
  <h1 class="form-head">Update Employee Details</h1>
  <form action="{{ route('employee.update', $employee -> id) }}" class="was-validated" method="POST">
    <!-- laravel form put method -->
    @method('PUT')
    @csrf
    <div class="has-validation inputbox">
      <label for="name">Name</label>
      <input
        type="text"
        name="name"
        id="name"
        class="form-control {{ $errors -> has('name') ? 'is-invalid' : '' }}"
        value="{{$employee -> name}}" 
        required
      > 
      @if($errors -> has('name'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('name') }}</strong>
        </span>
      @endif
    </div>
    <div class="has-validation inputbox">
      <label for="email">Email</label>
      <input
        type="email"
        name="email"
        id="email"
        class="form-control {{ $errors -> has('email') ? 'is-invalid' : '' }}"
        value="{{$employee -> email}}"
        required
      >
      @if($errors -> has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('email') }}</strong>
        </span>
      @endif
    </div>
    <div class="has-validation inputbox">
      <label for="phone">Phone</label>
      <input
        type="text"
        name="phone"
        id="phone"
        value="{{ $employee -> phone }}"
        class="form-control {{ $errors -> has('phone') ? 'is-invalid' : '' }}"
        placeholder="Enter phone number"
        required
      />
      @if($errors -> has('phone'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('phone') }}</strong>
        </span>
      @endif
    </div>
    <div class="has-validation inputbox">
      <label for="joining_date">Joining date</label>
      <input
        type="date"
        name="joining_date"
        id="joining_date"
        class="form-control {{ $errors -> has('joining_date') ? 'is-invalid' : '' }}"
        value="{{$employee -> joining_date}}"
        required
      >
      @if($errors -> has('joining_date'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('joining_date') }}</strong>
        </span>
      @endif
    </div>
    <div class="has-validation inputbox">
      <label for="joining_salary">Salary</label>
      <input
        type="number"
        name="salary"
        id="salary"
        class="form-control {{ $errors -> has('salary') ? 'is-invalid' : '' }}"
        value="{{$employee -> salary}}"
        required
      >
      @if($errors -> has('salary'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('salary') }}</strong>
        </span>
      @endif
    </div>
    <div class="has-validation isactive-card">
      <input
        type="checkbox"
        name="is_active"
        id="is_active"
        value="1"
        class="{{ $errors -> has('is_active') ? 'is-invalid' : '' }}"
        {{$employee -> is_active =='1' ? 'checked' : ''}}
      >
      <label for="is_active">Active</label><br>
      @if($errors -> has('is_active'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('is_active') }}</strong>
        </span>
      @endif
    </div>
    <div class="edit-but-card">
      <button type="submit" class="form-submit-btn">Update Employee</button>
      <a href="{{ route('employee.index') }}" class="create-form-go-back-btn">Back to List</a>
    </div>
  </form>
</div>

<!-- end the section-->
@endsection
