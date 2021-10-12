<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Services;

/**
 * Description of Home
 *
 * @author 
 */

use App\Http\Services\Config;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Session;
use Validator;

class Home extends Config
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request_data = [];
        $all_jobs = $this->guzzleRequest('AllJobs', 'GET', $request_data);
        if(!empty($all_jobs)) {
            Session::put('Jobs',$all_jobs);
        }

        //dd($all_jobs);
        return view('dashboard', compact('all_jobs'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function personal()
    {
        return view('personal');
    }

    public function contact()
    {
        $request_data = [];
        $countries = $this->guzzleRequest('Countries', 'GET', $request_data);
        //dd($countries);
        return view('contact', compact('countries'));
    }


    public function skills()
    {
        return view('skills');
    }

    public function education()
    {
        $request_data = [];
        $educational = $this->guzzleRequest('EducationLevel', 'GET', $request_data);
        return view('educational', compact('educational'));
    }

    public function refrence()
    {
        return view('refrence');
    }

    public function experience()
    {
        return view('careers');
    }

    public function certification()
    {
        return view('certification');
    }
    
    public function armyForm()
    {
        return view('armyForm');
    }

    public function preview()
    {
        return view('preview');
    }
    
    public function signUp()
    {
        return view('sign_up');
    }

    public function signIn()
    {
        return view('welcome');
    }

    public function forgotPassword()
    {
        return view('forgotPassword');
    }


    public function jobsHistory()
    {
        $client = new Client(['base_uri' => config('config.apis_url')]);
        $res = $client->request('get', 'AllJobs?id='.Session::get('userInfo')['value']['ApplicantId']);
        $status = $res->getStatusCode();
        
        if ($status == 200) {
            $resBodyContents = $res->getBody()->getContents();
            $appliedJobs = json_decode($resBodyContents, true);
        } else {
            return $this->jsonErrorResponse('Server responded with a status code of ' . $status);
        }

        return view('appliedJobs', compact('appliedJobs'));
    }
    

    public function getDegrees($id=null)
    {
        $client = new Client(['base_uri' => config('config.apis_url')]);
            $res = $client->request('get', 'Degrees?EducationLevelId='.$id);
            $status = $res->getStatusCode();
            if ($status == 200) {
                $resBodyContents = $res->getBody()->getContents();
                $resBodyContents = json_decode($resBodyContents, true);

                return $resBodyContents;
            } else {
                return $this->jsonErrorResponse('Server responded with a status code of ' . $status);
            }
        //$degrees = $this->guzzleRequest('Degrees', 'GET', '?EducationLevelId='.$id);
            return response()->json($resBodyContents);
        //dd($resBodyContents);
    }

    public function getProvinces($id=null)
    {
        $client = new Client(['base_uri' => config('config.apis_url')]);
        $res = $client->request('get', 'Province?countryid='.$id);
        $status = $res->getStatusCode();
        if ($status == 200) {
            $resBodyContents = $res->getBody()->getContents();
            $resBodyContents = json_decode($resBodyContents, true);

            return $resBodyContents;
        } else {
            return $this->jsonErrorResponse('Server responded with a status code of ' . $status);
        }
        return response()->json($resBodyContents);
    }

    public function getCities($id=null)
    {
        $client = new Client(['base_uri' => config('config.apis_url')]);
            $res = $client->request('get', 'City?provinceid='.$id);
            $status = $res->getStatusCode();
            if ($status == 200) {
                $resBodyContents = $res->getBody()->getContents();
                $resBodyContents = json_decode($resBodyContents, true);

                return $resBodyContents;
            } else {
                return $this->jsonErrorResponse('Server responded with a status code of ' . $status);
            }
        //$degrees = $this->guzzleRequest('Degrees', 'GET', '?EducationLevelId='.$id);
            return response()->json($resBodyContents);
        //dd($resBodyContents);
    }

    public function getEducationById($id=null)
    {
        //dd(Session::get('userInfo')['value']['Education'][$id]);
        if(Session::has('userInfo')) {
            if(Session::get('userInfo')['value']['Education'][$id]) {
                //Session::put('userInfo')['value']['Education'][$id]['StartDate'] = date('m-d-Y',strtotime(Session::get('userInfo')['value']['Education'][$id]['StartDate']));
                //Session::put('userInfo')['value']['Education'][$id]['EndDate'] = date('m-d-Y',strtotime(Session::get('userInfo')['value']['Education'][$id]['EndDate']));
                //dd(date('m-d-Y',strtotime(Session::get('userInfo')['value']['Education'][$id]['StartDate'])));
                $editEducation = Session::get('userInfo')['value']['Education'][$id] ;
            }
        }
        //dd(Session::get('userInfo')['value']['Education'][$id]);
        //$degrees = $this->guzzleRequest('Degrees', 'GET', '?EducationLevelId='.$id);
            return response()->json(Session::get('userInfo')['value']['Education'][$id]);
        //dd($resBodyContents);
    }

    public function getExprienceById($id=null)
    {
        //dd(Session::get('userInfo')['value']['Experince'][$id]);
        if(Session::has('userInfo')) {
            if(Session::get('userInfo')['value']['Experince'][$id]) {
                return response()->json(Session::get('userInfo')['value']['Experince'][$id]);
            }
        }
    }

    public function getCertificationById($id=null)
    {
        //dd(Session::get('userInfo')['value']['Education'][$id]);
        if(Session::has('userInfo')) {
            if(Session::get('userInfo')['value']['Certifications'][$id]) {
                return response()->json(Session::get('userInfo')['value']['Certifications'][$id]);
            }
        }
    }

    public function getSkillById($id=null)
    {
        //dd(Session::get('userInfo')['value']['Education'][$id]);
        if(Session::has('userInfo')) {
            if(Session::get('userInfo')['value']['Skills'][$id]) {
                return response()->json(Session::get('userInfo')['value']['Skills'][$id]);
            }
        }
    }


    public function getReferenceById($id=null)
    {
        //dd(Session::get('userInfo')['value']['Education'][$id]);
        if(Session::has('userInfo')) {
            if(Session::get('userInfo')['value']['Ref'][$id]) {
                return response()->json(Session::get('userInfo')['value']['Ref'][$id]);
            }
        }
    }

    public function getJobById($id=null)
    {
        Session::put('lastDate',date('d-M-Y', strtotime(Session::get('Jobs')[$id]['ValidityDate'])));
        $dataArray = Session::get('Jobs')[$id];
        foreach($dataArray as $key=>$value)
        {
            $dataArray['lastDate'] = date('d-M-Y', strtotime(Session::get('Jobs')[$id]['ValidityDate']));
        }
        //dd($dataArray);
        if(Session::has('Jobs')) {
            if(Session::get('Jobs')[$id]) {
                return response()->json($dataArray);
            }
        }
    }

    public function applyJob()
    {
        $request_params = Request::input();

        $dateOfBirth = !empty(Session::get('userInfo')['value']['Dob']) ? Session::get('userInfo')['value']['Dob'] : '';
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        //dd(Session::get('userInfo'));
        if(empty(Session::get('userInfo')['value']['Education'])){
            return redirect()->route('dashboard')->with('error_message', "Please add your Education First.");
        }

        if(empty(Session::get('userInfo')['value']['Experince'])){
            return redirect()->route('dashboard')->with('error_message', "Please add your Experience First.");
        }

        if(!empty(Session::get('userInfo')['value']['Education'])) {
            $count = count(Session::get('userInfo')['value']['Education']);
            $degreeTitle = Session::get('userInfo')['value']['Education'][$count-1]['DegreeTitle'];
            //dd($degreeTitle);
        }

        if(!empty($request_params['qualification'])) {
           $qualificationArray =  explode(" /",$request_params['qualification']);
           //dd($qualificationArray);
           if(!in_array($degreeTitle, $qualificationArray)){
                return redirect()->route('dashboard')->with('error_message', "Your education is not matched with our criteria.");
           }
           //dd($qualificationArray);
        }

        //dd("i am here");
        if(!empty($request_params['maxAge']) && $request_params['maxAge'] <= $diff->format('%y')){
            return redirect()->route('dashboard')->with('error_message', "Your age is not matched with our criteria.");
        }
        $data['value']['Jobid'] = !empty($request_params['JobID']) ? $request_params['JobID']: '';
        $data['value']['ApplicantId'] = !empty(Session::get('userInfo')['value']['ApplicantId']) ? Session::get('userInfo')['value']['ApplicantId']: '';
        //dd($data);
        $result = $this->curl_request('JobApply', $data);
        //dd($result);
        if($result['Code'] == 200) {
            return redirect()->route('dashboard')->with('success_message', $result['Message']);
        }
        else {
            return redirect()->route('dashboard')->with('error_message', $result['Message']);
        }
    }

    

    public function storePersonalInfo($request) {
        
        $request_params = $request->except('_token');

        $validate = Validator::make($request_params, ['profile_image' => 'image|mimes:jpeg,png,jpg|max:250']);
        if ($validate->fails()) {
            return redirect()->back()->withInput($request_params)->with('error_message', $validate->errors()->first());
        }

        if($request->hasFile('profile_image')) {
         
            //get filename with extension
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = Session::get('userInfo')['value']['ApplicantId'].'.'.$extension;

            //Upload File to external server
            \Storage::disk('sftp')->put($filenametostore, fopen($request->file('profile_image'), 'r+'));
    
        }

        if($request->hasFile('cvFile')) {
         
            //get filename with extension
            $filenamewithextension = $request->file('cvFile')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('cvFile')->getClientOriginalExtension();
     
            //filename to store
            $DisabilityCertificate = 'certificate_'.Session::get('userInfo')['value']['ApplicantId'].'.'.$extension;

            //Upload File to external server
            \Storage::disk('public')->put($DisabilityCertificate, fopen($request->file('cvFile'), 'r+'));
    
        }
        //dd($request_params['IsMilitaryPerson']);
        $data['value']['ApplicantId'] = Session::get('userInfo')['value']['ApplicantId'];
        $data['value']['Password'] = Session::get('userInfo')['value']['Password'];
        $data['value']['Name'] = !empty($request_params['name']) ? $request_params['name']: '';
        $data['value']['Fname'] = !empty($request_params['fname']) ? $request_params['fname']: '';
        $data['value']['Cnic'] = !empty($request_params['cnic']) ? $request_params['cnic']: '';
        $data['value']['Dob'] =  date('d-M-Y', strtotime($request_params['Dob']));
        $data['value']['DobOfShow'] = !empty($request_params['Dob']) ? $request_params['Dob'] : '00-Jan-1970';
        $data['value']['Email'] = !empty($request_params['email']) ? $request_params['email']: '';
        $data['value']['ContactNo1'] = !empty($request_params['ContactNo1']) ? $request_params['ContactNo1']:'';
        $data['value']['ContactNo2'] = !empty($request_params['ContactNo2']) ? $request_params['ContactNo2']: '';
        $data['value']['Relegionid'] = $request_params['Relegionid'];
        $data['value']['Gender'] = !empty($request_params['gender']) ? $request_params['gender']: '';
        $data['value']['IsGovtServant'] = $request_params['IsGovtServant'];
        $data['value']['Disability'] = (($request_params['disability']== 'true') ? '1' : '0');
        $data['value']['DisabilityDescription'] = !empty($request_params['DisabilityDescription']) ? $request_params['DisabilityDescription']: '';
        $data['value']['FileURL'] = "";
        $data['value']['ImageURL'] = !empty($filenametostore) ? $filenametostore : "";
        $data['value']['IsMilitaryPerson'] = (($request_params['IsMilitaryPerson'] == '1') ? '1' : '0');
        $data['value']['IsMarried'] =  !empty($request_params['IsMarried']) ? '1' : '0';
        $data['value']['DisabilityCertificate'] = !empty($DisabilityCertificate) ? $DisabilityCertificate : "";
        $data['value']['IsMilitaryPerson'] = (($request_params['IsMilitaryPerson'] == '1') ? '1' : '0');
        $data['value']['personalData'] = 'ok';

        //dd($data);
      //  $data['value']['CityId'] = !empty($request_params['CityId']) ? $request_params['CityId']: '0';
       // $data['value']['DomicileDistriceId'] = !empty($request_params['DomicileDistriceId']) ? $request_params['DomicileDistriceId']: '0';
        if(Session::has('userInfo'))
        {
            //dd(Session::get('userInfo'));

            //Session::forget('userInfo');
            //Session::put('userInfo',$data);
            if(empty(Session::get('userInfo')['value']['Fname'])){
                Session::put('userInfo', $data);
            }
            else if(Session::get('userInfo')['value']['Fname'] != $request_params['fname']){
                Session::put('userInfo.value.Fname', $request_params['fname']);
            }
            else if(Session::get('userInfo')['value']['ContactNo2'] != $request_params['ContactNo2']){
                Session::put('userInfo.value.ContactNo2',  $request_params['ContactNo2']);
            }
            else if(Session::get('userInfo')['value']['ContactNo1'] != $request_params['ContactNo1']){
                Session::put('userInfo.value.ContactNo1',  $request_params['ContactNo1']);
            }
            else if(Session::get('userInfo')['value']['Relegionid'] != $request_params['Relegionid']){
                Session::put('userInfo.value.Relegionid',  $request_params['Relegionid']);
            }
            else if(Session::get('userInfo')['value']['Gender'] != $request_params['gender']){
                Session::put('userInfo.value.Gender',  $request_params['gender']);
            }
            else if(Session::get('userInfo')['value']['IsMilitaryPerson'] != $request_params['IsMilitaryPerson']){
                //dd($request_params['IsMilitaryPerson']);
                Session::put('userInfo.value.IsMilitaryPerson',  $request_params['IsMilitaryPerson']);
            }
            else if(Session::get('userInfo')['value']['IsGovtServant'] != $request_params['IsGovtServant']){
                Session::put('userInfo.value.IsGovtServant',  $request_params['IsGovtServant']);
            }
            else if(Session::get('userInfo')['value']['IsMarried'] != $request_params['IsMarried']){
                Session::put('userInfo.value.IsMarried',  $request_params['IsMarried']);
            }
            else if(Session::get('userInfo')['value']['ImageURL'] != $filenametostore){
                Session::put('userInfo.value.ImageURL',  $filenametostore);
            }
        }
       
        
       //dd(json_encode(Session::get('userInfo')));

        
        
        //$data['value']['maritalStatus'] = $request_params['Relegionid'];
        
        

        // $data['value']['Provinceid'] = !empty($request_params['Provinceid']) ? $request_params['Provinceid']: '0';
        // $data['value']['Maddress'] = !empty($request_params['Maddress']) ? $request_params['Maddress']: '';
        // $data['value']['PAddress'] = !empty($request_params['PAddress']) ? $request_params['PAddress']: '';
        // $data['value']['Password'] = !empty($request_params['Password']) ? $request_params['Password']: '';
        
        // $data['value']['IsMilitaryPerson'] = !empty($request_params['IsMilitaryPerson']) ? $request_params['IsMilitaryPerson']: '0';


        // $data['value']['Education'][0]['DegreeLevelId'] = !empty($request_params['DegreeLevelId']) ? $request_params['DegreeLevelId']: '0';
        // $data['value']['Education'][0]['DegreeId'] = !empty($request_params['DegreeId']) ? $request_params['DegreeId'] : '0';
        // $data['value']['Education'][0]['StartDate'] = !empty($request_params['StartDate']) ?  date('d-M-Y', strtotime($request_params['StartDate'])) : '01-Jan-1970'; 
        // $data['value']['Education'][0]['EndDate'] = !empty($request_params['EndDate']) ? date('d-M-Y', strtotime($request_params['EndDate'])) : '01-Jan-1970';
        // $data['value']['Education'][0]['InstitueName'] = !empty($request_params['InstitueName']) ? $request_params['InstitueName'] : '' ;
        // $data['value']['Education'][0]['ObtainedMarks'] = !empty($request_params['ObtainedMarks']) ? $request_params['ObtainedMarks'] : '0';
        // $data['value']['Education'][0]['TotalMarks'] = !empty($request_params['TotalMarks']) ? $request_params['TotalMarks'] : '0';
        // $data['value']['Education'][0]['IsResultAnnounced'] =  !empty($request_params['IsResultAnnounced']) ? $request_params['IsResultAnnounced'] : 'false';
        

        // $data['value']['Experince'][0]['ExperinceId'] = '1';
        // $data['value']['Experince'][0]['ApplicantId'] = Session::get('userInfo')['ApplicantId'];
        // $data['value']['Experince'][0]['CompanyName'] = !empty($request_params['CompanyName']) ? $request_params['CompanyName']: '';
        // $data['value']['Experince'][0]['Designation'] = !empty($request_params['Designation']) ? $request_params['Designation'] : '';
        // $data['value']['Experince'][0]['StartDate'] = !empty($request_params['StartDate']) ?  date('d-M-Y', strtotime($request_params['StartDate'])) : '01-Jan-1970';
        // $data['value']['Experince'][0]['EndDate'] =  !empty($request_params['EndDate']) ? date('d-M-Y', strtotime($request_params['EndDate'])) : '01-Jan-1970';

        // $data['value']['Experince'][0]['IsOngoing'] = !empty($request_params['IsOngoing']) ? $request_params['IsOngoing'] : 'false' ;
        // $data['value']['Experince'][0]['ReasonofLeaving'] = '';
        // $data['value']['Experince'][0]['Salary'] =  !empty($request_params['Salary']) ? $request_params['Salary'] : '0';
        
        // $data['value']['Experince'][0]['Responsabilites'] =  !empty($request_params['Responsabilites']) ? $request_params['Responsabilites'] : '';
        
        // $data['value']['Certifications'][0]['CertificationId'] = '0';
        // $data['value']['Certifications'][0]['CertificationTitle'] = '';
        // $data['value']['Certifications'][0]['ApplicantId'] = Session::get('userInfo')['ApplicantId'];;
        // $data['value']['Certifications'][0]['IssuingAuthority'] = '';
        // $data['value']['Certifications'][0]['StartDate'] = '01-Jan-1970'; 
        // $data['value']['Certifications'][0]['EndDate'] =  '01-Jan-1970';


        // $data['value']['Skills'][0]['SkillId'] = '0';
        // $data['value']['Skills'][0]['SkillName'] = '';
        // $data['value']['Skills'][0]['ApplicantId'] = Session::get('userInfo')['ApplicantId'];

        // $data['value']['Ref'][0]['RefId'] = '0';
        // $data['value']['Ref'][0]['RefName'] = '';
        // $data['value']['Ref'][0]['RefContact'] = '';
        // $data['value']['Ref'][0]['RefEmail'] = '';
        // $data['value']['Ref'][0]['RefRelation'] = '';
        // $data['value']['Ref'][0]['Applicantid'] = Session::get('userInfo')['ApplicantId'];
        //dd(json_encode($data));
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'http://192.168.170.140:1999/api/RecruitmentApplicantInfo');
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        // $headers = [
        //     'Content-Type: application/json'
        // ];

        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // $server_output = curl_exec($ch) ;
        // curl_close ($ch);
        // $response = json_decode($server_output, true) ;
        return redirect()->route('personal')->with('success_message', 'You have saved your data successfully!');
    }

    public function storeContactInfo() {
        $request_params = Request::input();
        unset($request_params['_token']);
        $dataArray = Session::get('userInfo');
        //dd(Session::get('userInfo'));
        $ProvinceId = !empty($request_params['ProvinceId']) ? $request_params['ProvinceId']: '';
        $ProvinceArray = explode("_",$ProvinceId);

        $CityId = !empty($request_params['CityId']) ? $request_params['CityId']:'';
        $CityArray = explode("_",$CityId);
        $DomicileId =!empty($request_params['DomicileDistriceId']) ? $request_params['DomicileDistriceId'] : '';
        $DomicileArray = explode("_",$DomicileId);

        $data['value']['PAddress'] = !empty($request_params['PAddress']) ? $request_params['PAddress']: '';
        $data['value']['Maddress'] = !empty($request_params['Maddress']) ? $request_params['Maddress']: '';
        //dd($request_params);
        if(Session::has('userInfo'))
        {
            foreach($dataArray as $key=>$value)
            {
                $dataArray[$key]['Provinceid'] = !empty($ProvinceArray[1]) ? $ProvinceArray[1]: '';
                $dataArray[$key]['country'] = !empty($request_params['country']) ? $request_params['country']: '';
                $dataArray[$key]['ProvinceName'] = !empty($ProvinceArray[0]) ? $ProvinceArray[0]: '';
                $dataArray[$key]['DomicileDistriceId'] = !empty($DomicileArray['1']) ? $DomicileArray['1']: '0';
                $dataArray[$key]['CityId'] = !empty($CityArray[1]) ? $CityArray['1']: '';
                $dataArray[$key]['CityName'] = !empty($CityArray[0]) ? $CityArray['0']: '';
                $dataArray[$key]['PAddress'] = !empty($request_params['PAddress']) ? $request_params['PAddress']: '';
                $dataArray[$key]['Maddress'] = !empty($request_params['Maddress']) ? $request_params['Maddress']: '';
                $dataArray[$key]['contactData'] = 'ok';
                //$dataArray[$key]['IsMilitaryPerson'] = 1;
            }
            Session::put('userInfo',$dataArray);
        }
       // dd($dataArray);
        return redirect()->route('contact')->with('success_message', 'You have saved your data successfully!');
        //dd(Session::get('userInfo'));
    }

    public function storeEducationalInfo() {
        $request_params = Request::input();

        unset($request_params['_token']);
        //dd($request_params);
        $DegreeLevelId = !empty($request_params['DegreeLevelId']) ? $request_params['DegreeLevelId'] : '0';
        $DegreeId = !empty($request_params['DegreeId']) ? $request_params['DegreeId'] : '0';
        $DegreeArray = explode("_",$DegreeId);
        //dd($DegreeArray);
        $InstitueName = !empty($request_params['InstitueName']) ? $request_params['InstitueName'] : '0';
        $StartDate = date('d-M-Y', strtotime($request_params['StartDate'])); 
        $EndDate  =  date('d-M-Y', strtotime($request_params['EndDate']));
        $TotalMarks = !empty($request_params['TotalMarks']) ? $request_params['TotalMarks'] : '0';
        $ObtainedMarks = !empty($request_params['ObtainedMarks']) ? $request_params['ObtainedMarks'] : '0';
        
        $data['value']['Education'][0]['IsResultAnnounced'] = $request_params['IsResultAnnounced'];
        $dataArray = Session::get('userInfo');

        //dd($dataArray);
        if(Session::has('userInfo'))
        {
            //dd($request_params['education_id']);
            if(empty($request_params['education_id'])) {
                //dd(Session::get('userInfo')['value']['EducationIndex']);
                $i = 0;
                if(isset($request_params['education_id']) && $request_params['education_id'] == '0') {
                    $i = $request_params['education_id'];
                }
                else if(!empty(Session::get('userInfo')['value']['EducationIndex']) && Session::get('userInfo')['value']['EducationIndex'] != '0') {
                    //dd(Session::get('userInfo')['value']['EducationIndex']);
                    $i = Session::get('userInfo')['value']['EducationIndex'];
                }
            }
            else {
                //dd('I am here in else condition');
                $i = $request_params['education_id'];
            }
           //dd($i);
            foreach($dataArray as $key=>$value)
            {
                $dataArray[$key]['Education'][$i]['ApplicantId'] = Session::get('userInfo')['value']['ApplicantId'];
                $dataArray[$key]['Education'][$i]['DegreeLevelId'] = $DegreeLevelId;
                $dataArray[$key]['Education'][$i]['DegreeId'] = $DegreeArray[1];
                $dataArray[$key]['Education'][$i]['DegreeTitle'] = $DegreeArray[0];
                $dataArray[$key]['Education'][$i]['StartDate'] = $StartDate;
                $dataArray[$key]['Education'][$i]['EndDate'] = $EndDate;
                //$dataArray[$key]['Education'][$i]['StartDate'] = $request_params['StartDate'];
               // $dataArray[$key]['Education'][$i]['EndDate'] = $request_params['EndDate'];
                $dataArray[$key]['Education'][$i]['InstitueName'] = $InstitueName;
                $dataArray[$key]['Education'][$i]['ObtainedMarks'] = $ObtainedMarks;
                $dataArray[$key]['Education'][$i]['TotalMarks'] = $TotalMarks;
                $dataArray[$key]['Education'][$i]['IsResultAnnounced'] = $request_params['IsResultAnnounced'];
                $dataArray[$key]['EducationIndex'] = $i+1;
            }
            Session::put('userInfo',$dataArray);
            //dd($dataArray);
        }

        return redirect()->route('education')->with('success_message', 'You have saved your data successfully!');  
    }

    public function storeExperienceInfo() {
       $request_params = Request::input();
      // dd($request_params);

        unset($request_params['_token']);
        
        $CompanyName = !empty($request_params['CompanyName']) ? $request_params['CompanyName'] : '';
        $Designation = !empty($request_params['Designation']) ? $request_params['Designation'] : '';
        $StartDate = date('d-M-Y', strtotime($request_params['StartDate'])); 
        $EndDate  =  date('d-M-Y', strtotime($request_params['EndDate']));
        $IsOngoing = !empty($request_params['IsOngoing']) ? $request_params['IsOngoing'] : 'false';
        $ReasonofLeaving = !empty($request_params['ReasonofLeaving']) ? $request_params['ReasonofLeaving'] : '';
        $Salary = !empty($request_params['Salary']) ? $request_params['Salary'] : '0';
        $Responsabilites = !empty($request_params['Responsabilites']) ? $request_params['Responsabilites'] : '';
        
        $dataArray = Session::get('userInfo');
        if(Session::has('userInfo'))
        {
            if(empty($request_params['exprience_id'])) {
                //dd(Session::get('userInfo')['value']['ExperinceIndex']);
                $i = 0;
                // if(!empty(Session::get('userInfo')['value']['ExperinceIndex']) && Session::get('userInfo')['value']['ExperinceIndex'] != '0' ) {
                //     $i = Session::get('userInfo')['value']['ExperinceIndex'];
                // }
                if(isset($request_params['exprience_id']) && $request_params['exprience_id'] == '0') {
                    $i = $request_params['exprience_id'];
                }
                else if(!empty(Session::get('userInfo')['value']['ExperinceIndex']) && Session::get('userInfo')['value']['ExperinceIndex'] != '0') {
                    //dd(Session::get('userInfo')['value']['EducationIndex']);
                    $i = Session::get('userInfo')['value']['ExperinceIndex'];
                }
            }
            else {
                //dd('I am here in else condition');
                $i = $request_params['exprience_id'];
            }
            //dd($i);
            foreach($dataArray as $key=>$value)
            {
                $dataArray[$key]['Experince'][$i]['ExperinceId'] = $i+1;
                $dataArray[$key]['Experince'][$i]['ApplicantId'] = Session::get('userInfo')['value']['ApplicantId'];
                $dataArray[$key]['Experince'][$i]['CompanyName'] = $CompanyName;
                $dataArray[$key]['Experince'][$i]['Designation'] = $Designation;
                $dataArray[$key]['Experince'][$i]['StartDate'] = $StartDate;
                $dataArray[$key]['Experince'][$i]['EndDate'] = $EndDate;
                // $dataArray[$key]['Experince'][$i]['StartDate'] = $request_params['StartDate'];
                // $dataArray[$key]['Experince'][$i]['EndDate'] = $request_params['EndDate'];
                $dataArray[$key]['Experince'][$i]['IsOngoing'] = $IsOngoing;
                $dataArray[$key]['Experince'][$i]['ReasonofLeaving'] = $ReasonofLeaving;
                $dataArray[$key]['Experince'][$i]['Salary'] = $Salary;
                $dataArray[$key]['Experince'][$i]['Responsabilites'] = $Responsabilites;
                $dataArray[$key]['ExperinceIndex'] = $i+1;
            }
            Session::put('userInfo',$dataArray);
        }
        //dd(Session::get('userInfo'));
        return redirect()->route('experience')->with('success_message', 'You have saved your data successfully!');
    }

    public function storeCertificationInfo() {
       $request_params = Request::input();

        unset($request_params['_token']);
        
        $CertificationTitle = !empty($request_params['CertificationTitle']) ? $request_params['CertificationTitle'] : '';
        $IssuingAuthority = !empty($request_params['IssuingAuthority']) ? $request_params['IssuingAuthority'] : '';
        $StartDate = date('d-M-Y', strtotime($request_params['StartDate'])); 
        $EndDate  =  date('d-M-Y', strtotime($request_params['EndDate']));
        
        $dataArray = Session::get('userInfo');
        if(Session::has('userInfo'))
        {
            if(empty($request_params['certification_id'])) {
                $i = 0;

                 if(isset($request_params['certification_id']) && $request_params['certification_id'] == '0') {
                    $i = $request_params['certification_id'];
                }
                else if(!empty(Session::get('userInfo')['value']['CertificationIndex']) && Session::get('userInfo')['value']['CertificationIndex'] != '0') {
                    //dd(Session::get('userInfo')['value']['EducationIndex']);
                    $i = Session::get('userInfo')['value']['CertificationIndex'];
                }
                // if(!empty(Session::get('userInfo')['value']['CertificationIndex']) && Session::get('userInfo')['value']['CertificationIndex'] != '0' ) {
                //     $i = Session::get('userInfo')['value']['CertificationIndex'];
                // }
            }
            else {
                $i = $request_params['certification_id'];
            } 
        
            foreach($dataArray as $key=>$value)
            {
                $dataArray[$key]['Certifications'][$i]['CertificationId'] = $i+1;
                $dataArray[$key]['Certifications'][$i]['CertificationTitle'] = $CertificationTitle;
                $dataArray[$key]['Certifications'][$i]['StartDate'] = $StartDate;
                $dataArray[$key]['Certifications'][$i]['EndDate'] = $EndDate;
                // $dataArray[$key]['Certifications'][$i]['StartDate'] = $request_params['StartDate'];
                // $dataArray[$key]['Certifications'][$i]['EndDate'] = $request_params['EndDate'];
                $dataArray[$key]['Certifications'][$i]['IssuingAuthority'] = $IssuingAuthority;
                $dataArray[$key]['Certifications'][$i]['ApplicantId'] = Session::get('userInfo')['value']['ApplicantId'];
                $dataArray[$key]['CertificationIndex'] = $i+1;
            }
            Session::put('userInfo',$dataArray);
        }
       //dd(Session::get('userInfo'));
        return redirect()->route('certification')->with('success_message', 'You have submitted you data successfully!');
    }

    public function storeSkillsInfo() {
       $request_params = Request::input();

        unset($request_params['_token']);
        
        $SkillName = !empty($request_params['SkillName']) ? $request_params['SkillName'] : '';
        
        $dataArray = Session::get('userInfo');
        if(Session::has('userInfo'))
        {
            if(empty($request_params['skill_id'])) {
                $i = 0;
                 if(isset($request_params['skill_id']) && $request_params['skill_id'] == '0') {
                    $i = $request_params['skill_id'];
                }
                else if(!empty(Session::get('userInfo')['value']['SkillsIndex']) && Session::get('userInfo')['value']['SkillsIndex'] != '0' ) {
                    $i = Session::get('userInfo')['value']['SkillsIndex'];
                }
            }
            else {
                $i = $request_params['skill_id'];
            } 

            foreach($dataArray as $key=>$value)
            {
                $dataArray[$key]['Skills'][$i]['SkillId'] = $i+1;
                $dataArray[$key]['Skills'][$i]['ApplicantId'] = Session::get('userInfo')['value']['ApplicantId'];
                $dataArray[$key]['Skills'][$i]['SkillName'] = $SkillName;
                $dataArray[$key]['SkillsIndex'] = $i+1;
            }
            Session::put('userInfo',$dataArray);
        }
      // dd(Session::get('userInfo'));
        return redirect()->route('skills')->with('success_message', 'You have submitted you data successfully!');
    }

    public function storeReferenceInfo() {
       $request_params = Request::input();

        unset($request_params['_token']);
        
        $RefName = !empty($request_params['RefName']) ? $request_params['RefName'] : '';
        $RefContact = !empty($request_params['RefContact']) ? $request_params['RefContact'] : '';
        $RefEmail = !empty($request_params['RefEmail']) ? $request_params['RefEmail'] : '';
        $RefRelation = !empty($request_params['RefRelation']) ? $request_params['RefRelation'] : '';
        
        $dataArray = Session::get('userInfo');
        if(Session::has('userInfo'))
        {
            if(empty($request_params['reference_id'])) {
                $i = 0;
                 if(isset($request_params['reference_id']) && $request_params['reference_id'] == '0') {
                    $i = $request_params['reference_id'];
                }
                else if(!empty(Session::get('userInfo')['value']['RefIndex']) && Session::get('userInfo')['value']['RefIndex'] != '0' ) {
                    $i = Session::get('userInfo')['value']['RefIndex'];
                }
            }
            else {
                $i = $request_params['reference_id'];
            }

            foreach($dataArray as $key=>$value)
            {
                $dataArray[$key]['Ref'][$i]['RefId'] = $i+1;
                $dataArray[$key]['Ref'][$i]['RefName'] = $RefName;
                $dataArray[$key]['Ref'][$i]['RefContact'] = $RefContact;
                $dataArray[$key]['Ref'][$i]['RefEmail'] = $RefEmail;
                $dataArray[$key]['Ref'][$i]['RefRelation'] = $RefRelation;
                $dataArray[$key]['Ref'][$i]['ApplicantId'] = Session::get('userInfo')['value']['ApplicantId']; 
                $dataArray[$key]['RefIndex'] = $i+1;  
            }
            Session::put('userInfo',$dataArray);
        }
        //dd(Session::get('userInfo'));
        return redirect()->route('reference')->with('success_message', 'You have submitted you data successfully!');
    }

    public function storeArmyPersonInfo() {
       $request_params = Request::input();

        unset($request_params['_token']);
        //dd($request_params);

        // $RefName = !empty($request_params['ArmyNo']) ? $request_params['ArmyNo'] : '';
        // $RefContact = !empty($request_params['RefContact']) ? $request_params['RefContact'] : '';
        // $RefEmail = !empty($request_params['RefEmail']) ? $request_params['RefEmail'] : '';
        // $RefRelation = !empty($request_params['RefRelation']) ? $request_params['RefRelation'] : '';
        
        $dataArray = Session::get('userInfo');
        if(Session::has('userInfo'))
        {
            foreach($dataArray as $key=>$value)
            {
                $dataArray[$key]['ArmyData'][0]['ArmyNo'] = !empty($request_params['ArmyNo']) ? $request_params['ArmyNo'] : '';
                //$dataArray[$key]['ArmyData'][0]['ApplicantId'] = Session::get('userInfo')['value']['ApplicantId'];
                $dataArray[$key]['ArmyData'][0]['Rank'] = !empty($request_params['Rank']) ? $request_params['Rank'] : '';
                $dataArray[$key]['ArmyData'][0]['EnrollmentDate'] = !empty($request_params['EnrollmentDate']) ? date('d-M-Y',strtotime($request_params['EnrollmentDate'])) : ''; 
                $dataArray[$key]['ArmyData'][0]['DischargeDate'] = !empty($request_params['DischargeDate']) ? date('d-M-Y',strtotime($request_params['DischargeDate'])) : ''; 
                $dataArray[$key]['ArmyData'][0]['ArmyUnit'] =!empty($request_params['ArmyUnit']) ? $request_params['ArmyUnit'] : '';
                $dataArray[$key]['ArmyData'][0]['CivilQualification'] =!empty($request_params['CivilQualification']) ? $request_params['CivilQualification'] : '';
                $dataArray[$key]['ArmyData'][0]['CourseName'] = !empty($request_params['CourseName']) ? $request_params['CourseName'] : '';
                $dataArray[$key]['ArmyData'][0]['CourseGrading'] = !empty($request_params['CourseGrading']) ? $request_params['CourseGrading'] : '';
                $dataArray[$key]['ArmyData'][0]['ESAR'] = !empty($request_params['ESAR']) ? $request_params['ESAR'] : '';
                $dataArray[$key]['ArmyData'][0]['CardCOASCommendation'] = !empty($request_params['CardCOASCommendation']) ? $request_params['CardCOASCommendation'] : '';
                $dataArray[$key]['ArmyData'][0]['Character'] = !empty($request_params['Character']) ? $request_params['Character'] : '';
                $dataArray[$key]['ArmyData'][0]['Honor'] = !empty($request_params['Honor']) ? $request_params['Honor'] : '';
                $dataArray[$key]['ArmyData'][0]['MedicalCategory'] = !empty($request_params['MedicalCategory']) ? $request_params['MedicalCategory'] : '';
                $dataArray[$key]['ArmyData'][0]['EREDetails'] = !empty($request_params['EREDetails']) ? $request_params['EREDetails'] : '';
                $dataArray[$key]['ArmyData'][0]['LastYearsServiceDetail'] = !empty($request_params['LastYearsServiceDetail']) ? $request_params['LastYearsServiceDetail'] : '';
                $dataArray[$key]['ArmyData'][0]['IsMarried'] = !empty($request_params['IsMarried']) ? $request_params['IsMarried'] : 'false';
                $dataArray[$key]['ArmyData'][0]['AbroadService'] = !empty($request_params['AbroadService']) ? $request_params['AbroadService'] : '';
                $dataArray[$key]['ArmyData'][0]['AreaOfService'] = !empty($request_params['AreaOfService']) ? $request_params['AreaOfService'] : '';
                $data['value']['armyData'] = 'ok';
            }
            Session::put('userInfo',$dataArray);
        }
        //dd(json_encode(Session::get('userInfo')));
        return redirect()->route('armyForm')->with('success_message', 'You have submitted you data successfully!');
    }

    public function saveProfileInfo() {
        if(Session::has('userInfo'))
        {
            $dataArray = Session::get('userInfo');

            //dd($dataArray);
            if(empty(Session::get('userInfo')['value']['Experince']) && empty(Session::get('userInfo')['value']['Certifications']) && empty(Session::get('userInfo')['value']['Skills']) && empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData'])) {
                foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Experince'] = [];
                    $dataArray[$key]['Certifications'] = [];
                    $dataArray[$key]['Skills'] = [];
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                }
            }
            else if(empty(Session::get('userInfo')['value']['Certifications']) && empty(Session::get('userInfo')['value']['Skills']) && empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Certifications'] = [];
                    $dataArray[$key]['Skills'] = [];
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if(empty(Session::get('userInfo')['value']['Skills']) && empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Skills'] = [];
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if(empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if(empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            dd(json_encode($dataArray));
            $result = $this->curl_request('RecruitmentApplicantInfo',$dataArray);

            //dd(count($userSignup));
            if(count($result) > 2) {
                return redirect()->route('dashboard')->with('success_message', 'You have submitted your data successfully!');
            }
            else {
                return redirect()->route('dashboard')->with('error_message', 'Your data is not submitted correctly. Please Save again!');
            }
        }
    }

    public function saveProfileExperinceInfo() {
        if(Session::has('userInfo'))
        {
            $dataArray = Session::get('userInfo');
            if(empty(Session::get('userInfo')['value']['Certifications']) && empty(Session::get('userInfo')['value']['Skills']) && empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData'])) {
                foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Certifications'] = [];
                    $dataArray[$key]['Skills'] = [];
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                }
            }
            else if(empty(Session::get('userInfo')['value']['Skills']) && empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Skills'] = [];
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if( empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if( empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            // else if(empty(Session::get('userInfo')['value']['ArmyData']) ) {
            //    foreach($dataArray as $key=>$value) {
            //         $dataArray[$key]['ArmyData'][] = '';
            //     } 
            // }
            // if(empty(Session::get('userInfo')['value']['Certifications'])) {
            //     dd('I am here');
            //     foreach($dataArray as $key=>$value) {
            //         $dataArray[$key]['Certifications'][] = '';
            //         $dataArray[$key]['Skills'][] = '';
            //         $dataArray[$key]['Ref'][] = '';
            //         $dataArray[$key]['ArmyData'][] = '';
            //     }
            // }
            // else {
            //     foreach($dataArray as $key=>$value) {
            //         $dataArray[$key]['Skills'][] = '';
            //         $dataArray[$key]['Ref'][] = '';
            //         $dataArray[$key]['ArmyData'][] = '';
            //     }
            // }
            dd(json_encode($dataArray));
            $result = $this->curl_request('RecruitmentApplicantInfo', $dataArray);

            if(count($result) > 2) {
                return redirect()->route('dashboard')->with('success_message', 'You have submitted your data successfully!');
            }
            else {
                return redirect()->route('dashboard')->with('error_message', 'Your data is not submitted correctly. Please Save again!');
            }
        }
    }

    public function saveProfileCertificationInfo() {
        if(Session::has('userInfo'))
        {
            $dataArray = Session::get('userInfo');

            //dd(json_encode($dataArray));
            if(empty(Session::get('userInfo')['value']['Skills']) && empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData'])) {
                foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Skills'] = [];
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                }
            }
            else if(empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if(  empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            // if(empty(Session::get('userInfo')['value']['Skills'])) {
            //     dd('I am here');
            //     foreach($dataArray as $key=>$value) {
            //         $dataArray[$key]['Skills'][] = '';
            //         $dataArray[$key]['Ref'][] = '';
            //         $dataArray[$key]['ArmyData'][] = '';
            //     }
            // }
            //dd(json_encode($dataArray));
            $result = $this->curl_request('RecruitmentApplicantInfo', $dataArray);
           // dd($result);
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, 'http://192.168.170.140:1999/api/RecruitmentApplicantInfo');
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataArray)); 
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
            // $headers = [
            //     'Content-Type: application/json'
            // ];

            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            // $server_output = curl_exec($ch) ;
            // curl_close ($ch);
            // $userSignup = json_decode($server_output, true) ;
            //dd(count($userSignup));
            if(count($result) > 2) {
                return redirect()->route('dashboard')->with('success_message', 'You have submitted your data successfully!');
            }
            else {
                return redirect()->route('dashboard')->with('error_message', 'Your data is not submitted correctly. Please Save again!');
            }
        }
    }

    public function saveProfileSkillsInfo() {
        if(Session::has('userInfo'))
        {
            $dataArray = Session::get('userInfo');

            if(empty(Session::get('userInfo')['value']['Ref']) && empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['Ref'] = [];
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if(empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            // foreach($dataArray as $key=>$value) {
            //     $dataArray[$key]['Ref'][] = '';
            //     $dataArray[$key]['ArmyData'][] = '';
            // }
            //dd(json_encode($dataArray));
            $result = $this->curl_request('RecruitmentApplicantInfo', $dataArray);

            if(count($result) > 2) {
                return redirect()->route('dashboard')->with('success_message', 'You have submitted your data successfully!');
            }
            else {
                return redirect()->route('dashboard')->with('error_message', 'Your data is not submitted correctly. Please Save again!');
            }
        }
    }

    public function saveProfileReferenceInfo() {
        if(Session::has('userInfo'))
        {
            $dataArray = Session::get('userInfo');

             if(empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            else if(empty(Session::get('userInfo')['value']['ArmyData']) ) {
               foreach($dataArray as $key=>$value) {
                    $dataArray[$key]['ArmyData'] = [];
                } 
            }
            //dd($dataArray);
            // foreach($dataArray as $key=>$value) {
            //     if(empty($dataArray[$key]['ArmyData'])) {
            //             $dataArray[$key]['ArmyData'][] = '';
            //     }
            // }
            //dd(json_encode($dataArray));
            $result = $this->curl_request('RecruitmentApplicantInfo', $dataArray);
           // dd($result);
            if(count($result) > 2) {
                return redirect()->route('dashboard')->with('success_message', 'You have submitted your data successfully!');
            }
            else {
                return redirect()->route('dashboard')->with('error_message', 'Your data is not submitted correctly. Please Save again!');
            }
        }
    }

    public function userSignup() {
        $request_params = Request::input();
        unset($request_params['_token']);

        if($request_params['password']!=$request_params['confirm_password'])
            return redirect('/signUp')->with('error_message', 'Your password does not matched.');

        $data['value']['Cnic'] = $request_params['Cnic'];
        $data['value']['Name'] = $request_params['name'];
        $data['value']['Email'] = $request_params['email'];
        $data['value']['Password'] = $request_params['password'];

        //dd($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://192.168.170.140:1999/api/RecruitmentApplicantSignUp');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $userSignup = json_decode($server_output, true) ;

        if(!empty($userSignup) && !empty($userSignup['Status']) != 400)
        {
            if(Session::has('userInfo')){
                Session::forget('userInfo');
            }else {
                $data['value']['ApplicantId'] = $userSignup['ApplicantId'];
                $data['value']['Name'] = !empty($userSignup['Name']) ? $userSignup['Name']: '';
                $data['value']['Email'] = !empty($userSignup['Email']) ? $userSignup['Email']: '';
                $data['value']['Password'] = !empty($userSignup['Password']) ? $userSignup['Password']: '';

            Session::put('userInfo', $data);
            }   
            return redirect()->route('dashboard')->with('success_message', 'You have sign up successfully.');
        }
        else {
            return redirect()->route('signUp')->with('error_message', $userSignup['Message']);
        }
        //dd($data);
    }

    public function login() {
        $request_params = Request::input();
        unset($request_params['_token']);

        //dd($request_params);

        if(empty($request_params['password']) OR empty($request_params['cnic']))
            return redirect('/signUp')->with('error_message', 'Your password does not matched.');

        $data['value']['UserName'] = $request_params['cnic'];
        $data['value']['Pwd'] = $request_params['password'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://192.168.170.140:1999/api/Login');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ;
        $headers = [
            'Content-Type: application/json'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec($ch) ;
        curl_close ($ch);
        $userLogin = json_decode($server_output, true) ;
        //dd($userLogin);

        if(!empty($userLogin) && is_array($userLogin))
        {
            if(!empty($userLogin['Message'])) {
              return redirect()->route('signIn')->with('error_message', $userLogin['Message']);  
            }
            if(Session::has('userInfo')){
                Session::forget('userInfo');
            }else {
                $data['value'] = $userLogin;

                //dd($userLogin);
                if(!empty($userLogin['Fname'])) {
                    $data['value']['personalData'] = 'ok';
                }
                if(!empty($userLogin['CityId'])) {
                    $data['value']['contactData'] = 'ok';
                }
                if(!empty($userLogin['Dob'])) {
                    $data['value']['Dob'] = date('d-m-Y',strtotime($userLogin['Dob']));
                }
                if(!empty($userLogin['Education'])) {
                    //if(count($userLogin['Education']) >=1)
                    $data['value']['EducationIndex'] = count($userLogin['Education']);
                    foreach($userLogin['Education'] as $key => $education) {
                        $data['value']['Education'][$key]['StartDate'] = date('d-m-Y',strtotime($education['StartDate']));
                        $data['value']['Education'][$key]['EndDate'] = date('d-m-Y',strtotime($education['EndDate']));
                    }
                }
                if(!empty($userLogin['Experince'])) {
                    foreach($userLogin['Experince'] as $key => $experience) {
                        $data['value']['Experince'][$key]['StartDate'] = date('d-m-Y',strtotime($experience['StartDate']));
                        $data['value']['Experince'][$key]['EndDate'] = date('d-m-Y',strtotime($experience['EndDate']));
                    }
                }
                if(!empty($userLogin['Certifications'])) {
                    foreach($userLogin['Certifications'] as $key => $certification) {
                        $data['value']['Certifications'][$key]['StartDate'] = date('d-m-Y',strtotime($certification['StartDate']));
                        $data['value']['Certifications'][$key]['EndDate'] = date('d-m-Y',strtotime($certification['EndDate']));
                    }
                }
                //if()
                //dd(json_encode($data));
                Session::put('userInfo', $data);
            }
            return redirect()->route('dashboard')->with('success_message', 'You have logged in successfully.');
        }
        else {
            //dd('$userLogin');
            return redirect()->route('signIn')->with('error_message', $userLogin);
        }
        //dd($data);
    }

}
