function checkready(){
	var complete = 0;
	var total = 0;
	$("input:hidden").each(function () {
		if ($(this).val() != ""){
			complete++;
		}
		total++;
	});
	if (total == complete){
		$("button#rubricsubmit").removeClass("ui-state-disabled");
		$("button#rubricsubmit").addClass("ui-state-default");
	}
}
function reset(){
	$("input:hidden + not:(#rubric_id)").each(function () {//selects all hidden inputs except for the rubric id one which should stay the same
		$(this).val("");
	});
	$("#comments").val("");
}
jQuery.fn.log = function (msg) {
		console.log("%s: %o", msg, this);
		return this;
		return this;
	};
$(document).ready(function(){
	reset();
	var total = 0;
	var count = 0;
	$.getJSON("getstudents.php?rubric="+$("#rubric_id").val(),function(data){
		//$.fn.log(data[count].firstname);
		$.fn.log($(data).length);
		$("#studentname").html(data[count].firstname+" "+data[count].surname);
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
	$("#rubricsubmit").click(function(){
		/*	- Submit data
			- Save data
			- reset all values
			- change student name
		*/
		document.score.submit();
	})
});