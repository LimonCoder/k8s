@include('web.includes.portfolio_header')

<!-- Page Content-->
<div class="container-fluid p-0">
    <!-- About-->
    <section class="resume-section" id="about">
        <div class="resume-section-content">
            <h1 class="mb-0">
                {{ $allInfo->first_name }}
                <span class="text-primary" style="color: {{ $allInfo->color_code }}">{{ $allInfo->last_name }}</span>
            </h1>
            <div class="subheading mb-5">
                {{ $allInfo->address }}, Mobile: {{ $allInfo->phone }},
                <a style="color: {{ $allInfo->color_code }}" href="mailto:{{ $allInfo->email }}">{{ $allInfo->email }}</a>
            </div>
            <p class="lead mb-5">{!! $allInfo->description  !!}</p>
            <div class="social-icons">
                <a class="social-icon" href="{{ $allInfo->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                <a class="social-icon" href="{{ $allInfo->skype }}"><i class="fab fa-skype"></i></a>
                <a class="social-icon" href="{{ $allInfo->whatsapp }}"><i class="fab fa-whatsapp"></i></a>
                <a class="social-icon" href="{{ $allInfo->facebook }}"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Experience-->
    <section class="resume-section" id="experience">
        <div class="resume-section-content">
            <h2 class="mb-5">Experience</h2>
            @foreach($allInfo->experiences as $experience)
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">{{ $experience->designation }}</h3>
                        <div class="subheading mb-3">{{ $experience->company_name }}</div>
                        <p>{!! $experience->responsibility !!}</p>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">{{ date('d M Y', strtotime($experience->start_date)) }} - {{ $experience->end_date ? date('d M Y', strtotime($experience->end_date)) : "Present" }}</span></div>
                </div>
            @endforeach

        </div>
    </section>
    <hr class="m-0" />
    <!-- Education-->
    <section class="resume-section" id="education">
        <div class="resume-section-content">
            <h2 class="mb-5">Education</h2>
            @foreach($allInfo->educations as $education)
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">{{ $education->campus_name }}</h3>
                        <div class="subheading mb-3">{{ $education->campus_name }}</div>
                        <div>{{ $education->department }}</div>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">{{ date('M Y', strtotime($education->passing_year)) }}</span></div>
                </div>
            @endforeach
        </div>
    </section>
    <hr class="m-0" />
    <!-- Skills-->
    <section class="resume-section" id="skills">
        <div class="resume-section-content">
            <h2 class="mb-5">Skills</h2>
            <div class="d-flex flex-wrap gap-2">
                @foreach($allInfo->skills as $skill)
                    <span class="skill-badge" style="border-color: {{ $allInfo->color_code }}; color: {{ $allInfo->color_code }};">
                    {{ $skill->skill_name }} - {{ $skill->percentage }}
                </span>
                @endforeach
            </div>
        </div>
    </section>
    <hr class="m-0" />

    <!-- Skills-->
    <section class="resume-section" id="projects">
        <div class="resume-section-content">
            <h2 class="mb-5">Projects</h2>
            <div class="row d-flex">
                <div class="row">
                    @foreach($allInfo->projects as $project)
                        <div class="col-md-4">
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">

                                    <div class="card-body p-0">
                                        <img class="img-fluid" src="{{ asset("admin/assets/photo/project/". $project->image ) }}" alt="Project Image">

                                        <div class="p-3">
                                            <a href="{{ $project->url }}">
                                            <h6 class="fw-bolder">{{ $project->title }}</h6>
                                            </a>
                                            <p>{{ $project->technology }}</p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <hr class="m-0" />
</div>

@include('web.includes.portfolio_footer')
