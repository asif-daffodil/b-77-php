<!-- Wrapper container -->
<div class="container py-4">

    <div class="row">
        <div class="col-12 text-center display-4 py-4">Contact Us</div>
        <div class="col-md-6">
            <form id="contactForm">

                <!-- Name input -->
                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                </div>

                <!-- Email address input -->
                <div class="mb-3">
                    <label class="form-label" for="emailAddress">Email Address</label>
                    <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required, email" />
                    <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                    <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                </div>

                <!-- Message input -->
                <div class="mb-3">
                    <label class="form-label" for="message">Message</label>
                    <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
                    <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
                </div>

                <!-- Form submit button -->
                <div>
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>

            </form>
        </div>

        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233721.801931283!2d90.25293082569237!3d23.750832671476907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bfbe6c0bab8b%3A0x8784d7f5150e9ae3!2sAsif%20Abir!5e0!3m2!1sen!2sbd!4v1667029775416!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


</div>