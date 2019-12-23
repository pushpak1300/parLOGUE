@extends('common.navbar')

@push('css')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Image Thumbnail</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body text-center">
                            <img class="text-center" src="" height='400px' width="270px" alt='image'>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <form action='/storeproduct' method="POST" role="form" enctype="multipart/form-data" >
                                @csrf
                                @method('POST')
                    <div class="form-group ">
                    <label for="customFile">Upload Image</label> 
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="photho" name='photho' required>
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
               
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Design Number</label>
                                            <input type="text" class="form-control" placeholder="Enter Design Number" name="design_no" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select Company</label>
                                            <select class="form-control company" name='company' required>
                                                <option></option>
                                                @foreach($products as $product)
                                            <option>{{$product->company}}</option>  
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control category " id='category' name="category" aria-placeholder="Select Category" required>
                                                <option></option>
                                                <option>Girl</option>
                                                <option>Boy</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                 <div class="row">
                                     <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select Sub-Category</label>
                                            <select class="form-control sub-category" name="sub_category_girl" required>
                                                <option></option>
                                            @foreach ($subcategories as $subcategorie)
                                               <option value="{{$subcategorie->id}}"">{{$subcategorie->sub_category}}</option>  
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Select Sub-Category Size</label>
                                            <select class="form-control size"  name="size[]" multiple="multiple" required>
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
                                
                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Base Price</label>
                                            <input type="text" class="form-control" name="base_price" placeholder="Enter price" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Increament Price </label>
                                            <input type="text" class="form-control" name="inc_price" placeholder="Enter price" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="sumbit" class='btn btn-primary'>Add Product</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
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
        placeholder: "Select a category",
    });
    $('.company').select2({
        theme: 'bootstrap4',
        tags: true
    });
    $('.boys').hide();
    $('.girls').hide();
    $('#category').on('change', function() {
        let value=this.value;
        if (value==='Boy') {
          $('.boys').show();
            $('.girls').hide();  
        }
        else{
            $('.boys').hide();
            $('.girls').show();  
        }
});
});
</script>
@endpush
