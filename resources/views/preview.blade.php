<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>Preview</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/resume.css')}}" media="all" />

</head>
<body>
@if(Session::has('userInfo'))
<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc" >
				<div class="yui-u first" style="color: #57B657;">
					@if(!empty(Session::get('userInfo')['value']['ImageURL']))
						<img src="https://cvportal.dhamultan.org/storage/app/public/uploads/cv/{{Session::get('userInfo')['value']['ImageURL']}}" class="img-fluid" alt="Responsive image" style="height: 150px; width: 150px;">
					@endif
				</div>
			<div class="yui-gc" >
				<!-- <div class="yui-u first" style="color: #57B657;">
					<h1>{{isset(Session::get('userInfo')['value']['Name']) ? Session::get('userInfo')['value']['Name'] : '' }}</h1>
				</div> -->
				<div class="yui-u">
					<div class="contact-info">
						<h3><a id="pdf" href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a></h3>
						<br>
						<br>
						<br>
						<h2 style="margin: 0px!important; font-size: 212%!important; padding-right: 25px!important;" >{{isset(Session::get('userInfo')['value']['Name']) ? Session::get('userInfo')['value']['Name'] : '' }}</h2>
						<h3 style="font-size: 157%!important;" ><a href="mailto:name@yourdomain.com">{{isset(Session::get('userInfo')['value']['Email']) ? Session::get('userInfo')['value']['Email'] : '' }}</a></h3>
						<h3 style="font-size: 157%!important;" >+{{ isset(Session::get('userInfo')['value']['ContactNo2']) ? Session::get('userInfo')['value']['ContactNo2']: '' }}</h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->
	</div>

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<!-- <div class="yui-gf">
						<div class="yui-u first">
							<h2>Summary</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge">
								A brief summary of user cv.--------------------------------------------------------------------------------------
								------------------------------------. 
							</p>
						</div>
					</div> --><!--// .yui-gf -->
					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Personal Info</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
							<div class="job" >
								<h3 style=" font-size:18px;color:#57b657; float: left;padding-right: 40px; "><span style="color:black; left: 480px; ">Religion:</span> Islam</h3>
								<h3 style=" font-size:18px;color:#57b657;padding-right: 40px; "><span style="color:black; padding-left: 240px; ">Father Name: </span>{{isset(Session::get('userInfo')['value']['Fname']) ? Session::get('userInfo')['value']['Fname'] : '' }}</h3>
								<h3 style=" font-size:18px;color:#57b657; float: left;padding-right: 40px; padding-top: 5px; "><span style="color:black; ">Gender:</span> Male</h3>
								<h3 style=" font-size:18px;color:#57b657; padding-top: 5px;padding-right: 40px;"><span style="color:black;padding-left: 248px; ">DOB: </span>{{isset(Session::get('userInfo')['value']['Dob']) ? date('d-M-Y',strtotime(Session::get('userInfo')['value']['Dob'])) : '' }}</h3>
								<h3 style=" font-size:18px;color:#57b657; float: left;padding-right: 40px; padding-top: 5px;"><span style="color:black; ">Country:</span> Pakistan</h3>
								<h3 style=" font-size:18px;color:#57b657; padding-top: 5px;padding-right: 40px; "><span style="color:black;padding-left: 215px; ">Any Disability: </span>No</h3>
								<h3 style=" font-size:18px;color:#57b657; float: left;padding-right: 40px; padding-top: 5px;"><span style="color:black;">City:</span> Multan</h3>
								<h3 style=" font-size:18px;color:#57b657; padding-top: 5px;padding-right: 40px;"><span style="color:black; padding-left: 262px;">Military Person:</span> {{isset(Session::get('userInfo')['value']['IsMilitaryPerson']) ? Session::get('userInfo')['value']['IsMilitaryPerson'] : '' }}</h3>
								<h3 style=" font-size:18px;color:#57b657; padding-top: 5px;"><span style="color:black; ">Address: </span>{{!empty(Session::get('userInfo')['value']['Maddress']) ? Session::get('userInfo')['value']['Maddress'] : '' }}</h3>
							</div>
						</div><!--// .yui-u -->
					</div>
				</div><!-- // .yui-gf  -->

				<!-- <div class="yui-gf" style="border-bottom: transparent!important;">
	
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>

						<div class="yui-u last">
							<div class="job" style="border-bottom: transparent!important;" >
								<h4 style="color:#57b657; left:240px; padding-bottom: 50px!important; font-size: 18px;">Skill 1</h4>
								<h4 style="padding-top: 20px; color:#57b657; left:240px; font-size: 18px;">Skill 1</h4>
								<h4 style="padding-top: 40px; color:#57b657; left:240px; font-size: 18px;">Skill 1</h4>
								<h4 style="color:#57b657; left:480px; padding-bottom: 50px!important; font-size: 18px;">Skill 1</h4>
								<h4 style="padding-top: 20px; color:#57b657; left:480px; font-size: 18px;">Skill 1</h4>
								<h4 style="padding-top: 40px; color:#57b657; left:480px; font-size: 18px;">Skill 1</h4>	
								<h4 style="padding-bottom: 50px!important; color:#57b657; Right:580px; font-size: 18px;">Skill 1</h4>
								<h4 style="padding-top: 20px; color:#57b657; Right:580px; font-size: 18px;">Skill 1</h4>
								<h4 style="padding-top: 40px; color:#57b657; Right:580px;font-size: 18px;">Skill 1</h4>
								
							</div>
						</div>
					</div> -->
				</div>
                <div class="yui-gf">
                </div>
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Skills</h2>
						</div>
						<div class="yui-u">
							@if(!empty(Session::get('userInfo')['value']['Skills']))
								@foreach(Session::get('userInfo')['value']['Skills'] as $skills)
								<div class="talent">
									<h4 style="color:#000;">{{ $skills['SkillName'] }}</h4>
								</div>
								@endforeach
							@endif
						</div>
					</div> <!--// .yui-gf _-->

