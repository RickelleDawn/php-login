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
                    echo "<p>Welcome " . $_SESSION['userFN'] . " :)</p>";
                } else {
                    echo '<div class="underlay"></div><div class="index-about"><h1>Although very simple, this little project taught me a lot.</h1>
                    <p>Hi! I\'m new to developing and trying my best to add as much value as possible to not only myself, 
                    but the industry as well! Do doodoo in the litter-box, clickityclack on the piano, be frumpygrumpy all 
                    of a sudden cat goes crazy, and meow all night having their mate disturbing sleeping humans
                    Sleep everywhere, but not in my bed pretend you want to go out but then don\'t or hiss and stare at 
                    nothing then run suddenly away so sniff sniff<p> 
                    <p>Jump five feet high and sideways when a shadow moves sit on the laptop dead stare with ears cocked 
                    cat ass trophy sniff all the things but run outside as soon as door open, so be superior. Grab pompom 
                    in mouth and put in water dish paw at your fat belly drool howl uncontrollably for no reason, claw at
                     curtains stretch and yawn nibble on tuna ignore human bite human hand scratch at door to be let outside, 
                     get let out then scratch at door immmediately after to be let back in. </p></div>';
                }

                ?>


            </section>
        </div>
    </div>
</main>



<?php
require "footer.php"
?>