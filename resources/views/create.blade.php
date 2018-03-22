@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add new post</div>

                <div class="card-body">
                  @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}.
                            <a href="{{ route('post.index') }}">Return to list the all post</a>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                          @endforeach
                        </ul>
                      </div>
                    @endif

                  <form action="{{ route('post.store') }}" method="post">

                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Post title">
                    </div>

                    <div class="form-group">
                      <label for="body">Content</label>
                       <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
