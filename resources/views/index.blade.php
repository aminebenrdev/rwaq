@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Post
                    <div class="text-right" style="float: right;">
                        <a href="{{ route('post.create')}}" class="btn btn-primary">add post</a>
                    </div>
                </div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                   <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Title</th>
                          <th scope="col">Content</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($posts as $post)
                        <tr>
                          <th scope="row">{{ $post->id }}</th>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->body }}</td>
                          <td>
                            <ul>
                              <li> 
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                              </li>

                              <li>
                                <a href="{{ route('post.edit', $post->id) }}"  class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                              </li>

                              <li>
                                <form id="delete" action="{{ route('post.destroy', $post->id) }}" method="post">
                                    <input type="hidden" name="_method" value="delete" />
                                    {!! csrf_field() !!}

                                    <a href="#" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i></a>
                                </form>
                              </li>
                            </ul>
                          </td>
                        </tr>
                        @endforeach


                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>You are about to delete one post, this procedure is irreversible.</p>
            <p>Do you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger btn-ok">Delete</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function(){

            $('.btn-ok').click(function(){
                $('#delete').submit();
            });

        });
        
    </script>
@endsection
