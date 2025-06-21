@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="text-danger">403 - Unauthorized</h1>
    <p>You do not have permission to access this page.</p>
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3">Go Back</a>
</div>
@endsection
