// app/webroot/js/offline-a.js

// disable cache or ajax won't work right in IE
$.ajaxSetup({cache:false});

$(document).ready(function() {
    
    //display the list of records
    resetList();    
});

// displays the list of offline records
function resetList() {
    
    // construct the initial html configuration
    var formHtml = '';
    $('form').html(formHtml);
    
    var h2Html = 'Offline Selected Archive Records';
    $('h2').html(h2Html);
    
    var h4Html = 'Double click a row to edit the record<br /><br />'
    $('h4').html(h4Html);
    
    var records = $.jStorage.get('archive');
    
    var tableHtml = '<tr><th>Title</th><th>Series</th>' +
    '<th>Begin Date</th><th>End Date</th><th>Redox Present</th><th>Redox Date</th><th>Checked Out</th></tr>';

    for (var i in records) {
        tableHtml+= '<tr id="' + i + '" class=\"row\"><td>' + records[i].Archive.title + '</td>' +        
        '<td>' + records[i].Archive.series + '</td>' +
        '<td>' + records[i].ArchiveContent.begin_date + '</td>' +
        '<td>' + records[i].ArchiveContent.end_date + '</td>' +
        '<td>' + records[i].ArchiveReel.redox_quality_present + '</td>' +
        '<td>' + records[i].ArchiveReel.redox_quality_date + '</td>' +
        '<td>' + records[i].ArchiveReel.checked_out + '</td>' +
        '</tr>';
    }
    $('table').html(tableHtml);
    
    var ulHtml = "<li><input type='button' onclick='submitChanges()' value='Submit Offline Changes' /></li>" +
		 "<li><input type='button' onclick='cancelChanges()' value='Cancel Offline Changes' /></li>";
    $('ul').html(ulHtml);
    
    // edit existing records on row doubleclick
    $('.row').dblclick(function() {
        var records = $.jStorage.get('archive');
        var id = $(this).attr("id");
        $.jStorage.set('id', id);
	
	//set flags for checkboxes
	var redox_check = '';
	var checked_out = '';
	if (records[id].ArchiveReel.redox_quality_present) {
	    redox_check = 'checked';
	}
	if (records[id].ArchiveReel.checked_out) {
	    checked_out = 'checked';
	}
	
	// generate form html
        var formHtml = '<label for="Title">Title</label>' +
            '<input name="title" type="text" id="Title" value= "' + records[id].Archive.title + '" />' +
            '<label for="City">City</label>' +
            '<input name="city" type="text" id="City" value= "' + records[id].Archive.city + '" />' +
            '<label for="County">County</label>' +
            '<input name="county" type="text" id="County" value= "' + records[id].Archive.county + '" />' +            
            '<label for="AlephNumber">Aleph Number</label>' +
            '<input name="aleph_number" type="text" id="AlephNumber" value= "' + records[id].Archive.aleph_number + '" />' +
	    '<label for="Series">Series</label>' +
            '<input name="series" type="text" id="Series" value= "' + records[id].Archive.series + '" />' +
            '<label for="SeriesNumber">Series Number</label>' +
            '<input name="series_number" type="text" id="SeriesNumber" value= "' + records[id].Archive.series_number + '" />' +
            '<label for="AuthorCitation">Author Citation</label>' +
            '<input name="author_citation" type="text" id="AuthorCitation" value= "' + records[id].Archive.author_citation + '" />' +
            
            '<label for="datepicker1">Begin Date</label>' +
            '<input name="begin_date" type="text" id="datepicker1" value= "' + records[id].ArchiveContent.begin_date + '" />' +
            '<label for="datepicker2">End Date</label>' +
            '<input name="end_date" type="text" id="datepicker2" value= "' + records[id].ArchiveContent.end_date + '" />' +
            '<label for="ReelNumber">Reel Number</label>' +
            '<input name="reel_number" type="text" id="ReelNumber" value= "' + records[id].ArchiveContent.reel_number + '" />' +
            '<label for="Contents">Contents</label>' +
            '<input name="contents" type="text" id="Contents" value= "' + records[id].ArchiveContent.contents + '" />' +
            '<label for="Comments">Comments</label>' +
            '<input name="comments" type="text" id="Comments" value= "' + records[id].ArchiveContent.comments + '" />' +
            '<label for="UsageRights">Usage Rights</label>' +
            '<input name="usage_rights" type="text" id="UsageRights" value= "' + records[id].ArchiveContent.usage_rights + '" />' +
            
            '<label for="ReelPolarity">Reel Polarity</label>' +
            '<input name="reel_polarity" type="text" id="ReelPolarity" value= "' + records[id].ArchiveReel.reel_polarity + '" />' +
            '<label for="Generation">Generation</label>' +
            '<input name="generation" type="text" id="Generation" value= "' + records[id].ArchiveReel.generation + '" />' +            
            '<label for="datepicker3">Redox Quality Date</label>' +
            '<input name="redox_quality_date" type="text" id="datepicker3" value= "' + records[id].ArchiveReel.redox_quality_date + '" />' +
            '<label for="RedoxQualityPresent">Redox Quality Present</label>' +
            '<input name="redox_quality_present" type="checkbox" id="RedoxQualityPresent" ' + redox_check + ' />' +
            '<br /><br /><label for="Scratches">Scratches</label>' +
            '<input name="scratches" type="text" id="Scratches" value= "' + records[id].ArchiveReel.scratches + '" />' +
            '<label for="QualityIn">Quality In</label>' +
            '<input name="quality_in" type="text" id="QualityIn" value= "' + records[id].ArchiveReel.quality_in + '" />' +
            '<label for="SdnNumber">SDN Number</label>' +
            '<input name="sdn_number" type="text" id="SdnNumber" value= "' + records[id].ArchiveReel.sdn_number + '" />' +
            '<label for="ShippingBox">Quality In</label>' +
            '<input name="shipping_box" type="text" id="ShippingBox" value= "' + records[id].ArchiveReel.shipping_box + '" />' +
            '<label for="datepicker4">Date of Last Access</label>' +
            '<input name="date_of_last_access" type="text" id="datepicker4" value= "' + records[id].ArchiveReel.date_of_last_access + '" />' +
            '<label for="datepicker5">Redox Quality Date</label>' +
            '<input name="date_of_microfilm" type="text" id="datepicker5" value= "' + records[id].ArchiveReel.date_of_microfilm + '" />' +
            '<label for="CheckedOut">Checked Out</label>' +
            '<input name="checked_out" type="checkbox" id="CheckedOut" ' + checked_out + ' />';
        
        // swap out the titles
        var h2Html = 'Edit Record';
        $('h2').html(h2Html);
        var h4Html = '<br /><br />';
        $('h4').html(h4Html);
            
        // swap out the table html and show the form
        var tableHtml = '';
        $('table').html(tableHtml);
        $('form').html(formHtml);
        
        // swap out the buttons
        var ulHtml = "<li><input type='button' onclick='saveRecord()' value='Save Record' /></li>" +
		"<li><input type='button' onclick='cancel()' value='Cancel Changes' /></li>";
        $('ul').html(ulHtml);
        
        // enable the datepickers
        $('#datepicker1').datepicker({changeYear: true,
                                   changeMonth: true,
                                   yearRange: '1800:2032',
                                   dateFormat: 'yy-mm-dd'
                                   });      
        
        $('#datepicker2').datepicker({changeYear: true,
                                   changeMonth: true,
                                   yearRange: '1800:2032',
                                   dateFormat: 'yy-mm-dd'
                                   });      
        
        $('#datepicker3').datepicker({changeYear: true,
                                   changeMonth: true,
                                   yearRange: '1800:2032',
                                   dateFormat: 'yy-mm-dd'
                                   });       
       
        $('#datepicker4').datepicker({changeYear: true,
                                   changeMonth: true,
                                   yearRange: '1800:2032',
                                   dateFormat: 'yy-mm-dd'
                                   });        
        
        $('#datepicker5').datepicker({changeYear: true,
                                   changeMonth: true,
                                   yearRange: '1800:2032',
                                   dateFormat: 'yy-mm-dd'
                                   });        
    });
}

