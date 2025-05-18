@extends('admin.layouts.app')

@section('add_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('title')
    Skills
@endsection

@php
    $page = "Skills"
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
                                    <i class="fas fa-plus"></i> Add skill
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
                                    <th>Skill Name</th>
                                    <th>Percentage</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($skills as $key => $skill)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $skill->information->first_name . ' '. $skill->information->last_name}}</td>
                                        <td>{{ $skill->skill_name }}</td>
                                        <td>{{ $skill->percentage }}</td>
                                        <td class="project-actions">
                                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="{{ "#skill" . $skill->id . "editModal" }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </button>
                                            <a class="btn btn-red btn-sm">
                                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="{{ 'skill'. $skill->id . 'editModal' }}">
                                        <div class="modal-dialog modal-default">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Skill Model Edit</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('skills.update', $skill->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Skill Gainer</label>
                                                                <select class="form-control @error('information_id') is-invalid @enderror" name="information_id" id="information_id" required>
                                                                    <option>Select Skill Gainer</option>
                                                                    @foreach($informations as $information)
                                                                        <option value="{{ $information->id }}" @if($information->id == $skill->id) selected @endif >{{ $information->first_name .' '. $information->last_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('information_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Skill Name">Skill Name</label>
                                                                <input type="text" name="skill_name" class="form-control @error('skill_name') is-invalid @enderror" value="{{ $skill->skill_name }}" id="skill_name" required placeholder="Enter skill Name..">

                                                                @error('skill_name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Skill percentage">Percentage</label>
                                                                <input type="text" name="percentage" class="form-control @error('percentage') is-invalid @enderror" value="{{ $skill->percentage }}" id="percentage" required placeholder="Percentage with %">
                                                                @error('percentage')
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

    <div class="modal fade show" id="modal-default">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Skill Model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('skills.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Skill Gainer</label>
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
                                <label for="Skill Name">Skill Name</label>
                                <input type="text" name="skill_name" class="form-control @error('skill_name') is-invalid @enderror" id="skill_name" required placeholder="Enter skill Name..">

                                @error('skill_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Skill percentage">Percentage</label>
                                <input type="text" name="percentage" class="form-control @error('percentage') is-invalid @enderror" id="percentage" required placeholder="Percentage with %">
                                @error('percentage')
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
