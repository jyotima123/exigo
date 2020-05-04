<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Home extends BaseController
{
	 public function __construct() {
        
        helper(['form', 'url']);
       
    }

	public function index()
	{
		return view('index');
	}

	public function Login()
	{
		helper(['form', 'url']);
		 $session = session();
		$db = \Config\Database::connect();

		$model = new UserModel();

		$email = $this->request->getVar('email');
		$pwd = $this->request->getVar('password');
        $data['user'] = $model->login($email,$pwd);
        // echo '<pre>'; print_r($data['user']); echo $data['user']['id'];exit;
        if($data['user'])
        {
        	$newdata = [
        			'id' => $data['user']['id'],
			        'username'  => $data['user']['user_name'],
			        'email'     => $data['user']['email'],
			        'role'      => $data['user']['role'],
                    'user_manager' => $data['user']['user_manager'],
			        'logged_in' => TRUE,
                    'is_admin' => 0,
                    'setup' => 0
			];

			$session->set($newdata);
            //check for user setup
            if($data['user']['role'] == 1)
            {
                $sql = "SELECT IFNULL(m.id,0) as m_id,IFNULL(e.id,0) as e_id,IFNULL(s.id,0) as s_id FROM `marketing_resources` m left join expenses e on m.user_id= e.user_id LEFT JOIN starting_figures s on e.user_id=s.company_id WHERE m.user_id = ".$data['user']['id']." LIMIT 1"; 
                $result = $db->query($sql)->getResultArray();
                if(count($result)>0)
                {
                    if(($result[0]['m_id']==0) && ($result[0]['e_id']==0) && ($result[0]['s_id']==0))
                        return redirect()->to(base_url('/setup_marketing_campaign'));
                    elseif(($result[0]['e_id']==0) && ($result[0]['s_id']==0))
                        return redirect()->to(base_url('/overhead_expenses'));
                    elseif(($result[0]['m_id']==0) && ($result[0]['s_id']==0))
                        return redirect()->to(base_url('/setup_marketing_campaign'));
                    elseif($result[0]['s_id']==0)
                        return redirect()->to(base_url('/initial_metrics'));
                    else
                    { 
                        $session->set('setup',1);
                        return redirect()->to(base_url('/dashboard'));
                    }
                }
                else{
                    
                    return redirect()->to(base_url('/setup_marketing_campaign'));
                }
              
            }
            else
                return redirect()->to(base_url('/dashboard'));
            
        }
		else
		{
			$session->setFlashdata('Message','<div class="alert alert-success">Please Provide Correct Credentials.</div>');
			return redirect()->to(base_url(''));
		}
	}


    public function LoginAsClient($user_id)
    {
        
         $session = session();
        $db = \Config\Database::connect();

        $model = new UserModel();

        
        $data['user'] = $model->getUser($user_id);
        // echo '<pre>'; print_r($data['user']); echo $data['user']['id'];exit;
        if($data['user'])
        {
            $newdata = [
                    'id' => $data['user']['id'],
                    'username'  => $data['user']['user_name'],
                    'email'     => $data['user']['email'],
                    'role'      => $data['user']['role'],
                    'user_manager' => $data['user']['user_manager'],
                    'logged_in' => TRUE,
                    'is_admin' => $session->get('id'),
                    'setup' => 1
            ];

            $session->set($newdata);
            //check for user setup
           // echo '<pre>'; print_r($session->get()); exit;
            return redirect()->to(base_url('/dashboard'));
            
        }
        else
        {
            echo '<pre>'; print_r($session->get()); exit;
            return redirect()->to(base_url('/company'));
        }
    }

	//dashboard
	public function dashboard()
	{
        $session = session();
        if(!$session->get('id'))
             return redirect()->to(base_url());

        //  $email = \Config\Services::email();

        // $email->setFrom('jyotima.tripathi@actiknow.com', 'Jyotima');
        // $email->setTo('tripathijyotima@gmail.com');
        // // $email->setCC('another@another-example.com');
        // // $email->setBCC('them@their-example.com');

        // $email->setSubject('Email Test');
        // $email->setMessage('Testing the email class.');

        // if($email->send(false))
        //     $email->printDebugger();
        // else
        //    echo $email->printDebugger(['headers']);
        // exit;
		return view('dashboard');
	}

	//company
	public function company()
	{
		helper('form');
        $session = session();

        if(!$session->get('id'))
             return redirect()->to(base_url());

		$model = new UserModel();
        if($session->get('is_admin'))
        { 
            $data['user'] = $model->getUser($session->get('is_admin'));
            $newdata = [
                    'id' => $data['user']['id'],
                    'username'  => $data['user']['user_name'],
                    'email'     => $data['user']['email'],
                    'role'      => $data['user']['role'],
                    'user_manager' => $data['user']['user_manager'],
                    'logged_in' => TRUE,
                    'is_admin' => 0,
                    'setup' => 1
            ];
            
            $session->set($newdata);
            // echo '<pre>'; print_r($session->get()); 
        }
        // echo '<pre>'; print_r($session->get()); exit;
        
		$data['users'] = $model->where(['role'=>1])->orderBy('id', 'DESC')->findAll(); 

		return view('company_list', $data);
	}
	//add company
	public function Addcompany()
	{
		$email = \Config\Services::email();
		$model = new UserModel();
        $session = session();

        $name = $this->request->getVar('name');
        $password = $name.rand(1000,9999);
        $mail = $this->request->getVar('email');
 
        $data = [
 
            'user_name' => $name,
            'email'  => $mail,
            'password' => md5($password),
            'contact_person' => $this->request->getVar('contact_person'),
            'area_code' => $this->request->getVar('area_code'),
            'contact_no' => $this->request->getVar('phone'),
            'user_manager' => 1,
            'role' =>1
            ];
 
           $save = $model->insert($data);
 		if($save == false)
 		{
 			$data = [
	        'success' => false,
	        'msg' => $model->errors()
	       ];
 		}
 		else{

            //send mail
            $email->setFrom('admin@exigo.com', 'Exigo Management System');
            $email->setTo($this->request->getVar('email'));
            $path = base_url('src/logo.png');
            $email->setSubject('Account Credentials with Exigo Management');
            $body = '
                <!DOCTYPE html>
              <html>
              <head></head>
              <body>
                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-family:arial!important;font-size:12px!important;margin:auto;">
                  <tr>
                    <td align=center>
                      <img height="100" src="'.$path.'" style="height: 154px;">
                      <hr>
                      
                    </td>
                  </tr>
                  <tr>
                    <td><h6 style="font-size:20px;margin:10px 0;">Congratulations!! Your Account Has Been Created.</h6></td>
                  </tr>
                  <tr>
                    <td style="font-size: 14px;">
                      <p style="word-spacing: 3px;">Hello '.$name.', </p>
                      <p style="word-spacing: 3px;">You have created an Administrator account to use Exigo Management\'s Software.</p>
                      <p style="word-spacing:3px;">These credentials are only for the Company Administrator and are not to be shared with anyone else on your team or otherwise.</p>
                      <p style="word-spacing: 3px;;"><b>Username : </b>'.$mail.' <br><b>Password : </b>'.$password.'</p>
                      <p style="word-spacing: 3px;;">You can log into the software via this link : '.base_url('').'</p>
                      
                      <p style="word-spacing: 3px;">You can change your password anytime by selecting <strong>Change Password</strong> in the <strong>My Account</strong> page.</p>
                      <p style="word-spacing: 3px;">Thank you,<br>Exigo Management Team</p>
                    </td>
                  </tr>
                </table>
                
              </body>
              </html>';
            $email->setMessage($body);
            if($email->send(false))
            {
                $session->setFlashdata('Message','<div class="alert alert-success">Successfully added a new company. The login credentials have been sent to the company email.</div>');
            }
            else
            {
                $session->setFlashdata('Message','<div class="alert alert-success">Successfully added a new company. But there is some problem to send email.</div>');
            }
 			$data = [
	        'success' => true,
	       ];
	       
 		}
       
 
       return $this->response->setJSON($data);
	}

	public function EditCompany()
    {
    	$model = new UserModel();
    	 $session = session();

		$id = $this->request->getVar('id');
        $user = $model->getUser($id);
        extract($user);
    	
    	$output['inner_form'] = '<div class="form-group row">
                <div class="col-md-12">
                <input type="hidden" name="id" value="'.$id.'" class="form-control" id="formGroupExampleInput">
                    <label for="">Company Name</label>
                    <input type="text" name="name" value="'.$user_name.'" class="form-control" id="formGroupExampleInput">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Email</label>
                    <input type="text" name="email" value="'.$email.'" class="form-control" id="email">
                    <div class="email"></div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Contact Person</label>
                    <input type="text" name="contact_person" value="'.$contact_person.'" class="form-control" id="contact_person">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Phone No.</label>
                    <div class="row">
                    <div class="col-md-2">
                      <div class="input-group">
                        <input type="text" class="form-control" id="" readonly="" value="+1">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group">
                        <input type="text" class="form-control" name="area_code" id="area_code" value="'.$area_code.'" onkeypress="return isareaNumber(event)">
                      </div>
                    </div>
                    <div class="col-md-7">
                    <div class="input-group">
                        
                    <input type="text" name="phone" value="'.$contact_no.'" class="form-control" id="phone" onkeypress="return isNumber(event)">
                  </div>
                </div>
              </div>
            </div> <script>
  function isNumber(evt) 
  { var val = $("#edit-company #phone").val();
      if(val.length>6)
        return false;
    var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; 
  } function isareaNumber(evt) 
  { var val = $("#edit-company #area_code").val();
      if(val.length>2)
        return false;
    var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; 
  } 
</script>'; 

    	return $this->response->setJSON($output);

    }

    public function updateCompany()
    {
    	$model = new UserModel();
        $session = session();
 		
        $id = $this->request->getVar('id');
        $data = [	
        	'id' => $id,
            'user_name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'contact_person' => $this->request->getVar('contact_person'),
            'contact_no' => $this->request->getVar('phone'),
            'area_code' => $this->request->getVar('area_code')

            ];
 
          $save = $model->update($id,$data);
 		if($save == false)
 		{
 			$data = [
	        'success' => false,
	        'msg' => $model->errors()
	       ];
 		}
 		else{
       $data = [
        'success' => true,
        'msg' => "Thanks for contact us. We get back to you"
       ];
       $session->setFlashdata('Message','<div class="alert alert-success">Company data is successfully updated</div>');
   }

       return $this->response->setJSON($data);
    }


	public function status()
	{
		$model = new UserModel();

		$id 	= $this->request->getVar('id');
		$status = $this->request->getVar('status');
 		// $data = array('status' => $status);
		$save = $model->changeData($id,$status,'status');
		 echo "true";
	}

	public function delete()
    {
 
      $db = \Config\Database::connect();
     $builder = $db->table($this->request->getVar('mode'));
 		
 		$id 	= $this->request->getVar('id');

     $builder->delete(['id' => $id]); 

     if($this->request->getVar('mode')=='marketing_resources')
     {
         $builder = $db->table('marketing_resource_categories');
         $builder->delete(['resource_id' => $id]); 
     }
      
     echo "true";
    }


    public function changePassword()
    {
    	$model = new UserModel();
    	 $session = session();
        if(!$session->get('id'))
             return redirect()->to(base_url());

		$id = $session->get('id');
        $data['user'] = $model->getUser($id);

    	$method = $this->request->getMethod();
    	if($method == 'post')
    	{	
    		$password 	= md5($this->request->getVar('new_password'));
			
			$save = $model->changeData($id,$password,'password');
			$session->setFlashdata('Message','<div class="alert alert-success">Your password has been successfully updated</div>');
    	}
    	return view('change_password',$data);
    }

    public function logOut()
    {
    	 $session = session();

		$session->destroy();
    	return redirect()->to(base_url(''));
    }

	//--------------------------------------------------------------------

}
