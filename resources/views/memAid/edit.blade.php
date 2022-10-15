@extends('layouts.app')
@section('title', 'Memory Aid Test Page')
@section('content')
    <div class="container">
        @foreach ($memoryAids as $memoryAid)
        <x-app-page-header>Edit Memory Aid for {{ $memoryAid->phrase->phrase_name }}</x-app-page-header>
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('memaid.update',$memoryAid->id) }}" method="POST">
                    @csrf
                    @method('PUT')
               <div class="mb-3">
                 <label for="memory_aid_content" class="form-label">Modify Your Memory Aid Content</label>
                 <textarea class="form-control memory_aid_content" name="memory_aid_content" id="memory_aid_content" rows="3">{!! $memoryAid->memory_aid_content !!}</textarea>
                 @endforeach
                 <div class="my-3">
                    <button type="submit" class="btn btn-secondary">Save</button>
                 </div>
                </div>
            </form>
            </div>
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

