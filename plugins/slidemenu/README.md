Jquery Slide Menu
=================

HOW TO USE

First go to website http://fortawesome.github.io/Font-Awesome/ and download the last version of the Font Awesome

Next, include Font Awesome to your project.

And, include the jquery plugin to your project.
Jquery Quick Access : (code.jquery.com/jquery-1.10.2.min.js)

1- Include jquery-slide-menu.css in head

2- Include jquery-slide-menu.js in after jquery plugin

3 - Use :

    <script type="text/javascript">
    	$(document).ready(function(e) {
            $('.nav-slide').SlideMenu({
    			speedLR: 1000,
    			speedUD: 500,
    			expand: true,
    			collapse: true
    		});
      });
    </script>
    
6- Html template :

    <div class="nav-slide">
        <div class="btn-slide"></div>
        <div class="nav-body">
            <div class="head-slide">Main Menu</div>
            <div class="body-slide">
                <ul class="nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="nav-body">
            <div class="head-slide">Software</div>
            <div class="body-slide">
                <ul class="nav">
                    <li><a href="#">Windows</a></li>
                    <li><a href="#">Linux</a></li>
                    <li><a href="#">Apple Mac</a></li>
                </ul>
            </div>
        </div>
        <div class="nav-body">
            <div class="head-slide">Games</div>
            <div class="body-slide">
                <ul class="nav">
                    <li><a href="#">Wrcraft III</a></li>
                    <li><a href="#">Dota 2</a></li>
                    <li><a href="#">Diablo III</a></li>
                </ul>
            </div>
        </div>
    </div>
