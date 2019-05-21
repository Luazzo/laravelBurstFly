

<!-- SCRIPT -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
<script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
<script type="text/javascript" src="js/jquery-animate-css-rotate-scale.js"></script>
<script type="text/javascript" src="js/fastclick.min.js"></script>
<script type="text/javascript" src="js/jquery.flip.min.js"></script>
<script type="text/javascript" src="js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" src="js/jquery.animate-shadow-min.js"></script>

<script>



	$(document).ready(function() {
		$.localScroll();
		$(".cache").delay(1000).fadeOut(500);

		$("#wrapper-header").delay(1500).animate({opacity:'1',width:'100%'},500);
		$("#wrapper-navbar").delay(2000).animate({opacity:'1',height:'60px'},500);

		$("#main-container-image").delay(2500).animate({opacity:'1'},500);

	});

	/*TRANSITION PAGE*/

	var speed = 'slow';

	$('html, body').hide();

	$(document).ready(function() {
		$('html, body').fadeIn(speed, function() {
			$('a[href], button[href]').click(function(event) {
				var url = $(this).attr('href');
				if (url.indexOf('#') == 0 || url.indexOf('javascript:') == 0) return;
				event.preventDefault();
				$('html, body').fadeOut(speed, function() {
					window.location = url;
				});
			});
		});
	});

	/* DISABLE HOVER EFFECT WHILE YOU SCROLL FOR A SMOOTHY NAVIGATION */

	var body = document.body,
			timer;

	window.addEventListener('scroll', function() {

		clearTimeout(timer);

		if(!body.classList.contains('disable-hover'))
			body.classList.add('disable-hover')

		timer = setTimeout(function(){
			body.classList.remove('disable-hover')
		}, 200);

	}, false);

	/* BOUTON MENU */

	$(document).on('touchstart mouseover', '#stripes', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#stripes").stop().animate({scale:'1.2',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#stripes', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#stripes").stop().animate({scale:'1',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	/* MENU SIDE OPEN */

	var MENUSIDEOPEN = document.getElementById('stripes');

	MENUSIDEOPEN.addEventListener('click', function() {
		$("#main-container-menu").stop().animate({left:'0'},300);
	});

	/* BOUTON CROSS */

	$(document).on('touchstart mouseover', '#cross-menu', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#cross-menu").stop().animate({scale:'1.2',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#cross-menu', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#cross-menu").stop().animate({scale:'1',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	/* MENU SIDE CLOSE */

	var MENUSIDECLOSE = document.getElementById('cross-menu');

	MENUSIDECLOSE.addEventListener('click', function() {
		$("#main-container-menu").stop().animate({'left':'-100%'},300);
	});

	/* BOUTON MENU ARROW-2 */

	$(document).on('touchstart mouseover', '#wrapper-title-2', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#fleche-nav-2").stop().animate({rotate: '90deg',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#wrapper-title-2', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#fleche-nav-2").stop().animate({rotate: '0deg',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	/* BOUTON MENU ARROW-3 */

	$(document).on('touchstart mouseover', '#wrapper-title-3', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#fleche-nav-3").stop().animate({rotate: '90deg',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#wrapper-title-3', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#fleche-nav-3").stop().animate({rotate: '0deg',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	/* BOUTON MENU */

	$(document).on('touchstart mouseover', '#stripes', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#stripes").stop().animate({scale:'1.2',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#stripes', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#stripes").stop().animate({scale:'1',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	/* BOUTON NEXT */

	$(document).on('touchstart mouseover', '#oldnew-next', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#oldnew-next").stop().animate({scale:'1.2',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#oldnew-next', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#oldnew-next").stop().animate({scale:'1',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	/* BOUTON PREV */

	$(document).on('touchstart mouseover', '#oldnew-prev', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#oldnew-prev").stop().animate({scale:'1.2',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#oldnew-prev', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#oldnew-prev").stop().animate({scale:'1',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});


	/* BOUTON PREV */

	$(document).on('touchstart mouseover', '#logo', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#logo").stop().animate({scale:'1.1',opacity:'0.5'},300);

			event.handled = true;
		} else {
			return false;
		}
	});

	$(document).on('touchend mouseout', '#logo', function(event){

		event.stopPropagation();
		event.preventDefault();
		if(event.handled !== true) {

			$("#logo").stop().animate({scale:'1',opacity:'1'},300);

			event.handled = true;
		} else {
			return false;
		}
	});



	/*FORMULAIRE NEWSLETTER*/

	$("form").on("submit", function(event) {
		event.preventDefault();
		$.post("/burstfly/form-burstfly-modified.asp",$("form").serialize(), function(data) {//alert(data);
		});
	});







        /* PRELOADER */

        function preloader() {
            if (document.images) {
                var img1 = new Image();
                var img2 = new Image();
                var img3 = new Image();
                var img4 = new Image();
                var img5 = new Image();
                var img6 = new Image();
                var img7 = new Image();
                var img8 = new Image();
                var img9 = new Image();
                var img10 = new Image();
                var img11 = new Image();
                var img12 = new Image();
                var img13 = new Image();
                var img14 = new Image();
                var img15 = new Image();
                var img16 = new Image();
                var img17 = new Image();
                var img18 = new Image();
                var img19 = new Image();
                var img20 = new Image();

                img1.src = "img/psd-4.jpg";
                img2.src = "img/font-1.jpg";
                img3.src = "img/psd-1.jpg";
                img4.src = "img/psd-2.jpg";
                img5.src = "img/ai-1.jpg";
                img6.src = "img/theme-2.jpg";
                img7.src = "img/psd-3.jpg";
                img8.src = "img/font-2.jpg";
                img9.src = "img/font-3.jpg";
                img10.src = "img/ai-2.jpg";
                img11.src = "img/icons-1.jpg";
                img12.src = "img/ui-1.jpg";
                img13.src = "img/font-5.jpg";
                img14.src = "img/theme-2.jpg";
                img15.src = "img/psd-5.jpg";
                img16.src = "img/icons-3.jpg";
                img17.src = "img/font-4.jpg";
                img18.src = "img/theme-3.jpg";
                img19.src = "img/font-6.jpg";
                img20.src = "img/theme-4.jpg";
            }
        }
        function addLoadEvent(func) {
            var oldonload = window.onload;
            if (typeof window.onload != 'function') {
                window.onload = func;
            } else {
                window.onload = function() {
                    if (oldonload) {
                        oldonload();
                    }
                    func();
                }
            }
        }
        addLoadEvent(preloader);

    </script>