<br>
<br>
					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
							@if(!empty(Session::get('userInfo')['value']['Experince']))
								@foreach(Session::get('userInfo')['value']['Experince'] as $experince)
								<div class="job">
									<h2>{{ isset($experince['CompanyName']) ? $experince['CompanyName']: ''}} </h2>
									<h3 style="color:#000;">{{ isset($experince['Designation']) ? $experince['Designation']: ''}} </h3>
									<h4>{{ isset($experince['StartDate']) ? date('d-M-Y', strtotime($experince['StartDate'])) : ''}} - {{ isset($experince['EndDate']) ? date('d-M-Y', strtotime($experince['EndDate'])): ''}}</h4>
									<p> {{ isset($experince['Responsabilites']) ? $experince['Responsabilites']: ''}}  </p>
								</div>
								@endforeach
							@endif
						</div><!--// .yui-u -->
					</div><!-- // .yui-gf  -->


					<div class="yui-gf">
	
						<div class="yui-u first">
							<h2>Certification</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">
							@if(!empty(Session::get('userInfo')['value']['Certifications']))
								@foreach(Session::get('userInfo')['value']['Certifications'] as $certifications)
								<div class="job">
									<h2>{{ isset($certifications['CertificationTitle']) ? $certifications['CertificationTitle']: ''}} </h2>
									<h3 style="color:#000;">{{ isset($certifications['IssuingAuthority']) ? $certifications['IssuingAuthority']: ''}} </h3>
									<h4>{{ isset($certifications['StartDate']) ? date('d-M-Y', strtotime($certifications['StartDate'])): ''}} - {{ isset($certifications['EndDate']) ? date('d-M-Y', strtotime($certifications['EndDate'])): ''}}</h4>
									
								</div>
								@endforeach
							@endif
						</div><!--// .yui-u -->
					</div>

					<div class="yui-gf first">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<div class="yui-u">
							@if(!empty(Session::get('userInfo')['value']['Education']))
								@foreach(Session::get('userInfo')['value']['Education'] as $education)
									<h2>{{ isset($education['InstitueName']) ? $education['InstitueName']: ''}} - {{ isset($education['DegreeTitle']) ? $education['DegreeTitle']: ''}} </h2>
									<p>Dual Major, Economics and English &mdash; <strong>{{ isset($education['ObtainedMarks']) ? $education['ObtainedMarks']: ''}} / {{ isset($education['TotalMarks']) ? $education['TotalMarks']: ''}}</strong> </p>  
								@endforeach
							@endif
						</div>
					</div><!--// .yui-gf -->
					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Reference</h2>
						</div>
						<div class="yui-u">
							@if(!empty(Session::get('userInfo')['value']['Ref']))
								@foreach(Session::get('userInfo')['value']['Ref'] as $reference)
									<div class="job">
										<h2>{{ isset($reference['RefName']) ? $reference['RefName']: ''}} </h2>
										<h3 style="color:#000;">{{ isset($reference['RefRelation']) ? $reference['RefRelation']: ''}} </h3>
										<h4>{{ isset($reference['RefContact']) ? $reference['RefContact']: ''}} - {{ isset($reference['RefEmail']) ? $reference['RefEmail']: ''}}</h4>
									</div> 
								@endforeach
							@endif
						</div>
					</div>

					<!-- <div class="yui-gf last">
						<div class="yui-u first">
							 <h2>Education</h2> 
						</div>
						<div class="yui-u">
							<h5><b>Board Name &mdash; Certificate/Degree Title</b></h5>
							Major, Subjects &mdash; <strong>Obtained Marks</strong>
						</div>
					</div> -->
					<!-- <div class="yui-gf last">
						<div class="yui-u first">
							 <h2>Education</h2> 
						</div>
						<div class="yui-u">
							<h5><b>Board Name &mdash; Certificate/Degree Title</b></h5>
							Major, Subjects &mdash; <strong>Obtained Marks</strong>
						</div>
					</div> -->

		<div id="ft">
			<p>{{isset(Session::get('userInfo')['value']['Name']) ? Session::get('userInfo')['value']['Name'] : '' }} &mdash; <a href="mailto:name@yourdomain.com">{{isset(Session::get('userInfo')['value']['Email']) ? Session::get('userInfo')['value']['Email'] : '' }}</a> &mdash; {{isset(Session::get('userInfo')['value']['ContactNo2']) ? Session::get('userInfo')['value']['ContactNo2'] : '' }}</p>
		</div><!--// footer -->
				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		

	</div><!-- // inner -->


</div><!--// doc -->
@endif


</body>
</html>

