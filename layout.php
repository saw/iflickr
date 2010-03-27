<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title><?php echo $title; ?></title>
   <!-- Combo-handled YUI CSS files: -->
<link rel="stylesheet" href="css/base.css" type="text/css" media="screen" title="no title" charset="utf-8" />
   

</head>
<body>
<div id="doc">

	<div id="viewer">
		<div class="hd">foo</div>
		<div class="bd">

				<?php echo($content); ?>

		</div>
		<div class="ft">footer</div>
	</div>
	<div id="sb">
		foo
	</div>
</div>
</body>
<script type="text/javascript" charset="utf-8">

(function(){
	
var loadHandlers = [];

var bb = function(){
	
	var data = {};
	
	return {
		
		set:function(id, name, value){
			if(data[id]){
				data[id][name] = value;
			}else{
				data[id] = {};
				data[id][name] = value;
			}
		},
		
		get:function(id, name){
			if(data[id]){
				return data[id][name];
			}else{
				return undefined;
			}
		}
		
	}
	
}();

function addListener(el, type, fn){
	if (el.addEventListener){
	  el.addEventListener(type, fn, false); 
	} else if (el.attachEvent){
	  el.attachEvent('onclick', fn);
	}
}

function cancel(e){
	if(e.preventDefault){
		e.preventDefault();
	}else if(e.stopPropagation){
		e.stopPropagation();
	}else{
		window.event.cancelBubble = true;
	    window.event.returnValue = false
	}
}

function handleClick(e){
	cancel(e);
}

var inc = 1;

function generateId(el){
	
	el.id ='auto-' + inc++;

	
}

function handleMouseDown(e){
	cancel(e);	
	
	if (e.target){
		var targ = e.target;
	}else{
		var targ = e.srcElement;
	}
	
	if(!targ.id){
		generateId(targ);
	}
	
	
	targ.style.border = '1px solid red';
	targ.style.position = 'absolute';
	targ.style.top = '100px';
	targ.style.left = '100px';
}


function handleMouseUp(e){
	cancel(e);	
	
	if (e.target){
		var targ = e.target;
	}else{
		var targ = e.srcElement;
	}
	
	if(!targ.id){
		generateId(targ);
	}
	
	
	targ.style.border = '0px';
	targ.style.position = 'relative';
	targ.style.top = '0px';
	targ.style.left = '0px';
}



function init(){
	
	var view = document.getElementById('viewer');
	
	addListener(view, 'click', handleClick);
	addListener(view, 'mousedown', handleMouseDown);
	addListener(view, 'mouseup', handleMouseUp);

}


loadHandlers.push(init);

function handleLoad(){
	var len = loadHandlers.length;
	
	for (var i=0; i < len; i++) {
		loadHandlers[i]();
	};
}

window.onload = handleLoad;

})();
</script>
</html>