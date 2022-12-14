@extends('layouts.app')
@section('title', 'Memory Aid Test Page')
@section('content')
    <div class="container">
        <x-app-page-header>Create a Memory Aid for {{ $phrase->phrase_name }}</x-app-page-header>
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <ul>
                  <li>{{ $error }}</li>
                </ul>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="col-md-12">
                <form action="{{ route('memaid.store',$phrase->id) }}" method="POST">
                    @csrf
               <div class="mb-3">
                 <label for="memory_aid_content" class="form-label">Enter Your Memory Aid Content</label>
                 <textarea class="memory_aid_content form-control" name="memory_aid_content" id="memory_aid_content" rows="3"></textarea>
                 <div class="my-3">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save
                    </button>
                    <a href="{{ route('phrases.show',['phraseCateogryId'=>$phrase->phrase_category_id,'phraseId'=>$phrase->id]) }}" class="btn btn-danger">
                        <i class="fa-solid fa-xmark"></i>
                        Cancel
                    </a>
                 </div>

                </div>
            </form>
            </div>

        </div>
    </div>
@push('scripts')
<script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('memory_aid_content',{
            filebrowserUploadUrl : "{{ route('memaidPic.upload',['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endpush
@endsection

