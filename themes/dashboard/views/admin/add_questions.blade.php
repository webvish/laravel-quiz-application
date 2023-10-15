@extends('layouts.app')
@section('title','Add Questions')
@section('content')

    <!-- /.content-header -->
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Questions</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Questions</li>
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
                <h3 class="card-title">Questions</h3>

                <div class="card-tools">
                      <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                  <table class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Question</th>
                              <th>Answer</th>
                              <th>Status</th>
                              <th data-orderable="false">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($questions as $key=>$question)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $question['questions']}}</td>
                                <td>{{ $question['ans']}}</td>
                                <td><input class="question_status" data-id="{{ $question['id']}}" <?php if($question['status']==1){ echo "checked";} ?> type="checkbox" name="status"></td>
                                <td>
                                    <a href="{{ url('admin/update_question/'. $question['id'])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    
                                    {{-- <a href="{{ url('admin/delete_question/'. $question['id'])}}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    
                                    <a data-target="#questionModal" data-href="{{route('register.students.delete', $question['id'])}}" href="javascript:;" data-id="{{$question['id']}}" class="delete btn btn-danger btn-sm mb-1" data-toggle="modal" ><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
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
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Question</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/admin/add_new_question')}}" class="database_operation">  
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Question</label>
                            {{ csrf_field()}}
                            <input type="hidden" name="exam_id" value="{{ Request::segment(3)}}">
                            <input type="text" required="required" name="question" placeholder="Enter Question" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 1</label>
                            <input type="text" required="required" name="option_1" placeholder="Enter Question" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 2</label>
                            <input type="text" required="required" name="option_2" placeholder="Enter Option 2" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 3</label>
                            <input type="text" required="required" name="option_3" placeholder="Enter  Option 3" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 4</label>
                            <input type="text" required="required" name="option_4" placeholder="Enter  Option 4" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="">Select Correct Option</label>
                      <select class="form-control" required="required" name="ans">
                          <option value="">Select</option>
                        
                          <option value="option_1">option 1</option>
                          <option value="option_2">option 2</option>
                          <option value="option_3">option 3</option>
                          <option value="option_4">option 4</option>
          
                      </select>
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

<div class="modal fade" id="questionModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Question</h4>
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