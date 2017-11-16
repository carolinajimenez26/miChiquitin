@extends('layouts.app')

@section('titulo')
<div class="container-fluid">
	Error
</div>
@endsection

@section('content')
  <div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>
@endsection
