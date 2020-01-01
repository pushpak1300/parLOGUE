@extends('common.navbar')

@push('css')
<link href="{{asset('css/uppy.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{App\product::count()}}</h3>

                <p>Total Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>{{App\photho::count()}}</h3>

                <p>Total Picture</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/photho" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-8">
              <div class="card">
              <div class="card-header">
                <h5 class="card-title">Upload Images</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    
                    
                  </div>
                  
                 
                </div>
                
              </div>
              <div class="card-body">
                  <div class="d-flex align-items-center text-center">
                    <div id="drag-drop-area"></div>
                  </div>
                    
                  </div>
              <!-- /.card-header -->
                    <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Seacrh Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action='/search' method="GET" role="form">
                                @csrf
                                @method('GET')
                                
      

                                <div class="row">
                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control category " id='category' name="category" aria-placeholder="Select Category">
                                                <option></option>
                                                <option>Girl</option>
                                                <option>Boy</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select Sub-Category</label>
                                            <select class="form-control sub-category" name="sub_categor" aria-placeholder="Select a subcategory">
                                                <option></option>
                                                
                                                @foreach (App\sub_category::all() as $subcategorie)
                                               <option>{{$subcategorie->sub_category}}</option>  
                                            @endforeach
                                            <option>All</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-8">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select Size</label>
                                            <select class="form-control size"  name="size[]" multiple="multiple">
                                                <option>16</option>
                                                <option>18</option>
                                                <option>20</option>
                                                <option>22</option>
                                                <option>24</option>
                                                <option>26</option>
                                                <option>28</option>
                                                <option>30</option>
                                                <option>32</option>
                                                <option>34</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                               
                                <div class="form-group">
                                    <button type="sumbit" class='btn btn-primary'>Search Product</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection

@push('js')
 <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
    $('.size').select2({
        theme: 'bootstrap4'
    });
    $('.category').select2({
        theme: 'bootstrap4',
        placeholder: "Select a category",
    });
    $('.sub-category').select2({
        theme: 'bootstrap4',
        placeholder: "Select subcategory",
    });
  
});
</script>
<script src="{{asset('js/uppy.js')}}"></script>

 <script>
      var uppy = Uppy.Core({
  debug: true,
  autoProceed: false,
  restrictions: {
    maxFileSize:null,
    maxNumberOfFiles:null,
    minNumberOfFiles: null,
    allowedFileTypes: ['image/*']
  }
})
        .use(Uppy.Dashboard, {
          inline: true,
          target: '#drag-drop-area',
          replaceTargetContent: true,
          showProgressDetails: true,
          note: 'Images Only',
        })
        .use(Uppy.XHRUpload, {
  endpoint: 'photho/',
  method:'post',
  formData:true,
  fieldName: 'photho[]',
  metaFields: null,
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
bundle: false,
limit:1
})
uppy.on('upload-success', (file, response) => {
  console.log(response.status);
  console.log(response.body);
  
  
})
    </script>
 
  
@endpush