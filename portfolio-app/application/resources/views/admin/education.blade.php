@extends('admin.layouts.app')

@section('add_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('title')
    Educations
@endsection

@php
    $page = "Educations"
@endphp

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div class="text-right mb-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                    <i class="fas fa-plus"></i> Add Education
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Campus</th>
                                    <th>Degree</th>
                                    <th>Passing Year</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($educations as $key => $education)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $education->information->first_name }}</td>
                                        <td>{{ $education->campus_name }}</td>
                                        <td>{{ $education->degree }}</td>
                                        <td>{{ $education->passing_year }}</td>

                                        <td class="project-actions">
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="{{ "#education" . $education->id . "editModal" }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </button>
                                            <a class="btn btn-red btn-sm">
                                                <form action="{{ route('educations.destroy', $education->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="{{ 'education'. $education->id . 'editModal' }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Education Model</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('educations.update', $education->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Education Gainer</label>
                                                                <select class="form-control @error('information_id') is-invalid @enderror" name="information_id" id="information_id" required>
                                                                    <option>Select Education Gainer</option>
                                                                    @foreach($informations as $information)
                                                                        <option value="{{ $information->id }}" @if($information->id == $education->information_id) selected @endif >{{ $information->first_name .' '. $information->last_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('information_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Campus Name">Campus Name</label>
                                                                <input type="text" name="campus_name" class="form-control @error('campus_name') is-invalid @enderror" id="campus_name" value="{{ $education->campus_name }}" required placeholder="Enter Campus Name..">

                                                                @error('campus_name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Degree Name">Degree Name</label>
                                                                <input type="text" name="degree" class="form-control @error('degree') is-invalid @enderror" id="degree" value="{{ $education->degree }}" required placeholder="Enter Degree Name..">

                                                                @error('degree')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Department Name">Department Name</label>
                                                                <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" id="department" value="{{ $education->department }}" required placeholder="Enter Department Name..">

                                                                @error('department')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Passing Year">Passing Year</label>
                                                                <input type="date" name="passing_year" class="form-control @error('passing_year') is-invalid @enderror" id="passing_year" value="{{ date('Y-m-d', strtotime($education->passing_year)) }}" required >

                                                                @error('passing_year')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-warning">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Education Model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('educations.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Education Gainer</label>
                                <select class="form-control @error('information_id') is-invalid @enderror" name="information_id" id="information_id" required>
                                    <option>Select Education Gainer</option>
                                    @foreach($informations as $information)
                                        <option value="{{ $information->id }}" >{{ $information->first_name .' '. $information->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('information_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Campus Name">Campus Name</label>
                                <input type="text" name="campus_name" class="form-control @error('campus_name') is-invalid @enderror" id="campus_name" required placeholder="Enter Campus Name..">

                                @error('campus_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Degree Name">Degree Name</label>
                                <input type="text" name="degree" class="form-control @error('degree') is-invalid @enderror" id="degree" required placeholder="Enter Degree Name..">

                                @error('degree')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Department Name">Department Name</label>
                                <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" id="department" required placeholder="Enter Department Name..">

                                @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Passing Year">Passing Year</label>
                                <input type="date" name="passing_year" class="form-control @error('passing_year') is-invalid @enderror" id="passing_year" required >
                                @error('passing_year')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('add_js')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
