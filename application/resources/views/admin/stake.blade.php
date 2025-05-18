@extends('admin.layouts.app')

@section('add_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('title')
    Stakes
@endsection

@php
    $page = "Stakes"
@endphp


@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right mb-3">
                            @if (Auth::user()->type == 1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Add Stake
                                </button>
                            @endif
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="stake_table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($stakes as $key => $stake)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $stake->name }}</td>
                                            <td>{{ $stake->description }}</td>
                                            <td class="project-actions">
                                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="{{ "#stake" . $stake->id . "editModal" }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </button>
                                                <a class="btn btn-red btn-sm">
                                                    <form action="{{ route('stakes.destroy', $stake->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>

                                        <div class="modal fade show" id="{{ "stake" . $stake->id . "editModal" }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Stake Model</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('stakes.update', $stake->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="Name">Name</label>
                                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $stake->name }}" required placeholder="Enter Stake Name..">

                                                                    @error('name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Description">Client</label>
                                                                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ $stake->description }}" required placeholder="Enter Description">
                                                                    @error('description')
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
                    <h4 class="modal-title">Stake Model</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <form action="{{ route('stakes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required placeholder="Enter Stake Name..">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" required placeholder="Enter Description">
                            @error('description')
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
            $("#stake_table").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "lengthMenu": [[10, 20, 50, 100, -1], [10, 20, 50, 100, "All"]],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            bsCustomFileInput.init();
        });
    </script>
@endsection
