 inputs = document.querySelectorAll( '.fake_placeholder input' );

inputs.forEach( input => {
	//cuando entramos en el input 
	input.onfocus = ( ) => {
		//al elemento anterior (el span) le agregamos la clase que la reubica en top
		input.previousElementSibling.classList.add( 'reubicar' );
	}
	
	//cuando salimos del input
	input.onblur = ( ) => {
		//si no hay texto, le quitamos la clase reubicar, 
		//para que se superponga con el input
		if( input.value.trim( ).length == 0 )
		input.previousElementSibling.classList.remove( 'reubicar' );

	}

} );