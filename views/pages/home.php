<?php

        ?>
    <center><h1 style="font-family: 'Amatic SC', cursive; font-size: 100px"> Happy crafting!</h1></center>
    <h2 style=" font-family: 'Amatic SC', cursive; font-size: 50px; font-weight: bold; text-align: center;">Our top tutorials:</h2>
    <?php include 'carousel.html'; ?>
    <?php include 'socialsbar.html'; ?>

    <button type="button" class="collapsible">Our </br>Diary</button>
    <div class="content">
        <iframe src="https://calendar.google.com/calendar/embed?height=250&amp;wkst=2&amp;bgcolor=%23B39DDB&amp;ctz=Europe%2FLondon&amp;src=YW15cm9iaW5zb25sZWFybnNAZ21haWwuY29t&amp;src=ZW4udWsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%230B8043&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0" style="border-width:0" width="250" height="250" frameborder="0" scrolling="no"></iframe>
    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }

        </script>
