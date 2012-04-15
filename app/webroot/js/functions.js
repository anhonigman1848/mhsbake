// app/webroot/js/functions.js

// disable cache or ajax .get won't work right in IE
$.ajaxSetup({cache:false});


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
         tooltip   : 'Click to edit the newspaper begin date'
    });
    $('.editncenddate').editable('/mhsbake/newspapercontents/updateNCEndDate', {
         id        : 'id',
         name      : 'end_date',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper end date'
    });
    $('.editncreelcontrol').editable('/mhsbake/newspapercontents/updateNCReelControl', {
         id        : 'id',
         name      : 'reel_control',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper reel control'
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
         tooltip   : 'Click to edit the newspaper comments'
    });
    $('.editncusagerights').editable('/mhsbake/newspapercontents/updateNCUsageRights', {
         id        : 'id',
         name      : 'usage_rights',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper usage rights'
    });
    
    // inline-edit functionality for newspaper reel
    $('.editnrreelpolarity').editable('/mhsbake/newspaperreels/updateNRReelPolarity', {
         id        : 'id',
         name      : 'reel_polarity',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper reel polarity'
    });
    $('.editnrgeneration').editable('/mhsbake/newspaperreels/updateNRGeneration', {
         id        : 'id',
         name      : 'generation',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper generation'
    });
    $('.editnrredoxqualitydate').editable('/mhsbake/newspaperreels/updateNRRedoxQualityDate', {
         id        : 'id',
         name      : 'redox_quality_date',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper redox quality date'
    });
    $('.editnrredoxqualitypresent').editable('/mhsbake/newspaperreels/updateNRRedoxQualityPresent', {
         id        : 'id',
         name      : 'redox_quality_present',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper redox quality present'
    });
    $('.editnrscratches').editable('/mhsbake/newspaperreels/updateNRScratches', {
         id        : 'id',
         name      : 'scratches',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper scratches'
    });
    $('.editnrqualityin').editable('/mhsbake/newspaperreels/updateNRQualityIn', {
         id        : 'id',
         name      : 'quality_in',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper quality in'
    });
    $('.editnrsdnnumber').editable('/mhsbake/newspaperreels/updateNRSdnNumber', {
         id        : 'id',
         name      : 'sdn_number',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper sdn number'
    });
    $('.editnrshippingbox').editable('/mhsbake/newspaperreels/updateNRShippingBox', {
         id        : 'id',
         name      : 'shipping_box',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper shipping box'
    });
    $('.editnrdateoflastaccess').editable('/mhsbake/newspaperreels/updateNRDateOfLastAccess', {
         id        : 'id',
         name      : 'date_of_last_access',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper date of last access'
    });
    $('.editnrdateofmicrofilm').editable('/mhsbake/newspaperreels/updateNRDateOfMicrofilm', {
         id        : 'id',
         name      : 'date_of_microfilm',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper date of microfilm'
    });
    $('.editnrcheckedout').editable('/mhsbake/newspaperreels/updateNRCheckedOut', {
         id        : 'id',
         name      : 'checked_out',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the newspaper checked out'
    });
    
    // inline-edit functionality for archives
    $('.editatitle').editable('/mhsbake/archives/updateATitle', {
         id        : 'id',
         name      : 'title',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archives title'
    });
    $('.editaseries').editable('/mhsbake/archives/updateASeries', {
         id        : 'id',
         name      : 'series',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archives series'
    });
    $('.editaseriesnumber').editable('/mhsbake/archives/updateASeriesNumber', {
         id        : 'id',
         name      : 'series_number',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archives series number'
    });
    $('.editaauthorcitation').editable('/mhsbake/archives/updateAAuthorCitation', {
         id        : 'id',
         name      : 'author_citation',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archives author citation'
    });
    $('.editacity').editable('/mhsbake/archives/updateACity', {
         id        : 'id',
         name      : 'city',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archives city'
    });
    $('.editacounty').editable('/mhsbake/archives/updateACounty', {
         id        : 'id',
         name      : 'county',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archives county'
    });
    $('.editaalephnumber').editable('/mhsbake/archives/updateAAlephNumber', {
         id        : 'id',
         name      : 'aleph_number',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archives aleph number'
    });
    
    // inline-edit functionality for archive content
    $('.editacbegindate').editable('/mhsbake/archivecontents/updateACBeginDate', {
         id        : 'id',
         name      : 'begin_date',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive begin date'
    });
    $('.editacenddate').editable('/mhsbake/archivecontents/updateACEndDate', {
         id        : 'id',
         name      : 'end_date',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive end date'
    });
    $('.editacreelnumber').editable('/mhsbake/archivecontents/updateACReelNumber', {
         id        : 'id',
         name      : 'reel_number',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive reel number'
    });
    $('.editaccontents').editable('/mhsbake/archivecontents/updateACContents', {
         id        : 'id',
         name      : 'contents',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive contents'
    });
    $('.editaccomments').editable('/mhsbake/archivecontents/updateACComments', {
         id        : 'id',
         name      : 'comments',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive comments'
    });
    $('.editacusagerights').editable('/mhsbake/archivecontents/updateACUsageRights', {
         id        : 'id',
         name      : 'usage_rights',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive usage rights'
    });
        
    // inline-edit functionality for archive reel
    $('.editarreelpolarity').editable('/mhsbake/archivereels/updateARReelPolarity', {
         id        : 'id',
         name      : 'reel_polarity',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive reel polarity'
    });
    $('.editargeneration').editable('/mhsbake/archivereels/updateARGeneration', {
         id        : 'id',
         name      : 'generation',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive generation'
    });
    $('.editarredoxqualitydate').editable('/mhsbake/archivereels/updateARRedoxQualityDate', {
         id        : 'id',
         name      : 'redox_quality_date',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive redox quality date'
    });
    $('.editarredoxqualitypresent').editable('/mhsbake/archivereels/updateARRedoxQualityPresent', {
         id        : 'id',
         name      : 'redox_quality_present',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive redox quality present'
    });
    $('.editarscratches').editable('/mhsbake/archivereels/updateARScratches', {
         id        : 'id',
         name      : 'scratches',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive scratches'
    });
    $('.editarqualityin').editable('/mhsbake/archivereels/updateARQualityIn', {
         id        : 'id',
         name      : 'quality_in',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive quality in'
    });
    $('.editarsdnnumber').editable('/mhsbake/archivereels/updateARSdnNumber', {
         id        : 'id',
         name      : 'sdn_number',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive sdn number'
    });
    $('.editarshippingbox').editable('/mhsbake/archivereels/updateARShippingBox', {
         id        : 'id',
         name      : 'shipping_box',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive shipping box'
    });
    $('.editardateoflastaccess').editable('/mhsbake/archivereels/updateARDateOfLastAccess', {
         id        : 'id',
         name      : 'date_of_last_access',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive date of last access'
    });
    $('.editardateofmicrofilm').editable('/mhsbake/archivereels/updateARDateOfMicrofilm', {
         id        : 'id',
         name      : 'date_of_microfilm',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive date of microfilm'
    });
    $('.editarcheckedout').editable('/mhsbake/archivereels/updateARCheckedOut', {
         id        : 'id',
         name      : 'checked_out',
         type      : 'text',
         cancel    : 'Cancel',
         submit    : 'Save',
         indicator : 'Saving...',
         tooltip   : 'Click to edit the archive checked out'
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
    $('#nselectall').removeAttr('checked');
    if($('.ncheckbox').length) {
        $.get('/mhsbake/newspaper_reels/get_check_boxes', function(result) {
            if (result.length) {
                result = JSON.parse(result);
                $.each(result, function(key, value) {
                    $('#' + value + ' .ncheckbox').attr('checked', 'checked');            
                });
                var checked = 1;
                $('.ncheckbox').each(function() {
                    if ($(this).attr('checked') == false) {
                        checked = 0;                    
                    }                
                });
                if (checked == 1) {
                        $('#nselectall').attr('checked', 'checked');
                }
            }
        });
    }
    
    // gets all checked boxes for archives so we can populate them on page load
    // also determines whether select all box should be checked
    $('#aselectall').attr('checked', false);
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

function goOfflineN(records) {    
    $.jStorage.set('newspaper', records);    
    window.location = '/mhsbake/newspaper.html';
}