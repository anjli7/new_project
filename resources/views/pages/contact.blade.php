@extends('layouts.app')

@section('content')

<section class="hero-about">
<div class="hero-overlay">
  <img src="{{ asset('assets/images/contact.jpg') }}" alt="Contact Background" class="hero-img">
  <div class="hero-content container">
      <h1>CONTACT</h1>
      <p>
        We're here to help you with your tax and business needs. Whether
        you have a question, need advice, or want to book a consultation,
        feel free to reach out.
      </p>
   
  </div>
</section>


<!-- contact-section -->
<div class="section get-contact-section">
  <div class="container">
    <div class="main-content">
      <div class="contact-wrapper">

        <section class="contact-info-section">
          <h1 class="contact-heading">Get in Touch</h1>
          <p class="contact-intro">
            Have questions about our services? Need expert financial advice?
            Our team is ready to help you with any inquiries you might have.
          </p>

          <div class="contact-details">
            <div class="contact-detail-item">
              <div class="contact-detail-icon">
                <i class="fas fa-phone-alt"></i>
              </div>
              <div class="contact-detail-content">
                <h3>Call Us</h3>
                <p>+91-9530300195</p>
              </div>
            </div>

            <div class="contact-detail-item">
              <div class="contact-detail-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="contact-detail-content">
                <h3>Email Us</h3>
                <p>prakash.jangidassociates@gmail.com</p>
              </div>
            </div>

            <div class="contact-detail-item">
              <div class="contact-detail-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <div class="contact-detail-content">
                <h3>Visit Us</h3>
                <p>B-1, Second floor, Utkarsh Plaza, Near Shanichar Ji Ka Than, Jodhpur, Rajasthan</p>
              </div>
            </div>

            <div class="contact-detail-item">
              <div class="contact-detail-icon">
                <i class="fas fa-clock"></i>
              </div>
              <div class="contact-detail-content">
                <h3>Opening Hours</h3>
                <p>Monday - Saturday: 11:00 AM - 7:00 PM</p>
              </div>
            </div>
          </div>

          <div class="social-icon-link">
            <h3>Follow Us</h3>
            <div class="social-icons">
              <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </section>

        {{-- Contact Form --}}
        <section class="contact-form-section">
          <h2 class="form-title custom-heading custom-line">Send us a message</h2>

          @if (session('success'))
              <div class="form-message success">{{ session('success') }}</div>
          @endif
          @if (session('error'))
              <div class="form-message error">{{ session('error') }}</div>
          @endif

          <form class="contact-form" method="POST" action="{{route('contact.InsertContact')}}">
            @csrf
            <div class="contact-form__row">
              <div class="contact-form__group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" class="contact-form__input" required>
              </div>
            </div>

            <div class="contact-form__row">
              <div class="contact-form__group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" class="contact-form__input" required>
              </div>
              <div class="contact-form__group">
                <label for="phone">Phone *</label>
                <input type="tel" id="phone" name="phone" class="contact-form__input" required>
              </div>
            </div>

            <div class="contact-form__group">
              <label for="subject">Subject *</label>
              <select id="subject" name="subject" class="contact-form__select" required>
                <option value="">Select a subject</option>
                <option value="general">General Inquiry</option>
                <option value="support">Customer Support</option>
                <option value="billing">Billing Question</option>
                <option value="partnership">Partnership Opportunity</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div class="contact-form__group">
              <label for="message">Message</label>
              <textarea id="message" name="message" class="contact-form__textarea"></textarea>
            </div>

            <button class="contact-form__submit custom-btn" type="submit">
              SEND MESSAGE <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </section>
      </div>
    </div>
  </div>
</div>

<!-- Google Map -->
<section class="map">
  <div class="container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!..." width="100%" height="300" style="border:0;" allowfullscreen loading="lazy"></iframe>
  </div>
</section>

@endsection
