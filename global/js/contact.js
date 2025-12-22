/***************************************************************/
/******** Select() all inputs *********/
/***************************************************************/
jQuery(document).ready(function() {
	//Focus on first form field
	jQuery('form').focus_first();

	//Select text inside field when in focus
	var frmFields = jQuery('input');
	frmFields.focus( function() { this.select(); } );
	
	//Highlight each form field
	jQuery('input,select,textarea').bind('focus', function() { jQuery(this).addClass('focus_field'); });
	jQuery('input,select,textarea').bind('blur', function() { jQuery(this).removeClass('focus_field'); });


});



//*** FORMAT PHONE FIELD
	var n;
	var p;
	var p1;
	function ValidatePhone() {
		p = p1.value
		if (p.length == 3) {
			pp = p;
			d4 = p.indexOf('(')
			d5 = p.indexOf(')')
			if (d4 == -1) {
				pp = "("+pp;
			}
			if (d5 == -1) {
				pp = pp + ")";
			}
			document.contactForm.phone.value="";
			document.contactForm.phone.value=pp;
			document.getElementById('phone').maxLength=13;
		}
		if (p.length > 3) {
			d1 = p.indexOf('(')
			d2 = p.indexOf(')')
			if (d2 == -1){
				l30 = p.length;
				p30 = p.substring(0,4);
				p30 = p30+")"
				p31 = p.substring(4,l30);
				pp = p30+p31;
				document.contactForm.phone.value="";
				document.contactForm.phone.value=pp;
			}
		}
		if (p.length > 5) {
			p11 = p.substring(d1+1,d2);
			if (p11.length > 3){
			p12 = p11;
			l12 = p12.length;
			l15 = p.length
			p13 = p11.substring(0,3);
			p14 = p11.substring(3,l12);
			p15 = p.substring(d2+1,l15);
			document.contactForm.phone.value="";
			pp = "("+p13+")"+p14+p15;
			document.contactForm.phone.value=pp;
		}
		l16 = p.length;
		p16 = p.substring(d2+1,l16);
		l17 = p16.length;
		if (l17 > 3 && p16.indexOf('-') == -1) {
			p17 = p.substring(d2+1,d2+4);
			p18 = p.substring(d2+4,l16);
			p19 = p.substring(0,d2+1);
			pp = p19 + p17 + "-" + p18;
			document.contactForm.phone.value="";
			document.contactForm.phone.value=pp;
		}
	}
		setTimeout(ValidatePhone,100)
	}
	function getIt(m){
		n=m.name;
		//p1=document.forms[0].elements[n]
		p1=m
		ValidatePhone()
	}
// END FORMAT PHONE FIELD


//** FOCUS FIRST FORM ELEMENT
	jQuery.fn.focus_first = function() {
		var elem = jQuery('input:visible', this).get(0);
		var select = jQuery('select:visible', this).get(0);
		
		if (select && elem) {
			if (select.offsetTop < elem.offsetTop) {
			  elem = select;
			}
		}
		
		var textarea = jQuery('textarea:visible', this).get(0);
		if (textarea && elem) {
			if (textarea.offsetTop < elem.offsetTop) {
			  elem = textarea;
			}
		}
		
		if (elem) {
			elem.focus();
			jQuery(elem).addClass('focus_field');
		}
		return this;
	}


/***************************************************************/
/******** CHARACTER COUNTER AND AUTOEXPANDING TEXTAREA *********/
/***************************************************************/
var mce = {};

mce.NUMBER_OF_CONTROL_ROWS = 3;
mce.MAX_NUMBER_OF_CONTROL_ROWS = 12;

mce.init = function() {};

mce.counter = function(boxType,thisField,cntfield,maxlimit)
{
	switch(boxType) {
		case "multiText":
			var textPercentBox = (maxlimit)*.95; // this converts to 5% characters left
			cntfield.style.visibility='visible';
			
			thisField.onblur = function() {
				cntfield.style.visibility='hidden';	
				jQuery(this).removeClass('focus_field');
			}
			
			// colorize 5 percent warning
			if (thisField.value.length >= textPercentBox) {
				cntfield.style.color='#C60000';
				cntfield.style.fontWeight='bold';
			} else if (thisField.value.length <= textPercentBox)  {
				cntfield.style.color='';	
				cntfield.style.fontWeight='';	
			}
			// char counter
			if (thisField.value.length > maxlimit) {
				thisField.value = thisField.value.substring(0, maxlimit); // if too long...trim it!
			} else {
				cntfield.value = maxlimit - thisField.value.length; // otherwise, update 'characters left' counter
			}
			mce.autoExpand(thisField, mce.NUMBER_OF_CONTROL_ROWS);
		break;
		case "inputText":
			var inputPercentBox	= (maxlimit)*.95; // this converts to 5% characters left
			cntfield.style.visibility='visible';
			
			thisField.onblur = function() {
				cntfield.style.visibility='hidden';	
				jQuery(this).removeClass('focus_field');

			}
			
			// colorize 5 percent warning
			if (thisField.value.length >= inputPercentBox) {
				cntfield.style.color='#C60000';
				cntfield.style.fontWeight='bold';
			} else if (thisField.value.length <= inputPercentBox)  {
				cntfield.style.color='';
				cntfield.style.fontWeight='';
			}
			// char counter
			if (thisField.value.length > maxlimit) {
				thisField.value = thisField.value.substring(0, maxlimit); // if too long...trim it!
			} else {
				cntfield.value = maxlimit - thisField.value.length; // otherwise, update 'characters left' counter
			} 		
		break;
	}
}


mce.autoExpand = function(t,minrows) 
{
	a = t.value.split('\n');
	b = 0;
	
	for (x=0;x < a.length; x++) {
		if (a[x].length >= t.cols) b += Math.floor(a[x].length/t.cols);
	}
	 
	b += a.length;
	//grow the box up to 13 rows if content increases
	if (t.rows < mce.MAX_NUMBER_OF_CONTROL_ROWS) {
		//jQuery(t).addClass('noscroll');
		for (i=0;i < t.clientHeight; i++) {
			if (t.scrollHeight > t.clientHeight) {
				t.rows++;
				t.scrollBottom = 0;
			}
			if (t.rows >= mce.MAX_NUMBER_OF_CONTROL_ROWS){ // fixes bug where scrollbar doesn't appear after pasting more lines than the max # of rows
				t.rows = mce.MAX_NUMBER_OF_CONTROL_ROWS;
				
			}
		}
	}	
	/*if (t.rows == mce.MAX_NUMBER_OF_CONTROL_ROWS) {
		this was used to show scrollbar in IE -- jQuery(t).removeClass('noscroll');
	}*/
	
	// do not shrink textarea more than the default textarea attribute "minrows"
	if (b < minrows) {
		t.rows = minrows;
		return false;
	}
	//decrease rows as you delete content rows
	for (i=0;i < t.clientHeight; i++) {
		if (b < t.rows) {
			t.rows = t.rows - 1;
		}
	}
}

jQuery(document).ready( mce.init )

