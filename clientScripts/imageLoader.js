
$(document).ready( function() {
    $('#bntUpload').click(function(){
        $("#input_file").click();
});
 
$('#input_file').change(function() {
    $('#selected_filename').text("Загружено: " + $('#input_file')[0].files[0].name);
});

});
