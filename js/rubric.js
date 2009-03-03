var total = 0;
var count = 0;
var students;
function checkready(){
	var complete = 0;
	var total = 0;
	$("input.score").each(function () {
		if ($(this).val() != ""){
			complete++;
		}
		total++;
	});
	if (total == complete){
		$("button#rubricsubmit").removeClass("ui-state-disabled");
		$("button#rubricsubmit").addClass("ui-state-default");
		$("button#rubricsubmit").removeAttr("disabled");
		$("#rubricsubmit").click(function(){									
			$("#rubricsubmit").attr("disabled", "disabled");
			$("button#rubricsubmit").addClass("ui-state-disabled");
			$("button#rubricsubmit").removeClass("ui-state-default");
			$("button#rubricsubmit").html("Saving...");
			$("#studentname").html("<img src='ajax-loader.gif' alt='Loading...' />&nbsp;Saving...");
			$("div#rubric_area").hide("fast");
			$('#rubric_form').ajaxSubmit(function() { 
				//$.fn.log("saved it")
	            next();
	        }); 
		});
	}
}
function reset(){
	$("input.score").each(function () {//selects all hidden inputs except for the rubric id one which should stay the same
		$(this).val("");
	});
	$("#rubricsubmit").unbind();
	$("#comments").val("");
	$("td.selected").removeClass("selected");
	$("button#rubricsubmit").html("Submit");
}
function next(){
	if (count != total){
		count++;
		$("div#rubric_area").show("fast");
		$("#student_id").val(students[count].student_id);
		$("#studentname").html(students[count].firstname+" "+students[count].surname);
		$("#count").html(count+1+"/"+total);
		reset();
	} else {
		alert("You have come to the end of the set");
	}
}
jQuery.fn.log = function (msg) {
		console.log("%s: %o", msg, this);
		return this;
		return this;
	};
$(document).ready(function(){
	reset();
	$.getJSON("getstudents.php?rubric="+$("#rubric_id").val(),function(data){
		//$.fn.log(data[count].firstname);
		total = $(data).length;
		students = data;
		$("#student_id").val(students[count].student_id);
		$("#studentname").html(students[count].firstname+" "+students[count].surname);
		$("#count").html(count+1+"/"+total);
		$("div#rubric_area").show("fast");
		//$('#rubric_form').ajaxForm();
	});
	$("td:not(.header)").click(function(){//all table cells except the headers (includes the critereas)
		$("td."+$(this).attr("class")).removeClass("selected");//removes any other selected boxes
		$("input#"+$(this).attr("class")).val($(this).attr("id"));//this must come before the selected class is applied
		$(this).addClass("selected");//selects the clicked one
		checkready();//check if all critereas have been completed, and if so enables the button
	});
	$("#rubricsubmit.ui-state-default").hover(
	function(){ 
		$(this).addClass("ui-state-hover"); 
	},
	function(){ 
		$(this).removeClass("ui-state-hover"); 
	}
	)
});