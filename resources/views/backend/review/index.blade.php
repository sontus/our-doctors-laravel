@extends('layouts.backend')
@section('title','Reviews')

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
                    <span>Reviews</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Reviews</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reviews</h4>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addNewModal">Add New</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Doctor Name</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $item->doctor->name }}</td>
                                        <td>{{ $item->review }}</td>
                                        <td>{{ $item->rating }}</td>
                                        <td>
                                        
                                            {{ $item->row_status ==  true ? 'Active' : 'Inactive'}}
                                            
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <a href="javascript:void(0)" class="btn btn-primary shadow btn-sm sharp mr-1 edit_row" data-toggle="modal" data-target="#editModal" data-id="{{$item->id}}" >
                                                    <i class="fa fa-pencil" style="color: #fff;font-size: 14px; "></i>
                                                </a>

                                                <a  onclick="deleteItem({{$item->id}})"  class="btn btn-danger shadow btn-sm sharp">
                                                    <i class="fa fa-trash" style="color: #fff;font-size: 14px; "></i>
                                                </a>
                                                <form id="delete-form-{{$item->id}}" action="{{ route('review.destroy',$item->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>	
                                            
                                            
                                       
                                    
                                        </td>												
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Edit Modal -->
           <div class="modal fade" id="editModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('review.update','1')}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Review</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="row_id" name="old_id" hidden>
                                            <label for="row_status" class="col-form-label">Status <span class="red">*</span></label>
                                            <select name="row_status" id="row_status" class="form-control" required>
                                                <option value="1" {{old('row_status')==1 ? 'selected' : ''}}>Published</option>
                                                <option value="0" {{old('row_status')==0 ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                            @if ($errors->has('row_status'))
                                                <span class="text-danger">{{ $errors->first('row_status') }}</span>
                                            @endif
                                        </div>
                                    </div>
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
    <script>
        @if ($errors->any())
            $('#addNewModal').modal('show');
        @endif 

        // edit
        $(document).on('click', '.edit_row', function(e) {
            var row_id= $(this).data('id');
            // alert(row_id);
            $('#editModal').modal('show');

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type    : "get",
                url     : "{{ url('admin/review') }}/" + row_id + "/edit",
                dataType: "json",
                success : function(response){
                    var r_val = response.row_data;

                    $('#row_id').val(r_val.id);
                    $('#edit_category_name').val(r_val.name);
                    $('#row_status').val(r_val.row_status);
                },
                error : function(response){
                    alert("Error")
                }
            });
            e.preventDefault();
        });
    </script>
@endpush