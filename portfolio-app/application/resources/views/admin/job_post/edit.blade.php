@extends('admin.layouts.app')

@section('title')
    Information Edit
@endsection

@php
    $page = "Information Edit"
@endphp

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('informations.update', $information->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="_method" value="put">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-center">
                                    <div class="text-center col-md-6">
                                        <span class="text-danger text-center"> <b>Note: </b>Please provide 500*500 Image</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-center">
                                    <div class="text-center col-md-6">
                                        <img class="profile-user-img img-fluid" id="preview" src="{{ asset('admin/assets' . ($information->photo ? '/photo/' . $information->photo : '/dist/img/user4-128x128.jpg')) }}" alt="User profile picture">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mt-2 d-flex justify-content-center">
                                    <div class="custom-file col-md-6">
                                        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo">

                                        <input type="hidden" id="old_photo" name="old_photo" value="{{ $information->photo }}">

                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    @error('photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" required class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ $information->first_name }}" placeholder="First Name">
                                </div>
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" required class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ $information->last_name }}" placeholder="Last Name">
                                </div>
                                @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" required class="form-control @error('age') is-invalid @enderror" name="age" id="age" value="{{ $information->age }}" placeholder="00">
                                </div>
                                @error('age')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <input type="text" required class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality" value="{{ $information->nationality }}" placeholder="Nationality">
                                </div>
                                @error('nationality')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" required class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $information->phone }}" placeholder="01888888888">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $information->email }}" placeholder="test@gmail.com">
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Skype</label>
                                    <input type="text" required class="form-control @error('skype') is-invalid @enderror" name="skype" id="skype" value="{{ $information->skype }}" placeholder="skype url">
                                </div>
                                @error('skype')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Whatsapp</label>
                                    <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" id="whatsapp" value="{{ $information->whatsapp }}" placeholder="Whatsapp url">
                                </div>
                                @error('whatsapp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" required class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin" value="{{ $information->linkedin }}" placeholder="Linkedin Url">
                                </div>
                                @error('linkedin')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" value="{{ $information->facebook }}" placeholder="Facebook url">
                                </div>
                                @error('facebook')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Language</label>
                                    <div class="select2-purple">
                                        @php
                                            $language = json_decode($information->languages);
                                        @endphp
                                        <select class="select2 @error('language') is-invalid @enderror" required multiple="multiple" data-placeholder="Select language" data-dropdown-css-class="select2-purple" name="language[]" id="language" style="width: 100%;">
                                            <option value="Bengali" <?php echo in_array('Bengali', $language) ? 'selected' : ''; ?>>Bengali</option>
                                            <option value="English" <?php echo in_array('English', $language) ? 'selected' : ''; ?>>English</option>
                                            <option value="Hindi" <?php echo in_array('Hindi', $language) ? 'selected' : ''; ?>>Hindi</option>
                                            <option value="French" <?php echo in_array('French', $language) ? 'selected' : ''; ?>>French</option>
                                            <option value="Russian" <?php echo in_array('Russian', $language) ? 'selected' : ''; ?>>Russian</option>
                                            <option value="Japanese" <?php echo in_array('Japanese', $language) ? 'selected' : ''; ?>>Japanese</option>
                                        </select>
                                    </div>
                                    @error('language')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Project</label>
                                    <input type="number" required class="form-control @error('project') is-invalid @enderror" name="project" id="project" value="{{ $information->project }}" placeholder="00">
                                </div>
                                @error('project')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Customer</label>
                                    <input type="number" required class="form-control @error('customer') is-invalid @enderror" name="customer" id="customer" value="{{ $information->customer }}" placeholder="00">
                                </div>
                                @error('customer')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" required name="address" id="address"  rows="3" placeholder="Enter address"> {{ $information->address }}</textarea>
                                </div>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" class="form-control @error('color_code') is-invalid @enderror" name="color_code" id="color_code" value="{{$information->color_code}}">
                                </div>
                                @error('color_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" required name="description">{{ $information->description }}</textarea>
                                </div>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-center">
                                    <div class="text-center col-md-2">
                                        <button type="submit" class="btn btn-block bg-gradient-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('add_js')
    <script>
        $(document).ready(function() {
            $('#photo').on('change', function(event) {
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

    </script>
@endsection
