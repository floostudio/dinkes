/*!
---------------------------------
	GALLERY
---------------------------------
*/
$(function() {
		// there's the gallery and the trash
		var $gallery = $( "#gallery" ),
			$trash = $( "#trash" );

		// let the gallery items be draggable
		$( "li", $gallery ).draggable({
			cancel: "a.ui-icon", // clicking an icon won't initiate dragging
			revert: "invalid", // when not dropped, the item will revert back to its initial position
			containment: $( "#demo-frame" ).length ? "#demo-frame" : "document", // stick to demo-frame if present
			helper: "clone",
			cursor: "move"
		});
		
		// let the trash be droppable, accepting the gallery items
		$trash.droppable({
			accept: "#gallery > li",
			activeClass: "ui-state-highlight",
			drop: function( event, ui ) {
				deleteImage( ui.draggable );
			}
		});

		// let the gallery be droppable as well, accepting items from the trash
		$gallery.droppable({
			accept: "#trash li",
			activeClass: "custom-state-active",
			drop: function( event, ui ) {
				recycleImage( ui.draggable );
			}
		});
		
		// animate opacity on hover
		$(function() {
			$('.gallery li img').hover(function(){
				$(this).animate({"opacity": "0.6"},{queue:true,duration:200});				
			}, function() {
				$(this).animate({"opacity": "1"},{queue:true,duration:300});
			});
		});

		// image deletion function
		var recycle_icon = "<a href='#' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
		function deleteImage( $item ) {
			$item.fadeOut(function() {
				var $list = $( "ul", $trash ).length ?
					$( "ul", $trash ) :
					$( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );

				$item.find( "a.ui-icon-trash" ).remove();
				$item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
					$item
						.animate({ width: "53px" })
						.find( "img" )
							.animate({ height: "40px" });
				});
			});
		}

		// image recycle function
		var trash_icon = "<a href='#' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";
		function recycleImage( $item ) {
			$item.fadeOut(function() {
				$item
					.find( "a.ui-icon-refresh" )
						.remove()
					.end()
					.css( "width", "122px")
					.append( trash_icon )
					.find( "img" )
						.css( "height", "100px" )
					.end()
					.appendTo( $gallery )
					.fadeIn();
			});
		}

		// resolve the icons behavior with event delegation
		$( "ul.gallery > li" ).click(function( event ) {
			var $item = $( this ),
				$target = $( event.target );

			if ( $target.is( "a.ui-icon-trash" ) ) {
				deleteImage( $item );
			} else if ( $target.is( "a.ui-icon-zoomin" ) ) {
				viewLargerImage( $target );
			} else if ( $target.is( "a.ui-icon-refresh" ) ) {
				recycleImage( $item );
			}

			return false;
		});
	});
	
	
	
/*!
---------------------------------
	GALLERY 2
---------------------------------
*/
// Make items sortable
$(function() {
	$( ".gallery2" ).sortable();
});

// animate opacity on hover
$(function() {
	$('.gallery2 li img').hover(function(){
		$(this).animate({"opacity": "0.6"},{queue:true,duration:200});				
	}, function() {
		$(this).animate({"opacity": "1"},{queue:true,duration:300});
	});
});
	
