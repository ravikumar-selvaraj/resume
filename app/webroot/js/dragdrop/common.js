


// end Ajax Form -----------


(function($){

	/** TODO : more cases */
	$.fn.movable = function(o,s) {		
		//s = this.selector; 
		//if(!o.handle) o.handing = $(this).find(o.items);
		//else o.handing = $(this).find(o.items).find(o.handle);
		//o.handing.set('mousedown', function(e) {
		if(o.container) {								
			this.unbind('mousedown').bind('mousedown', function(e) {				
				o.event = e;	
				o.s = $(this).parents(o.items);
				o.t = $(this).parents(o.container);		
				$.fn.move.mousedown(o);				
				return false;
			})
		}
		else {				
			o.t = this;	
			if(!o.handle) o.handing = this.find(o.items);
			else o.handing = this.find(o.items).find(o.handle);
			o.s = this.parents(o.items);
			o.handing.unbind('mousedown').bind('mousedown', function(e) {				
				o.event = e;
				$.fn.move.mousedown(o);				
				return false;
			})
		}
		return this;
	};
	$.fn.move=function(o){if(o.event && o.container){o.t=this.parents(o.container);o.s=this.parents(o.items);return $.fn.move.mousedown(o);}};
	$.fn.move.mousedown=function(o,order){if($.fn.move.lock)return false;$.fn.move.lock=true;o.x=o.event.pageX-o.s[0].offsetLeft;o.y=o.event.pageY-o.s[0].offsetTop;o.px=o.event.pageX;o.py=o.event.pageY;var boxes=!o.boxes?o.t:o.t.find(o.boxes);o.b=[];boxes.each(function(i,box){box=this;box.$=$(box).css($.ie6?'height':'min-height','1px');/*if(!$$.ie6) box.$.css('height','100%');*/box.realLeft=box.$.offset().left;if(boxes.eq(i-1).length)if(boxes.eq(i-1)[0].realLeft>box.realLeft)box.realTop=box.$.offset().top;box.items=[];$(o.items,box).each(function(j){this.$=$(this);this.j=j;this.i=i;this.fullHeight=this.$.height();this.halfHeight=this.fullHeight/2;if(this!=o.s[0])box.items.push(this);});box.maxCount=box.items.length-1;if(box.items.length==0)box.items=null;o.b.push(box);});o.clone=o.f=o.s.clone().css({position:"absolute",zIndex:99999,width:o.s.width(),left:o.s[0].offsetLeft,top:o.s[0].offsetTop});if(o.down)o.down(o);document.onselectstart=function(){return false;};boxes[0].appendChild(o.f.addClass('clone')[0]);o.s.css($.ie6?{visibility:'hidden'}:{opacity:0.2});$(document).unbind("mousemove").bind("mousemove",function(e){o.px=e.pageX;o.py=e.pageY;if(o.boxes)o.f[0].style.left=o.px-o.x+"px";o.f[0].style.top=o.py-o.y+"px";return false;}).unbind("mouseup").bind("mouseup",function(e){clearInterval(o.v);$(document).unbind("mousemove").unbind("mouseup");setTimeout(function(){$.showembed();},200);if($.ie6)o.s.css({visibility:''});else o.s.animate({opacity:1},200);o.f.animate({width:o.s.width(),left:o.s[0].offsetLeft,top:o.s[0].offsetTop},200,function(){o.f.empty().remove();o.f=null;if(o.update)o.update(o);$.fn.move.lock=false;});return false;});setTimeout(function(){$.hideembed();},200);o.v=setInterval(function(e){if(o.boxes){var b=[];for(var i in o.b)if(o.px>o.b[i].realLeft && o.px<o.b[i].realLeft+o.b[i].offsetWidth)b.push(i);if(!b.length) return false;if(b.length>1)i=(o.py>o.b[i].$.offset().top?b[1]:b[0]);else i=b[0];}else i=0;var k=o.b[i];if(!k.items){if(i!=o.s[0].i){o.s[0].i=i;o.s[0].j=0;$(k).prepend(o.s);if(o.change)o.change(o);}return false;}else for(var j in k.items){var top=k.items[j].$.offset().top;if(o.py<(top+k.items[j].halfHeight)){if(j==0 || o.py>top){if(!(i==o.s[0].i && o.s[0].j==parseInt(k.items[j].j-1))){o.s[0].i=i;o.s[0].j=parseInt(k.items[j].j-1);k.insertBefore(o.s[0],k.items[j]);if(o.change)o.change(o);}return false;}}else{if(j==k.maxCount || o.py<(top+k.items[j].fullHeight)){if(!(i==o.s[0].i && o.s[0].j==parseInt(k.items[j].j+1))){o.s[0].i=i;o.s[0].j=parseInt(k.items[j].j+1);k.insertBefore(o.s[0],k.items[j].nextSibling);if(o.change)o.change(o);}return false;}}}return false;},1);return false;};		
})(jQuery);


