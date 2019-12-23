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
            <h1 class="m-0 text-dark">Phothos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Phothos</li>
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
              <a href="/addphotho" class="btn-primary btn">Add Photho</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="photho" class="display table table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Path</th>
                <th>Created At</th>
                <th>View</th>
                <th>Delete</th>
                <th>Add</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Thumbnail</th>
                <th>Path</th>
                <th>Created At</th>
                <th>View</th>
                <th>Delete</th>
                <th>Add</th>
                
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
              <p>Do yo Really Want To Delete Image?</p>
            </div>
            <form action="" id="delete_photho" method="POST">
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

       <div class="modal fade" id="viewModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Image</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body justify-content-center">
            <img src="" alt="" id="photho-zoom" width="75%" height="75%">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="addModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Product Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Do yo Really Want To Add Product?</p>
            </div>
            <form action="/product/create" id="add_photho" method="GET">
                @csrf
                @method('GET')
                <input type="hidden" id='product' name='id' value="" required>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="sumbit" class="btn btn-danger">Confirm</button>
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

    $('#photho').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/photho-table',
        columns: [
            { data: 'thumbnail', name: 'thumbnail' },
            { data: 'path', name: 'path' },
            { data: 'created_at', name: 'created_at' },
            { data: 'view', name: 'view' },
            { data: 'delete', name: 'delete' },
            { data: 'add', name: 'add' },
        ],
        language: {paginate: {previous: "<i class='fa fa-angle-left'>", next: "<i class='fa fa-angle-right'>"}}
    });

    $('#photho').on('click', '.delete', function() {
            $id = $(this).attr('id');
            $('#delete_photho').attr('action', '/photho/' + $id);
        });
    $('#photho').on('click', '.add', function() {
            $id = $(this).attr('id');
            $('#product').attr('value',$id);
        });
    $('#photho').on('click', '.view', function() {
            $id = $(this).attr('id');
            $('#photho-zoom').attr('src', ''+$id);
        });
</script>
@endpush