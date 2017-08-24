<?php
include "db_connect.php";

$query="select tblSchoolYrStart from tblschoolyear where tblSchoolYrActive='Active'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sy=substr($row['tblSchoolYrStart'], 2);
$query = "select * from tblstudent where left(tblStudentId, 2)='$sy' group by tblStudentId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$studId=substr($row['tblStudentId'], 3);
if(empty($studId))
{
	$studId='001';
}else
{
	$studId++;
}
$id = sprintf('%03d', $studId);
$studentid=$sy.$id;

$query="select tblSchoolYrStart from tblschoolyear where tblSchoolYrActive='Active'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$sy=substr($row['tblSchoolYrStart'], 2);

$req = $_POST['chkReq'];
$parentStat = $_POST['chkParentStat'];
$liveswith = $_POST['chkLivesWith'];

$type = $_POST['r3'];
$lvl = $_POST['selLevel'];
$fname = $_POST['txtStudFname'];
$lname = $_POST['txtStudLname'];
$mname = $_POST['txtStudMname'];
$bday = $_POST['txtStudBday'];
$bplace= $_POST['txtStudBplace'];
$nat = $_POST['txtStudNat'];
$religion = $_POST['txtStudReligion'];
$addBldg = $_POST['txtStudAddBldg'];
$addSt = $_POST['txtStudAddSt'];
$addBrgy = $_POST['txtStudAddBrgy'];
$addCity = $_POST['txtStudAddCity'];
$addCountry = $_POST['txtStudAddCountry'];
$lang1 = $_POST['txtStudLang1'];
$lang2 = $_POST['txtStudLang2'];

$fatherfname = $_POST['txtFatherFname'];
$fatherlname = $_POST['txtFatherLname'];
$fathermname = $_POST['txtFatherMname'];
$fathernum = $_POST['txtFatherNum'];
$fatheremail = $_POST['txtFatherEmail'];
$fatheraddbldg = $_POST['txtFatherAddBldg'];
$fatheraddst = $_POST['txtFatherAddSt'];
$fatheraddbrgy = $_POST['txtFatherAddBrgy'];
$fatheraddcity = $_POST['txtFatherAddCity'];
$fatheraddcountry = $_POST['txtFatherAddCountry'];
$fathertelnum = $_POST['txtFatherTelnum'];
$fatherjob = $_POST['txtFatherJob'];
$fathercom = $_POST['txtFatherCompany'];
$fathercomaddbldg = $_POST['txtFatherComAddBldg'];
$fathercomaddst = $_POST['txtFatherComAddSt'];
$fathercomaddbrgy = $_POST['txtFatherComAddBrgy'];
$fathercomaddcity = $_POST['txtFatherComAddCity'];
$fathercomaddcountry = $_POST['txtFatherComAddCountry'];
$fathercomnum = $_POST['txtFatherComNum'];

$motherfname = $_POST['txtMotherFname'];
$motherlname = $_POST['txtMotherLname'];
$mothermname = $_POST['txtMotherMname'];
$mothernum = $_POST['txtMotherNum'];
$motheremail = $_POST['txtMotherEmail'];
$motheraddbldg = $_POST['txtMotherAddBldg'];
$motheraddst = $_POST['txtMotherAddSt'];
$motheraddbrgy = $_POST['txtMotherAddBrgy'];
$motheraddcity = $_POST['txtMotherAddCity'];
$motheraddcountry = $_POST['txtMotherAddCountry'];
$mothertelnum = $_POST['txtMotherTelnum'];
$motherjob = $_POST['txtMotherJob'];
$mothercom = $_POST['txtMotherCompany'];
$mothercomaddbldg = $_POST['txtMotherComAddBldg'];
$mothercomaddst = $_POST['txtMotherComAddSt'];
$mothercomaddbrgy = $_POST['txtMotherComAddBrgy'];
$mothercomaddcity = $_POST['txtMotherComAddCity'];
$mothercomaddcountry = $_POST['txtMotherComAddCountry'];
$mothercomnum = $_POST['txtMotherComNum'];

$allergies = $_POST['txtHealthAllergies'];
$illness = $_POST['txtHealthIllness'];
$meds = $_POST['txtHealthMeds'];
$btype = $_POST['selHealthBtype'];
$h2 = $_POST['h2'];
$reason = $_POST['txtHealthReason'];
$r1 = $_POST['r1'];
$doctor = $_POST['txtHealthDoctor'];
$hospital = $_POST['txtHealthHospital'];
$hosnum = $_POST['txtHealthHosNum'];
$hosaddbldg = $_POST['txtHealthAddBldg'];
$hosaddst = $_POST['txtHealthAddSt'];
$hosaddbrgy = $_POST['txtHealthAddBrgy'];
$hosaddcity = $_POST['txtHealthAddCity'];
$hosaddcountry = $_POST['txtHealthAddCountry'];