// Remove item when trash icon is clicked
$(function() {
	
	//Text to display in dialog box
	var ConfirmDeleteText = '<p>Are you sure do you want to delete this image?</p><p>Click <strong>OK</strong> to confirm deletion or <strong>Cancel</strong> to prevent this to happen. </p>';
	$(".dialog_confirm").html( ConfirmDeleteText );
	
	//Options
	$( '.gallery2 .ui-icon-trash' ).click(function() {	
	
		var DeleteThisItem = $( this ).parent('.gallery2 li');
		
		$( ".dialog_confirm" ).dialog({
			modal: true,
			show: "fade",
			hide: "fade",
			buttons: {
				//If is clicked OK, then remove it
				OK: function() {
					$( this ).dialog( "close" );
					$( DeleteThisItem ).hide('fold', 500);
				},
				//If is clicked Cancel, abort operation (don't remove this item)
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		return false;
	});
});


/*!
---------------------------------
	Docs Datatable
---------------------------------
*/
jQuery(document).ready(function() {
    jQuery('#datatable_1docs, #datatable_2docs').dataTable( {
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false
    } );
} );
jQuery(document).ready(function() {
    jQuery('#datatable_req_docs').dataTable( {
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": false,
        "bAutoWidth": false
    } );
} );

/*!
---------------------------------
	Docs Dialog
---------------------------------
*/
$(function() {
	$( "#dialog" ).dialog({
		autoOpen: false,
		show: "blind",
		hide: "explode",
		buttons: {
			OK: function() {
				$( this ).dialog( "close" );
			}
		}
	});

	$( "#opener" ).click(function() {
		$( "#dialog" ).dialog( "open" );
		return false;
	});
});



/*!
---------------------------------
	Home page Chart example
---------------------------------
*/
//<![CDATA[
(function () {

  var
	container = document.getElementById('graph_show_home1'),
    d1 = [[0, 2], [1, 0],[2, 12], [3, 10], [4, 9],[4.5, 11], [5, 9],[7, 12],[8, 8], [9, 16],[10, 14],[11, 17],[12, 12], [14, 13], [14.5, 12], [15, 13.5], [15.5, 11], [16, 14.5], [16.5, 12], [17, 15.5], [17.5, 13], [18, 17.5], [18.5, 10], [20,20], [21, 10]], // First data series
    d2 = [[0, 0],[1, 5], [2, 3], [3, 6], [4, 3.5],[5, 8], [6, 3.9], [7, 9], [8, 6], [9, 10],[10, 5], [11,7], [12, 10], [13,5],[14,15], [15,2], [17, 17], [18, 10], [21,20]],  // Second data series
    i, graph;
	
  // Draw Graph
	graph = Flotr.draw(container, [ 
      { data : d1, label : 'Visits', lines : { fill : true } }, 
      { data : d2, label : 'Activity', lines : { show : true }, points : { show : true } }
    ], {
    xaxis: {
      minorTickFreq: 4
    }, 
    grid: {
      minorVerticalLines: true
    },
	mouse: {
	  track: true,
	  radius: 13,
	},
	colors: ['#2C93E1', '#1C7F8E', '#C71585', '#CD5C5C', '#9440ED'],
	shadowSize: 0,
  });
})();
//]]>


/*!
---------------------------------
	Home page Chart example 2
---------------------------------
*/
//<![CDATA[
(function () {

  var
	container = document.getElementById('graph_show_home2'),
    horizontal = (horizontal = false), // Show horizontal bars
    d1 = [],                                  // First data series
    d2 = [],                                  // Second data series
    point,                                    // Data point variable declaration
    i;

  for (i = 0; i < 4; i++) {

    if (horizontal) { 
      point = [Math.ceil(Math.random()*10), i];
    } else {
      point = [i, Math.ceil(Math.random()*10)];
    }

    d1.push(point);
        
    if (horizontal) { 
      point = [Math.ceil(Math.random()*10), i+0.5];
    } else {
      point = [i+0.5, Math.ceil(Math.random()*10)];
    }

    d2.push(point);
  };
              
  // Draw the graph
  Flotr.draw(
    container,
    [d1, d2],
    {
      bars : {
        show : true,
        horizontal : horizontal,
        shadowSize : 0,
        barWidth : 0.44,
		lineWidth: 1, 
      },
	  grid: {
		outlineWidth: 0
	  },
      mouse : {
        track : true,
        relative : true
      },
      yaxis : {
        min : 0,
        autoscaleMargin : 1
      },
	  colors: ['#6495ED', '#82B23F'],
	  shadowSize: 0
    }
  );
})();
//]]>




