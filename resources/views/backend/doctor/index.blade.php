@extends('layouts.backend')
@section('title','Doctors')

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
                    <span>Doctors</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Doctors</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Doctors</h4>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addNewModal">Add New</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Hospital</th>
                                        <th>Degree</th>
                                        <th>Mobile</th>
                                        <th>Experince</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>
                                            <img src="{{ asset('storage/doctors/'.$item->image)}}" width="123px" height="71px" alt="award image">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->hospital->name }}</td>
                                        <td>{{ $item->degree }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->age }}</td>
                                        <td>{{ $item->address }}</td>
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
                                                <form id="delete-form-{{$item->id}}" action="{{ route('doctor.destroy',$item->id) }}" method="POST" style="display: none;">
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
                        <form action="{{ route('doctor.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Doctor</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="doctor_name">Doctor Name <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{old('doctor_name', empty($errors->doctor_name) ? '' : $errors->doctor_name)}}" placeholder="Doctor Name">
                                        @if ($errors->has('doctor_name'))
                                            <span class="text-danger">{{ $errors->first('doctor_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_degree">Doctor Degree <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="doctor_degree" name="doctor_degree" value="{{old('doctor_degree', empty($errors->doctor_degree) ? '' : $errors->doctor_degree)}}" placeholder="Doctor Degree">
                                        @if ($errors->has('doctor_degree'))
                                            <span class="text-danger">{{ $errors->first('doctor_degree') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="doctor_category">Doctor Category <span class="req">*</span> </label>
                                        <select name="doctor_category" id="doctor_category" class="form-control">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('doctor_category'))
                                            <span class="text-danger">{{ $errors->first('doctor_category') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_hospital">Doctor Hospital <span class="req">*</span> </label>
                                        <select name="doctor_hospital" id="doctor_hospital" class="form-control">
                                            @foreach ($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('doctor_hospital'))
                                            <span class="text-danger">{{ $errors->first('doctor_hospital') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="doctor_mobile">Doctor Mobile <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="doctor_mobile" name="doctor_mobile" value="{{old('doctor_mobile', empty($errors->doctor_mobile) ? '' : $errors->doctor_mobile)}}" placeholder="Doctor Mobile">
                                        @if ($errors->has('doctor_mobile'))
                                            <span class="text-danger">{{ $errors->first('doctor_mobile') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_experince">Doctor Experince <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="doctor_experince" name="doctor_experince" value="{{old('doctor_experince', empty($errors->doctor_experince) ? '' : $errors->doctor_experince)}}" placeholder="Doctor Experince">
                                        @if ($errors->has('doctor_experince'))
                                            <span class="text-danger">{{ $errors->first('doctor_experince') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="doctor_address">Doctor Address <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="doctor_address" name="doctor_address" value="{{old('doctor_address', empty($errors->doctor_address) ? '' : $errors->doctor_address)}}" placeholder="Doctor Mobile">
                                        @if ($errors->has('doctor_address'))
                                            <span class="text-danger">{{ $errors->first('doctor_address') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_image">Doctor Image <span class="req">*</span> </label>
                                        <input type="file" class="form-control" id="doctor_image" name="doctor_image" value="{{old('doctor_image', empty($errors->doctor_image) ? '' : $errors->doctor_image)}}">
                                        @if ($errors->has('doctor_image'))
                                            <span class="text-danger">{{ $errors->first('doctor_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="doctor_details">Doctor Details <span class="req">*</span> </label>
                                        <textarea name="doctor_details" class="form-control" id="doctor_details" cols="30" rows="4"></textarea>
                                        @if ($errors->has('doctor_details'))
                                            <span class="text-danger">{{ $errors->first('doctor_details') }}</span>
                                        @endif
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
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('doctor.update','1')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Doctor</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="row_id" name="old_id" hidden>
                                        <label for="edit_doctor_name">Doctor Name <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="edit_doctor_name" name="doctor_name" value="{{old('doctor_name', empty($errors->doctor_name) ? '' : $errors->doctor_name)}}" placeholder="Doctor Name">
                                        @if ($errors->has('doctor_name'))
                                            <span class="text-danger">{{ $errors->first('doctor_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_doctor_degree">Doctor Degree <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="edit_doctor_degree" name="doctor_degree" value="{{old('doctor_degree', empty($errors->doctor_degree) ? '' : $errors->doctor_degree)}}" placeholder="Doctor Degree">
                                        @if ($errors->has('doctor_degree'))
                                            <span class="text-danger">{{ $errors->first('doctor_degree') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="edit_doctor_category_id">Doctor Category <span class="req">*</span> </label>
                                        <select name="doctor_category" id="edit_doctor_category_id" class="form-control">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('doctor_category'))
                                            <span class="text-danger">{{ $errors->first('doctor_category') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_doctor_hospital_id">Doctor Hospital <span class="req">*</span> </label>
                                        <select name="doctor_hospital" id="edit_doctor_hospital_id" class="form-control">
                                            @foreach ($hospitals as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('doctor_hospital'))
                                            <span class="text-danger">{{ $errors->first('doctor_hospital') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="edit_doctor_mobile">Doctor Mobile <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="edit_doctor_mobile" name="doctor_mobile" value="{{old('doctor_mobile', empty($errors->doctor_mobile) ? '' : $errors->doctor_mobile)}}" placeholder="Doctor Mobile">
                                        @if ($errors->has('doctor_mobile'))
                                            <span class="text-danger">{{ $errors->first('doctor_mobile') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_doctor_age">Doctor Experince <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="edit_doctor_age" name="doctor_experince" value="{{old('doctor_experince', empty($errors->doctor_experince) ? '' : $errors->doctor_experince)}}" placeholder="Doctor Experince">
                                        @if ($errors->has('doctor_experince'))
                                            <span class="text-danger">{{ $errors->first('doctor_experince') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="row_status">Doctor Status <span class="req">*</span> </label>
                                        <select name="row_status" id="row_status" class="form-control" required>
                                            <option value="1" {{old('row_status')==1 ? 'selected' : ''}}>Published</option>
                                            <option value="0" {{old('row_status')==0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        @if ($errors->has('row_status'))
                                            <span class="text-danger">{{ $errors->first('row_status') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="doctor_image">Doctor Image <span class="req">*</span> </label>
                                        <input type="file" class="form-control" id="doctor_image" name="doctor_image" value="{{old('doctor_image', empty($errors->doctor_image) ? '' : $errors->doctor_image)}}">
                                        @if ($errors->has('doctor_image'))
                                            <span class="text-danger">{{ $errors->first('doctor_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="edit_doctor_details">Doctor Details <span class="req">*</span> </label>
                                        <textarea name="doctor_details" class="form-control" id="edit_doctor_details" cols="30" rows="4"></textarea>
                                        @if ($errors->has('doctor_details'))
                                            <span class="text-danger">{{ $errors->first('doctor_details') }}</span>
                                        @endif
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
                url     : "{{ url('admin/doctor') }}/" + row_id + "/edit",
                dataType: "json",
                success : function(response){
                    var r_val = response.row_data;

                    $('#row_id').val(r_val.id);
                    $('#edit_doctor_name').val(r_val.name);
                    $('#edit_doctor_category_id').val(r_val.category_id );
                    $('#edit_doctor_hospital_id').val(r_val.hospital_id);
                    $('#edit_doctor_degree').val(r_val.degree);
                    $('#edit_doctor_mobile').val(r_val.mobile);
                    $('#edit_doctor_address').val(r_val.address);
                    $('#edit_doctor_age').val(r_val.age);
                    $('#edit_doctor_details').val(r_val.details);
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
