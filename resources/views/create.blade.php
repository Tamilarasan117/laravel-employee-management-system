<!-- when we open welcome page automatically laravel created one session -->
<!-- without @csrf token laravel will take it as our session in wrong -->
<!-- each and every form we need to add @csrf token -->

<!-- importing common layout PHP page -->
@extends('layout.app')
<!-- which place this contents should be place -->
@section('contents')

<div class="form-container">
  <h1 class="form-head">Create New Employee</h1>
  <form action="{{ route('employee.store') }}" class="was-validated" method="POST">
    <!-- adding @csrf token -->
    @csrf
    <div class="has-validation inputbox">
      <label for="name">Name</label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name') }}"
        class="form-control form-input-field {{ $errors -> has('name') ? 'is-invalid' : '' }}"
        placeholder="Enter username"
        required
      />
      <!-- name field error handling -->
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
        value="{{ old('email') }}"
        class="form-control form-input-field {{ $errors -> has('email') ? 'is-invalid' : '' }}"
        placeholder="Enter email address"
        required
      />
      <!-- email field error handling -->
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
        value="{{ old('phone') }}"
        class="form-control form-input-field {{ $errors -> has('phone') ? 'is-invalid' : '' }}"
        placeholder="Enter phone number"
        required
      />
      <!-- phone field error handling -->
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
        value="{{ old('joining_date') }}"
        class="form-control form-input-field {{ $errors -> has('joining_date') ? 'is-invalid' : '' }}"
        placeholder="dd/mm/yyyy"
        required
      />
      <!-- joining_date field error handling -->
      @if($errors -> has('joining_date'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('joining_date') }}</strong>
        </span>
      @endif
    </div>
    <div class="has-validation inputbox">
      <label for="salary">Salary</label>
      <input
        type="number"
        name="salary"
        id="salary"
        value="{{ old('salary') }}"
        class="form-control form-input-field {{ $errors -> has('salary') ? 'is-invalid' : '' }}"
        placeholder="00000"
        required
      />
      <!-- salary field error handling -->
      @if($errors -> has('salary'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('salary') }}</strong>
        </span>
      @endif
    </div>
    <div class="has-validation">
      <input
        type="checkbox"
        name="is_active"
        id="is_active"
        value="1"
        class="{{ $errors -> has('is_active') ? 'is-invalid' : '' }}"
        required
        {{old('is_active')=='1'?'checked':''}} 
      />
      <label for="is_active">Active</label>
      <!-- is_active field error handling -->
      @if($errors -> has('is_active'))
        <span class="invalid-feedback">
          <strong>{{ $errors -> first('is_active') }}</strong>
        </span>
      @endif
    </div>
    <div class="form-but-card">
      <button type="submit" class="form-submit-btn">Create Employee</button>
      <a
        href="{{ route('employee.index') }}"
        class="create-form-go-back-btn"
      >
        Back to List
      </a>
    </div>
  </form>
</div>

<!-- end the section-->
@endsection
