@extends('layouts.backend')
@section('title','Chambers')

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
                    <span>Chambers</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Chambers</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chambers</h4>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addNewModal">Add New</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Address</th>
                                        <th>Doctor Name</th>
                                        <th>Hospital Name</th>
                                        <th>Consulting Time</th>
                                        <th>Visitfees One</th>
                                        <th>Visitfees Two</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($chambers as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->doctor->name }}</td>
                                        <td>{{ $item->hospital->name }}</td>
                                        <td>{{ $item->consulting_hrs }}</td>
                                        <td class="text-right">{{ $item->visitfees_one }}.Tk</td>
                                        <td class="text-right">{{ $item->visitfees_two }}.Tk</td>
                                        <td>{{ $item->mobile }}</td>
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
                                                <form id="delete-form-{{$item->id}}" action="{{ route('chamber.destroy',$item->id) }}" method="POST" style="display: none;">
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
                        <form action="{{ route('chamber.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Chamber</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="hospital_id" class="col-form-label">Hospital <span class="req">*</span></label>
                                            <select name="hospital_id" id="hospital_id" class="form-control" required>
                                                <option value="0">Select One</option>
                                                @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('hospital_id'))
                                                <span class="text-danger">{{ $errors->first('hospital_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="doctor_id" class="col-form-label">Doctor<span class="req">*</span> </label>
                                            <select name="doctor_id" id="doctor_id" class="form-control" required>
                                                <option value="0">Select One</option>
                                                @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('doctor_id'))
                                                <span class="text-danger">{{ $errors->first('doctor_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="mobile">Mobile <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="mobile" name="mobile" value="{{old('mobile', empty($errors->mobile) ? '' : $errors->mobile)}}" placeholder="Mobile">
                                        @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="time">Consulting Time <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="time" name="time" value="{{old('time', empty($errors->time) ? '' : $errors->time)}}" placeholder="Sun-Wed : 4PM - 8PM">
                                        @if ($errors->has('time'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="visitfees_one">Visitfees First Time <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="visitfees_one" name="visitfees_one" value="{{old('visitfees_one', empty($errors->visitfees_one) ? '' : $errors->visitfees_one)}}" placeholder="Visitfees First Time">
                                        @if ($errors->has('visitfees_one'))
                                            <span class="text-danger">{{ $errors->first('visitfees_one') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="visitfees_two">Visitfees Second Time <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="visitfees_two" name="visitfees_two" value="{{old('visitfees_two', empty($errors->visitfees_two) ? '' : $errors->visitfees_two)}}" placeholder="Visitfees First Time">
                                        @if ($errors->has('visitfees_two'))
                                            <span class="text-danger">{{ $errors->first('visitfees_two') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="address">Address <span class="req">*</span> </label>
                                        <textarea name="address" id="address" cols="30" rows="4" class="form-control"></textarea>
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
                        <form action="{{ route('chamber.update','1')}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Chamber</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" id="row_id" name="old_id" hidden>
                                        <div class="form-group">
                                            <label for="edit_hospital_id" class="col-form-label">Hospital <span class="req">*</span></label>
                                            <select name="hospital_id" id="edit_hospital_id" class="form-control" required>
                                                <option value="0">Select One</option>
                                                @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('hospital_id'))
                                                <span class="text-danger">{{ $errors->first('hospital_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="edit_doctor_id" class="col-form-label">Doctor<span class="req">*</span> </label>
                                            <select name="doctor_id" id="edit_doctor_id" class="form-control" required>
                                                <option value="0">Select One</option>
                                                @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('doctor_id'))
                                                <span class="text-danger">{{ $errors->first('doctor_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="edit_mobile">Mobile <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="edit_mobile" name="mobile" value="{{old('mobile', empty($errors->mobile) ? '' : $errors->mobile)}}" placeholder="Mobile">
                                        @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_time">Consulting Time <span class="req">*</span> </label>
                                        <input type="text" class="form-control" id="edit_time" name="time" value="{{old('time', empty($errors->time) ? '' : $errors->time)}}" placeholder="Sun-Wed : 4PM - 8PM">
                                        @if ($errors->has('time'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="edit_visitfees_one">Visitfees First Time <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="edit_visitfees_one" name="visitfees_one" value="{{old('visitfees_one', empty($errors->visitfees_one) ? '' : $errors->visitfees_one)}}" placeholder="Visitfees First Time">
                                        @if ($errors->has('visitfees_one'))
                                            <span class="text-danger">{{ $errors->first('visitfees_one') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="edit_visitfees_two">Visitfees Second Time <span class="req">*</span> </label>
                                        <input type="number" min="0" class="form-control" id="edit_visitfees_two" name="visitfees_two" value="{{old('visitfees_two', empty($errors->visitfees_two) ? '' : $errors->visitfees_two)}}" placeholder="Visitfees First Time">
                                        @if ($errors->has('visitfees_two'))
                                            <span class="text-danger">{{ $errors->first('visitfees_two') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="edit_address">Address <span class="req">*</span> </label>
                                        <textarea name="address" id="edit_address" cols="30" rows="4" class="form-control"></textarea>
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
                url     : "{{ url('admin/chamber') }}/" + row_id + "/edit",
                dataType: "json",
                success : function(response){
                    var r_val = response.row_data;

                    $('#row_id').val(r_val.id);
                    $('#edit_doctor_id').val(r_val.doctor_id);
                    $('#edit_hospital_id').val(r_val.hospital_id);
                    $('#edit_time').val(r_val.consulting_hrs);
                    $('#edit_visitfees_one').val(r_val.visitfees_one);
                    $('#edit_visitfees_two').val(r_val.visitfees_two);
                    $('#edit_mobile').val(r_val.mobile);
                    $('#edit_address').val(r_val.address);
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