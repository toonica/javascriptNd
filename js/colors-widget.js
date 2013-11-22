 $(function() {
	$.widget( "custom.randomColors", {

		// default options
		options: {
			defaultColor: "#658f45"
		},
		
		// the constructor
		_create: function() {
		
			this.element
				.addClass( "color-box" )
				.disableSelection()
				.css('background-color', this.options.defaultColor);
			
			this.button = $( "<button>", {
				text: "Random"
			})
			.appendTo( this.element );
			
			this._on( this.button, {
				click: "getRandomColor"
			});
			
		},
		
		// method to submit data
		getRandomColor: function( event ) {
			var element = this.element;
			$.get( "colors.php", function( data ) {
				element.css('background-color', data);
			});
		},
		
		// clean up
		_destroy: function() {
			// remove generated elements
			this.button.remove();
		},
		
		// set a hash of all options 
		_setOptions: function() {
			// _super and _superApply handle keeping the right this-context
			this._superApply( arguments );
		},
		
		// called for each individual option 
		_setOption: function( key, value ) {
			this._super( key, value );
		}
	
	});
});