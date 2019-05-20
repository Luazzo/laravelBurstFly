
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
    <script type="text/javascript" src="js/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/fastclick.min.js"></script>
	<script type="text/javascript" src="js/jquery.animate-colors-min.js"></script>
	<script type="text/javascript" src="js/jquery.animate-shadow-min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script>

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