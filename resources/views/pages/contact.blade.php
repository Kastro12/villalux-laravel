<br/><br/>
<div class="container-fluid">
    <div class="row">


        <div class="col-sm-7">
            <div id="contact_form">
                <b id="c">Do you have any questions? Fill in enquiry form. We will get in touch with you soon…</b><br/>
                <form action="{{route('contact')}}" method="post">
                {{ csrf_field() }}
                <label class="col-form-label">Email</label>
                <input id="email" name="email" class="form-control"/>
                <label class="col-form-label">Subject</label>
                <input id="subject" name="subject" class="form-control"/>
                <label class="col-form-label">Message</label>
                <textarea class="form-control" rows="4" id="message" name="message"></textarea><br/>
                <center><input type="submit" value="Send Message" class="send btn btn-lg"></center>
                </form>
            </div>
        </div>



        <div class="col-sm-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d39710.01011351235!2d18.779689091895907!3d42.28996037383968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x134c2b0cff7fced1%3A0xe2bc96ef56f462f4!2sKrimovica%2C+Montenegro!5e0!3m2!1sen!2sus!4v1526594624951" width="100%" height="380px" frameborder="0" style="border:0; border-radius: 5px" allowfullscreen></iframe><br/><br/>
        </div>



    </div>
</div>