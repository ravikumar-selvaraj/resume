/**
 * Apply a show/hide options on a widget_view mouse over/out
 * @function $( selector ).widget_options()
 * @return $( selector )
 * @example 
 * <div class="widget_view" onload="$(this).widget_options()">...</div>
 */
(function($){	
	$.fn.widget_options=function(){
		this.bind('mouseover',function(){
			//$(this).find('div.options').show(); 
			if( $('#newUserWidgetHelp').length && $(this).parents('#col-2').length ) {
				if(!window.newUserWidgetHelpLeft) window.newUserWidgetHelpLeft = $('#newUserWidgetHelp').position().left;
				$('#newUserWidgetHelp').stop().animate({ left: window.newUserWidgetHelpLeft -30 }, 150)
			}
				
		}).bind('mouseout',function(){
			//$(this).find('div.options').hide(); //jQuery(this).parents('.portlet').find('h2.move a').hide();
			if( $('#newUserWidgetHelp').length && $(this).parents('#col-2').length ) {
				if(!window.newUserWidgetHelpLeft) window.newUserWidgetHelpLeft = $('#newUserWidgetHelp').position().left;
				$('#newUserWidgetHelp').stop().animate({ left: window.newUserWidgetHelpLeft }, 150)
			}
		});
		return this;
	};
})(jQuery);

function displayTips() {
	$.ajax({
		url: '/' + LOCALE + '/tips/getTips?cv_id=' + user_cv_id,
		success: function(data) {
			if (data.length > 0) {
				$('#tips_container').html(data);
			}
		}
	});
}
$.fn.tip_close = function() {
	var idTip = jQuery(this).closest('.closetip').parent().attr('id');
	$.ajax({
		url: '/' + LOCALE + '/tips/closeTips',
		data:{'tips_id': idTip, 'cv_id' : user_cv_id},
		success : function(){
			$('#' + idTip).hide();
		}
	});
	return this;
};

