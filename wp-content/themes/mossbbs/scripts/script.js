jQuery(document).ready(
	function()
	{
		_initCycle();
	}
);

function _initCycle()
{
	jQuery('.front-image-list').cycle({ 
	    fx:     'fade', 
	    delay:  -2000 ,
	    timeout: 10000,
	    //autostop : 1
	});
}
