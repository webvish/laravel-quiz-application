@extends('layouts.app')
@section('title','Categories')
@section('content')

  <!-- /.content-header -->
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">Category</h3>

                <div class="card-tools">
                      <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add New</a>
                </div>
              </div>
              <div class="card-body">
                  <table class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <th>#</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th data-orderable="false">Actions</th>
                      </thead>
                      <tbody>
                          @foreach ($category as $key => $cat)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $cat['name'] ?? '-' }}</td>
                                <td><input class="category_status" data-id="{{$cat['id']}}>" 
                                @if($cat['status'] == 1) @php echo "checked"; @endphp  @endif type="checkbox" name="status"></td>
                                <th>
                                    <a href="{{ url('admin/edit_category/'.$cat['id'])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    {{-- <a href="{{ url('admin/delete_category/'.$cat['id'])}}" class="btn btn-danger">Delete</a> --}}
                                    <a data-target="#catModal" data-href="{{route('category.delete', $cat['id'])}}" href="javascript:;" data-id="{{ $cat['id'] }}" class="delete btn btn-danger btn-sm mb-1" data-toggle="modal" ><i class="fas fa-trash-alt"></i></a>
                                </th>
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
          <h4 class="modal-title">Add New Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/admin/add_new_category')}}" class="database_operation" method="POST">  
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            {{ csrf_field()}}
                            <input type="text" required="required" name="name" placeholder="Enter category name" class="form-control">
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

<div class="modal fade" id="catModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Category</h4>
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