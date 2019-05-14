@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post page
      </h1>
    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <a href="{{ route('post.create') }}" class="col-lg-offset-0 btn btn-success">Add New</a>
            </div>

            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Post Table</h3>
                    </div>    
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Created_at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach ($posts as $post)
                            <tr>
                              <td>{{ $loop->index + 1 }}</td>
                              <td>{{ $post-> title }} </td>
                              <td>{{ $post-> subtitle }}</td>
                              <td>{{ $post-> slug }}</td>
                              <td>{{ $post-> created_at }}</td>
                              <td><a href="{{ route('post.edit',$post->id)}} " class="fa fa-fw fa-edit"></a></td>
                              <td>
                                <form action=" {{ route('post.destroy',$post->id)}} " id="delete-form-{{$post->id}}" method="POST" style="display: none">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE')}}
                                </form>

                                <a href="" onclick="
                                  if(confirm('Are you sure , You want delete this?'))
                                    {
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $post->id }}').submit();
                                    }
                                  else{
                                    event.preventDefault();

                                  }" class="fa fa-fw fa-trash"></a>
                              </td>
                            </tr> 
                          @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Slug</th>
                                <th>Created_at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection