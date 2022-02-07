@extends('layouts.backend')
@section('title','Categories')

@push('vendor-css')
     <!-- Datatable -->
     <link href="{{ asset('assets/backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
@push('onpage-css')
    
@endpush
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Welcome back!</h4>
                    <span>Categories</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Categories</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Categories</h4>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addNewModal">Add New</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tiger Nixon</td>
                                        <td>Architect</td>
                                        <td>
                                            <div class="text-center">
                                                <a data-toggle="modal" data-target="#editModal" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-pencil" style="color: #fff;font-size: 14px; "></i></a>
                                                <a  onclick="deleteItem(1)"  class="btn btn-danger shadow btn-sm sharp">
                                                    <i class="fa fa-trash" style="color: #fff;font-size: 14px; "></i>
                                                </a>
                                                <form id="delete-form-1" action="{{ route('category.destroy',1) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>	
                                            
                                            {{-- <button class="btn btn-danger btn-xs"  type="button" onclick="deleteItem({{$shoots->id }})"> --}}
                                       
                                    
                                        </td>												
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             
            <!--Add New Modal -->
            <div class="modal fade" id="addNewModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('category.store')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Category</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               
                                    <div class="">
                                        <label for="cname">Category Name <span class="req">*</span> </label>
                                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Category Name" required>
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          
            <!--Edit Modal -->
            <div class="modal fade" id="editModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('category.store')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               
                                    <div class="">
                                        <label for="cname">Category Name <span class="req">*</span> </label>
                                        <input type="text" id="cname" name="cname" class="form-control" placeholder="Category Name" required>
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('vendor-js')
    <!-- Datatable -->
    <script src="{{ asset('assets/backend/vendor/datatables/js/jquery.dataTables.min.js')}} "></script>
    <script src="{{ asset('assets/backend/js/plugins-init/datatables.init.js')}}"></script>
@endpush
@push('onpage-js')
    
@endpush