$sibName=$_POST['txtSiblName'];
$sibAge=$_POST['txtSiblAge'];
$sibGrd=$_POST['txtSiblGrd'];
$sibSchool=$_POST['txtSiblSchool'];
$relName=$_POST['txtRelName'];
$relAge=$_POST['txtRelAge'];
$relRelation=$_POST['txtRelRelation'];

//for student id
$query="insert into tblstudent(tblStudentId, tblStudentType, tblStudent_tblLevelId, tblStudentFlag, tblStudentTransferee) values ('$studentid', 'OFFICIAL', '$lvl', 1, '$type')";
$result=mysqli_query($con, $query);

$x=count($sibName);
for($i=0; $i<$x; $i++)
{
	$sname=$sibName[$i];
	$sage=$sibAge[$i];
	$sgrd=$sibGrd[$i];
	$sschool=$sibSchool[$i];
	// $query="select * from tblstudsiblings order by tblStudSibId desc limit 0, 1";
	// $result=mysqli_query($con, $query);
	// $row=mysqli_fetch_array($result);
	$siblingid= StudSibling::select('tblStudSibId')->orderby('tblStudSibId', 'desc');
	$siblingid++;
	// $query="insert into tblstudsiblings(tblStudSibId, tblStudSibName, tblStudSibAge, tblStudSibGrade, tblStudSibSchool, tblStudSib_tblStudId) values ('$siblingid','$sname', '$sage', '$sgrd', '$sschool', '$studentid')";
	// if (!$query = mysqli_query($con, $query)) {
	//    exit(mysqli_error($con));
        'tblStudSibId' => $siblingid,
        'tblStudSibName' => strtoupper(trim($request->txtSiblName)),
        'tblStudSibAge' => trim($txtSiblAge),
        'tblStudSibGrade' => trim($txtSiblGrd),
        'tblStudentSchool' => strtoupper(trim($txtSiblSchool)),
        'tblStudSib_tblStudId' => $studentid,

	}
	
}

$y=count($relName);
for($j=0; $j<$y; $j++)
{
	$rname=$relName[$j];
	$rage=$relAge[$j];
	$rrelation=$relRelation[$j];
	$query="select * from tblstudrelative order by tblStudRelId desc limit 0, 1";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	$relativeid=$row['tblStudRelId'];
	$relativeid++;
	$query="insert into tblstudrelative(tblStudRelId, tblStudRelName, tblStudRelAge, tblStudRelRelation, tblStudRel_tblStudentId) values ('$relativeid', '$rname', '$rage', '$rrelation', '$studentid')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}
}

$query = "select * from tblstudentinfo order by tblStudInfoId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$infoid = PersonalInfo::select('tblStudInfoId')->orderby('tblStudInfoId', 'desc');
$infoid ++;
$query="insert into tblstudentinfo(tblStudInfoId, tblStudInfoFname, tblStudInfoLname, tblStudInfoMname, tblStudInfoBday, tblStudInfoBplace, tblStudInfoNationality, tblStudInfoReligion, tblStudInfoLang1, tblStudInfoLang2, tblStudInfo_tblStudentId, tblStudInfoAddBldg, tblStudInfoAddSt, tblStudInfoAddBrgy, tblStudInfoAddCity, tblStudInfoAddCountry) values ('$infoid', '$fname', '$lname', '$mname', '$bday', '$bplace', '$nat', '$religion', '$lang1', '$lang2', '$studentid', '$addBldg', '$addSt', '$addBrgy', '$addCity', '$addCountry')";
if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}



$query = "select * from tblparent where left(tblParentId, 2)='$sy' group by tblParentId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$parent=substr($row['tblParentId'], 3);
if(empty($parent))
{
	$parent='001';
}else
{
	$parent++;
}
$id2 = sprintf('%03d', $parent);
$parentid=$sy.$id2;
$query="insert into tblparent(tblParentId, tblParentRelation, tblParentFname, tblParentLname, tblParentMname, tblParentCpNo, tblParentEmail, tblParentTelNo, tblParentOccupation, tblParentCompany, tblParentWorkNo, tblParentAddBldg, tblParentAddSt, tblParentAddBrgy, tblParentAddCity, tblParentAddCountry, tblParentComAddBldg, tblParentComAddSt, tblParentComAddBrgy, tblParentComAddCity, tblParentComAddCountry) values ('$parentid', 'FATHER', '$fatherfname', '$fatherlname', '$fathermname', '$fathernum', '$fatheremail', '$fathertelnum', '$fatherjob', '$fathercom', '$fathercomnum', '$fatheraddbldg', '$fatheraddst', '$fatheraddbrgy', '$fatheraddcity', '$fatheraddcountry', '$fathercomaddbldg', '$fathercomaddst', '$fathercomaddbrgy', '$fathercomaddcity', '$fathercomaddcountry')";
if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}

