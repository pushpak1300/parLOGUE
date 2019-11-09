@extends('common.navbar')

@push('css')
<link href="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.css" rel="stylesheet">

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
                <h3>150</h3>

                <p>Total Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

@endsection

@push('js')
<script src="https://transloadit.edgly.net/releases/uppy/v1.6.0/uppy.min.js"></script>

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
bundle: true,
limit:2
})
  

      uppy.on('upload-success', (file, response) => {
  console.log(response.status);
  console.log(response.body);
  
  
})
    </script>
  
@endpush