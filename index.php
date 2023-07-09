<?php
require('dnlib/load.php');
$action->helper->route('/',function(){
    global $action;
    $data['title']='CV Online-Make&Share CV Online';
    $action->view->load('header',$data);
    $action->view->load('navbar',$data);
    $action->view->load('footer');
});
//for logout
$action->helper->route('action/createresume',function(){
    global $action;
    $action->onlyForAuthUser();
    $resume_data[0]=$action->session->get('Auth')['data']['id'];
    $resume_data[1]=$action->db->clean($_POST['name']);
    $resume_data[2]=$action->db->clean($_POST['headline']);
    $resume_data[4]=$action->db->clean($_POST['objective']);
    $contact['email']=$action->db->clean($_POST['email']);
    $contact['mobile']=$action->db->clean($_POST['mobile']);
    $contact['address']=$action->db->clean($_POST['address']);
    $resume_data[3]=json_encode($contact);
    $resume_data[5]=json_encode($_POST['skill']);
    $education=array();
    $work=array();
    foreach($_POST['college'] as $key=>$value){
        $education[$key]['college']=$action->db->clean($value);
        $education[$key]['course']=$action->db->clean($_POST['course'][$key]);
        $education[$key]['c_duration']=$action->db->clean($_POST['c_duration'][$key]);
    }
    foreach($_POST['company'] as $key=>$value){
        $work[$key]['company']=$action->db->clean($value);
        $work[$key]['jobrole']=$action->db->clean($_POST['jobrole'][$key]);
        $work[$key]['w_duration']=$action->db->clean($_POST['w_duration'][$key]);
        $work[$key]['work_desc']=$action->db->clean($_POST['work_desc'][$key]);
    }
    $resume_data[6]=json_encode($work);
    $resume_data[7]=json_encode($education);
    $resume_data[8]=$action->helper->UID();
    $run=$action->db->insert('resumes','user_id,name,headline,objective,contact,skills,experience,education,url',$resume_data);
    if($run){
        $action->session->set('success','resume created!');
        $action->helper->redirect('home');
    }else{
        $action->helper->redirect('home');
        $action->session->set('error','something went wrongsometime,try again after !');
    }
});
//for delete
$action->helper->route('action/deleteresume/$url',function($data){
    global $action;
    $url=$data['url'];
    $action->db->delete('resumes',"url='$url'");
    $action->session->set('success','resume deleted!');
    $action->helper->redirect('home');
});
//for logout
$action->helper->route('action/logout',function(){
    global $action;
    $action->session->delete('Auth');
    $action->session->set('success','logged out!');
    $action->helper->redirect('login');
});
$action->helper->route('resume/$url',function($data){
    global $action;
    $resumedata=$action->db->read("resumes","*","WHERE url='".$data['url']."'");
    if(!$resumedata){
        $action->helper->redirect('home');
    }
    $resumedata=$resumedata[0];
    $data['title']=$resumedata['name'];
    $data['type']=1;
    $data['resume']=$resumedata;
       if($data['type']==1){
        $action->view->load('ResumeUpgrade_content_1',$data);
    }else{
        $action->helper->redirect('home');
    }
});
//for template
$action->helper->route('select-template',function($data){
    global $action;
    $action->onlyForAuthUser();
    $data['title']="Select Resume Template";
    $data['myresume']='active';
    $action->view->load('header',$data);
    $action->view->load('navbar',$data);
    $action->view->load('template_content');
    $action->view->load('footer');
});
$action->helper->route('Resume-details/$resumetype',function($data){
    global $action;
    $action->onlyForAuthUser();
    $data['title']="Resume Details";
    $data['myresume']='active';
    $action->view->load('header',$data);
    $action->view->load('navbar',$data);
    if($data['resumetype']==1){
        $action->view->load('resume_details1');
    }else{
        $action->session->set('error','invalid resume type');
        $action->helper->redirect('select-template');
    }
    $action->view->load('footer');
});

//for home
$action->helper->route('home',function(){
    global $action;
    $action->onlyForAuthUser();
    $data['title']='Home';
    $data['myresume']='active';
    $data['resumes']=$action->db->read('resumes','*',"WHERE user_id=".$action->user_id());
    
    $action->view->load('header',$data);
    $action->view->load('navbar',$data);
    $action->view->load('home_content',$data);
    $action->view->load('footer');
});
//for login
$action->helper->route('login',function(){
    global $action;
    $action->onlyForUnauthUser();
    $data['title']='login-CV Online';
    $action->view->load('header',$data);
    echo "<style>
    html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  justify-content:center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color:lightpink;
}
    </style>";
    $action->view->load('login_content');
    $action->view->load('footer');
});
$action->helper->route('action/login',function(){
    global $action;
    $error=$action->helper->isAnyEmpty($_POST);
    if($error){
        $action->session->set('error',"$error is empty!");
    }else{
        $email=$action->db->clean($_POST['email']);
        $password=$action->db->clean($_POST['password']);
        $user=$action->db->read('users','id,email_id',"WHERE email_id='$email' AND password='$password'");
        if(count($user)>0){
            $action->session->set('Auth',['status'=>true,'data'=>$user[0]]);
            $action->session->set('success','logged in');
            $action->helper->redirect('home');
        }
        else{
            $action->session->set('error',"incorrect email/password");
            $action->helper->redirect('login');
        }
    }
});
//for signup
$action->helper->route('signup',function(){
    global $action;
    $action->onlyForUnauthUser();
    $data['title']='SignUp-CV Online';
    $action->view->load('header',$data);
    echo "<style>
    html,
body {
  height: 100%;
}

body {
  display:flex;
  align-items: center;
  justify-content:center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color:lightpink;
}
    </style>";
    $action->view->load('signup_content');
    $action->view->load('footer');
});
//for signup action
$action->helper->route('action/signup',function(){
    global $action;
    $error=$action->helper->isAnyEmpty($_POST);
    if($error){
        $action->session->set('error',"$error is empty!");
        $action->helper->redirect('signup');
    }else{
        $signup_data[0]=$action->db->clean($_POST['full_name']);
        $signup_data[1]=$action->db->clean($_POST['email']);
        $signup_data[2]=$action->db->clean($_POST['password']);
        $user=$action->db->read('users','email_id',"WHERE email_id='.$signup_data[1]'");
        if(count($user)>0){
            $action->session->set('error',$signup_data[1]." is already registered");
            $action->helper->redirect('signup');
        }else{
            $action->db->insert('users','full_name,email_id,password',$signup_data);
            $action->session->set('success','account created');
            $action->helper->redirect('login');
        }
    }
});
if(!Helper::$isPageIsAvailable){
    global $action;
    $data['title']='No Page Found';
    $action->view->load('header',$data);
    $action->view->load('navbar',$data);
    $action->view->load('not_found');
    $action->view->load('footer');
}
