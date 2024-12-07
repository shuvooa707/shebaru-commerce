@extends('backend.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                        <li class="breadcrumb-item active">Slider Manage</li>
                    </ol>
                </div>
                <h4 class="page-title">Slider Manage</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="p-1 m-0 col-sm-12 col-md-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4> Home Page Featured Slider Create</h4>
                </div>
                <div class="card-body">

                    @can('slider.create')
                        <form method="POST" action="{{ route('admin.featured-sliders.store')}}" id="ajax_form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <label  class="form-label">Select Products</label>
                                    <select class="form-select" id="products-select" name="product_id">
                                        @foreach($products as $product)
                                            <option data-img="{{$product->image}}" value="{{$product->id}}"> {{$product->name}} </option>
                                        @endforeach
                                    </select>


                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    @endcan
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <div class="p-1 m-0 col-sm-12 col-md-12 col-lg-8">
            <div class="card p-0 m-0">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>Products Id</th>
                                <th>Products Name</th>
                                <th>Products Image</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key => $item)
                                <tr>
                                    <td>
                                        {{ $item->product->id }}
                                    </td>
                                    <td>
                                        {{ $item->product->name }}
                                    </td>
                                    <td>
                                        <img src="{{ "/products/" . $item->product->image }}" width="120"/>
                                    </td>
                                    <td>
                                        @can('slider.delete')
                                            <a href="{{ route('admin.featured-sliders.destroy',[$item->id])}}"
                                               class="delete action-icon"> <i class="mdi mdi-delete"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->


    <script>
        $(document).ready(function() {
            function formatOption(option) {
                // if (!option.id) {
                //     return option.text;
                // }
                var imageUrl = '/products/' + option.element.dataset.img;
                var optionWithImage = $(
                    '<span><img src="' + imageUrl + '" class="img-flag" /> ' + option.text + '</span>'
                );
                console.log(optionWithImage)
                return optionWithImage;
            }

            // $('#products-select').select2({
            //     // templateResult: formatOption
            // });
        });
    </script>
@endsection

