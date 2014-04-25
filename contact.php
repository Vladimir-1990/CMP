<?php

$page = 'contact';
require('include/config.php');
include("header.php");

?>

<div id="content">

    <div class="contact_top">
        <div class="title_box">
            <h1>CONTACT US</h1>
        </div>
        <div class="tabs">
            <div class="box" data-tab="tab_1">
                Australia
            </div>
            <div class="box" data-tab="tab_2">
                India
            </div>
            <div class="box" data-tab="tab_3">
                UK
            </div>
            <div class="box" data-tab="tab_4">
                Canada
            </div>
        </div>
    </div>
    
    <div class="map_holder">
        <div id="tab_1" class="map" >
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7073.474468983232!2d151.92048804782266!3d-27.57066434688564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b965c9d27c7b96f%3A0x821e37433eec3652!2s82+Hampton+St!5e0!3m2!1sen!2s!4v1396917523214" width="1150" height="405" frameborder="0" style="border:0"></iframe>
            <div class="address_info">
                <p>
                    Building 34, Vavreckova 5657,<br />
                    762 17 Zlín.<br />
                    Fax : 01 8000 2626<br />
                    Mobile : 0808 282 787<br />
                </p>
                <a href="#">GET DIRECTIONS</a>
            </div>
        </div>
        <div id="tab_2" class="map" style="visibility:hidden;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7073.474468983232!2d151.92048804782266!3d-27.57066434688564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b965c9d27c7b96f%3A0x821e37433eec3652!2s82+Hampton+St!5e0!3m2!1sen!2s!4v1396917523214" width="1150" height="405" frameborder="0" style="border:0"></iframe>
            <div class="address_info">
                <p>
                    Building 35, Vavreckova 5657,<br />
                    762 17 Zlín.<br />
                    Fax : 01 8000 2626<br />
                    Mobile : 0808 282 787<br />
                </p>
                <a href="#">GET DIRECTIONS</a>
            </div>
        </div>
        <div id="tab_3" class="map" style="visibility:hidden;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7073.474468983232!2d151.92048804782266!3d-27.57066434688564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b965c9d27c7b96f%3A0x821e37433eec3652!2s82+Hampton+St!5e0!3m2!1sen!2s!4v1396917523214" width="1150" height="405" frameborder="0" style="border:0"></iframe>
            <div class="address_info">
                <p>
                    Building 36, Vavreckova 5657,<br />
                    762 17 Zlín.<br />
                    Fax : 01 8000 2626<br />
                    Mobile : 0808 282 787<br />
                </p>
                <a href="#">GET DIRECTIONS</a>
            </div>
        </div>
        <div id="tab_4" class="map" style="visibility:hidden;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7073.474468983232!2d151.92048804782266!3d-27.57066434688564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b965c9d27c7b96f%3A0x821e37433eec3652!2s82+Hampton+St!5e0!3m2!1sen!2s!4v1396917523214" width="1150" height="405" frameborder="0" style="border:0"></iframe>
            <div class="address_info">
                <p>
                    Building 37, Vavreckova 5657,<br />
                    762 17 Zlín.<br />
                    Fax : 01 8000 2626<br />
                    Mobile : 0808 282 787<br />
                </p>
                <a href="#">GET DIRECTIONS</a>
            </div>
        </div>
    </div>
    
    <div class="contact_form">
        <h1>Get in touch with us</h1>
        <form action="" method="post">
            <div class="contact_form_left">
                <input name="name" type="text" class="text_box" placeholder="Full Name" />
                <input name="phone" type="text" class="text_box" placeholder="Phone Number" />
                <input name="email" type="text" class="text_box" placeholder="Email Address" />
            </div>
            <div class="contact_form_right">
                <textarea name="message" class="text_box message" placeholder="Enquiry"></textarea>
            </div>
            <input type="hidden" name="submit" value="1" />
            <input class="submit_button" type="submit" value="Send Message" />
        </form>
    </div>
    <?php
    $submit = $_POST['submit'];
    if($submit == 1)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $to = 'andy@brandmonks.com.au';
        $subject = "Form submission on Cinemadic Web";
        $message = "Contact info recived from Cinemadic Web \n
        name:$name \n
        email:$email \n
        phone:$phone \n
        message:$message
        ";
                        
        mail ($to, $subject, $message);
        echo "<p class='message'>Mail sent, we will get back to you. Thank you</p>";
    }
    ?>
    
</div>

<?php

include("footer.php");

?>