$query = "select * from tblparent where left(tblParentId, 2)='$sy' group by tblParentId desc limit 0, 1";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$parent=substr($row['tblParentId'], 3);
if(empty($parent))
{
	$parent='001';
}else
{
	$parent++;
}
$id2 = sprintf('%03d', $parent);
$parentid=$sy.$id2;
$query="insert into tblparent(tblParentId, tblParentRelation, tblParentFname, tblParentLname, tblParentMname, tblParentCpNo, tblParentEmail, tblParentTelNo, tblParentOccupation, tblParentCompany, tblParentWorkNo, tblParentAddBldg, tblParentAddSt, tblParentAddBrgy, tblParentAddCity, tblParentAddCountry, tblParentComAddBldg, tblParentComAddSt, tblParentComAddBrgy, tblParentComAddCity, tblParentComAddCountry) values ('$parentid', 'MOTHER', '$motherfname', '$motherlname', '$mothermname', '$mothernum', '$motheremail', '$mothertelnum', '$motherjob', '$mothercom', '$mothercomnum', '$motheraddbldg', '$motheraddst', '$motheraddbrgy', '$motheraddcity', '$motheraddcountry', '$mothercomaddbldg', '$mothercomaddst', '$mothercomaddbrgy', '$mothercomaddcity', '$mothercomaddcountry')";
if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}

$query = "select * from tblstudhealth order by tblStudHealthId desc limit 0, 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$healthid = $row['tblStudHealthId'];
$healthid ++;
$query="insert into tblstudhealth(tblStudHealthId, tblStudHealthAllergies, tblStudHealthIllness, tblStudHealthMedication, tblStudHealthBloodType, tblStudHealthHospitalized, tblStudHealthReason, tblStudHealthEmergency,  tblStudHealthDoctor, tblStudHealthHospital, tblStudHealthHospitalNo, tblStudHealth_tblStudentId, tblStudHealthHospAddBldg, tblStudHealthHospAddSt, tblStudHealthHospAddBrgy, tblStudHealthHospAddCity, tblStudHealthHospAddCountry) values ('$healthid', '$allergies', '$illness', '$meds', '$btype', '$h2', '$reason', '$r1', '$doctor', '$hospital', '$hosnum', '$studentid', '$hosaddbldg', '$hosaddst', '$hosaddbrgy', '$hosaddcity', '$hosaddcountry')";
if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}

//requirement

$query = "select * from tblrequirement where tblRequirementFlag=1";
$result = mysqli_query($con, $query);
$arrreq=array();
while($row = mysqli_fetch_array($result))
{
	$reqid=$row['tblReqId'];
	array_push($arrreq, $reqid);
	
}
foreach ($arrreq as $value) {
	$query = "select * from tblstudreq order by tblStudReqId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$studreqid = $row['tblStudReqId'];
	$studreqid ++;
	$query="insert into tblstudreq(tblStudReqId, tblStudReq_tblStudentId, tblStudReq_tblReqId) values ('$studreqid', '$studentid', '$value')";
	$res=mysqli_query($con, $query);
}

foreach ($req as $val) {
	$query="update tblstudreq set tblStudReqStatus='Y' where tblStudReq_tblStudentId='$studentid' and tblStudReq_tblReqId='$val'";
	$result=mysqli_query($con, $query);
}


// end student requirement


foreach($parentStat as $val1)
{
	$query="select * from tblparentstatus order by tblParentStatId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$parentstatid = $row['tblParentStatId'];
	$parentstatid ++;
	$query="insert into tblparentstatus(tblParentStatId, tblParentStatus, tblParentStat_tblStudentId) values ('$parentstatid', '$val1', '$studentid')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}
}

foreach($liveswith as $val2)
{
	$query="select * from tblstudliveswith order by tblLivesWithId desc limit 0, 1";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($result);
	$liveswithid = $row['tblLivesWithId'];
	$liveswithid ++;
	$query="insert into tblstudliveswith(tblLivesWithId, tblLivesWithPerson, tblLivesWith_tblStudentId) values ('$liveswithid', '$val2', '$studentid')";
	if (!$query = mysqli_query($con, $query)) {
	   exit(mysqli_error($con));
	}
}


?>