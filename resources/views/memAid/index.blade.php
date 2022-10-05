@extends('layouts.app')
@section('title', 'Memory Aid')
@section('content')
<div class="container">
  {{ $memAid->memory_aid_content }}
</div>
@endsection
