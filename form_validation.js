// JavaScript Document
function validate_course()
{
	var x=document.forms["frm"]["cname"].value;
	var t=document.forms["frm"]["tsem"].value;
	if (x==null || x=="")
  	{
  		alert("Course name must be filled out");
  		return false;
  	}
	if (t==null || t=="")
  	{
  		alert("Total Semester must be filled out");
  		return false;
  	}
	/*
	//for email validation
	var email=document.forms["frm"]["email"].value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  	{
  		alert("Not a valid e-mail address");
  		return false;
  	}*/
	
	
}

function validate_subject()
{
	var subname=document.forms["frmsub"]["course"].value;
	var subcode=document.forms["frmsub"]["subcode"].value;
	var name=document.forms["frmsub"]["subname"].value;
	if(subname=="select course" || subname=="")
	{
		alert("Select any Course.");
		return false;
	}
	if(subcode==null || subcode=="")
	{
		alert("Provide Subject Code.");
		return false;
	}
	if(name==null || name=="")
	{
		alert("Provide Subject Name.");
		return false;
	}
}

function validate_fac(form)
{
	var fac_name=document.forms["frm"]["fname"].value;
	var mo_no=document.forms["frm"]["no"].value;
	
	if(fac_name==null || fac_name=="")
	{
		alert("Provide Faculty Name.");
		return false;
	}
	
	
	if(mo_no==null || mo_no=="")
	{
			alert("Provide Mobile Number.");
			return false;
	}
	if(isNaN(mo_no))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	
	
	return true;
}
function validate_block()
{
	var blockno=document.forms["frm"]["blno"].value;
	var roomno=document.forms["frm"]["rono"].value;
	var b_strength=document.forms["frm"]["bstrength"].value;
	if(blockno==null || blockno=="")
	{
			alert("Provide Block Number.");
			return false;
	}
	if(isNaN(blockno))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	if(isNaN(roomno))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	if(isNaN(b_strength))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	if(roomno==null || roomno=="")
	{
			alert("Provide Room Number.");
			return false;
	}
	if(b_strength==null || b_strength=="")
	{
			alert("Provide Block Strength.");
			return false;
	}
	
	return true;
}
function validate_lab()
{
	var labno=document.forms["frm"]["lno"].value;
	var lab_spe=document.forms["frm"]["lspecial"].value;
	var l_strength=document.forms["frm"]["lstrength"].value;
	if(labno==null || labno=="")
	{
			alert("Provide Lab Number.");
			return false;
	}
	if(isNaN(labno))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	
	if(isNaN(l_strength))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	if(lab_spe==null || lab_spe=="")
	{
			alert("Provide Lab Specialization.");
			return false;
	}
	if(l_strength==null || l_strength=="")
	{
			alert("Provide Lab Strength.");
			return false;
	}
	
	return true;
}
function validate_student()
{
	var coursename=document.forms["frm"]["course"].value;
	var year=document.forms["frm"]["year"].value;
	var rollnofrom=document.forms["frm"]["stroll"].value;
	var rollnoto=document.forms["frm"]["enroll"].value;
	var total_stud=document.forms["frm"]["tstudent"].value;
	var totalcancel_stud=document.forms["frm"]["cstudent"].value;
	if(coursename=="select course" || coursename=="")
	{
			alert("Select Any Course.");
			return false;
	}
	
	if(year==null || year=="")
	{
			alert("Provide Year.");
			return false;
	}
	if(isNaN(year))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	if(rollnofrom==null || rollnofrom=="")
	{
			alert("Provide Rollno From.");
			return false;
	}
	if(isNaN(rollnofrom))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	if(rollnoto==null || rollnoto=="")
	{
			alert("Provide Rollno To.");
			return false;
	}
	if(isNaN(rollnoto))
	{
			alert("Please Provide Only Numeric Value..");
			return false;
	}
	
	return true;
}
function validate_create_texam_schedule()
{
	
	var coursename=document.forms["frm"]["course"].value;
	var examdate=document.forms["frm"]["cdt"].value;
	var timefrom=document.forms["frm"]["timef"].value;
	var timeto=document.forms["frm"]["timet"].value;
	
	if(coursename=="Select Course" || coursename=="")
	{
			alert("Select Any Course.");
			return false;
	}
	
	if(examdate==null || examdate=="")
	{
			alert("Provide Exam Date.");
			return false;
	}
	if(timefrom==null || timefrom=="")
	{
			alert("Provide Exam Time From.");
			return false;
	}
	if(timeto==null || timeto=="")
	{
			alert("Provide Exam Time to.");
			return false;
	}
	
	return true;
}


function validate_create_pexam_schedule()
{
	
	var coursename=document.forms["frm"]["course"].value;
	var examdate=document.forms["frm"]["cdt"].value;
	
	
	if(coursename=="select course" || coursename=="")
	{
		alert("Select any Course.");
		return false;
	}
	
	if(examdate==null || examdate=="")
	{
			alert("Provide Exam Date.");
			return false;
	}
	
	
	
	return true;
}


function validate_block_arr()
{
	
	var coursename=document.forms["frm"]["course"].value;
	var blockno=document.forms["frm"]["bno"].value;
	var roomno=document.forms["frm"]["rno"].value;
	var rollnof=document.forms["frm"]["rnof"].value;
	var rollnot=document.forms["frm"]["rnot"].value;
	var totals=document.forms["frm"]["totstud"].value;
	
	
	
	if(coursename=="select course" || coursename=="")
	{
		alert("Select any Course.");
		return false;
	}
	
	if(blockno=="select block no" || blockno=="")
	{
		alert("Select any block no.");
		return false;
	}
	
	if(roomno=="select block no" || roomno=="")
	{
		alert("Select any room no.");
		return false;
	}
	if(rollnof=="null" || rollnof=="")
	{
		alert("Select roll no from.");
		return false;
	}
	if(rollnot=="null" || rollnot=="")
	{
		alert("Select roll no to.");
		return false;
	}
	if(totals=="null" || totals=="")
	{
		alert("Provide total students.");
		return false;
	}
	if(isNaN(rollnof))
	{
			alert("Please Provide Only Numeric Value in roll no from..");
			return false;
	}
	if(isNaN(totals))
	{
			alert("Please Provide Only Numeric Value in total students..");
			return false;
	}
	if(isNaN(blockno))
	{
			alert("Please Provide Only Numeric Value in block no..");
			return false;
	}
	if(isNaN(roomno))
	{
			alert("Please Provide Only Numeric Value in room no..");
			return false;
	}
	
	
	return true;
}




function validate_result()
{
	var result_name=document.forms["frm"]["result_name"].value;
	var course_name=document.forms["frm"]["course_name"].value;
	var sem_no=document.forms["frm"]["sem_no"].value;
	var roll_no=document.forms["frm"]["roll_no"].value;
	var result_status=document.forms["frm"]["result_status"].value;
	
	
	if(result_name=="result name" || result_name=="")
	{
		alert("Provide Result Name.");
		return false;
	}
	
	
	if(course_name=="select course" || course_name=="")
	{
		alert("Select any Course.");
		return false;
	}
	
	if(roll_no=="Enter roll no" || roll_no=="")
	{
		alert("Provide roll no.");
		return false;
	}
	
	
	if(isNaN(roll_no))
	{
			alert("Please Provide Only Numeric Value in roll no..");
			return false;
	}
	
	
	return true;
}




/*

Hey I Have Completed the validation work to the form of "Create_theory_ex_schedule"
 link in Exam sub Cordinator portion...
 
 other remaining validation are same as which i have already done above..
 so through reference of above validation you can complete other validation....
 thanks..

*/