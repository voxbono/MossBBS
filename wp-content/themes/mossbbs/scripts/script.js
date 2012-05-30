jQuery(document).ready(
	function()
	{
		_initCycle();
	}
);

function _initCycle()
{
	jQuery('.ngg-galleryoverview ul').cycle({ 
	    fx:     'scrollDown', 
	    delay:  -2000 ,
	    timeout: 10000,
	    //autostop : 1
	});
}
