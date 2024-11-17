@extends('backend.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                    <li class="breadcrumb-item active">Page Create</li>
                </ol>
            </div>
            <h4 class="page-title">Page Create</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <form method="POST" action="{{ route('admin.landing_pages.store')}}" id="ajax_form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Page Title</label>
                                <input type="text" name="title1" class="form-control" placeholder="Title">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Quality Assurance</label>
                                <textarea class="form-control" name="title2" rows="10" cols="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Video Url (Embedded Code)</label>
                                <input type="text" name="video_url" class="form-control" placeholder="Title">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Product Overview</label>
                                <textarea class="form-control" name="des1" rows="10" cols="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Slider Top Text</label>
                                 <input type="text" name="feature" class="form-control" placeholder="Title">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                               <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Slider Image</label>
                               <input type="file" name="sliderimage[]" class="form-control" multiple>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Old Price</label>
                                <input type="text" name="old_price" class="form-control" placeholder="Title">
                            </div>
                        </div> 

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">New Price</label>
                                <input type="text" name="new_price" class="form-control" placeholder="Title">
                            </div>
                        </div> 
                        
                         <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="Title">
                            </div>
                        </div> 

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Feature</label>
                                <textarea class="form-control" name="des3" rows="10" cols="10"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Home Delivery</label>
                                <input type="text" name="pay_text" class="form-control" placeholder="Title">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label  class="form-label">Add Product</label>
                                <input type="text" id="search2" class="form-control" placeholder="product search here">
                            </div>
                        </div>

                        <input type="hidden" id="product_id" name="product_id" value="">

                        <div id="data">

                        </div>


                        <div class="col-lg-12">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div> <!-- end row -->
@endsection

@push('js')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('title2', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script type="text/javascript">
    CKEDITOR.replace('des1', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script type="text/javascript">
    CKEDITOR.replace('des2', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script type="text/javascript">
    CKEDITOR.replace('des3', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script type="text/javascript">
    var path = "{{ route('admin.getOrderProduct') }}";
    var path2 = "{{ route('admin.getOrderProduct2') }}";
    const products=[];

    $( "#search" ).autocomplete({
        selectFirst: true, //here
        minLength: 2,
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
                if (data.length ==0) {
                    toastr.error('Product Or Stock Not Found');
                }
                else if (data.length ==1) {
                    if(products.indexOf(data[0].id) ==-1){
                        landingProductEntry(data[0]);
                        products.push(data[0].id);
                    }
                    $('#search').val('');
                }else if (data.length >1) {
                    response(data);
                }
            }
          });
        },
        select: function (event, ui) {
           if(products.indexOf(ui.item.id) ==-1){
                landingProductEntry(ui.item);
                products.push(ui.item.id);
            }
           $('#search').val('');
           return false;
        }
      });
      
      $( "#search2" ).autocomplete({
        selectFirst: true, //here
        minLength: 2,
        source: function( request, response ) {
          $.ajax({
            url: path2,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
                if (data.length ==0) {
                    toastr.error('Product Or Stock Not Found2');
                }
                else if (data.length ==1) {
                    if(products.indexOf(data[0].id) ==-1){
                        landingProductEntry(data[0]);
                        products.push(data[0].id);
                    }
                    $('#search2').val('');
                }else if (data.length >1) {
                    response(data);
                }
            }
          });
        },
        select: function (event, ui) {
           if(products.indexOf(ui.item.id) ==-1){
                landingProductEntry(ui.item);
                products.push(ui.item.id);
            }
           $('#search').val('');
           return false;
        }
      });

      function landingProductEntry(item)
      {
          $.ajax({
            url: '{{ route("admin.landingProductEntry")}}',
            type: 'GET',
            dataType: "json",
            data: {id:item.id},
            success: function( res ) {
                if (res.html) {
                    $('div#data').append(res.html);
                }
                if (res.pr_id)
                {
                    $('#product_id').val(res.pr_id);
                }
            }
          });
      }

      function productEntry(item){


        $.ajax({
            url: '{{ route("admin.orderProductEntry")}}',
            type: 'GET',
            dataType: "json",
            data: {id:item.id},
            success: function( res ) {
                if (res.html) {
                   $('tbody#data').append(res.html);
                    calculateSum();
                }
            }
          });
    }

</script>


@endpush
