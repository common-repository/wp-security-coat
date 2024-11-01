jQuery( document ).ready( function () {
	
	 
	 	// tabs
	 		var $tabBoxes = jQuery('.wp_seccoat-metaboxes'),
		       $tabLinkActive,
		       $currentTab,
		       $currentTabLink,
		       $tabContent,
		       $hash
                       
	 	//iget hash of a tab
		if(window.location.hash){
	 		$hash = window.location.hash;
	 		$tabBoxes.addClass('hidden');
			$currentTab = jQuery($hash).toggleClass('hidden');
			jQuery('.wp-seccoat-tab-single.nav-tab').removeClass('nav-tab-active');
			jQuery('.wp-seccoat-tab-single.nav-tab[href='+$hash+']').addClass('nav-tab-active');
	 	}
	 	//Tabs on click
	 	jQuery('.wp-seccoat-tab-main.nav-tab-wrapper').on('click', 'a', function(e){
			e.preventDefault();
			$tabContent = jQuery(this).attr('href');
			jQuery('.wp-seccoat-tab-single.nav-tab').removeClass('nav-tab-active');
			$tabBoxes.addClass('hidden');
			$currentTab = jQuery($tabContent).toggleClass('hidden');
			jQuery(this).addClass('nav-tab-active');
			 if(history.pushState) {
				history.pushState(null, null, $tabContent);
			}
			else {
				location.hash = $tabContent;
			}
		});
                //check box styling
                var $elem = jQuery(".wp_seccoat-metaboxes .meta-box-sortables input[type='checkbox']");
                jQuery(".wp_seccoat-metaboxes .meta-box-sortables.ui-sortable").css({"border-left": "5px solid #c0e0ee"});

                //add some async features
                if(jQuery(".wp_seccoat-metaboxes .meta-box-sortables input").attr("checked") == "checked"){
                
                    jQuery(this).closest(".meta-box-sortables").css({"border-left":"5px solid #0083bb"});
                
                }


});