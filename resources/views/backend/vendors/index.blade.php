@extends('backend.app')
@section('content')

    <style>
        th, td, h4, .br_manage, .form-label {
            color: black !important;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SIS</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CRM</a></li>
                        <li class="breadcrumb-item active br_manage">Brand Manage</li>
                    </ol>
                </div>
                <h4 class="page-title">Vendor Manage</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="p-1 col-md-12 col-sm-12  col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4> Vendor Create </h4>
                </div>
                <div class="card-body">

                    @can('vendor.create')
                        <form method="POST" action="{{ route('admin.vendors.store')}}" id="ajax_form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Vendor Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Brand Name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Vendor whatsapp</label>
                                        <input type="text" name="whatsapp" class="form-control"
                                               placeholder="Whatsapp Number">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Vendor Facebook Link</label>
                                        <input type="text" name="facebook_link" class="form-control"
                                               placeholder="Facebook Link">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Vendor phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Vendor email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Vendor Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

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

        <div class="p-1 col-md-12 col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12 mb-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <form
                                    class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                    <div class="col-auto">
                                        <label for="inputPassword2" class="visually-hidden">Search</label>
                                        <input type="search" class="form-control" id="inputPassword2"
                                               placeholder="Search..." name="q" value="{{ $q??''}}">
                                    </div>

                                    <div class="col-auto">
                                        <label for="submit" class="visually-hidden">Submit</label>
                                        <input type="submit" class="form-control btn btn-sm btn-primary" id="submit"
                                               value="Submit">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-centered mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Vendor</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Whatsapp</th>
                                    <th>Vendor Image</th>
                                    <th style="width: 125px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vendors as $key => $vendor)
                                    <tr>
                                        <td> {{$vendor->name}} </td>
                                        <td>
                                            {{ $vendor->phone }}
                                        </td>
                                        <td>
                                            {{ $vendor->email }}
                                        </td>
                                        <td>
                                            {{ $vendor->whatsapp }}
                                        </td>
                                        <td>
                                            <img src="{{ getImage('vendors', $vendor->image) }}" width="100">
                                        </td>
                                        <td>
                                            @can('type.edit')
                                                <a href="{{ route('admin.vendors.edit',[$vendor->id])}}"
                                                   class="action-icon btn_modal">
                                                    <i class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                            @endcan
                                            @can('type.delete')
                                                <a href="{{ route('admin.vendors.destroy',[$vendor->id])}}"
                                                   class="delete action-icon"> <i class="mdi mdi-delete"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $(".check_all").on('change', function () {
                $(".checkbox").prop('checked', $(this).is(":checked"));
            });

            $(document).on('click', 'a.top_update', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');

                var product = $('input.checkbox:checked').map(function () {
                    return $(this).val();
                });
                var brand_ids = product.get();

                if (brand_ids.length == 0) {
                    toastr.error('Please Select A Product First !');
                    return;
                }

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {brand_ids},
                    success: function (res) {
                        if (res.status == true) {
                            toastr.success(res.msg);
                            window.location.reload();

                        } else if (res.status == false) {
                            toastr.error(res.msg);
                        }
                    }
                });

            })
        })
    </script>
@endpush
