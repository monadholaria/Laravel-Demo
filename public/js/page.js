$( document ).ready(function() {
    $('#pageForm').on('submit',function (e) {
        $('#errors').remove();

        var title = $('input[name=page_title]').val();
        title = $.trim(title);
        var content = $.trim($('textarea[name=page_content]').val());
        content = $.trim(content);
        var error = 0;
        var errorMsg = "<div id='errors' class='alert alert-danger'><ul>";
        if(!title){
            error = 1;
            errorMsg += "<li>Page title field is required.</li>";
        }
        if(!content){
            error = 1;
            errorMsg += "<li>Page content field is required.</li>";
        }
        if(!error){
            return true;
        }else {
            e.preventDefault();
            errorMsg += "</ul></div>";
            $(errorMsg).insertBefore('#pageForm');
            return false;
        }
    });
});