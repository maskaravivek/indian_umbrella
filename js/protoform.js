/**
	Protoform(class) v 2.0 23/01/2011
	Filippo Buratti 
	info [at] cssrevolt.com [dot] com 
	http://www.filippoburatti.net

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
*/

var Protoform = Class.create({

	initialize: function(form, options) {	

		this.options = {
				ajax: true,
				url:'',
				messageContainer:'protoform-message',
				messagePosition: 'before'
		}
		Object.extend(this.options, options || {});
			
		this.REGEX_PATTERNS = {
			Req		: /_Req/,
			Type 	: /_(Tel|Num|Int|Email|Url|Date)$/,
	
			Email   : /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/,
			Tel 	: /^\+?([0-9]+[- ./]?[0-9]+[- ./]?[0-9]+[- ./]?[0-9]+[- ./]?[0-9]+)$/,
			Num		: /^[-+]?\d+(\.\d+)?$/,
			Int     : /^\d+$/,
			Url     : /^(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:/~\+#]*[\w\-\@?^=%&amp;/~\+#])?/,
			Date	: /^(0[1-9]|[1-2][0-9]|3[01])\/(0[1-9]|1[0-2])\/[0-9]{2,4}$/
			//DateEn	: /^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[01])\/[0-9]{2,4}$/
		}
	
		this.form  = $(form);
		this.messageContainer 	= new Element('div', { 'class': this.options.messageContainer });
		
		var customInsert = Element._insertionTranslations[this.options.messagePosition];
		customInsert(this.form,this.messageContainer);
		
		this.formProcess 	= this.checkForm.bindAsEventListener(this);
		this.form.observe("submit", this.formProcess );
	
	},


	checkForm: function(event) { 
	
		event.stop(); 
		
		var errors	= '';
		var faulty	= null;
		var invalids = [];
	
		this.form.getElements().each(function(formEl) {
			
			formEl.removeClassName('invalid');
			
			var value 			= ($F(formEl)!= null) ? $F(formEl) : '' ;
			var fieldId			= formEl.readAttribute('id') ? formEl.readAttribute('id') : '';
			var fieldType 		= fieldId.match(this.REGEX_PATTERNS['Type']);
			var fieldRequired   = fieldId.match(this.REGEX_PATTERNS['Req']);
			var errorMessage	= formEl.readAttribute('title') ? formEl.readAttribute('title') : '';		
		
			if (fieldRequired && value.blank()) {
				
				var missing =0;
				
				if (formEl.type.toLowerCase() == ('checkbox' || 'radio')) {

            		this.form.select('input[name="'+formEl.name+'"]').each(function(inp) {
            		    if (inp.checked) {
            		       missing=1;
						   throw $break;
            		    }
            		});
            	}
			
				if (missing==0) {
					errors += '<li>' + errorMessage + '</li>';
					faulty = faulty || formEl;
					invalids.push(formEl);
					return;
				}
				
			}		
		
			if (fieldType  && !value.blank()) {				
				if (this.checkField(value, fieldType[1])) {
					errors += '<li>' + errorMessage + '</li>';
					faulty = faulty || formEl;
					invalids.push(formEl);
				}
			}
			
		
		}.bind(this));
	
	
		if (errors==0) {
			if (this.options.ajax){
				this.sendData(); 
			} else {
				this.form.submit();
			}
		} else {
				
			invalids.invoke('addClassName', 'invalid');

			var errorMessage = new Element('ul', { 'class':'error' }).update(errors);
			this.messageContainer.update(errorMessage);
			this.messageContainer.show();
			
			faulty.focus();
		}
	
	
	},
	
	checkField: function (value, type) {
		
		if (!this.REGEX_PATTERNS[type].match(value)) {
			return true
		}
		else {
			return false;
		}

	}, 
	
	sendData: function(event) {
		var url 	= (this.options.url) ? (this.options.url) : this.form.readAttribute('action');
		var reqType	= this.form.readAttribute('method');
		var pars 	= this.form.serialize();
		var myAjax 	= new Ajax.Request( url, {
									   	method: reqType, 
									   	parameters: pars, 
									   	onCreate: this.showLoad.bind(this), 
									   	onComplete: this.getResponse.bind(this)
									   });
	},
	
	showLoad: function() {
		this.messageContainer.update('<p class="working">loading...</p>');
	},
		
	getResponse: function(transport) {
		var newData = transport.responseText;
		this.messageContainer.update(newData);
		this.form.reset();
	}	
  
}); 