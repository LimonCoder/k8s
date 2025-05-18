@extends('admin.layouts.app')

@section('title')
    Job Add
@endsection

@php
    $page = "Job Add"
@endphp
@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <form action="{{ route('job_posts.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" name="job_title" class="form-control @error('job_title') is-invalid @enderror" required>
                                    @error('job_title') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stack</label>
                                    <select name="stack_id" class="form-control @error('stack_id') is-invalid @enderror" required>
                                        <option value="">Select Stack</option>
                                        @foreach($stacks as $stack)
                                            <option value="{{ $stack->id }}">{{ $stack->name }}</option>

                                        @endforeach
                                    </select>
                                    @error('stack_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Applied Date</label>
                                    <input type="date" name="applied_date" class="form-control @error('applied_date') is-invalid @enderror">
                                    @error('applied_date') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vacancy</label>
                                    <input type="text" name="vacancy" class="form-control @error('vacancy') is-invalid @enderror" required>
                                    @error('vacancy') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Education</label>
                                    <input type="text" name="education" class="form-control @error('education') is-invalid @enderror">
                                    @error('education') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror">
                                    @error('salary') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Experience</label>
                                    <input type="text" name="experience" class="form-control @error('experience') is-invalid @enderror">
                                    @error('experience') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employee Status</label>
                                    <select name="employee_status" class="form-control @error('employee_status') is-invalid @enderror" required>
                                        <option value="">Select Status</option>
                                        <option value="1">Full Time</option>
                                        <option value="2">Part Time</option>
                                    </select>
                                    @error('employee_status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Additional Requirements</label>
                                    <textarea id ="additional_requirement" name="additional_requirement" class="form-control @error('additional_requirement') is-invalid @enderror"></textarea>
                                    @error('additional_requirement') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Responsibilities</label>
                                    <textarea id ="responsibilities" name="responsibilities" class="form-control @error('responsibilities') is-invalid @enderror"></textarea>
                                    @error('responsibilities') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Benefits</label>
                                    <textarea id ="benefits" name="benefits" class="form-control @error('benefits') is-invalid @enderror"></textarea>
                                    @error('benefits') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>


                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Submit Job Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('add_js')
    <script>
        $(document).ready(function() {
            $('#additional_requirement').summernote();
            $('#responsibilities').summernote();
            $('#benefits').summernote();
        });

    </script>
@endsection