$.hideembed =function(el, html, embeds) { embeds= $('embed, object', el) 
	if($.browser.msie && el && embeds.length != 0) 
		embeds.parent().each(function(t) { t = $(this);
			t.css({height:$('embed, object',this).height()})[0].html = t.html();
			t.html('').addClass('hiddedembed');
		});
	embeds.css({visibility:'hidden'});
};

$.showembed = function(el, hide) { hide = $('.hiddedembed', el);
	if($.browser.msie && el && hide.length != 0) 
		hide.each(function() { $(this).html(this.html).removeClass('hiddedembed'); });
	$('embed, object',el).css({visibility:'visible'});
};

(function(){ 
	$.getUrlParam = function(param, url) {
		var val = new RegExp(".*\?.*"+param+"=(.+)","g").exec(url);
		if(val) return val[1].split("&")[0];
		else return false;
	};
})(jQuery);

(function(){ 
	$.fn.pulsate = function(p, i, o) {		
		if(!o)o=0;
		if(!p)p=150;
		if(!i)i=4;
		this.animate({opacity:o},p, function() {			
			if(i<=0) return false;
			$(this).pulsate(p+=20, i-=1, (o==0 || i==0? 1 : 0));
		});
	};
})(jQuery);

/**
 * To delay a function call
 */
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();


/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);

/**
 * Track a page view
 */
$.tracking = function(uri) {
	try{
		if (pageTracker) {
			pageTracker._trackPageview(uri);
		}
	} catch(e) {
		
	}
};

/**
 * Track an event
 */
$.trackEvent = function(cat, val, option) {
	try {
		if (pageTracker) {
			pageTracker._trackEvent(cat, val, option);
		}
	} catch (e) {
		
	}
}

$.fn.selectRange = function(start, end) {
return this.each(function() {
    if(this.setSelectionRange) {
        this.focus();
        this.setSelectionRange(start, end);
    } else if(this.createTextRange) {
        var range = this.createTextRange();
        range.collapse(true);
        range.moveEnd('character', end);
        range.moveStart('character', start);
        range.select();
    }
});
};

/** Copy to clipboard **/
var ZeroClipboard = {
	
	version: "1.0.7",
	clients: {}, // registered upload clients on page, indexed by id
	moviePath: '/script/lib/copy/ZeroClipboard.swf', // URL to movie
	nextId: 1, // ID of next movie
	
	$: function(thingy) {
		// simple DOM lookup utility function
		if (typeof(thingy) == 'string') thingy = document.getElementById(thingy);
		if (!thingy.addClass) {
			// extend element with a few useful methods
			thingy.hide = function() { this.style.display = 'none'; };
			thingy.show = function() { this.style.display = ''; };
			thingy.addClass = function(name) { this.removeClass(name); this.className += ' ' + name; };
			thingy.removeClass = function(name) {
				var classes = this.className.split(/\s+/);
				var idx = -1;
				for (var k = 0; k < classes.length; k++) {
					if (classes[k] == name) { idx = k; k = classes.length; }
				}
				if (idx > -1) {
					classes.splice( idx, 1 );
					this.className = classes.join(' ');
				}
				return this;
			};
			thingy.hasClass = function(name) {
				return !!this.className.match( new RegExp("\\s*" + name + "\\s*") );
			};
		}
		return thingy;
	},
	
	setMoviePath: function(path) {
		// set path to ZeroClipboard.swf
		this.moviePath = path;
	},
	
	dispatch: function(id, eventName, args) {
		// receive event from flash movie, send to client		
		var client = this.clients[id];
		if (client) {
			client.receiveEvent(eventName, args);
		}
	},
	
	register: function(id, client) {
		// register new client to receive events
		this.clients[id] = client;
	},
	
	getDOMObjectPosition: function(obj, stopObj) {
		// get absolute coordinates for dom element
		var info = {
			left: 0, 
			top: 0, 
			width: obj.width ? obj.width : obj.offsetWidth, 
			height: obj.height ? obj.height : obj.offsetHeight
		};

		while (obj && (obj != stopObj)) {
			info.left += obj.offsetLeft;
			info.top += obj.offsetTop;
			obj = obj.offsetParent;
		}

		return info;
	},
	
	Client: function(elem) {
		// constructor for new simple upload client
		this.handlers = {};
		
		// unique ID
		this.id = ZeroClipboard.nextId++;
		this.movieId = 'ZeroClipboardMovie_' + this.id;
		
		// register client with singleton to receive flash events
		ZeroClipboard.register(this.id, this);
		
		// create movie
		if (elem) this.glue(elem);
	}
};