(function($){	
	$.fn.widget_save=function(o, toDel, mark, mark_url, name, mark_func, moveMark, mark_html) {
		
		if( o.mode == 'add' ) {	
			if(o.data/*.trim()*/ == '') {
				$("#menu").component_reloadMenu(o.module);					
				o.form.popup(false); 
				return this;
			}			
			o.data = $(o.data);			
			if ($('.portlet.default').length > 0) {
				$('.portlet.default').remove();
				$('.info-tips').hide();
				$('#fake-cv').hide();
				$('.col_addModule').show();
				$('#newUserWidgetHelp').show();
			} else if (($('.portlet').length > 2)) {
				$('.col_addModule').hide();
			}
			
			//wname = o.widget.attr("name").split("_");
			//if(wname[1]) wname = wname[1];
			mark_html = $("<div>").css({
				position: 'absolute', left: o.widget.offset().left, top: o.widget.offset().top,
				border: "2px solid #666", background: 'white'
			});
			
			moveMark = function(idSource, idTarget) {
				var portletIds = new Array();
				$("#" + idSource +" .portlet").each( function() {
					portletIds.push($(this).attr('id').split('_')[1]);
				});
				$("#" + idSource +" > .dyb_mark").each(function(){
					if (jQuery.inArray(this.name.split('_')[1], portletIds) == -1) {
						$("#" + idTarget).prepend(this);
					}
				});
			}
			
			mark_func = function() {
				// Move marks to correct column				
				if( $("#col-3 .portlet").length == 0 && $("#col-2 .portlet").length > 0) {
					moveMark('col-2', 'col-3');
				} else if($("#col-2 .portlet").length == 0 && $("#col-3 .portlet").length > 0) {
					moveMark('col-3', 'col-2');
				}
						
				mark.after(o.data.css($.ie6?{height:"1%"}:{opacity:0}).animate($.ie6?{}:{opacity:1}, 1000));	
				o.data.find("div.more a").each(function() {
					if( !$(this).attr("href").match('^http\:\/\/') ) 
						$(this).attr("href", window.uri+$(this).attr("href"));
				});
				
				$("#menu").component_reloadMenu(o.module);
				
				mark_html.css({ width: o.data.width(), height: o.data.height() }).appendTo('body').animate({
					left: o.data.offset().left,
					top: o.data.offset().top
				}, 700, function() {
					$(this).fadeOut(500, function() {
						$(this).remove();
						o.data.parents('.portlet').portlet_reloadForIE();
					});	
				});
				
			};			
			name = o.data.attr("name");					
			mark_url = null;
			mark = null;
			
			
			$( ".dyb_mark[name="+name+"]" ).each(function() { if(!this.href) mark = $(this); else mark_url = $(this); });			
			if(mark_url == null && mark == null) {
				$("#menu").component_reloadMenu(o.module);					
				o.form.popup(false); 
				return this;
			}					
			if(mark == null && mark_url != null) {
				mark = mark_url;
				$.get(mark.attr("href") ,null,function(data, d) { 
					o.data = $(data);
					mark_func();
						
					d = "";
					$('#col-2 .portlet, #col-3 .portlet, #col-4 .portlet').each(function() {
						d += 'portlet_col'+$(this).parent().attr('id').split('-')[1]+'[]='+
						$(this).attr('id').split('_')[1]+'&';
					});	
					setTimeout(function() { $.post(o.data.find('.options .move').eq(0).attr("href"), d); }, 1000);					
				});
			}
			else mark_func();			
			
			o.data.css({position: 'static'});			
			o.data.css({position: 'relative'});
			$('#components .portlet').portlet_reorder();
			$("#portlet_portfolios").portlet_portfolios();
			var overload = o.module+'_after_'+o.mode;
			if($.fn[overload]) {
				if($.fn[overload](o) === false) return this;
			}			
			o.form.popup(false);
			displayTips();
			return this;
		}
		else {				
			if(o.data.replace(/\s/, "")==""){
				o.toDelete = (o.widget.parents(".widgets").find(".widget").length == 1 ? o.widget.parents(".portlet") : o.widget);
				o.toDelete.animate({opacity:0, height:0}, 200, function(){ o.toDelete.remove(); });
	            if(o.after)o.after(o);
				return;
			}
			o.input.removeClass("loading");	
			if( o.data.replace(' ','') == '') {				
				o.toDelete = $('.widget',o.widget.parent()).length == 1 ? o.widget.parent().parent() : o.widget;
				o.toDelete.animate({opacity:0, height:0}, 200, function() { o.toDelete.remove(); });
			}
			o.data = $(o.data)
			o.widget.replaceWith(o.data);
			$("#portlet_portfolios").portlet_portfolios();
			$('#components .portlet').portlet_reorder();			
			//$.fn.widget_transition(o.widget, $(o.data));
			var overload = o.module+'_after_'+o.mode;
			if($.fn[overload]) o.data[overload](o);
			displayTips();
			return this;
		}
			
	};	

	$.fn.widget_delete=function(w) {
		//w = this.parents('.widget_view');
		u = this.parents('.deleteBox').attr('id');
		w = $('#content').find('#'+u).parents('.widget_view');
	
		var overload = w.attr("name").replace('widget_','') + '_delete';
		if($.fn[overload]) if( w[overload](w) === false ) return false;
		$.post(this.attr("href"), null ,function(d) {
			$('#menu').component_reloadMenu(null);
			if($('.widget',w.parent()).length == 1) {				
				w = w.parent().parent();
			}
			// Remove tips from page
			$('.info-tips').hide();
			w.animate({opacity:0, height:0}, 200, function() { 
				w.remove(); 
				if($("#components .portlet").portlet_reorder().length == 0) {
					if (document.location.href != d) {
						document.location = d;
					}
				}
				$.showembed();
			});	
		});		
		return this;
	};

	$.fn.widget_move=function(e) {

		this.move({
			container: '#components .widgets',
			items: '.widget', //handle: '.options .move',
			event: e,
			down: function() {
				if(window.newUserWidgetHelpReady) window.newUserWidgetHelpClose();
			},
			update : function(o,d) { 
				d = "";
				o.t.find('.widget').each(function() {
					d += $('.widget-middle',this).attr('id').split('_')[0]+'[]='+
					$('.widget-middle',this).attr('id').split('_')[1]+'&';
				});	
				$('#components .portlet').portlet_reorder();
				$.post(o.s.find('.options .move').attr("href"), d);					
				
				if($.browser.msie) o.s.css("position", "static");
			}
		});
		return this;
	};
	
	$.fn.widget_form_listitem=function(a,b,c){
		var newables = this.find('div.item-list.new textarea');
		if(newables.length) {
			a = function(e,t) { 
				//alert("a")
				t = $(this).parent();
				clone = t.clone();
				var textarea = clone.find('textarea');
				
				textarea.one('keyup', a);
				//textarea.autogrow();
				textarea.height(15);
				textarea.val("");
				$.fn.form.enhance.emptytest({ type : 'blur', input : textarea });
                // Reset for IE6
				
				clone.find('div.delete').bind('click', b).show();
				
				t.removeClass('new').find('textarea');
				t.after(clone).find('div.move').bind('mousedown', function(e) {
					$(this).move({ container: 'div.item-middle', event:e, items:'div.item-list:not(.new)'});
					return false;
				});
				clone.parents('div.error').removeClass('error').find('span.info').text('');
				/*textarea[0].enhance_form = null; 
				textarea[0].empty = true;
				textarea.form({ enhance:true });*/				
				
			};
			b = function(e,t) { 
				t = $(this).parent();
				t.slideUp(100, function() { t.find('textarea, input').val(''); });
			};
			
			newables.one('keyup', a);
			this.find('div.item-list div.delete').bind('click', b);	
			this.find('div.item-list:not(.new) div.move').bind('mousedown', function(e) {
				$(this).move({ 
					container: 'div.item-middle', 
					event:e, items:'div.item-list:not(.new)',
					change: function(opt) { opt.s.css("opacity", ""); }
				});
				return false;
			});	
		}			
		return this;
	};
	

	$.fn.widget_form = function(o, bordered, formize) {
		o = $.extend({
			self : this.parents('div.widget_view, div.widget_add, div.widget_edit'),
			url : o.mode == 'edit' ? this.addClass('loading').attr('href') : this.attr('href'),
			mode: 'edit',
			config: function(widget, op) 
			{
				if(!widget.length) {
					o.widget = op.popup.find('form')
				}
				else {
					o.widget = widget;	
				}
				if(!o.widget.attr("name")) return false;
				o.module = o.widget.attr("name").replace('widget_','');	
				o.form = !widget.length ? o.widget : o.widget.find('form');
				var overload = o.module+'_form';			
				
				if($.fn[overload]) if( o.widget[overload](o) === false ) return false;
				
				if(o.mode == 'view') { 
					var overload = o.module+'_cancel';					
					if($.fn[overload]) o.widget[overload](o);
					return o.widget;	
				}
				o.form.form({
					enhance: true,
					autogrow: 'textarea',
					success: function(of) { 							
						o.form.widget_save($.extend(of, o));
						var overload = o.module+'_save';	
						if($.fn[overload]) if( o.widget[overload](of) === false ) return false;
						overload = o.module+'_'+o.mode;	
						if($.fn[overload]) o.widget[overload](of);
					},
					errors: function(of) {
						//$.fn.widget_transition(o.widget, o.widget);
					},
					validation : true,
					liveValidation: true,
					before: function(of) { 	
						//$.fn.widget_transition(o.widget);
						of.input[0].old_val = of.input.val(); 
						of.input.val("").addClass('loading');
						of.form.find("form").remove();						
						var overload = o.module+'_before_'+o.mode;
						if($.fn[overload]) if( !o.widget[overload]($.extend(of, o)) ) return false;
					},
					after: function(of) { 		
						$('#components .portlet').portlet_reorder();
						$("#portlet_portfolios").portlet_portfolios();	
						of.input.val(of.input[0].old_val).removeClass('loading'); 
					}
				}).widget_form_listitem();				
				//o.form.find('textarea').autogrow();
				
				o.form.find('a.home_check').check_input();
				//
				return o.widget;
			}
		}, o);		
		
		if(o.mode == 'add') this.popup({ 
			type: this.hasClass('disabled')  ? 'default': 'default', 
			width:  '438px',
			unique: true,
			beforeOpen: function() { $.hideembed(); return true; },
			afterOpen: function(opt) { o.config(opt.popup.find('div.widget_add'), opt); },
			afterClose: function() { $.showembed(); }
		});
		else if(o.mode == 'edit' || o.mode == 'view'  ) {
			//if(o.mode == 'edit') $.fn.widget_transition(o.self);
			$.get(o.url, null, function(data) { 
				data = $(data)
				o.self.replaceWith(data);
				o.config(data)
				//if(o.mode == 'edit') o.config( $.fn.widget_transition(o.self, $(data)) );			
				$('#components .portlet').portlet_reorder();
				$("#portlet_portfolios").portlet_portfolios();
				//o.after(o);
			});
		}
		return this;
	};
	
	$.fn.widget_unform = function(o) { return this.widget_form({ mode: 'view' }); }
	
	$('#content').delegate('div.widget_view','mouseenter', function(){ 
		//$(this).find('div.options').show(); 
		if( $(this).parent().parent().find('#newUserWidgetHelp').length ) {
			$('#newUserWidgetHelp').stop().animate({ left: -202 }, 150)
		}
	});
	$('#content').delegate('div.widget_view','mouseleave', function(){ 
		//$(this).find('div.options').hide();
		if( $(this).parent().parent().find('#newUserWidgetHelp').length ) {
			$('#newUserWidgetHelp').stop().animate({ left: -172 }, 150)
		}
	});
	$('#content').delegate('div.widget_view','dblclick', function() { $(this).find("a.edit").trigger('click'); return false; });
	$('#content').delegate('div.widget_view div.options a.move', 'mousedown', function(e) { $(this).widget_move(e); return false; }); 
	$('#content').delegate('div.widget_view div.options a.delete','click', function() {
		$.nmManual(this, {
			
		});
		return false;
	});
	
	$('body').delegate('.deleteBox div a','click', function() { $(this).widget_delete(); return false; });
	$('#content').delegate('div.widget_view div.options a.edit','click', function() { 
		var num = $(this).parents('.widget').prevAll('.widget').length + 1;
		$.tracking( '/owner/event/wysiwyg/' + $(this).parents('div.widget_view').attr('name').replace('widget_','') +'/'+num+'/edit/' );
		$(this).widget_form({ mode: 'edit' }); 
		return false; 
	});
	$('body').delegate('div.widget_add div.options2 a','click', function() { 
		$.tracking( '/owner/event/wysiwyg/' + $(this).parents('div.widget_add').attr('name').replace('widget_','') + '/0/cancel/' );
		$(this).popup(false); 
		return false; });
	$('#content').delegate('div.widget_edit a.more_details','click', function() { $(this).target_slide(); return false; });
	$('body').delegate('div.widget_add a.more_details','click', function() { $(this).target_slide(); return false; });
	$('#content').delegate('div.widget_edit div.options2 a','click', function() { 
		var num = $(this).parents('.widget').prevAll('.widget').length + 1;
		$.tracking( '/owner/event/wysiwyg/' + $(this).parents('div.widget_edit').attr('name').replace('widget_','') +'/'+num+ '/cancel/' );
		$(this).widget_unform(); 
		return false; 
	});	
	
})(jQuery);













