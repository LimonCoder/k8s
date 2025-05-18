@extends('admin.layouts.app')

@section('add_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('title')
    Projects
@endsection

@php
    $page = "Projects"
@endphp


@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right mb-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Add Project
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="project_table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Project Title</th>
                                    <th>Client</th>
                                    <th>Url</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $key => $project)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $project->information->first_name }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td>{{ $project->client }}</td>
                                            <td>{{ $project->url }}</td>
                                            <td class="project-actions">
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="{{ "#project" . $project->id . "editModal" }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </button>
                                                <a class="btn btn-red btn-sm">
                                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade show" id="{{ "project" . $project->id . "editModal" }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Project Model</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label>Project Owner</label>
                                                                    <select class="form-control @error('information_id') is-invalid @enderror" name="information_id" id="information_id" required>
                                                                        <option>Select Project</option>
                                                                        @foreach($informations as $information)
                                                                            <option value="{{ $information->id }}" @if($information->id == $project->information_id) selected @endif>{{ $information->first_name .' '. $information->last_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('information_id')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Title">Title</label>
                                                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $project->title }}" required placeholder="Enter Title..">

                                                                    @error('title')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Client">Client</label>
                                                                    <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" id="client" value="{{ $project->client }}" required placeholder="Enter Client name">
                                                                    @error('client')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Technology">Technology</label>
                                                                    <input type="text" name="technology" class="form-control @error('technology') is-invalid @enderror" id="technology" value="{{ $project->technology }}" required placeholder="Enter Client name">
                                                                    @error('technology')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Image">Image</label>
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        <input type="hidden" id="old_image" name="old_image" value="{{ $project->image }}">
                                                                    </div>
                                                                    @error('image')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Url">Url</label>
                                                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" value="{{ $project->url }}" required placeholder="Enter Url..">
                                                                    @error('url')
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

    <div class="modal fade show" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Project Model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Project Owner</label>
                                <select class="form-control @error('information_id') is-invalid @enderror" name="information_id" id="information_id" required>
                                    <option>Select Skill Gainer</option>
                                    @foreach($informations as $information)
                                        <option value="{{ $information->id }}" >{{ $information->first_name .' '. $information->last_name }}</option>
                                    @endforeach
                                </select>
                                @error('information_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required placeholder="Enter Title..">

                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Client">Client</label>
                                <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" id="client" required placeholder="Enter Client name">
                                @error('client')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Technology">Technology</label>
                                <input type="text" name="technology" class="form-control @error('technology') is-invalid @enderror" id="technology" required placeholder="Enter Client name">
                                @error('technology')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Image">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Url">Url</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" required placeholder="Enter Url..">
                                @error('url')
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

        $(document).ready(function() {
            $('#image').on('change', function(event) {
                var file = event.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        $(function () {
            $("#project_table").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            bsCustomFileInput.init();
        });
    </script>
@endsection
