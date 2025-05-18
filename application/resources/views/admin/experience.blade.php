@extends('admin.layouts.app')

@section('add_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('title')
    Experiences
@endsection

@php
    $page = "Experiences"
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
                                    <i class="fas fa-plus"></i> Add Experience
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
                                        <th>Company Name</th>
                                        <th>Designation</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($experiences as $key => $experience)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $experience->information->first_name }}</td>
                                        <td>{{ $experience->company_name }}</td>
                                        <td>{{ $experience->designation }}</td>
                                        <td>{{ $experience->start_date }}</td>
                                        <td>{{ $experience->end_date }}</td>

                                        <td class="project-actions">
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="{{ "#experience" . $experience->id . "editModal" }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </button>
                                            <a class="btn btn-red btn-sm">
                                                <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="{{ 'experience'. $experience->id . 'editModal' }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Experience Model</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('experiences.update', $experience->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Education Gainer</label>
                                                                <select class="form-control @error('information_id') is-invalid @enderror" name="information_id" id="information_id" required>
                                                                    <option>Select Education Gainer</option>
                                                                    @foreach($informations as $information)
                                                                        <option value="{{ $information->id }}" @if($information->id == $experience->information_id) selected @endif>{{ $information->first_name .' '. $information->last_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('information_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Company Name">Company Name</label>
                                                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" value="{{ $experience->company_name }}" required placeholder="Enter Company Name..">

                                                                @error('company_name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Designation">Designation</label>
                                                                <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{ $experience->designation }}" required placeholder="Enter Designation..">

                                                                @error('designation')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Start Date">Start Date</label>
                                                                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" value="{{ date('Y-m-d', strtotime($experience->start_date)) }}" required placeholder="Enter Start Date..">

                                                                @error('start_date')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="End Date">End Date</label>
                                                                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" value="{{ date('Y-m-d', strtotime($experience->end_date)) }}" required placeholder="Enter End Date..">

                                                                @error('end_date')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="Responsibility">Responsibility</label>
                                                                <textarea id="summernote" class="form-control @error('responsibility') is-invalid @enderror" required name="responsibility">{{ $experience->responsibility }}</textarea>
                                                                @error('responsibility')
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
                    <h4 class="modal-title">Experience Model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('experiences.store') }}" method="post">
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
                                <label for="Company Name">Company Name</label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" required placeholder="Enter Company Name..">

                                @error('company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Designation">Designation</label>
                                <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" required placeholder="Enter Designation..">

                                @error('designation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Start Date">Start Date</label>
                                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" required placeholder="Enter Start Date..">

                                @error('start_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="End Date">End Date</label>
                                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" placeholder="Enter End Date..">

                                @error('end_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Responsibility">Responsibility</label>
                                <textarea id="summernote" class="form-control @error('responsibility') is-invalid @enderror" required name="responsibility"></textarea>
                                @error('responsibility')
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
