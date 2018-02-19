function auf(key) {
	let el = document.getElementById(key);

	if (el.style.display == 'none') {
		el.style.display = 'block';
		el.setAttribute('aria-expanded', 'true');

//		el.slide('hide').slide('in');
		el.parentNode.class = 'slide';
		let eltern = el.parentNode.parentNode;
		let elternh = eltern.getElementsByTagName('h3');
		elternh.class = 'high';
		let elternbild = eltern.getElementsByTagName('img');
		el.focus();
		elternbild.setAttribute('alt', 'altopen');
		elternbild.setAttribute('src', 'bildzu');
	} else {
		el.setStyle('display', 'none');
		el.setProperty('aria-expanded', 'false');

		el.removeClass('open');
		
		eltern = el.getParent().getParent();
		elternh = eltern.getElement('h3');
		elternh.removeClass('high');
		elternbild = eltern.getElement('img');
		// alert(bildauf);
		elternbild.setProperties( {
			alt : altclose,
			src : bildauf
		});
		elternbild.focus();
	} 
}



/* Suckerfish */

sfHover = function() {
	var sfEls = document.getElementById("navigation").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover); 
