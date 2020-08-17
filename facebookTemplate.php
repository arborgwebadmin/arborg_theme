<?php
    function wpb_hook_javascript_header_fb() {
        ?>
            <script>
			function inject_facebook(link) {
				var menuItems = document.getElementsByClassName('parent-menu-item');
				var i = menuItems.length - 1;
				var prevElem = menuItems[i];
				var container = document.createElement('li');
				container.classList.add('menu-item');
				var fbIcon = document.createElement('a');
				fbIcon.href = link;
				fbIcon.rel = "nofollow";
				fbIcon.target = "_blank";
				fbIcon.classList.add('facebook-link');
				var span = document.createElement('span');
				span.classList.add('ar-icon-facebook');
				fbIcon.append( span );
				container.append( fbIcon );
				prevElem.parentNode.insertBefore(container, prevElem.nextSibling);
			}
			var link = document.getElementById('fb').dataset.link;
			console.log(link);
			if (link) {
				inject_facebook(link);
			}
        
    
        </script>
    <?php
}
add_action('wp_footer', 'wpb_hook_javascript_header_fb');
?>