<?php
/**
 * Template Name: Submit Entry
 * 
 * The template for displaying submit entry form
 *
 * @package Twenty_Twenty_One
 * @since Twenty Twenty-One Child 1.0.0
 */

get_header(); ?>

<?php
    // Get competition ID
    global $wp;
    $para = explode('/', $wp->request);
    if ( $post = get_page_by_path( $para[0], OBJECT, 'competition' ) ) {
        $competition_id = $post->ID;
        $competition_title = get_the_title($competition_id);
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <h3 class="text-center"><?php echo $competition_title; ?> Entry Form</h3><br>
            <!-- Form alerts -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>
            <!-- Fail alert -->
            <div class="alert alert-danger d-flex align-items-center d-none" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    Somthing went wrong. try again.
                </div>
            </div>
            <!-- Success alert -->
            <div class="alert alert-success d-flex align-items-center d-none" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Your entry saved successfully. We will get back to you soon.
                </div>
            </div>
            <!-- Entry Form -->
            <div class="card p-5">
            <form class="row g-3 needs-validation" id="save_entry" method="POST" action="<?php echo admin_url('admin-ajax.php'); ?>" novalidate>
                <input type="hidden" name="action" value="save_entry">
                <input type="hidden" name="competition_id" value="<?php echo $competition_id; ?>">
                <div class="col-md-6">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="fname" required>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="lname" required>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    <div class="invalid-feedback email-msg">
                        This field is required.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" id="phone" required>
                    <div class="invalid-feedback phone-msg">
                        This field is required.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                    <div class="invalid-feedback">
                        This field is required.
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary btn-lg" type="submit" id="submit-btn">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        // Send ajax request to save data
        $('#save_entry').ajaxForm({
            beforeSubmit: validate,
            beforeSend: function() {
                // Disable submit button and change button value
                $("#submit-btn").prop('disabled', true);
                $("#submit-btn").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
            },
            success: function(response) {
                if(response.data.save_data == "success") {
                    $('.alert.alert-success').removeClass('d-none');
                } else {
                    $('.alert.alert-danger').removeClass('d-none');
                }
                $("#submit-btn").prop('disabled', false);
                $("#submit-btn").html('Submit');
                $("#save_entry").removeClass('was-validated');
            },
            error: function(response) {
                $('.alert.alert-danger').removeClass('d-none');
                $("#submit-btn").prop('disabled', false);
                $("#submit-btn").html('Submit');
                $("#save_entry").removeClass('was-validated');
            },
            resetForm: true
        });

        function validate(formData, jqForm, options) { 
        
            var first_name = $('input[name=first_name]'); 
            var last_name = $('input[name=last_name]'); 
            var email = $('input[name=email]'); 
            var phone = $('input[name=phone]'); 
            var description = $('textarea[name=description]'); 
        
            // usernameValue and passwordValue are arrays but we can do simple 
            // "not" tests to see if the arrays are empty 
            if (!first_name.val() || !last_name.val() || !email.val() || !phone.val() || !description.val()) { 
                first_name.val(jQuery.trim(first_name.val()));
                last_name.val(jQuery.trim(last_name.val()));
                $uemail = email.val(jQuery.trim(email.val()));
                $uphone = phone.val(jQuery.trim(phone.val()));
                description.val(jQuery.trim(description.val()));

                // Create function for email validation
                function IsEmail(myemail) {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(!regex.test(myemail)) {
                        return false;
                    }else{
                        return true;
                    } 
                }
                
                // Check email validation
                if($uemail.val() != "") {
                    if(IsEmail($uemail.val()) == false) {
                        $('.invalid-feedback.email-msg').html('Enter valid email address.')
                    }
                } else {
                    $('.invalid-feedback.email-msg').html('This field is required.')
                }

                // Check phone validation
                console.log($uphone.val().length);
                if($uphone.val() != "") {
                    if($uphone.val().length != 10 ) {
                        $uphone.val("");
                        $('.invalid-feedback.phone-msg').html('Enter valid 10 digit phone number.')
                    }
                } else {
                    $uphone.val("");
                    $('.invalid-feedback.phone-msg').html('This field is required.')
                }
                
                $("#save_entry").addClass('was-validated');
                return false; 
            }  
        }
    });
</script>

<?php get_footer();
