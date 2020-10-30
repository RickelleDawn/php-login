<?php
require "header.php"
?>



<main>
    <div class="index-bg">
        <div class="wrapper-main">
            <section class="section-default">
                <?php



                // checks to see if a session variable is active to indicate user being logged in
                if (isset($_SESSION['userId'])) {
                    echo "<div class='index-about'><h1>Welcome " . $_SESSION['userFN'] . "!</h1><p>
                    Thank you so much for taking the time to create an account. In the nicest way possible, I hope you encountered
                     every error possible while trying. 😋 </p> <p>If you happened to notice anything I forgot, please let me know!</p>";
                } else {
                    echo '<div class="underlay"></div><div class="index-about"><h1>Although very simple, this little project taught me a lot.</h1>
                    <p> I decided to learn PHP after realizing that almost 80% of of websites are 
                    powered by PHP, including big names like FaceBook, Wikipedia, and of course WordPress. After being
                     around for more than 25 years, it has certainly proven itself a strong contender in the realm of programming languages. <p> 
                    <p>This project was built from scratch using PHP, MySQL, HTML, and CSS. For now, it is a very basic app with the sole purpose
                     of allowing users to create a new account, log in, and log out. Please, dont just check it out- live recklessly! Button smash 
                     and see if anything breaks.. and let me know what you think!</p></div>';
                }

                ?>


            </section>
        </div>
    </div>
</main>



<?php
require "footer.php"
?>