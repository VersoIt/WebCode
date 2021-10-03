
$(document).ready(function(){

	var contentList = document.getElementById('content').getElementsByTagName('h2');

	if (contentList.length == 0) $("#table-contents").remove();
	else for (var index = 0; index < contentList.length; index++) $('#content-list').append('<li>' + contentList[index].textContent + '</li>');

});