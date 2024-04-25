@extends('layouts-landing.app')

@section('style-fe')

@endsection

@section('content')

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
              <div class="about-img">
                <img src="fe/assets/img/387267164_330437016173237_6284306943357525740_n.jpg" alt="">
              </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
              </p>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  
      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Why Us</h2>
            <p>Why Choose Our Restaurant</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-4">
              <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <span>01</span>
                <h4>Lorem Ipsum</h4>
                <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
              </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box" data-aos="zoom-in" data-aos-delay="200">
                <span>02</span>
                <h4>Repellat Nihil</h4>
                <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
              </div>
            </div>
  
            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box" data-aos="zoom-in" data-aos-delay="300">
                <span>03</span>
                <h4> Ad ad velit qui</h4>
                <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Why Us Section -->
  
      <!-- ======= Menu Section ======= -->
      <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="menu-flters">
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($category as $c)
                <li data-filter=".filter-{{ $c->kategori }}">{{ $c->kategori }}</li>
                @endforeach
              </ul>
            </div>
          </div>
  
          <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
  

            @foreach ($menu as $m)
                @php
                    $cat = \App\Models\Category::where('id',$m->id_category)->first();
                @endphp
            <div class="col-lg-6 menu-item filter-{{ $cat->kategori }}">
              <img src="{{ asset('assets/img/menu/'.$m->foto) }}" class="menu-img" alt="">
              <div class="menu-content">
                <a href="#">{{$m->nama}}</a>
              </div>
              <div class="menu-ingredients">
                {{ $m->desc }}
              </div>
            </div>
            @endforeach
           
          </div>
  
        </div>
      </section><!-- End Menu Section -->
  
     
      <!-- ======= Book A Table Section ======= -->
      <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Reservation</h2>
            <p>Book a Table</p>
          </div>
  
          <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-lg-4 col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="text" name="date" class="form-control" id="date" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="text" class="form-control" name="time" id="time" placeholder="Time" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Book a Table</button></div>
          </form>
  
        </div>
      </section><!-- End Book A Table Section -->
  
      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Testimonials</h2>
            <p>What they're saying about us</p>
          </div>
  
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

                @foreach ($testimoni as $item)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {{ $item->testimoni }}
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="{{ asset('assets/img/testimoni/'.$item->foto) }}" class="testimonial-img" alt="">
                    <h3>{{ $item->nama }}</h3>
                  </div>
                </div><!-- End testimonial item -->
                @endforeach
  
            </div>
            <div class="swiper-pagination"></div>
          </div>
  
        </div>
      </section><!-- End Testimonials Section -->
  
      <!-- ======= Gallery Section ======= -->
      <section id="gallery" class="gallery">
  
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Gallery</h2>
            <p>Some photos from Our Restaurant</p>
          </div>
        </div>
  
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
  
          <div class="row g-0">
  
            @foreach ($galery as $g)
            <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{ asset('assets/img/galery/'.$g->img) }}" class="gallery-lightbox" data-gall="gallery-item">
                  <img src="{{ asset('assets/img/galery/'.$g->img) }}" alt="" class="img-fluid">
                </a>
              </div>
            </div>
            @endforeach
          </div>
  
        </div>
      </section><!-- End Gallery Section -->
  
      <!-- ======= Chefs Section ======= -->
      <section id="chefs" class="chefs">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Teams</h2>
            <p>Our Proffesional Teams</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in" data-aos-delay="100">
                <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>Walter White</h4>
                    <span>Master Chef</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>Sarah Jhonson</h4>
                    <span>Patissier</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <div class="member" data-aos="zoom-in" data-aos-delay="300">
                <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4>William Anderson</h4>
                    <span>Cook</span>
                  </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Chefs Section -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </div>
        </div>
  
        <div data-aos="fade-up">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1072.5138029372895!2d99.05637513405325!3d2.3343521486342818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e051111b888f7%3A0x7b92db9623ce4f01!2sTepi%20Danau%20Bistro!5e0!3m2!1sid!2sid!4v1714011010601!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>
  
        <div class="container" data-aos="fade-up">
  
          <div class="row mt-5">
  
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
  
                <div class="open-hours">
                  <i class="bi bi-clock"></i>
                  <h4>Open Hours:</h4>
                  <p>
                    Monday-Saturday:<br>
                    11:00 AM - 2300 PM
                  </p>
                </div>
  
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
  
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>
  
              </div>
  
            </div>
  
            <div class="col-lg-8 mt-5 mt-lg-0">
  
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
  
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
@endsection

@section('script-fe')

@endsection