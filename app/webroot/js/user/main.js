$('.resume-config-tabs a').click(function (e) {
  e.preventDefault();	
 
   /* if ( $(this).hasClass("Open") ) {				
			 $(this).removeClass('Open');
			// $(this).parent('li').removeClass('active');
			 var s=$(this).attr('href');
			 $(s).hide(); 			
			  if ( $('#resume-config-tabs').children().hasClass("active") ) {				
			  					
			  }
	}else{
		
		 	$(this).addClass('Open');*/
		 	$(this).tab('show');  
	/*}*/
	
})



$('.sub-config a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})


