// app/webroot/js/functions.js

<<<<<<< HEAD


=======
// disable cache or ajax .get won't work right in IE
$.ajaxSetup({cache:false});
>>>>>>> b664cbb3a6afc7b757a243fd7f0a0859aa0d37cd


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
                var checked = 1;
                $('.ncheckbox').each(function() {
                    if ($(this).attr('checked') == false) {
                        checked = 0;                    
                    }                
                });
                if (checked == 1) {
                        $('#nselectall').attr('checked', true);
                }
            } else {
                $.ajax({
                    url: '/mhsbake/newspaper_reels/checkBox',
                    type: 'POST',
                    data: { reel_id:$(this).attr("id"), checked:"0" }
                });
                $('#nselectall').attr('checked', false);
            }
        });
    $('.acheckbox').change(function() { 
            if($(this).is(":checked")) { 
                $.ajax({
                    url: '/mhsbake/archive_reels/checkBox',
                    type: 'POST',
                    data: { reel_id:$(this).attr("id"), checked:"1" }
                });
				var checked = 1;
                $('.acheckbox').each(function() {
                    if ($(this).attr('checked') == false) {
                        checked = 0;                    
                    }                
                });
                if (checked == 1) {
                        $('#aselectall').attr('checked', true);
                }
            } else {
                $.ajax({
                    url: '/mhsbake/archive_reels/checkBox',
                    type: 'POST',
                    data: { reel_id:$(this).attr("id"), checked:"0" }
                });
                $('#aselectall').attr('checked', false);				
            }
        });
    
    // doubleclick functions open single record view when rows are couble-clicked
    $('div.newspaperReels tr').dblclick(function() {
            window.location = '/mhsbake/newspaper_reels/record/' + $(this).attr("id");
    });
    
    $('div.archiveReels tr').dblclick(function() {
            window.location = '/mhsbake/archive_reels/record/' + $(this).attr("id");
    });
    
    // gets all checked boxes for newspapers so we can populate them on page load
    // also determines whether select all box should be checked
    if($('.ncheckbox').length) {
        $.get('/mhsbake/newspaper_reels/get_check_boxes', function(result) {
            if (result.length) {
                result = JSON.parse(result);
                $.each(result, function(key, value) {
                    $('#' + value + ' .ncheckbox').attr('checked', true);            
                });
                var checked = 1;
                $('.ncheckbox').each(function() {
                    if ($(this).attr('checked') == false) {
                        checked = 0;                    
                    }                
                });
                if (checked == 1) {
                        $('#nselectall').attr('checked', true);
                }
            }
        });
    }
    
    // gets all checked boxes for archives so we can populate them on page load
    // also determines whether select all box should be checked
    if($('.acheckbox').length) {
        $.get('/mhsbake/archive_reels/get_check_boxes', function(result) {
            if (result.length) {
                result = JSON.parse(result);
                $.each(result, function(key, value) {
                    $('#' + value + ' .acheckbox').attr('checked', true);            
                });
                var checked = 1;
                $('.acheckbox').each(function() {
                    if ($(this).attr('checked') == false) {
                        checked = 0;                    
                    }                
                });
                if (checked == 1) {
                        $('#aselectall').attr('checked', true);
                }
            }
        });
    }   
});

// for selecting and de-selecting all newspaper checkboxes on a page
function ntoggleChecked(status) {
        
        var nreel_ids = [];
        
        $('.ncheckbox').each( function() {
            $(this).attr("checked",status);
            nreel_ids.push($(this).attr("id"));
            });
            
            if (status == true) {
                $checked = "1";
            } else {
                $checked = "0";
            }
            
            $.ajax({
                url: '/mhsbake/newspaper_reels/checkBoxes',
                type: 'POST',
                data: { 'nreel_ids[]': nreel_ids, checked: $checked },
                datatype: "json",
                traditional: true
            });               
    }
    
// for selecting and de-selecting all archive checkboxes on a page
function atoggleChecked(status) {
        
        var areel_ids = [];
        
        $('.acheckbox').each( function() {
            $(this).attr("checked",status);
            areel_ids.push($(this).attr("id"));
            });
            
            if (status == true) {
                $checked = "1";
            } else {
                $checked = "0";
            }
            
            $.ajax({
                url: '/mhsbake/archive_reels/checkBoxes',
                type: 'POST',
                data: { 'areel_ids[]': areel_ids, checked: $checked },
                datatype: "json",
                traditional: true
            });         
    }
