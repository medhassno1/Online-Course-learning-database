	var tabSelect = new Array();
	var tabContent = new Array();

	function init() {

      // Grab the tab links and content divs from the page when loaded
      var tabListItems = document.getElementById('tabNav').childNodes;
      for ( var i = 0; i < tabListItems.length; i++ ) {
        if ( tabListItems[i].nodeName == "LI" ) {
          var tabLink = getFirstChildWithTagName( tabListItems[i], 'A' );
          var id = getHash( tabLink.getAttribute('href') );
          tabSelect[id] = tabLink;
          tabContent[id] = document.getElementById( id );
        }
      }

      // Assign onclick events to the tab links, and
      // highlights the first tab
      var i = 0;

      for ( var id in tabSelect ) {
        tabSelect[id].onclick = showTab;
        tabSelect[id].onfocus = function() { this.blur() };
        if ( i == 0 ) tabSelect[id].className = 'selected';
        i++;
      }

      // Only show first tab content
      var i = 0;

      for ( var id in tabContent ) {
        if ( i != 0 ) tabContent[id].className = 'tabContent hide';
        i++;
      }
    }

    function showTab() {
      var selectedId = getHash( this.getAttribute('href') );

      // Highlight the selected tab, and darken all others.
      // Also show the selected content div, and hide all others.
      for ( var id in tabContent ) {
        if ( id == selectedId ) {
          tabSelect[id].className = 'selected';
          tabContent[id].className = 'tabContent';
        } else {
          tabSelect[id].className = '';
          tabContent[id].className = 'tabContent hide';
        }
      }

      // Stop the browser following the link
      return false;
    }

    function getFirstChildWithTagName( element, tagName ) {
      for ( var i = 0; i < element.childNodes.length; i++ ) {
        if ( element.childNodes[i].nodeName == tagName ) return element.childNodes[i];
      }
    }

    function getHash( url ) {
      var hashPos = url.lastIndexOf ( '#' );
      return url.substring( hashPos + 1 );
    }