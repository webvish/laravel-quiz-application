@extends('layouts.student')
@section('title','Dashboard')
@section('content')

     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @foreach ($portal_exams as $key=>$exam)
            @php 
              if(strtotime(date('Y-m-d')) > strtotime($exam['exam_date'])){
                $cls="bg-danger";
              }
              else
              {
                $val=$key+1;
                if($val%2==0)
                  $cls="bg-info";
                else    
                  $cls="bg-success";
              }
            @endphp
          <div class="col-lg-3 col-3">
            <div class="small-box {{$cls}}">
              <div class="inner">
                <h3>{{ $exam['title'] ?? '-'}}</h3>
                <p>Category : {{ $exam['cat_name'] ?? '-'}}</p>
                <p>Exam date : {{$exam['exam_date'] ?? null }}</p>
              </div>
              <div class="icon"><i class="ion ion-bag"></i></div>
              @if (strtotime(date('Y-m-d')) <= strtotime($exam['exam_date']))
                <a data-id="{{ $exam['id']}}"  class="apply_exam small-box-footer" style="cursor:pointer;"><strong> Apply Now </strong><i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
</div>  
@endsection
