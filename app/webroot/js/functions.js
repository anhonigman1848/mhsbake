// app/webroot/js/testinline.js
$(document).ready(function() {
    $('.editfirstname').editable('/mhsbake/users/updateFirstName', {
         id        : 'id',
         name      : 'first_name',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the first name'
    });
    $('.editlastname').editable('/mhsbake/users/updateLastName', {
         id        : 'id',
         name      : 'last_name',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the last name'
    });
    $('.ncheckbox').change(function() { 
            if($(this).is(":checked")) { 
                $.ajax({
                    url: '/mhsbake/newspaper_reels/checkBox',
                    type: 'POST',
                    data: { reel_id:$(this).attr("id"), checked:"1" }
                });
            } else {
                $.ajax({
                    url: '/mhsbake/newspaper_reels/checkBox',
                    type: 'POST',
                    data: { reel_id:$(this).attr("id"), checked:"0" }
                });
            }
        }); 
});