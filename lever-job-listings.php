<?php
/*
 * Script Wordpress for Lever Jobs api page list
 */

?>

<!DOCTYPE html>
<html>
<head>
    <!-- bootstrap for dev environment -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        .lever-jobs {
            color: #454545;
            font-weight: 300;
            margin-bottom: 20px;
        }

        .lever-jobs a {
            color: #454545;
        }

        .lever-jobs .inner-wrap {
            padding: 25px 25px 16px;
            border: 2px solid #e1e1e1;
            background-color: #fff;

            transition: all .12s ease-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .lever-jobs .inner-wrap:hover {
            /*cursor: pointer;*/
            border: 2px solid #00b3e3;
        }

        .lever-jobs .job-top {
            height: 160px;
        }

        .lever-jobs p {
            margin: 0;
            font-size: .875em;
        }

        .lever-jobs .job-title {
            font-size: 1.6em !important;
            margin: 0;
        }

        .lever-jobs .job-location {
            margin-bottom: 8px;
        }

        .lever-jobs .job-links {
            display: flex;
            justify-content: space-between;
            color: #b1b1b1;
            font-size: 0.75rem;
            text-transform: uppercase;
            height: 30px;
            align-items: flex-end;
        }

        .lever-jobs .job-links a {
            display: inline-block;
            max-width: 60%;
            color: #00b3e3;
        }

        .lever-jobs .links a:last-child {
            display: inline-block;
            line-height: 4.9;
        }

    </style>
</head>
<body>

<div class="container-fluid">

    <div id="lever-content" class="row" style="max-width: 1060px;margin:0 auto;"></div>

</div>




/*
*  Script to GET Lever Jobs list Wordpress
*/

<?php
function enqueue_kochava_lever_api() {

    if (!is_page('careers')) {
        return;
    }

    ?>

<script>

    // GET job postings
    var kochavaUrl = 'https://api.lever.co/v0/postings/kochava?mode=json';
    fetch(kochavaUrl)
        .then(function(response) {
            return response.json();
        })
        .then(function(leverJson){
            leverJson.forEach(function(data){
                console.log(data);
                var form = {
                    title: data.text,
                    location: data.categories.location,
                    team: data.categories.team,
                    desc: data.hostedUrl,
                    applyNow: data.applyUrl
                };

                var newDiv = document.createElement('div');
                newDiv.setAttribute('class', 'col-xs-12 col-md-6 col-lg-4 lever-jobs');
                var posting = `
                                             <div class="inner-wrap">
                                               <div class="job-top">
				                                  <h2 class="job-title">${form.title}</h2>
                                                  <p class="job-location">${form.location}</p>
				                              </div>
                                              <div class="job-links">
                                                 <a href="${form.desc}" class="team" target="_blank">${form.team}</a>
                                                 <a class="apply-now" href="${form.applyNow}" target="_blank">Apply Now</a>
                                              </div>
                                            </div>
                                       `;
                var content = document.getElementById('lever-content');
                newDiv.innerHTML = posting;
                content.appendChild(newDiv);
            });
        }); // fetch

</script>

<?php

} // end function wrap

add_action( 'wp_head', 'enqueue_kochava_lever_api');

?>

</body>

</html>









<!-- Old lever jobs postings hard coded -->

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/e8e6e766-d631-4ed0-b702-d6aeab79bb8b" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Sales Development Representative</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br><br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase;">INSIDE SALES <a href="https://jobs.lever.co/kochava/e8e6e766-d631-4ed0-b702-d6aeab79bb8b" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/8969904f-70be-4cea-859f-ef573aafac07" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Associate Client Success Manager</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br><br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase;">CLIENT SUCCESS <a href="https://jobs.lever.co/kochava/8969904f-70be-4cea-859f-ef573aafac07" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/0e23a6b7-f49d-4de9-9de9-9a7691c1ef91" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Client Success Manager</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br><br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase;">CLIENT SUCCESS <a href="https://jobs.lever.co/kochava/0e23a6b7-f49d-4de9-9de9-9a7691c1ef91" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/421244df-3df7-4eae-8380-4c3f8545e397" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Systems Automation Engineer</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br><br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase;">LIVE OPERATIONS <a href="https://jobs.lever.co/kochava/421244df-3df7-4eae-8380-4c3f8545e397" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/c3d2c6de-94a3-4a85-90f8-331b5714b416" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Systems Engineer</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br><br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 30px;">LIVE OPERATIONS <a href="https://jobs.lever.co/kochava/c3d2c6de-94a3-4a85-90f8-331b5714b416" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/d6d80466-6924-4c8e-a720-3e4cb0ecb0f6" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Software Engineer</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 33px;">SOLUTIONS/SOFTWARE <br>ENGINEERING <a href="https://jobs.lever.co/kochava/d6d80466-6924-4c8e-a720-3e4cb0ecb0f6" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/37bfcceb-0096-4bd5-ad46-f28d2a7e05fc" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Software Engineer - XCHNG</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase;">SOLUTIONS/SOFTWARE <br>ENGINEERING  <a href="https://jobs.lever.co/kochava/37bfcceb-0096-4bd5-ad46-f28d2a7e05fc" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/f4087496-e12b-461e-b72f-f7ea2fa6d206" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Software Engineer - Portland</h2>
        <p style="color: #454545; ">Portland, OR, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase;">SOLUTIONS/SOFTWARE <br>ENGINEERING  <a href="https://jobs.lever.co/kochava/f4087496-e12b-461e-b72f-f7ea2fa6d206" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/53e739d4-7b18-46c9-ae5b-f751ff83db9a" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Solution Engineer</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 33px;">SOLUTIONS/SOFTWARE <br>ENGINEERING <a href="https://jobs.lever.co/kochava/53e739d4-7b18-46c9-ae5b-f751ff83db9a" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/4da80d52-b98c-4f69-a3e3-e31d972d97b5" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Solution Engineer - XCHNG</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 29px;">SOLUTIONS/SOFTWARE <br>ENGINEERING <a href="https://jobs.lever.co/kochava/4da80d52-b98c-4f69-a3e3-e31d972d97b5" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/60ced3a9-a7c4-4cbc-8dc2-3b9c981ae1c2" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Senior Software Engineer - XCHNG</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 29px;">SOLUTIONS/SOFTWARE <br>ENGINEERING <a href="https://jobs.lever.co/kochava/60ced3a9-a7c4-4cbc-8dc2-3b9c981ae1c2" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/cfd6c7c9-198c-4df3-8b02-17a11df85db1" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Software Engineer, Storage - XCHNG</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 29px;">SOLUTIONS/SOFTWARE <br>ENGINEERING <a href="https://jobs.lever.co/kochava/cfd6c7c9-198c-4df3-8b02-17a11df85db1" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/dfd32c83-6213-4fc7-b9f9-1d1bdcd04c16" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Site Reliability Engineer - Platform</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 20px;">LIVE OPERATIONS <a href="https://jobs.lever.co/kochava/dfd32c83-6213-4fc7-b9f9-1d1bdcd04c16" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/e6762065-8e9c-4f32-b4dd-489bd12dd6a3" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Site Reliability Engineer - Product</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 30px;">LIVE OPERATIONS <a href="https://jobs.lever.co/kochava/e6762065-8e9c-4f32-b4dd-489bd12dd6a3" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/3e4d40b2-29dc-4343-be22-c9fa40ddb471" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Site Reliability Engineer - Platform</h2>
        <p style="color: #454545; ">Portland, OR, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 30px;">LIVE OPERATIONS <a href="https://jobs.lever.co/kochava/3e4d40b2-29dc-4343-be22-c9fa40ddb471" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    < class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/310b1660-aa3b-4869-884a-b08ca37d0dd7" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Site Reliability Engineer - Product</h2>
        <p style="color: #454545; ">Portland, OR, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 30px;">LIVE OPERATIONS <a href="https://jobs.lever.co/kochava/310b1660-aa3b-4869-884a-b08ca37d0dd7" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-4" style="margin-top: 20px;">
      <a href="https://jobs.lever.co/kochava/7ec6183a-d7a1-4aed-9a4d-5d466fa87bc0" target="none"><div class="jobs" style="border: 2px #e1e1e1 solid;""><div style="padding: 25px 25px 10px 25px;">
        <h2 style="margin: 0px 0px 10px 0; font-size: 1.6em !important; ">Marketing Program Manager</h2>
        <p style="color: #454545; ">Sandpoint, ID, USA</p>
        <br>
        <p style="color: #b1b1b1; font-size: 0.75rem !important; text-transform: uppercase; padding-top: 30px;">PRODUCT MARKETING <a href="https://jobs.lever.co/kochava/7ec6183a-d7a1-4aed-9a4d-5d466fa87bc0" style="float: right;" target="none"> APPLY NOW</a></p>
      </div></a>
    </div>
  </div> -->










