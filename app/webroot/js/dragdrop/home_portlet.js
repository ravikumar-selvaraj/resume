/**
 * Apply a portlet_view to reorder each widget
 * @function $( selector ).portlet_reorder()
 * @return $( selector )
 * @example 
 * $("#components .portlet").portlet_reorder();
 */
(function($){	

	$.fn.portlet_reorder=function(){
		this.each(function(i,count,ncol){
			i=0;
			var widgets=$(this).find('div.widget');
			count=widgets.length-1;
			widgets.each(function(t){
				t=$(this);				
				t.removeClass('notlast').removeClass('first').removeClass('last');
				if(i==0)t.addClass('first');
				if(i>=count)t.addClass('last');
				else t.addClass('notlast');i++;
			});
		});
		return this;
	};

	$.fn.portlet_move=function(e) {	
		this.move({
			container:'#components > .middle',event: e,items:'.portlet',boxes:'#col-2, #col-3, #col-4',
			change: function(o){
				o.ischanged = true;
				if(o.s.prev().hasClass('col_addModule')) {
					o.s.prev().before(o.s);
				}
				if (o.s.parent().is('#col-4') && $('#col-resize-2').is(':hidden') ) {
					if( jQuery('#col-3_addModule').length ) jQuery('#col-3_addModule').before(o.s);
					else $('#col-3').append(o.s);
				}
			},			
			update:function(o,d) {			
				if(o.ischanged) {
					d = "";						
					$('#col-2 .portlet, #col-3 .portlet, #col-4 .portlet').each(function() {
						var col = $(this).parent();
						var pname = $(this).attr("id");
						d += 'portlet_col'+col.attr('id').split('-')[1]+'[]='+pname.split('_')[1]+'&';
						
						// Temp patch for redim portfolio images
						if(pname == "portlet_portfolios") {
							$(this).portlet_portfolios();
						}						
					});		
					$.post(o.s.find('.options .move').eq(0).attr("href"), d);
					o.ischanged = false;
					o.s.portlet_reloadForIE();
				}				
			}
		});
		return this;
	};
	
	$.fn.portlet_portfolios=function(e) {	
		var width = this.width();	
		var data = this.find(".galery_view object");
		if(!data.length) return this;					
		if(width<370){									
			data.css("width", 240).css("height", 180).attr("data", data.attr("data").replace("_mid.xml", "_tn.xml"));
		}
		else{
			data.css("width", 380).css("height", 300).attr("data", data.attr("data").replace("_tn.xml", "_mid.xml"));
		}
		return this;
	};

	$.fn.portlet_reloadForIE=function(e, self) {	
		if($.browser.msie) {			
			self = $(this);
			var id = self.attr("id")
			if(id) {
				id = id.replace("portlet","widget");
				var dyb_mark = $("#components .dyb_mark[name="+id+"]");
				if(dyb_mark.length && dyb_mark.attr("href")) $.post(dyb_mark.attr("href"), null, function(data){
					data = $(data)
					self.replaceWith( data );
					var img = data.find('div.image_view img');	
					if(img.length) img.image_max_size(img.hasClass('description') ? '70%': null);
				});
			}
		}
	};
	
	$('#content').delegate('div.portlet > .move', 'mousedown', function(e) { $(this).portlet_move(e); return false; });
	$('#content').delegate('div.portlet > .move', 'mousemove', function(e) { $('#move-helper').css({ display: 'block', left: e.clientX + 12, top: e.clientY - 18 + ($.browser.msie?document.documentElement.scrollTop:window.pageYOffset) }); });
	$('#content').delegate('div.portlet > .move', 'mouseout', function(e) { $('#move-helper').hide(); });
	$('#content').delegate('div.portlet', 'mouseover', function(e) { $(this).find('> a.add').show(); });
	$('#content').delegate('div.portlet', 'mouseout', function(e) { $(this).find('> a.add').hide(); });
	$('#content').delegate('div.level2 div.widgets > a.add, div.portlet > a.add', 'click', function(e) { 
		if( $(this).parents('#contacts, #blog_0').length ) return;
		$(this).widget_form({ mode: 'add' }); 
		$.tracking( '/owner/event/wysiwyg/' + $(this).parents('.portlet')[0].id.replace('portlet_','') + '/add' );
		return false; 
	});
	$('#content').delegate('div.portlet > a.delete', 'click', function(e) { 
		$(this).target_fade(); return false;
	});
	
})(jQuery);





