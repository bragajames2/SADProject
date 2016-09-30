
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch([
                    "../Virtual-Classroom/login-page/assets/img/backgrounds/bg2.jpg"
	              , "../Virtual-Classroom/login-page/assets/img/backgrounds/bg3.jpg"
	              , "../Virtual-Classroom/login-page/assets/img/backgrounds/bg4.jpg"
                  , "../Virtual-Classroom/login-page/assets/img/backgrounds/bg5.jpg"
                  , "../Virtual-Classroom/login-page/assets/img/backgrounds/bg6.jpg"
	             ], {duration: 3000, fade: 750});
    
    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    
});