/*$.fn.widget_transition = function(widget, newwidget, loading, newoverflow, same) {
var overflow = widget.find(".bordered:first"); if( !overflow.length) overflow = widget;
if(!newwidget) {
	
	var helper = widget.clone().css({ opacity: 0, position: 'absolute', left:-1, top:-1, height: widget.height(), width: widget.width() })
	var coverflow = helper.find(".bordered:first"); if( !coverflow.length) coverflow = helper;
	coverflow.height(overflow.height()).html('<div style="background:url(/images/css/base/30.gif) center center no-repeat;width:100%;height:100%"></div>')
	helper.appendTo(widget);
	helper.stop(true, true).animate({ opacity: 1 }, 150);
	widget[0].helper = helper;
	widget[0].helperOverflow = coverflow;
}
else {	
	same = widget[0] == newwidget[0];
	if(!same) {
		newoverflow = newwidget.find(".bordered:first"); if( !newoverflow.length) newoverflow = newwidget;				
		widget.before(newwidget.css({ opacity: 0, height: 'auto', width: widget.width(), position: 'absolute', top: 0, left: 0}));
	}
	else newoverflow = overflow;
	
	widget[0].helperOverflow.stop(true, true).animate({ height: newoverflow.height() }, 250);
	overflow.stop(true, true).animate({ height: newwidget.height() }, 250, function() {
		if(!same) {		
			widget.remove();
			newwidget.css({ opacity: '', height: '100%', width: '', position: 'relative', top:0, left:0 })
			//newoverflow.find('>*').css({ opacity: 0 });
			newwidget.show();				
		}
		else {
			widget[0].helper.stop().animate({ opacity: 0 }, 150, function() { $(this).remove(); } ); 				
		}					
	});
	return newwidget;
}
return widget;
}*/





