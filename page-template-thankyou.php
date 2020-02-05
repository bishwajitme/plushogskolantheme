<?php
/**
 *  Template Name: Thanks You page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates

 */
get_header();
?>

<div  class="row">

	<div id="primary" class="content-area col-12 col-lg-8">

		<main id="main" class="site-main pr-5">


          <?php

          while ( have_posts() ) :
             the_post();

             get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
             if ( comments_open() || get_comments_number() ) :
                comments_template();
        endif;

		endwhile; // End of the loop.
		?>

		
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
?>
</div><!-- #row -->
<?php 

$blog_id = get_current_blog_id();
if($blog_id == 2){
    $Apiurl = 'https://www.emg-srs.com/api/v1.0/candidate/?ApiKey=F71C22F2-48DD-4138-8E86-4E299C61F145&Channel=47';
}
if($blog_id == 3){
    $Apiurl = 'https://www.emg-srs.com/api/v1.0/candidate/?ApiKey=5ED87713-B5E0-4B09-8630-CD6D550C5468&Channel=47';
}
if($blog_id == 4){
    $Apiurl = 'https://www.emg-srs.com/api/v1.0/candidate/?ApiKey=F1D6D6D8-ECC3-4E02-BB46-54111EB52206&Channel=47';
}

$firstname = sanitize_text_field($_POST['f_name']);

$lastname = sanitize_text_field($_POST['l_name']);



$rawemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (filter_var($rawemail, FILTER_VALIDATE_EMAIL)) {
    $email = sanitize_email(trim( $_POST['email']));
} else {
    //echo $_POST["email"].' is not a valid email address';
}


$phone = sanitize_text_field($_POST['phone']);
$str = $_POST['utbilding_name'];
//echo $str;
if($str !=""){
    foreach ($str as $a){
    //$enquery = [];
        $location = explode("~",$a);
        $enquery[] = array
        (
            "Location"=> trim($location[1], ' '),
            "Education"=> $location[0],
        );

        $data = array(
            "FirstName"=> $firstname,
            "LastName"=> $lastname,
            "Email"=> $email,
            "Phone"=>$phone,
            "NamedEnquiries"=>$enquery
        );

        $data_json = json_encode($data, JSON_UNESCAPED_UNICODE );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Apiurl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);
    }?>

    <script>
       dataLayer.push({event: 'signupform:sent'});
   </script>

<?php }
get_footer();