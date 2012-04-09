// app/webroot/js/functions.js





$(document).ready(function() {
    // This creates a new type so that inline edits of the date/time is constrained
    $.editable.addInputType('time', {
        // Work on code here later...
        // check with http://www.appelsiini.net/2008/2/creating-inline-timepicker-with-javascript for help
    });
    
    // inline-edit functionality for users
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
    
    // inline-edit functionality for newspapers
    $('.editntitle').editable('/mhsbake/newspapers/updateNTitle', {
         id        : 'id',
         name      : 'title',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title'
    });
    $('.editncity').editable('/mhsbake/newspapers/updateNCity', {
         id        : 'id',
         name      : 'city',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper city'
    });
    $('.editncounty').editable('/mhsbake/newspapers/updateNCounty', {
         id        : 'id',
         name      : 'county',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper county'
    });
    $('.editntitlecontrol').editable('/mhsbake/newspapers/updateNTitleControl', {
         id        : 'id',
         name      : 'title_control',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title control'
    });
    $('.editnalephnumber').editable('/mhsbake/newspapers/updateNAlephNumber', {
         id        : 'id',
         name      : 'aleph_number',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper aleph number'
    });
    
    // inline-edit functionality for newspaper content
    $('.editncbegindate').editable('/mhsbake/newspapercontents/updateNCBeginDate', {
         id        : 'id',
         name      : 'begin_date',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title'
    });
    $('.editncenddate').editable('/mhsbake/newspapercontents/updateNCEndDate', {
         id        : 'id',
         name      : 'end_date',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title'
    });
    $('.editncreelcontrol').editable('/mhsbake/newspapercontents/updateNCReelControl', {
         id        : 'id',
         name      : 'reel_control',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title'
    });
    $('.editncgaps').editable('/mhsbake/newspapercontents/updateNCGaps', {
         id        : 'id',
         name      : 'gaps',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper gaps'
    });
    $('.editnccomments').editable('/mhsbake/newspapercontents/updateNCComments', {
         id        : 'id',
         name      : 'comments',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title'
    });
    $('.editncusagerights').editable('/mhsbake/newspapercontents/updateNCUsageRights', {
         id        : 'id',
         name      : 'usage_rights',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title'
    });
    
    // inline-edit functionality for newspaper reel
    $('.editnrreelpolarity').editable('/mhsbake/newspaperreels/updateNRReelPolarity', {
         id        : 'id',
         name      : 'reel_polarity',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper title'
    });
    
    // checkbox functions send reel_id and checked values to server
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
    $('.acheckbox').change(function() { 
            if($(this).is(":checked")) { 
                $.ajax({
                    url: '/mhsbake/archive_reels/checkBox',
                    type: 'POST',
                    data: { reel_id:$(this).attr("id"), checked:"1" }
                });
            } else {
                $.ajax({
                    url: '/mhsbake/archive_reels/checkBox',
                    type: 'POST',
                    data: { reel_id:$(this).attr("id"), checked:"0" }
                });
            }
        }); 
});