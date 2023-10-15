@extends('layouts.app')
@section('title','Registered Students')
@section('content')

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Registered Students</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Students</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Registered</h3>

                {{-- <div class="card-tools">
                      <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add new</a>
                </div> --}}
              </div>
              <div class="card-body">
                  <table class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>E-mail</th>
                              <th data-orderable="false">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $key=>$p )
                              <tr>
                                  <td>{{ $key+1}}</td>
                                  <td>{{ $p['name']}}</td>
                                  <td>{{ $p['email']}}</td>
                                  <td>
                                      {{-- <a href="{{ url('admin/delete_registered_students/'.$p['id'])}}" class="btn btn-danger btn-sm">Delete</a> --}}

                                      <a data-target="#stuModal" data-href="{{route('register.students.delete', $p['id'])}}" href="javascript:;" data-id="{{$p['id']}}" class="delete btn btn-danger btn-sm mb-1" data-toggle="modal" ><i class="far fa-trash-alt"></i></a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                          
                      </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

  <!-- /.content-header -->

<div class="modal fade" id="stuModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Student</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p class="my-0 font-weight-bold">Are you sure want to delete this record???</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a class="btn btn-danger btn-ok">Delete</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

  <!-- Modal -->
{{-- <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add new Portal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/add_new_portal')}}" class="database_operation">  
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter name</label>
                          {{ csrf_field()}}
                          <input type="text" required="required" name="name" placeholder="Enter name" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter E-mail</label>
                          <input type="text" required="required" name="email" placeholder="Enter email" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter mobile no.</label>
                          {{ csrf_field()}}
                          <input type="text" required="required" name="mobile_no" placeholder="Enter mobile number" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter Password</label>
                          {{ csrf_field()}}
                          <input type="password" required="required" name="password" placeholder="Enter password" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <button class="btn btn-primary">Add</button>
                      </div>
                  </div>
              </div>
          </form>
    </div>
    
  </div>
  </div>	 --}}
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
