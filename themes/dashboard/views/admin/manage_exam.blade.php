@extends('layouts.app')
@section('title','Exams')
@section('content')

  <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Exam</h1>
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
                <h3 class="card-title">Exam</h3>

                <div class="card-tools">
                      <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add new</a>
                </div>
              </div>
              <div class="card-body">
                  <table class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Exam Date</th>
                              <th>Status</th>
                              <th data-orderable="false">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($exams as $key=>$exam)
                              <tr>
                                  <td>{{ $key+1}}</td>
                                  <td>{{ $exam['title']}}</td>
                                  <td>{{ $exam['cat_name']}}</td>
                                  <td>{{ $exam['exam_date']}}</td>
                                  <td><input type="checkbox" class="exam_status" data-id="{{ $exam['id']}}" @if($exam['status']==1) @endif @php echo "checked"; @endphp name="status"></td>
                                  <td>
                                      <a href="{{ url('admin/edit_exam/'.$exam['id'])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                      
                                      {{-- <a href="{{ url('admin/delete_exam/'.$exam['id'])}}" class="btn btn-danger">Delete</a> --}}
                                      
                                      <a data-target="#examModal" data-href="{{route('exam.delete', $exam['id'])}}" href="javascript:;" data-id="{{$exam['id']}}" class="delete btn btn-danger btn-sm mb-1" data-toggle="modal" ><i class="fas fa-trash-alt"></i></a>
                                      
                                      <a href="{{ url('admin/add_questions/'.$exam['id'])}}" class="btn btn-sm btn-primary"><i class='fas fa-question-circle'></i> Add Question</a>
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

    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Exam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/add_new_exam')}}" class="database_operation">  
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter title</label>
                          {{ csrf_field()}}
                          <input type="text" required="required" name="title" placeholder="Enter title" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter Date</label>
                          <input type="date" id="inputdate" required="required" name="exam_date"  class="form-control date">
                      </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Enter Duration (in minutes)</label>
                        <input type="text" required="required" name="exam_duration"  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3">
                    </div>
                </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Select Category</label>
                          <select class="form-control" required="required" name="exam_category">
                              <option value="">Select</option>
                              @foreach ($category as $cat)
                              <option value="{{ $cat['id']}}">{{ $cat['name']}}</option>
                              @endforeach
                          </select>
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

<div class="modal fade" id="examModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Exam</h4>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(function(){
  var today = new Date().toISOString().split('T')[0];
  document.getElementsByName("exam_date")[0].setAttribute('min', today);
});
</script>
