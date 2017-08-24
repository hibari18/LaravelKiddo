<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckRequirement;
use App\PersonalInfo;
use App\FamilyInfo;
use App\HealthInfo;
use App\Level;
use App\Requirement;
use App\SchoolYear;
use App\Student;
use App\StudSiblings;
use App\StudRelative;
use App\StudLivesWith;
use App\ParentStatus;

class CheckRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stepone = CheckRequirement::where('tblStudReqFlag', 1)->get();
        $steptwo = PersonalInfo::where('tblStudInfoFlag', 1)->get();
        $stepthree = FamilyInfo::where('tblParentFlag', 1)->get();
        $stepfour = HealthInfo::where('tblStudHealthFlag', 1)->get();
        $levels = Level::where('tblLevelFlag', 1)->get();
        $requirements = Requirement::where('tblRequirementFlag', 1)->get();
        $schoolyear = SchoolYear::where('tblSchoolYearFlag', 1)->get();
        $student = Student::where('tblStudentFlag', 1)->get();


        return view('admission.index', compact('stepone', 'steptwo', 'stepthree','stepfour','levels','requirements','schoolyear','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infoid = PersonalInfo::orderBy('tblStudInfoId', 'desc')->pluck('tblStudInfoId')->first();
        $infoid ++;

        $arrreq = Requirement::where('tblRequirementFlag', 1)->pluck('tblReqId');
        
        foreach($arrreq as $value){
            $studreqid = CheckRequirement::orderBy('tblStudReqID', 'desc')->pluck('tblStudReqID')->first();
            $studreqid++;
        }
        
        $req = $request->chkReq;
        foreach($req as $val){
            CheckRequirement::where(['tblStudReq_tblStudentId', $studentid, 'tblStudReq_tblReqId', $val])->update(['tblStudReqStatus', 'Y']);
        }

        $healthid = HealthInfo::orderBy('tblStudHealthId', 'desc')->first()->pluck('tblStudHealthId');
        $healthid ++;

        
        $sy = substr(SchoolYear::select('tblSchoolYrStart')->where('tblSchoolYrActive', 'Active')->first()->tblSchoolYrStart, 2);
        $studId = substr(Student::select('tblStudentId')->whereRaw('left(tblStudentId, 2) ='.$sy)->groupBy('tblStudentId')->orderBy('tblStudentId', 'desc')->first()->tblStudentID, 3);    
            if(empty($studId)) { 
                $studId='001';
                 } 
            else { 
                $studId++;
                 } 
        $id = sprintf('%03d', $studId); 
        $studentid=$sy.$id;
        
       

        $stepone = CheckRequirement::create([
            
            'tblStudentId' => $studentid,
            'tblStudentType' => 'APPLICANT',
            'tblStudent_tblLevelId' => trim($request->selLevel),
            'tblStudentTransferee' => trim($request->r3),
        ]);


       
        
        $steptwo = PersonalInfo::create([
            
            'tblStudInfo_tblStudentId' => $infoid,
            'tblStudInfoFname' => trim($request->txtStudFname),
            'tblStudInfoLname' => trim($request->txtStudLname),
            'tblStudInfoMname' => trim($request->txtStudMname),
            'tblStudInfoBday' => trim($request->txtStudBday),
            'tblStudInfoBplace' => trim($request->txtStudBplace),
            'tblStudInfoNationality' => trim($request->txtStudNat),
            'tblStudInfoReligion' => trim($request->txtStudReligion),
            'tblStudInfoAddBldg' => trim($request->txtStudAddBldg),
            'tblStudInfoAddSt' => trim($request->txtStudAddSt),
            'tblStudInfoAddBrgy' => trim($request->txtStudAddBrgy),
            'tblStudInfoAddCity' => trim($request->txtStudAddCity),
            'tblStudInfoAddCountry' => trim($request->txtStudAddCountry),
            'tblStudInfoLang1' => trim($request->txtStudLang1),
            'tblStudInfoLang2' => trim($request->txtStudLang2),
        ]);

        $stepthree = FamilyInfo::create([

            'tblParentId' => $parentid,
            'tblParentRelation' => 'FATHER',
            'tblParentFname' => trim($request->txtFatherFname),
            'tblParentLname' => trim($request->txtFatherLname),
            'tblParentMname' => trim($request->txtFatherMname),
            'tblParentCpNo' => trim($request->txtFatherNum),
            'tblParentEmail' => trim($request->txtFatherEmail),
            'tblParentAddBldg' => trim($request->txtFatherAddBldg),
            'tblParentAddSt' => trim($request->txtFatherAddSt),
            'tblParentAddBrgy' => trim($request->txtFatherAddBrgy),
            'tblParentAddCity' => trim($request->txtFatherAddCity),
            'tblParentAddCountry' => trim($request->txtFatherAddCountry),
            'tblParentTelNo' => trim($request->txtFatherTelnum),
            'tblParentOccupation' => trim($request->txtFatherJob),
            'tblParentCompany' => trim($request->txtFatherCompany),
            'tblParentComAddBldg' => trim($request->txtFatherComAddBldg),
            'tblParentComAddSt' => trim($request->txtFatherComAddSt),
            'tblParentComAddBrgy' => trim($request->txtFatherComAddBrgy),
            'tblParentComAddCity' => trim($request->txtFatherComAddCity),
            'tblParentComAddCountry' => trim($request->txtFatherComAddCountry),
            'tblParentWorkNo' => trim($request->txtFatherComNum),
        ]);
        
        $stepthree = FamilyInfo::create([

            'tblParentId' => $parentid,
            'tblParentRelation' => 'MOTHER',
            'tblParentFname' => trim($request->txtMotherFname),
            'tblParentLname' => trim($request->txtMotherLname),
            'tblParentMname' => trim($request->txtMotherMname),
            'tblParentCpNo' => trim($request->txtMotherNum),
            'tblParentEmail' => trim($request->txtMotherEmail),
            'tblParentAddBldg' => trim($request->txtMotherAddBldg),
            'tblParentAddSt' => trim($request->txtMotherAddSt),
            'tblParentAddBrgy' => trim($request->txtMotherAddBrgy),
            'tblParentAddCity' => trim($request->txtMotherAddCity),
            'tblParentAddCountry' => trim($request->txtMotherAddCountry),
            'tblParentTelNo' => trim($request->txtMotherTelnum),
            'tblParentOccupation' => trim($request->txtMotherJob),
            'tblParentCompany' => trim($request->txtMotherCompany),
            'tblParentComAddBldg' => trim($request->txtMotherComAddBldg),
            'tblParentComAddSt' => trim($request->txtMotherComAddSt),
            'tblParentComAddBrgy' => trim($request->txtMotherComAddBrgy),
            'tblParentComAddCity' => trim($request->txtMotherComAddCity),
            'tblParentComAddCountry' => trim($request->txtMotherComAddCountry),
            'tblParentWorkNo' => trim($request->txtMotherComNum),
        ]);
        
        
        ///////////////////////////////////////////////////////////////////////////////
        
        
        
            $parent = Parent::whereRaw("left(tblParentId, 2) = '$sy'")->groupBy('tblParentId')->first()->tblParentId;

            $parent = substr($parent, 3);
            if(empty($parent))
            {
                $parent='001';
            }else
            {
                $parent++;
            }
            $id2 = sprintf('%03d', $parent);
            $parentid=$sy.$id2;


            $parent = Parent::whereRaw("left(tblParentID, 2) = '$sy'")->groupBy('tblParentID')->first()->tblParentID;

            $parent = substr($parent, 3);
            if(empty($parent))
            {
                $parent='001';
            }else
            {
                $parent++;
            }
            $id2 = sprintf('%03d', $parent);
            $parentid=$sy.$id2;

           

            foreach($parentStat as $val1)
            {
            $parentstatid = ParentStatus::select('tblParentStatId')->orderBy('tblParentStatId','desc')->first()->tblParentStatId;
            $parentstatid ++;
                
                                'tblParentStatId' => $parentstatid,
                                'tblParentStatus' => $val1,
                                'tblParentStat_tblStudentId' => $studentid,
            }

            foreach($liveswith as $val2)
            {
            $liveswithid = StudLivesWith::select('tblLivesWithId')->orderBy('tblLivesWithId','desc')->first()->tblLivesWithId;
            $liveswithid ++;
               
                                'tblLivesWithId' => $liveswithid,
                                'tblLivesWithPerson' => $val2,
                                'tblLivesWith_tblStudentId' => $studentid,
            }

            

            $sibName=$_POST['txtSiblName'];
            $sibAge=$_POST['txtSiblAge'];
            $sibGrd=$_POST['txtSiblGrd'];
            $sibSchool=$_POST['txtSiblSchool'];
            
            

            $x=count($sibName);
            for($i=0; $i<$x; $i++)
            {
                $sname=$sibName[$i];
                $sage=$sibAge[$i];
                $sgrd=$sibGrd[$i];
                $sschool=$sibSchool[$i];
        
                $siblingid = StudSibling::select('tblStudSibId')->orderBy('tblStudSibId', 'desc')->first()->tblStudSibId;
                $siblingid++;

                'tblStudSibId' => $siblingid,
                'tblStudSibName' => strtoupper(trim($request->$sname)),
                'tblStudSibAge' => trim($sage),
                'tblStudSibGrade' => trim($sgrd),
                'tblStudentSchool' => strtoupper(trim($sschool)),
                'tblStudSib_tblStudId' => $studentid,
            }


            

            $relName=$_POST['txtRelName'];
            $relAge=$_POST['txtRelAge'];
            $relRelation=$_POST['txtRelRelation'];

            $y=count($relName);
            for($j=0; $j<$y; $j++)
            
            {
                $rname=$relName[$j];
                $rage=$relAge[$j];
                $rrelation=$relRelation[$j];

            $relativeid= StudRelative::('tblStudRelId')->orderby('tblStudRelId', 'desc')->first()->tblStudRelId;
            $relativeid++;

            'tblStudRelId' => $relativeid,
            'tblStudRelName' => strtoupper(trim($rname)),
            'tblStudRelAge' => $rage,
            'tblStudRelRelation' => strtoupper(trim($rrelation)),
            'tblStudRel_tblStudentId' => $studentid,
            
            }



        ]);

         $stepfour = HealthInfo::create([

            'tblStudHealth_tblStudentId' => $healthid,
            'tblStudHealthAllergies' => trim($request->txtHealthAllergies),
            'tblStudHealthIllness' => trim($request->txtHealthIllness),
            'tblStudHealthMedication' => trim($request->txtHealthMeds),
            'tblStudHealthBloodType' => trim($request->txtHealthBtype),
            'tblStudHealthHospitalized' => trim($request->h2),
            'tblStudHealthReason' => trim($request->txtHealthReason),
            'tblStudHealthEmergency' => trim($request->r1),
            'tblStudHealthDoctor' => trim($request->txtHealthDoctor),
            'tblStudHealthHospital' => trim($request->txtHealthHospital),
            'tblStudHealthHospitalNo' => trim($request->txtHealthHosNum),
            'tblStudHealthHospAddBldg' => trim($request->txtHealthAddBldg),
            'tblStudHealthHospAddSt' => trim($request->txtHealthAddSt),
            'tblStudHealthHospAddBrgy' => trim($request->txtHealthAddBrgy),
            'tblStudHealthHospAddCity' => trim($request->txtHealthAddCity),
            'tblStudHealthHospAddCountry' => trim($request->txtHealthAddCountry),
        ]);
        
        $message = 2;
        return redirect()->route('admission.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
