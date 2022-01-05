@extends('layouts.frontend')

@section('content')
    <!-- CONTACT SECTION START-->
    <section id="contact" class="adbirt-contact-area" data-stellar-background-ratio="0.3"
        style="background-image:url(public/assets-revamp/img/slider/33.jpg);background-size:cover; background-position: fixed !important; background-repeat: no-repeat !important;">

        <div class="adbirt-home-overlay adbirt-section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-xl-6">
                        <div class="adbirt-section-title text-center wow zoomIn" data-wow-duration="1s" data-wow-delay="0.3s"
                            data-wow-offset="0">
                            <br>
                            <br>
                            <h2 class="text-white">Contact Us</h2>
                            <p class="text-white">For more information and inquiry, kindly send us a message.</p>
                        </div>
                    </div>
                    <!--- END COL -->
                </div>
                <!--- END ROW -->


                <div class="row clearfix">
                    <div class="col-lg-5 pr-lg-5">
                        <div class="adbirt-contact-info">
                            <div class="adbirt-section-title adbirt-section-title2">
                                <h2 class="text-white">Our Address</h2>
                            </div>

                            <div class="adbirt-contact-details">
                                <i class="fa fa-home"></i>
                                <h4>Adbirt Headquarters</h4>
                                <p>No 13 Aire Close, <br /> Ellesmere port, CH653DW</p>
                                <p class="ml-5">&nbsp;&nbsp; Chester, United Kingdom</p>
                            </div>

                            <div class="adbirt-contact-details">
                                <i class="fa fa-phone"></i>
                                <h4>Mobile Number</h4>
                                <p><a target="_blank" href="https://wa.me/447312906574">+44-7312-906574 </a></p>
                            </div>

                            <div class="adbirt-contact-details">
                                <i class="fa fa-envelope"></i>
                                <h4>Email Address</h4>
                                <p><a target="_blank" href="mailto:info@adbirt.com">info@adbirt.com</a></p>
                            </div>
                            <h4 class="text-white">Quick Connect</h4>
                            <div class="adbirt-footer-social-icon mt-3">
                                <a target="_blank" href="https://facebook.com/AdbirtHQ" class="icon"> <i
                                        class="fab fa-facebook"></i>
                                </a>

                                <a target="_blank" href="https://www.instagram.com/adbirthq/" class="icon"> <i
                                        class="fab fa-instagram"></i>
                                </a>

                                <a target="_blank" href="https://twitter.com/Adbirt_HQ" class="icon"> <i
                                        class="fab fa-twitter"></i> </a>
                            </div>
                        </div>
                        <!--- END CONTACT -->
                    </div>
                    <!--- END COL -->

                    <div class="col-lg-7 col-12 d-block mx-auto my-auto" data-aos="fade-up">
                        <div class="contact">
                            <h4>Send a Message</h4>
                            <form id="contact-form" class="adbirt-contact-form form" method="POST"
                                action="https://www.adbirt.com/api/send-mail">

                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control" id="form_email"
                                            placeholder="Your Email" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="subject" class="form-control" id="subject"
                                            placeholder="Your Subject" required="required">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="mobile" class="form-control" id="mobile"
                                            placeholder="Your Mobile" required="required">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <textarea rows="6" name="message" class="form-control" id="message"
                                            placeholder="Your Message" required="required"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-left adbirt-contact-btn">
                                            <button type="submit" value="Submit Now" name="submit" id="submitButton"
                                                class="btn bg-primary-color text-white" title="Submit Your Message!">Send
                                                Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div id="form-message" class="alert alert-danger mt-2 d-none" role="alert">
                                Error Message
                            </div>

                        </div>
                    </div><!-- END COL -->
                </div>
                <!--- END ROW -->
            </div>
            <!--- END CONTAINER -->
        </div>
        <!--- END OVERLAY -->
    </section>
    <!-- CONTACT SECTION END-->
@stop

@section('script')
    <script>
        document.querySelector('form').addEventListener('submit', (e) => {
            const alertBox = document.querySelector('#form-message');

            const name = String(document.querySelector("[name='name']").value);
            const email = String(document.querySelector("[name='email']").value);
            const subject = String(document.querySelector("[name='subject']").value);
            const mobile = String(document.querySelector("[name='mobile']").value);
            const message = String(document.querySelector("[name='message']").value);

            const body = 'Name: ' + name + '\n' +
                'Email: ' + email + '\n' +
                'Subject: ' + subject + '\n' +
                'Phone Number: ' + mobile + '\n\n\n' + message;

            fetch('https://adbirt.com/api/send-mail', {
                method: 'POST',
                body: new URLSearchParams({
                    fromEmail: email,
                    fromName: name,
                    subject,
                    body
                }),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(async (res) => {
                console.log(res);

                const json = await res.json();
                console.log(json);
            }).catch((err) => {
                alertBox.classList.contains('d-none') && alertBox.classList.add('d-block');
                alertBox.innerHTML = 'An error occurred';
                setTimeout(() => {
                    alertBox.classList.contains('d-block') && alertBox.classList.add('d-none');
                }, 3000);

                console.error(err);
            });

        });
    </script>
@stop
