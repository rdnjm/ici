$( document ).ready(
	function(){
		$( '#search' ).focus();
		
		$( '#search' ).keyup( function(){
			$.post( "func/ajaxFunc.php?search=true", {
				empNum : $( '#search' ).val(),
				searchBy: $( '#searchBy' ).val()
			}, function( data ){
				$( '#tbl' ).html( data );
			});
		})
	}
);