// save the edits for this record
function saveRecord() {
    var records = $.jStorage.get('archive');
    var id = $.jStorage.get('id');
    for (var i in records) {
        if (records[i].Archive.archive_id == records[id].Archive.archive_id) {
            records[i].Archive.title = $('#Title').val();
            records[i].Archive.city = $('#City').val();
            records[i].Archive.county = $('#County').val();            
            records[i].Archive.aleph_number = $('#AlephNumber').val();
	    records[i].Archive.series = $('#Series').val();
            records[i].Archive.series_number = $('#SeriesNumber').val();
            records[i].Archive.author_citation = $('#AuthorCitation').val();
        }    
            
        if (records[i].ArchiveContent.archive_content_id == records[id].ArchiveContent.archive_content_id) {    
            records[i].ArchiveContent.begin_date = $('#datepicker1').val();
            records[i].ArchiveContent.end_date = $('#datepicker2').val();
            records[i].ArchiveContent.reel_number = $('#ReelNumber').val();
            records[i].ArchiveContent.contents = $('#Contents').val();
            records[i].ArchiveContent.comments = $('#Comments').val();
            records[i].ArchiveContent.usage_rights = $('#UsageRights').val();
        }
        
        if (records[i].ArchiveReel.archive_reel_id == records[id].ArchiveReel.archive_reel_id) {    
            records[i].ArchiveReel.reel_polarity = $('#ReelPolarity').val();
            records[i].ArchiveReel.generation = $('#Generation').val();
            records[i].ArchiveReel.redox_quality_date = $('#datepicker3').val();
            records[i].ArchiveReel.redox_quality_present = $('#RedoxQualityPresent').is(':checked');
            records[i].ArchiveReel.scratches = $('#Scratches').val();
            records[i].ArchiveReel.quality_in = $('#QualtiyIn').val();
            records[i].ArchiveReel.sdn_number = $('#SdnNumber').val();
            records[i].ArchiveReel.shipping_box = $('#ShippingBox').val();
            records[i].ArchiveReel.date_of_last_access = $('#datepicker4').val();
            records[i].ArchiveReel.date_of_microfilm = $('#datepicker5').val();
            records[i].ArchiveReel.checked_out = $('#CheckedOut').is(':checked');
        }    
    }    
    $.jStorage.set('archive', records);
    resetList();
}

// send the offline changes to the server
function submitChanges() {
    var records = $.toJSON($.jStorage.get('archive'));    
    
    $.ajax({
                    url: '/mhsbake/archive_reels/offlineEdit',
                    type: 'POST',
                    data: {'records[]': records},
                    success: function() {
			$.jStorage.flush();
                        window.location = '/mhsbake/archive_reels/display';
                    },
                    error: function() {
                        alert('Save attempt failed. Please verify that you\nhave a working connection to the server\nand try again.');
                    }                    
                });
}

// cancel the edits
function cancel() {
    resetList();
}

// cancel all changes and attempt return to online
function cancelChanges() {
    $.jStorage.flush();
    var records = $.toJSON($.jStorage.get('archive'));    
    
    $.ajax({
                    url: '/mhsbake/archive_reels/offlineEdit',
                    type: 'POST',
                    data: {'records[]': records},
                    success: function() {
			$.jStorage.flush();
                        window.location = '/mhsbake/archive_reels/display';
                    },
                    error: function() {
                        alert('Cancel attempt failed. Please verify that you\nhave a working connection to the server\nand try again.');
                    }                    
                });
}


