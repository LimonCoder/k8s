@include('web.includes.header')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    @if(session('success'))
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
                    keyboard: false
                });
                myModal.show();
            });
        </script>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">We offer modern solutions for growing your Job ground</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers & developers for making web application</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="#portfolio" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Get Started</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{asset('web/front/img/hero-img.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-person-workspace"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $totalJob }}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Total Job</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $information_count }}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Total People</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $skill_count }}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Skills</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-headset" style="color: #15be56;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $education_count }}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Educations</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-people" style="color: #bb0852;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $project_count }}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= job_post Section ======= -->
    <section id="job_post" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>Vacancies</h2>
                <p>Live Jobs</p>
            </header>

            <div class="row gy-4">
                @foreach($jobPosts as $jobPost)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-sm h-100 p-3 border rounded" style="background-color: #f0f7ff;">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="text-success fw-bold mb-1">{{ $jobPost->job_title ?? 'Head of Sales (Land)' }}</h5>
                                    <p class="mb-1 fw-semibold text-dark">{{ $jobPost->userInfo->name ?? 'Innovative Holdings Ltd.' }}</p>
                                    <p class="mb-2 text-muted">
                                        <i class="bi bi-geo-alt-fill me-1"></i> {{ $jobPost->userInfo->location}}
                                    </p>
                                </div>
                                <div>
                                    <img src="{{ asset($jobPost->userInfo->logo ?? '') }}"
                                         alt="Company Logo" class="img-fluid" style="max-height: 60px;">
                                </div>
                            </div>

                            <div class="d-flex justify-content-between text-muted small">
                                <span><i class="bi bi-briefcase-fill me-1"></i> {{ $jobPost->experience }}</span>
                                <span><i class="bi bi-calendar-event me-1"></i> <strong>{{ \Carbon\Carbon::parse($jobPost->created_at)->format('d-M-Y') }}</strong></span>
                            </div>

                            <a href="{{ route('job_post.show', encrypt($jobPost->id)) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>

            <br>
            {{ $jobPosts->links('vendor.pagination.bootstrap-5') }}

        </div>
    </section>

    <!-- End job_post Section -->

    <!-- ======= portfolio Section ======= -->
    <section id="portfolio" class="team">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Portfolio</h2>
                <p>Looking For Job</p>
            </header>

            <div class="row gy-4">
                @foreach($informations as $information)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('admin/assets' . ($information->photo ? '/photo/' . $information->photo : '/dist/img/user4-128x128.jpg')) }}" class="img-fluid" alt="">

                            <div class="social">
                                <a href="{{ $information->whatsapp }}"><i class="bi bi-whatsapp"></i></a>
                                <a href="{{ $information->facebook }}"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $information->skype }}"><i class="bi bi-skype"></i></a>
                                <a href="{{ $information->linkedin }}"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <a href="{{ route('portfolio.show', encrypt($information->id)) }}">
                            <div class="member-info">
                                <h4>{{ $information->first_name }} {{ $information->last_name }}</h4>
                                <span>{{ $information->email }}</span>
                                <p></p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            {{ $informations->appends(['jobs' => request('jobs')])->links('vendor.pagination.bootstrap-5') }}
        </div>

    </section>
    <!-- End portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Team</h2>
                <p>Our hard working team</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{asset('web/front/img/team/team-1.jpg')}}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Md Omar Faruk</h4>
                            <span>CSE Evening (203410005)</span>
                            <p>Work with System Design, Frontend and Backend</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{asset('web/front/img/team/team-2.jpg')}}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Nurul Amin Limon</h4>
                            <span>CSE Evening (203410007)</span>
                            <p>Work with Backend & Frontend</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{asset('web/front/img/team/team-3.jpg')}}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Mahmudul Kader </h4>
                            <span>CSE Evening (203410006)</span>
                            <p>Work with Frontend And Backend</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{asset('web/front/img/team/team-4.jpg')}}" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Md Shahzada </h4>
                            <span>CSE Evening (203410008)</span>
                            <p>Work with Frontend And Backend</p>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </section>
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>Kazipara, Mirpur-10,<br>Dhaka, Bangladesh</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+8801878469345 <br> +8801888888888</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>akomarfci@gmail.com <br> mk@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Sunday - Thursday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <form action="{{ route('contacts.store') }}" method="post" class="php-email-form">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" id="message" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </section>
    <!-- End Contact Section -->

</main><!-- End #main -->

@include('web.includes.footer')