ZeroClipboard.Client.prototype = {
	
	id: 0, // unique ID for us
	ready: false, // whether movie is ready to receive events or not
	movie: null, // reference to movie object
	clipText: '', // text to copy to clipboard
	handCursorEnabled: true, // whether to show hand cursor, or default pointer cursor
	cssEffects: true, // enable CSS mouse effects on dom container
	handlers: null, // user event handlers
	
	glue: function(elem, appendElem, stylesToAdd) {
		// glue to DOM element
		// elem can be ID or actual DOM element object
		this.domElement = ZeroClipboard.$(elem);
		
		// float just above object, or zIndex 99 if dom element isn't set
		var zIndex = 99;
		if (this.domElement.style.zIndex) {
			zIndex = parseInt(this.domElement.style.zIndex, 10) + 1;
		}
		
		if (typeof(appendElem) == 'string') {
			appendElem = ZeroClipboard.$(appendElem);
		}
		else if (typeof(appendElem) == 'undefined') {
			appendElem = document.getElementsByTagName('body')[0];
		}
		
		// find X/Y position of domElement
		var box = ZeroClipboard.getDOMObjectPosition(this.domElement, appendElem);
		
		// create floating DIV above element
		this.div = document.createElement('div');
		var style = this.div.style;
		style.position = 'absolute';
		style.left = '' + box.left + 'px';
		style.top = '' + box.top + 'px';
		style.width = '' + box.width + 'px';
		style.height = '' + box.height + 'px';
		style.zIndex = zIndex;
		
		if (typeof(stylesToAdd) == 'object') {
			for (addedStyle in stylesToAdd) {
				style[addedStyle] = stylesToAdd[addedStyle];
			}
		}
		
		// style.backgroundColor = '#f00'; // debug
		
		appendElem.appendChild(this.div);
		
		this.div.innerHTML = this.getHTML( box.width, box.height );
	},
	
	getHTML: function(width, height) {
		// return HTML for movie
		var html = '';
		var flashvars = 'id=' + this.id + 
			'&width=' + width + 
			'&height=' + height;
			
		if (navigator.userAgent.match(/MSIE/)) {
			// IE gets an OBJECT tag
			var protocol = location.href.match(/^https/i) ? 'https://' : 'http://';
			html += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="'+protocol+'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="'+width+'" height="'+height+'" id="'+this.movieId+'" align="middle"><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="false" /><param name="movie" value="'+ZeroClipboard.moviePath+'" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="best" /><param name="bgcolor" value="#ffffff" /><param name="flashvars" value="'+flashvars+'"/><param name="wmode" value="transparent"/></object>';
		}
		else {
			// all other browsers get an EMBED tag
			html += '<embed id="'+this.movieId+'" src="'+ZeroClipboard.moviePath+'" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="'+width+'" height="'+height+'" name="'+this.movieId+'" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="'+flashvars+'" wmode="transparent" />';
		}
		return html;
	},
	
	hide: function() {
		// temporarily hide floater offscreen
		if (this.div) {
			this.div.style.left = '-2000px';
		}
	},
	
	show: function() {
		// show ourselves after a call to hide()
		this.reposition();
	},
	
	destroy: function() {
		// destroy control and floater
		if (this.domElement && this.div) {
			this.hide();
			this.div.innerHTML = '';
			
			var body = document.getElementsByTagName('body')[0];
			try { body.removeChild( this.div ); } catch(e) {;}
			
			this.domElement = null;
			this.div = null;
		}
	},
	
	reposition: function(elem) {
		// reposition our floating div, optionally to new container
		// warning: container CANNOT change size, only position
		if (elem) {
			this.domElement = ZeroClipboard.$(elem);
			if (!this.domElement) this.hide();
		}
		
		if (this.domElement && this.div) {
			var box = ZeroClipboard.getDOMObjectPosition(this.domElement);
			var style = this.div.style;
			style.left = '' + box.left + 'px';
			style.top = '' + box.top + 'px';
		}
	},
	
	setText: function(newText) {
		// set text to be copied to clipboard
		this.clipText = newText;
		if (this.ready) this.movie.setText(newText);
	},
	
	addEventListener: function(eventName, func) {
		// add user event listener for event
		// event types: load, queueStart, fileStart, fileComplete, queueComplete, progress, error, cancel
		eventName = eventName.toString().toLowerCase().replace(/^on/, '');
		if (!this.handlers[eventName]) this.handlers[eventName] = [];
		this.handlers[eventName].push(func);
	},
	
	setHandCursor: function(enabled) {
		// enable hand cursor (true), or default arrow cursor (false)
		this.handCursorEnabled = enabled;
		if (this.ready) this.movie.setHandCursor(enabled);
	},
	
	setCSSEffects: function(enabled) {
		// enable or disable CSS effects on DOM container
		this.cssEffects = !!enabled;
	},
	
	receiveEvent: function(eventName, args) {
		// receive event from flash
		eventName = eventName.toString().toLowerCase().replace(/^on/, '');
				
		// special behavior for certain events
		switch (eventName) {
			case 'load':
				// movie claims it is ready, but in IE this isn't always the case...
				// bug fix: Cannot extend EMBED DOM elements in Firefox, must use traditional function
				this.movie = document.getElementById(this.movieId);
				if (!this.movie) {
					var self = this;
					setTimeout( function() { self.receiveEvent('load', null); }, 1 );
					return;
				}
				
				// firefox on pc needs a "kick" in order to set these in certain cases
				if (!this.ready && navigator.userAgent.match(/Firefox/) && navigator.userAgent.match(/Windows/)) {
					var self = this;
					setTimeout( function() { self.receiveEvent('load', null); }, 100 );
					this.ready = true;
					return;
				}
				
				this.ready = true;
				try{
					this.movie.setText( this.clipText );
					this.movie.setHandCursor( this.handCursorEnabled );
				} catch (err) {
					
				}
				break;
			
			case 'mouseover':
				if (this.domElement && this.cssEffects) {
					this.domElement.addClass('hover');
					if (this.recoverActive) this.domElement.addClass('active');
				}
				break;
			
			case 'mouseout':
				if (this.domElement && this.cssEffects) {
					this.recoverActive = false;
					if (this.domElement.hasClass('active')) {
						this.domElement.removeClass('active');
						this.recoverActive = true;
					}
					this.domElement.removeClass('hover');
				}
				break;
			
			case 'mousedown':
				if (this.domElement && this.cssEffects) {
					this.domElement.addClass('active');
				}
				break;
			
			case 'mouseup':
				if (this.domElement && this.cssEffects) {
					this.domElement.removeClass('active');
					this.recoverActive = false;
				}
				break;
		} // switch eventName
		
		if (this.handlers[eventName]) {
			for (var idx = 0, len = this.handlers[eventName].length; idx < len; idx++) {
				var func = this.handlers[eventName][idx];
			
				if (typeof(func) == 'function') {
					// actual function reference
					func(this, args);
				}
				else if ((typeof(func) == 'object') && (func.length == 2)) {
					// PHP style object + method, i.e. [myObject, 'myMethod']
					func[0][ func[1] ](this, args);
				}
				else if (typeof(func) == 'string') {
					// name of function
					window[func](this, args);
				}
			} // foreach event handler defined
		} // user defined handler for event
	}
	
};






