@extends('layouts.app')
@section('title','Dashboard')
@section('content')

  <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Exam</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
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
              
              <div class="card-body container">
                  <form action="{{ url('/admin/edit_exam_sub')}}" class="database_operation container">  
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="">Enter title</label>
                                  {{ csrf_field()}}
                                  <input type="hidden" name="id" value="{{ $exam->id }}">
                                  <input type="text" required="required" value="{{ $exam->title}}" name="title" placeholder="Enter title" class="form-control">
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="">Enter Date</label>
                                  <input type="date" required="required"  value="{{ $exam->exam_date}}" name="exam_date"  class="form-control">
                              </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Enter Time(in minutes)</label>
                                <input type="text" required="required"  value="{{ $exam->exam_duration}}" name="exam_duration"  class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3">
                            </div>
                        </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label for="">Select Category</label>
                                  <select class="form-control" required="required" name="exam_category">
                                      <option value="">Select</option>
                                      @foreach($category as $cat)
                                        <option value="{{$cat['id']}}" @if($exam->category == $cat['id'] ) selected @endif>{{$cat['name']}}
                                        </option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <button class="btn btn-primary">Update</button>
                              </div>
                          </div>
                      </div>
                  </form>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(function(){
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("exam_date")[0].setAttribute('min', today);
  });
</script>