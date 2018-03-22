@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
               

                <div class="card-body">
                 
                 <h1>{{ $post->title }}</h1>

                 <p>

                    {{ $post->body }}

                 </p>

                 <hr>

                 <a href="{{ route('post.index') }}" class="btn btn-primary">Return to list the all post</a>
                 


                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
