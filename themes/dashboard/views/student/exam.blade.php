@extends('layouts.student')
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
          <h1 class="m-0">Exams</h1>
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
              
              <div class="card-body">
                  <table class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Exam title</th>
                              <th>Exam date</th>
                              <th>Status</th>
                              <th>Result</th>
                              <th data-orderable="false">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($student_info as $key => $std_info)
                          <tr>
                            <td>{{ $key+1}}</td>
                            <td>{{ $std_info['title']}}</td>
                            <td>{{ $std_info['exam_date']}}</td>
                              <td> 
                                @if(strtotime($std_info['exam_date']) < strtotime(date('Y-m-d')))
                                  <span class="badge badge-danger">Date Expired</span>
                                @elseif (strtotime($std_info['exam_date']) == strtotime(date('Y-m-d')))
                                  @if($std_info['exam_joined']==1)
                                    <span class="badge badge-success">Finished</span>
                                  @else
                                    <span class="badge badge-info">Running</span>
                                  @endif
                                @else
                                  <span class="badge badge-warning">Pending</span>
                                @endif
                              </td>
                              <td>
                              @if($std_info['exam_joined']==1)      
                                <a href="{{ url('student/view_result/'.$std_info['exam_id'])}}" class="btn btn-info btn-sm">View Result</a>
                              @endif
                            </td>
                            <td>
                                @if(strtotime($std_info['exam_date']) == strtotime(date('Y-m-d')))
                                  @if($std_info['exam_joined']==0)
                                    <a href="{{ url('student/join_exam/'.$std_info['exam_id'])}}" class="btn btn-primary btn-sm">Join Exam</a>
                                  @else 
                                    <a href="{{ url('student/view_answer/'.$std_info['exam_id'])}}" class="btn btn-primary btn-sm">View Answers</a>
                                  @endif
                                @endif
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
 
@endsection
