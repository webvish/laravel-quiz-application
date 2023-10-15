@extends('layouts.app')
@section('title','Students')
@section('content')

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam</li>
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
                  <h3 class="card-title">Students</h3>
  
                  <div class="card-tools">
                        <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Exam</th>
                                <th>Exam Date</th>
                                <th>Status</th>
                                <th>Result</th>
                                <th data-orderable="false">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($students as $key=>$std)
                              <tr>
                                  <td>{{ $key+1}}</td>
                                  <td>{{ $std['name']}}</td>
                                  <td>{{ $std['ex_name']}}</td>
                                  <td>{{ $std['exam_date']}}</td>
                                  <td>
                                    <input type="checkbox" class="student_status" data-id="{{ $std['id']}}" @if($std['std_status']==1) @endif @php echo "checked";@endphp name="status">
                                  </td>
                                  <td>
                                    @if($std['exam_joined'] == 1)
                                      <a href="{{url('admin/admin_view_result/'.$std['id'])}}" class="btn btn-info btn-sm">View result</a>
                                    @endif
                                  </td>
                                  <td>
                                      {{-- <a href="{{url('admin/edit_students/'.$std['id'])}}" class="btn btn-primary">Edit</a> --}}
                                      {{-- <a href="{{url('admin/delete_students/'.$std['id'])}}" class="btn btn-danger btn-sm">Delete</a> --}}

                                      <a data-target="#studentsModal" data-href="{{route('students.delete', $std['id'])}}" href="javascript:;" data-id="{{$std['id']}}" class="delete btn btn-danger btn-sm mb-1" data-toggle="modal" ><i class="far fa-trash-alt"></i></a>
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
    <!-- /.content-header -->

    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Student</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/add_new_students')}}" class="database_operation">  
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter Name</label>
                          {{ csrf_field()}}
                          <input type="text" required="required" name="name" placeholder="Enter name" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter E-mail</label>
                          {{ csrf_field()}}
                          <input type="email" required="required" name="email" placeholder="Enter name" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter Mobile-no</label>
                          {{ csrf_field()}}
                          <input type="text" required="required" name="mobile_no" placeholder="Enter mobile-no" class="form-control" value="{{ old('mobile_no') }}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Select Exam</label>
                          <select class="form-control" required="required" name="exam">
                              <option value="">Select</option>
                              @foreach ($exams as $exam)
                                  <option value="{{ $exam['id']}}">{{ $exam['title']}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">password</label>
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
</div>
</div>	

<div class="modal fade" id="studentsModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Student Exam</h4>
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>