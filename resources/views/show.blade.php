<!-- importing common layout PHP page -->
@extends('layout.app')
<!-- which place this contents should be place --> 
@section('contents')

<div class="form-container">
  <h1 class="form-head">Employee Details</h1>
  <div class="inputbox">
    <label for="name">Name</label>
    <input
      type="text"
      class="form-control form-input-field "
      value="{{ $employee -> name }}"
      readonly
    />
  </div>
  <div class="inputbox">
    <label for="email">Email</label>
    <input
      type="email"
      class="form-control form-input-field "
      value="{{ $employee -> email }}"
      readonly
    />
  </div>
  <div class="inputbox">
    <label for="phone">Phone</label>
    <input
      type="text"
      class="form-control form-input-field "
      value="{{ $employee -> phone }}"
      readonly
    />
  </div>
  <div class="inputbox">
    <label for="joining_date">Joining date</label>
    <input
      type="date"
      class="form-control form-input-field " 
      value="{{ $employee -> joining_date }}" 
      readonly
    />
  </div>
  <div class="inputbox">
    <label for="joining_salary">Salary</label>
    <input
      type="number"
      class="form-control form-input-field "
      value="{{ $employee -> salary }}"
      readonly
    />
  </div>
  <div class="isactive-card">
    <input
      type="checkbox"
      class="{{ $errors -> has('is_active') ? 'is-invalid' : '' }}"
      {{$employee -> is_active =='1' ? 'checked' : ''}}
      readonly
    />
    <label for="is_active ml-3" >Active</label><br>
  </div>
  <a href="{{ route('employee.index') }}" class="create-form-go-back-btn show-btn">Back to List</a>
</div>

<!-- end the section-->
@endsection
