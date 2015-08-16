<div id="footer">
        RPs CMS&copy; 2014. <a href="./admin.php">Admin</a>
</div>
<script type="text/javascript">
	$(function() {
		//menu activation function
    	setNavigation();
		//layzload
    	$("img.lazy").show().lazyload({
    		effect : "fadeIn"
    	});
    	$(window).scroll();
    	//photoslider
    	$(".enlarge").photoSwipe();
	});
	
	function setNavigation() {
    var path =  window.location.pathname;
    //alert(path);
    $('.nav a[href="'+ path +'"]').addClass('active');
    //$('.nav a[href="hu/archive"]').html('megvan');
}
	
</script>
	<script type="text/javascript">
            console.log("Page load took " + (Date.now() - start) + "milliseconds");
             
    </script>
  </body>
</html>