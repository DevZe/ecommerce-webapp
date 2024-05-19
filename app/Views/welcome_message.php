<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<!-- HEADER: MENU + HEROE SECTION -->


<!-- CONTENT -->


    <div class="bgimg">
        
        <div class="middle">
            <h1>COMING SOON</h1>
            <hr>
            <p id="demo" style="font-size:30px"></p>
        </div>
        <div class="bottomleft">
            <p>A picture by <a href="https://www.foodiesfeed.com/author/ai-generated/"> Midjourney</a></p>
        </div>
    </div>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <!-- <div class="environment">

        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div> -->

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> Tech-Ink Copyright.</p>

    </div>

</footer>



<!-- SCRIPTS -->
   <script>

    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }







// Set the date we're counting down to
var countDownDate = new Date("Jun 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
  
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  //Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);



</script>

 <?= $this->endSection() ?>
