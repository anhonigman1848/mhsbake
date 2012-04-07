// app/webroot/js/functions.js

// disable cache or ajax .get won't work right in IE
$.ajaxSetup({cache:false});

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