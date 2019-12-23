@extends('common.navbar')

@push('css')
{{-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
 <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<style> 
    .page-heading {
    margin: 20px 0;
    color: #666;
    -webkit-font-smoothing: antialiased;
    font-family: "Segoe UI Light", "Arial", serif;
    font-weight: 600;
    letter-spacing: 0.05em;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/photho">Add</a></li>
              <li class="breadcrumb-item active">Sub Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sub Category</h3><br>
              <button class="btn btn-primary "  data-toggle="modal" data-target="#addModal">Add Category</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sub-category" class="display table table-bordered table-hover" style="width:100%">
        <thead>
            <tr class="text-center">
                
                <th>Sub-category</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                
                <th>Sub-category</th>
                <th>Delete</th>   
            </tr>
        </tfoot>
    </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
     <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Do yo Really Want To Delete Sub_Category?</p>
            </div>
            <form action="" id="delete_sub_category" method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="sumbit" class="btn btn-danger">Delete</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="addModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Sub Category Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Please add Category.</p>
            </div>
            <form action="/sub-category" id="" method="POST">
                @csrf
                @method('POST')
<div class="form-group p-2">
                    <input type="name" class="form-control" id="sub_category" placeholder="Enter Sub Category" name='sub_category' required>
                  </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="sumbit" class="btn btn-danger">Add</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


@endsection

@push('js')
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>

    $('#sub-category').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/sub-category-table',
        columns: [
            { data: 'sub_category', name: 'sub_category' },
            { data: 'delete', name: 'delete' },
        ],
        language: {paginate: {previous: "<i class='fa fa-angle-left'>", next: "<i class='fa fa-angle-right'>"}}
    });

    $('#sub-category').on('click', '.delete', function() {
            $id = $(this).attr('id');
            $('#delete_sub_category').attr('action', '/sub-category/' + $id);
        });
    
</script>
@endpush