$.ValidURL = function(str) {
  return /^(?:\w+:)?\/\/([^\s\.]+\.\S{2}|localhost[\:?\d]*)\S*$/.test(str)
}

$.showError = function(e){
	$('#error').text(e).parent().show()
}

$.showResult = function(hash){
	var url = window.location.toString() + 'go/' + hash.substring(0, 5),
		success = $('#success').parent().show()

	$('a', success).attr('href', url).text(url)
}

$(function(){
	$("#shorten").submit(function(e){
		e.preventDefault()

		var url = $("input.url").val()

		if(!$.ValidURL(url))
			return $.showError("Invalid URL")

		$.post({
		  type: "POST",
		  url: "/shorten",
		  data: JSON.stringify({
		  	url : url
		  }),
		  success: function(result){
		  	if(!result.status)
		  		return $.showError(result.error)
		  	$.showResult(result.result)
		  },
		  dataType: 'JSON'
		});
	})
})