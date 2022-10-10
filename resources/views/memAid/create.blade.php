@extends('layouts.app')
@section('title', 'Memory Aid Test Page')
@section('content')
    <div class="container">
        <x-app-page-header>Create a Memory Aid for {{ $phrase->phrase_name }}</x-app-page-header>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('memaid.store',$phrase->id) }}" method="POST">
                    @csrf
               <div class="mb-3">
                 <label for="memory_aid_content" class="form-label">Enter Your Memory Aid Content</label>
                 <textarea class="form-control" name="memory_aid_content" id="memory_aid_content" rows="3"></textarea>
                 <button type="submit" class="btn btn-secondary">Save</button>
                </div>
            </form>
            </div>

        </div>


    </div>

@endsection

