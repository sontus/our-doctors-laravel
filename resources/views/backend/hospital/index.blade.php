@extends('layouts.backend')
@section('title','Hospitals')

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
                    <span>Hospitals</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospitals</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Hospitals</h4>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addNewModal">Add New</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        {{-- <th>Division</th>
                                        <th>District</th>
                                        <th>Upazila</th> --}}
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hospitals as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>
                                            <img src="{{ asset('storage/hospitals/'.$item->logo)}}" width="123px" height="71px" alt="award image">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                          {{-- <td>{{ $item->division->division->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td> --}}
                                        <td>{{ $item->phone }}</td>
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
                                                <form id="delete-form-{{$item->id}}" action="{{ route('hospital.destroy',$item->id) }}" method="POST" style="display: none;">
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
             
            <!--Add New Modal -->
            <div class="modal fade" id="addNewModal">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('hospital.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Hospital</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="hospital_name">Hospital Name <span class="req">*</span> </label>
                                            <input type="text" class="form-control" id="hospital_name" name="hospital_name" value="{{old('hospital_name', empty($errors->hospital_name) ? '' : $errors->hospital_name)}}" placeholder="Hospital Name">
                                            @if ($errors->has('hospital_name'))
                                                <span class="text-danger">{{ $errors->first('hospital_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="division_id">Division <span class="req">*</span> </label>
                                        <select name="division_id" id="division_id" class="form-control">
                                            @foreach ($divisions as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('division_id'))
                                            <span class="text-danger">{{ $errors->first('division_id') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="district_id" class="col-form-label">District Name <span class="req">*</span></label>
                                                <select name="district_id" id="district_id" class="form-control" required>
                                                    <option value="0">Select One</option>
                                                </select>
                                                @if ($errors->has('district_id'))
                                                    <span class="text-danger">{{ $errors->first('district_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="upazilla_id" class="col-form-label">Upazilla Name <span class="req">*</span> </label>
                                                 <select name="upazilla_id" id="upazilla_id" class="form-control" required>
                                                    <option value="0">Select One</option>
                                                </select>
                                                @if ($errors->has('upazilla_id'))
                                                    <span class="text-danger">{{ $errors->first('upazilla_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="hospital_mobile">Hospital Mobile <span class="req">*</span> </label>
                                            <input type="number" min="0" class="form-control" id="hospital_mobile" name="hospital_mobile" value="{{old('hospital_mobile', empty($errors->hospital_mobile) ? '' : $errors->hospital_mobile)}}" placeholder="01712345678">
                                            @if ($errors->has('hospital_mobile'))
                                                <span class="text-danger">{{ $errors->first('hospital_mobile') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="hospital_logo">Hospital Logo <span class="req">*</span> </label>
                                            <input type="file" class="form-control" id="hospital_logo" name="hospital_logo" value="{{old('hospital_logo', empty($errors->hospital_logo) ? '' : $errors->hospital_logo)}}" placeholder=">Hospital Name">
                                            @if ($errors->has('hospital_logo'))
                                                <span class="text-danger">{{ $errors->first('hospital_logo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="hospital_address">Hospital Address <span class="req">*</span> </label>
                                            <textarea name="hospital_address" id="hospital_address" cols="30" rows="4" class="form-control"></textarea>
                                        </div>
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
                        <form action="{{ route('category.update','1')}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               
                                <div class="row">
                                    <input type="text" id="row_id" name="old_id" hidden>
                                    <label for="edit_category_name">Category Name <span class="req">*</span> </label>
                                    <input type="text" class="form-control" id="edit_category_name" name="category_name" value="{{old('category_name', empty($errors->category_name) ? '' : $errors->category_name)}}" placeholder="Category Name">
                                    @if ($errors->has('category_name'))
                                        <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="row_status" class="col-form-label">Status <span class="red">*</span></label>
                                            <select name="row_status" id="row_status" class="form-control" required>
                                                <option value="1" {{old('row_status')==1 ? 'selected' : ''}}>Active</option>
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
                url     : "{{ url('admin/category') }}/" + row_id + "/edit",
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

        //division_id
        $(document).on('change','#division_id',function(){
            var id=$(this).val();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var op1 = '<option value="0">Select One</option>';
            $('#district_id').html(op1);
            $('#upazilla_id').html(op1);
            $('#union_id').html(op1);

            $.ajax({
                type    : "get",
                url     : "{{ route('gtDist') }}/" + id,
                dataType: "json",
                success : function(response){
                    // console.log(response);
                    
                    $.each(response.rows, function(i, v) { 
                        op1 += '<option value="'+v.id+'">' +v.name+ '</option>';
                    });
                    $('#district_id').html(op1);
                    $('select').select2({
                        width : '100%' // need to override the changed default
                    });
                },
                error : function(response){
                    alert("Error")
                }
            });
        });

//Upazilla

        $(document).on('change','#district_id',function(){
            var id=$(this).val();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var op1 = '<option value="0">Select One</option>';
            $('#upazilla_id').html(op1);
            $('#union_id').html(op1);
            $.ajax({
                type    : "get",
                url     : "{{ route('gtUpz') }}/" + id,
                dataType: "json",
                success : function(response){
                    // console.log(response);
                    
                    $.each(response.rows, function(i, v) { 
                        op1 += '<option value="'+v.id+'">' +v.name+ '</option>';
                    });
                    $('#upazilla_id').html(op1);
                    $('select').select2({
                        width : '100%' // need to override the changed default
                    });
                },
                error : function(response){
                    alert("Error")
                }
            });
        });
    </script>
@endpush