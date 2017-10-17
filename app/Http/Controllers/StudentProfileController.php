<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Faculty;
use App\PersonalInfo;
use DB;
use App\FamilyInfo;
use App\HealthInfo;
use App\ParentStatus;
use App\StudSiblings;
use App\StudLivesWith;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studprofile = Student::where('tblStudentFlag', 1)->get();
        $facprofile = Faculty::where('tblFacultyFlag', 1)->get();

        $name = DB::select(DB::raw("select s.tblStudentId, concat(si.tblStudInfoLname, ', ', si.tblStudInfoFname, ' ', si.tblStudInfoMname) as name, s.tblStudentType from tblstudent s, tblstudentinfo si where s.tblStudentId=si.tblStudInfo_tblStudentId and s.tblStudentType='OFFICIAL' and s.tblStudentFlag=1 and si.tblStudInfoFlag=1"));
        //var_dump($name);
        
        return view('profile.index', compact('studprofile','facprofile', 'name'));

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
        
      //
        
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
        $id= $request->txtStudId;

        $personalinfo = PersonalInfo::where('tblStudInfo_tblStudentId', $request->txtStudId)->where('tblStudInfoFlag', 1)->get();
        $fatherinfo = FamilyInfo::where('tblParent_tblStudentId', $request->txtStudId)->where('tblParentFlag', 1)->where('tblParentRelation', 'FATHER')->get();
        $motherinfo = FamilyInfo::where('tblParent_tblStudentId', $request->txtStudId)->where('tblParentFlag', 1)->where('tblParentRelation', 'MOTHER')->get();

        $liveswith = ['Father and Mother', 'Stepfather and Mother', 'Father', 'Stepmother and Father', 'Mother', 'Relative/s'];
        $list_of_liveswith = StudLivesWith::where('tblLivesWith_tblStudentId', $request->txtStudId)->where('tblLivesWithFlag', 1)->pluck('tblLivesWithPerson');
        
        $healthinfo = HealthInfo::where('tblStudHealth_tblStudentId', $request->txtStudId)->where('tblStudHealthFlag', 1)->get();

        $parent_status = ['Parents Married', 'Father Deceased', 'Father Remarried', 'Mother Deceased', '>Mother Remarried', 'Applicant Adopted', 'Single Parent', 'Parents Separated/Divorced'];
        $list_of_status = ParentStatus::where('tblParentStat_tblStudentId', $request->txtStudId)->where('tblParentStatFlag', 1)->pluck('tblParentStatus');

        $siblings = StudSiblings::where('tblStudSib_tblStudId', $request->txtStudId)->get();

        return view('profile.studentprofile', compact('id', 'personalinfo', 'fatherinfo', 'motherinfo', 'liveswith', 'list_of_liveswith','healthinfo', 'parent_status', 'list_of_status', 'siblings'));
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
        if(isset($_POST['btnStud']))
        {
            $id= $request->txtStudId;
            
            $fname= $request->txtStudFname;
            $mname= $request->txtStudMname;
            $lname= $request->txtStudLname;
            $bday= $request->txtStudBday;
            $bplace= $request->txtStudBplace;
            $nat= $request->txtStudNat;
            $reg= $request->txtStudReligion;
            $bldg= $request->txtStudAddBldg;
            $street= $request->txtStudAddSt;
            $brgy= $request->txtStudAddBrgy;
            $city= $request->txtStudAddCity;
            $country= $request->txtStudAddCountry;
            $flang= $request->txtStudLang1;
            $slang= $request->txtStudLang2;

            $pfname= $request->txtFatherFname;
            $pmname= $request->txtFatherMname;
            $plname= $request->txtFatherLname;
            $pno= $request->txtFatherNum;
            $pemail= $request->txtFatherEmail;
            $pbldg= $request->txtFatherAddBldg;
            $pstreet= $request->txtFatherAddSt;
            $pbrgy= $request->txtFatherAddBrgy;
            $pcity= $request->txtFatherAddCity;
            $pcountry= $request->txtFatherAddCountry;
            $ptel= $request->txtFatherTelnum;
            $pocc= $request->txtFatherJob;
            $pcomp= $request->txtFatherCompany;
            $pcbldg= $request->txtFatherComAddBldg;
            $pcstreet= $request->txtFatherComAddSt;
            $pcbrgy= $request->txtFatherComAddBrgy;
            $pccity= $request->txtFatherComAddCity;
            $pccountry= $request->txtFatherComAddCountry;
            $pcno= $request->txtFatherComNum;

            $pmfname= $request->txtMotherFname;
            $pmmname= $request->txtMotherMname;
            $pmlname= $request->txtMotherLname;
            $pmno= $request->txtMotherNum;
            $pmemail= $request->txtMotherEmail;
            $pmbldg= $request->txtMotherAddBldg;
            $pmstreet= $request->txtMotherAddSt;
            $pmbrgy= $request->txtMotherAddBrgy;
            $pmcity= $request->txtMotherAddCity;
            $pmcountry= $request->txtMotherAddCountry;
            $pmtel= $request->txtMotherTelnum;
            $pmocc= $request->txtMotherJob;
            $pmcomp= $request->txtMotherCompany;
            $pmcbldg= $request->txtMotherComAddBldg;
            $pmcstreet= $request->txtMotherComAddSt;
            $pmcbrgy= $request->txtMotherComAddBrgy;
            $pmccity= $request->txtMotherComAddCity;
            $pmccountry= $request->txtMotherComAddCountry;
            $pmcno= $request->txtMotherComNum;

            $pstat= $request->chkParentStat;
            $lwith= $request->chkLivesWith;

            $all= $request->txtHealthAllergies;
            $ill= $request->txtHealthIllness;
            $med= $request->txtHealthMeds;
            $btype= $request->selHealthBtype;
            $hos= $request->h2;
            $reason= $request->txtHealthReason;
            $emer= $request->r1;
            $doctor= $request->txtHealthDoctor;
            $hosp= $request->txtHealthHospital;
            $hno= $request->txtHealthHosNum;
            $hbldg= $request->txtHealthAddBldg;
            $hstreet= $request->txtHealthAddSt;
            $hbrgy= $request->txtHealthAddBrgy;
            $hcity= $request->txtHealthAddCity;
            $hcountry= $request->txtHealthAddCountry;


            $personalupdate = PersonalInfo::where('tblStudInfo_tblStudentId', $id)->update([
                    'tblStudInfoFname' => $fname,
                    'tblStudInfoLname' => $lname,
                    'tblStudInfoMname' => $mname,
                    'tblStudInfoBday' => $bday,
                    'tblStudInfoBplace' => $bplace,
                    'tblStudInfoNationality' => $nat,
                    'tblStudInfoReligion' => $reg,
                    'tblStudInfoAddBldg' => $bldg,
                    'tblStudInfoAddSt' => $street,
                    'tblStudInfoAddBrgy' => $brgy,
                    'tblStudInfoAddCity' => $city,
                    'tblStudInfoAddCountry' => $country,
                    'tblStudInfoLang1' => $flang,
                    'tblStudInfoLang2' => $slang,

            ]);

            $parentupdate = FamilyInfo::where('tblParent_tblStudentId', $id)->update([

                'tblParentFname' => trim($pfname),
                'tblParentLname' => trim($plname),
                'tblParentMname' => trim($pmname),
                'tblParentCpNo' => trim($pno),
                'tblParentEmail' => trim($pemail),
                'tblParentAddBldg' => trim($pbldg),
                'tblParentAddSt' => trim($pstreet),
                'tblParentAddBrgy' => trim($pbrgy),
                'tblParentAddCity' => trim($pcity),
                'tblParentAddCountry' => trim($pcountry),
                'tblParentTelNo' => trim($ptel),
                'tblParentOccupation' => trim($pocc),
                'tblParentCompany' => trim($pcomp),
                'tblParentComAddBldg' => trim($pcbldg),
                'tblParentComAddSt' => trim($pcstreet),
                'tblParentComAddBrgy' => trim($pcbrgy),
                'tblParentComAddCity' => trim($pccity),
                'tblParentComAddCountry' => trim($pccountry),
                'tblParentWorkNo' => trim($pcno),
            ]);
            
            $parentupdate = FamilyInfo::where('tblParent_tblStudentId', $id)->update([

                'tblParentFname' => trim($pmfname),
                'tblParentLname' => trim($pmlname),
                'tblParentMname' => trim($pmmname),
                'tblParentCpNo' => trim($pmno),
                'tblParentEmail' => trim($pmemail),
                'tblParentAddBldg' => trim($pmbldg),
                'tblParentAddSt' => trim($pmstreet),
                'tblParentAddBrgy' => trim($pmbrgy),
                'tblParentAddCity' => trim($pmcity),
                'tblParentAddCountry' => trim($pmcountry),
                'tblParentTelNo' => trim($pmtel),
                'tblParentOccupation' => trim($pmocc),
                'tblParentCompany' => trim($pmcomp),
                'tblParentComAddBldg' => trim($pmcbldg),
                'tblParentComAddSt' => trim($pmcstreet),
                'tblParentComAddBrgy' => trim($pmcbrgy),
                'tblParentComAddCity' => trim($pmccity),
                'tblParentComAddCountry' => trim($pmccountry),
                'tblParentWorkNo' => trim($pmcno),
            ]);

            $stepfour = HealthInfo::where('tblStudHealth_tblStudentId', $id)->update([

                'tblStudHealthAllergies' => trim($all),
                'tblStudHealthIllness' => trim($ill),
                'tblStudHealthMedication' => trim($med),
                'tblStudHealthBloodType' => trim($btype),
                'tblStudHealthHospitalized' => trim($hos),
                'tblStudHealthReason' => trim($reason),
                'tblStudHealthEmergency' => trim($emer),
                'tblStudHealthDoctor' => trim($doctor),
                'tblStudHealthHospital' => trim($hosp),
                'tblStudHealthHospitalNo' => trim($hno),
                'tblStudHealthHospAddBldg' => trim($hbldg),
                'tblStudHealthHospAddSt' => trim($hstreet),
                'tblStudHealthHospAddBrgy' => trim($hbrgy),
                'tblStudHealthHospAddCity' => trim($hcity),
                'tblStudHealthHospAddCountry' => trim($hcountry),
            ]);
        
        }
        $message = 4;
        return redirect()->route('profile.index')->with('message', $message);
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
