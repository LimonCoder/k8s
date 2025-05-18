@include('web.includes.header')

<main class="main" style="padding-top: 120px;">
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Job Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <img src="{{ asset($jobPost->userInfo->logo ?? '') }}"
             alt="Company Logo" class="img-fluid" style="max-height: 100px;">
        <h5 class="text-danger">{{ $jobPost->title }}</h5>
        <p class="text-muted">Application Deadline: <strong>{{ \Carbon\Carbon::parse($jobPost->applied_date)->format('d-M-Y') }}</strong></p>

        <!-- Summary -->
        <div class="row mt-4">
            <div class="col-md-4"><span class="fw-bold">Vacancy:</span> {{ $jobPost->vacancy ?? '--' }}</div>
            <div class="col-md-4"><span class="fw-bold">Salary:</span> {{ $jobPost->salary ?? 'Negotiable' }}</div>
            <div class="col-md-4 mt-2"><span class="fw-bold">Experience:</span> {{ $jobPost->experience ?? 'At least 3 years' }}</div>
            <div class="col-md-4 mt-2"><span class="fw-bold">Location:</span> {{ $jobPost->userInfo->location }}</div>
            <div class="col-md-4 mt-2"><span class="fw-bold">Published:</span> {{ \Carbon\Carbon::parse($jobPost->created_at)->format('d-M-Y') }}</div>
        </div>

        <!-- Requirements -->
        <h5 class="section-title">Requirements</h5>
        <div>
            <p><strong>Education:</strong> {{ $jobPost->education }}</p>
            <p><strong>Experience:</strong> {{ $jobPost->experience}}</p>
            <p><strong>Additional Requirements:</strong></p>
            {!! $jobPost->additional_requirement !!}
        </div>

        <!-- Responsibilities -->
        <h5 class="section-title">Responsibilities & Context</h5>
        {!! $jobPost->responsibilities !!}

        <!-- Benefits -->
        <h5 class="section-title">Benefits</h5>
        {!! $jobPost->benefits !!}

        <h5 class="section-title">Employment Status</h5>
        <p>{{ $jobPost->employee_status }}</p>

        <h5 class="section-title">Job Location</h5>
        <p>{{ $jobPost->userInfo->location }}</p>
    </div>
</main>


@include('web.includes.footer')
