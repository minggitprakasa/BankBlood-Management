@extends('admin.layouts.app')

@section('headSection')

<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Tag</li>
      </ol>
    </section>

    <section class="content">

        <div class="box">
            @include('sweetalert::alert')
            <div class="box-body">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">User Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>S.No</th>
                      <th>User Name</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user-> name }} </td>
                        <td>
                            @if ($user->status)
                            <span class="label label-warning"> Pending</span>
                            @else
                            <span class="label label-success"> Active</span>
                            @endif
                        </td>
                        <td><a href="{{ route('pendonor.edit',$user->id)}} " class="fa fa-fw fa-edit"></a></td>
                        <td>
                          <form action=" {{ route('user.destroy',$user->id)}} " id="delete-form-{{$user->id}}" method="POST" style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                          </form>

                          <a href="" onclick="
                            if(confirm('Are you sure , You want delete this?'))
                              {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $user->id }}').submit();
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
                        <th>User Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
@endsection
