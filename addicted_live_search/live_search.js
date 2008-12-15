var AddictedToLiveSearch = {
  url:'',
	
	init:function() {
		AddictedToLiveSearch.s = $('s');
		if (AddictedToLiveSearch.s) {
			AddictedToLiveSearch.s.autocomplete = 'off';
			var form = AddictedToLiveSearch.s.up('form');
			form.insert(new Element('div', {'id':'addicted_results'}));
			new Form.Element.Observer(AddictedToLiveSearch.s, 0.8, AddictedToLiveSearch.showResults);
			AddictedToLiveSearch.box = $('addicted_results');
		}
	},
	
	showResults:function(element, value) {
		AddictedToLiveSearch.showPage(value, 1);
	},
	
	showPage:function(s, page) {
		AddictedToLiveSearch.box.show();
		new Ajax.Updater( 'addicted_results', AddictedToLiveSearch.url, {
		  method:'get', 
		  parameters:'s=' + s
		});
	}
}

$(document).observe('dom:loaded', function() { AddictedToLiveSearch.init(); });