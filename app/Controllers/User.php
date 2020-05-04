<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends BaseController
{
	 public function __construct() {
        
        helper(['form', 'url']);
                
    }

    

    //marketing campaign
    public function marketingCampaign()
    {
         $db = \Config\Database::connect();
        $builder = $db->table('marketing_resources');

       $method = $this->request->getMethod();

       $session = session();

       if(!$session->get('id'))
             return redirect()->to(base_url());

        $user_id = $session->get('id');

        if($method == 'post')
        { 
            $data = [
 
            'user_id' => $user_id,
            'resource'  => $this->request->getVar('resource'),
            'budget' => $this->request->getVar('budget')
            ];
 
           $save = $builder->insert($data);
           $market_id = $db->insertID();

           $category = ($this->request->getVar('campaign_name') !== null)?$this->request->getVar('campaign_name'):array();
           if(count($category)>0)
           { 
                $budget = $this->request->getVar('campaign_budget');
                $total_budget = array_sum($budget);

                 $sql = "UPDATE marketing_resources SET budget=".$total_budget.",category_count=".count($category)." WHERE id=".$market_id;
                $db->query($sql);

                $builder = $db->table('marketing_resource_categories');
                for($i=0;$i<count($category);$i++)
                {
                    $data = [
 
                        'resource_id'  => $market_id,
                        'category' => $category[$i],
                        'amount'  => $budget[$i]
                        ];
             
                       $save = $builder->insert($data);
                }
           }

               $data = [
                'success' => true,
               ];
 
            return $this->response->setJSON($data);
           
        }

        $builder = $db->table('marketing_resources');

        $data['users'] = $builder->where(['user_id'=>$user_id])->get()->getResultArray();  
       
        return view('setup_marketing_campaign',$data);
    }


    //expenses
    public function expenses()
    {
         $db = \Config\Database::connect();
        $builder = $db->table('expenses');

       $method = $this->request->getMethod();

       $session = session();
       if(!$session->get('id'))
             return redirect()->to(base_url());
        $user_id = $session->get('id');

        if($method == 'post')
        { 
            $data = [
 
            'user_id' => $user_id,
            'expense'  => $this->request->getVar('expense'),
            'type' => $this->request->getVar('expense_type')
            ];
 
           $save = $builder->insert($data);
           

               $data = [
                'success' => true,
               ];
 
            return $this->response->setJSON($data);
           
        }


        $data['users'] = $builder->where(['user_id'=>$user_id])->get()->getResultArray(); 

        return view('overhead_expenses',$data);
    }

	public function EditExpense()
    {
    	$db = \Config\Database::connect();
        $builder = $db->table('expenses');

    	 $session = session();

		$id = $this->request->getVar('id');
        $expenseData = $builder->getWhere(['id'=>$id])->getResultArray();
        extract($expenseData[0]);
    	
    	$output['inner_form'] = ' <div class="form-group row">
                <div class="col-md-12">
                <input type="hidden" name="id" value="'.$id.'">
                    <label for="">Expense Name</label>
                    <input type="text" name="expense" value="'.$expense.'" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="">Expense Type</label>
                    <select class="form-control" name="expense_type">
                       ';
                        if($type=='overhead'){
                            $output['inner_form'] .= ' <option value="overhead" selected>Overhead Expense</option>
                            <option value="payroll">Payroll & Commissions</option>';
                        }
                        else{
                            $output['inner_form'] .= '<option value="overhead">Overhead Expense</option>
                            <option value="payroll" selected>Payroll & Commissions</option>';
                        }
                        
         $output['inner_form'] .= ' </select>
                </div>
            </div>'; 

    	return $this->response->setJSON($output);

    }

    public function updateExpense()
    {
    	$db = \Config\Database::connect();
        $builder = $db->table('expenses');
        $session = session();
 		
        $id = $this->request->getVar('id');
        $data = [	
        	'id' => $id,
            'expense' => $this->request->getVar('expense'),
            'type'  => $this->request->getVar('expense_type')

            ];
 
          $builder->update($data, ['id' => $id]);

       $data = [
                'success' => true,
               ];
 
            return $this->response->setJSON($data);
    }


	//initial setup
    public function initialMetrics()
    {
         $db = \Config\Database::connect();
        $builder = $db->table('starting_figures');

       $method = $this->request->getMethod();

       $session = session();
       if(!$session->get('id'))
             return redirect()->to(base_url());
        $user_id = $session->get('id');

        if($method == 'post')
        { 
            $data = [
 
            'user_id' => $user_id,
            'company_id' => $user_id,
            'annual_revenue'  => $this->request->getVar('annual_revenue'),
            'acquisition' => $this->request->getVar('acquisition'),
            'avg_profit_per_lead'=>$this->request->getVar('avg_profit_per_lead'),
            'lead_per_closed_deal'=>$this->request->getVar('lead_per_closed_deal'),
            'cost_per_lead'=>$this->request->getVar('cost_per_lead')
            ];
 
           $save = $builder->insert($data);
           

               $data = [
                'success' => true,
               ];
 
           $session->setFlashdata('Message','<div class="alert alert-success">You Added data successfully into Initial Setup</div>');
           $session->set('setup',1);
           return redirect()->to(base_url('/dashboard'));
        }


        return view('initial_metrics');
    }
	

    public function EditResource()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('marketing_resources');
        $builder1 = $db->table('marketing_resource_categories');
         $session = session();

        $id = $this->request->getVar('id');
        $resourceData = $builder->getWhere(['id'=>$id])->getResultArray();

        $categoryData = $builder1->getWhere(['resource_id'=>$id])->getResultArray();
        extract($resourceData[0]);
        // echo '<prE>'; print_r($categoryData); exit;
        $output['inner_form'] = ' <div class="form-group row">
                <div class="col-md-12">
                <input type="hidden" name="id" value="'.$id.'">
                     <label for="">Lead</label>
                    <input type="text" class="form-control" value="'.$resource.'" name="resource" placeholder="">
                </div>
            </div>
             <div class="form-group row">
                <div class="col-md-12">
                    <p><label for="">Add Campaign Name</label> <span class="float-right"><a href="#" class="v-btn v-btn-primary campaign"><i class="fa fa-plus"></i></a></span></p>
                    <ul class="add-campaign-list">';
                  $i=1;  foreach($categoryData as $c){
                      $output['inner_form'] .= '<li class="element" id="div_'.$i.'">
                            <div class="input-group">
                                <input type="text" placeholder="Campaign Name" class="form-control" name="campaign_name[]" value="'.$c['category'].'" aria-label="">
                                <div class="input-group-append">
                                    <span class="input-group-text remove" id="remove_'.$i.'">X</span>
                                </div>
                            </div>
                        </li><li class="element" id="bud_'.$i.'">
                            <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input type="text" placeholder="" class="form-control" name="campaign_budget[]" value="'.$c['amount'].'" aria-label="">
                            </div>
                        </li>';
                     $i++; } 
                   $output['inner_form'] .= ' </ul>
                </div>
            </div>';
            if(count($categoryData)>0) {
            $output['inner_form'] .= '<div class="form-group row" id="full_budget" style="display:none;">
                <div class="col-md-12">
                   
                    <input type="text" class="form-control" value="'.$budget.'" name="budget" placeholder="">
                </div>
            </div>';
          } else{
            $output['inner_form'] .= '<div class="form-group row" id="full_budget">
                <div class="col-md-12">
                    
                    <input type="text" class="form-control" value="'.$budget.'" name="budget" placeholder="">
                </div>
            </div>';
          }
            $output['inner_form'] .= '<script>
          
    $(".campaign").click(function(){

    var total_element = $(".element").length;
    $("#edit-resource #full_budget").css("display", "none");

       if(total_element != 0)
       {
            var lastid = $(".element:last").attr("id");
          var split_id = lastid.split("_");
          var nextindex = Number(split_id[1]) + 1;

          $(".element:last").after("<li class=\'element\' id=\'div_"+ nextindex + "\'></li><li class=\'element\' id=\'bud_"+ nextindex +"\'></li>");
        }
        else{
            var nextindex = 1;
            $(\'.add-campaign-list\').html("<li class=\'element\' id=\'div_"+ nextindex +"\'><div class=\'input-group\'><input type=\'text\' placeholder=\'Campaign Name\' class=\'form-control\' name=\'campaign_name[]\'  id=\'txt_"+ nextindex +"\'><div class=\'input-group-append\'><span id=\'remove_" + nextindex + "\' class=\'input-group-text remove\'>X</span></div></div></li><li class=\'element\' id=\'bud_"+ nextindex +"\'><div class=\'input-group\'><div class=\'input-group-prepend\'><span class=\'input-group-text\'>$</span>             </div><input type=\'text\' placeholder=\'Define Budget\' class=\'form-control\' name=\'campaign_budget[]\'  id=\'txt_"+ nextindex +"\'></div></li>");
        }

        $("#div_" + nextindex).append("<div class=\'input-group\'><input type=\'text\' placeholder=\'Campaign Name\' class=\'form-control\' name=\'campaign_name[]\'  id=\'txt_"+ nextindex +"\'><div class=\'input-group-append\'><span id=\'remove_" + nextindex + "\' class=\'input-group-text remove\'>X</span></div></div>");

        $("#bud_" + nextindex).append("<div class=\'input-group\'><div class=\'input-group-prepend\'><span class=\'input-group-text\'>$</span>             </div><input type=\'text\' placeholder=\'Define Budget\' class=\'form-control\' name=\'campaign_budget[]\' aria-label=\'\' id=\'txt_"+ nextindex +"\'></div>");
        });
        
        // Remove element
     $(\'.add-campaign-list\').on(\'click\',\'.remove\',function(){
     
      var id = this.id;
      var split_id = id.split("_");
      var deleteindex = split_id[1];

      // Remove <div> with id
      $("#div_" + deleteindex).remove();
      $("#bud_" + deleteindex).remove();

      if(deleteindex == 1)
         $("#edit-resource #full_budget").css("display", "block");
     }); 


</script>
'; 

        return $this->response->setJSON($output);

    }

    public function updateResource()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('marketing_resources');
        $builder1 = $db->table('marketing_resource_categories');
         $session = session();
        
        $id = $this->request->getVar('id');
        $data = [
 
            'resource'  => $this->request->getVar('resource'),
            'budget' => $this->request->getVar('budget'),
            'category_count' =>0
            ];

           $save = $builder->update($data, ['id' => $id]);
           

           $category = ($this->request->getVar('campaign_name') !== null)?$this->request->getVar('campaign_name'):array();
           if(count($category)>0)
           { 
                $builder1->delete(['resource_id' => $id]); 

                $budget = $this->request->getVar('campaign_budget');
                $total_budget = array_sum($budget);

                 $sql = "UPDATE marketing_resources SET budget=".$total_budget.",category_count=".count($category)." WHERE id=".$id;
                $db->query($sql);

                $builder = $db->table('marketing_resource_categories');
                for($i=0;$i<count($category);$i++)
                {
                    $data = [
 
                        'resource_id'  => $id,
                        'category' => $category[$i],
                        'amount'  => $budget[$i]
                        ];
             
                       $save = $builder->insert($data);
                }
                
           }
 

       $data = [
                'success' => true,
               ];
 
            return $this->response->setJSON($data);
    }


    //lead Tracking
    public function leadTracking()
    {
         $db = \Config\Database::connect();
        $builder = $db->table('track_leads');

       $method = $this->request->getMethod();

       $session = session();

       if(!$session->get('id'))
             return redirect()->to(base_url());

        $user_id = $session->get('id');

        if($method == 'post')
        { 
              $modal = $this->request->getVar('modal');
              $val = $this->request->getVar('val');
            if($this->request->getVar('type')=='category')
            {
               $resource_id = $this->request->getVar('resource');
               $resource_category_id = $this->request->getVar('id');
               $where = " AND resource_id=".$resource_id." AND resource_category_id=".$resource_category_id;
            }
            else{
              $resource_id = $this->request->getVar('id');
               $resource_category_id = 0;
               $where = " AND resource_id=".$resource_id;
            }

            $date = date('Y-m-d',strtotime($this->request->getVar('date')));
            $sql = "SELECT * FROM track_leads WHERE lead_date='".$date."' AND user_id=".$user_id.$where;
            $result = $db->query($sql)->getResultArray();

            if(count($result)>0)
            {
               $sql = "UPDATE track_leads SET ".$modal."=".$val." WHERE id=".$result[0]['id'];
              $db->query($sql);
              $data = [
                  'success' => true,
                  'data'  =>  $result[0]['id']
                 ];
                
            }
            else{
              $sql = "INSERT INTO track_leads(user_id,resource_id,resource_category_id,".$modal.",lead_date) values(".$user_id.",".$resource_id.",".$resource_category_id.",".$val.",'".$date."')";
              $result = $db->query($sql);

                $data = [
                  'success' => true,
                  'data'  =>  $db->insertID()
                 ];
            }

           return $this->response->setJSON($data);
        }

        $builder = $db->table('track_leads');
        $sql = "SELECT m.resource,m.id FROM marketing_resources m WHERE m.status = 1 AND m.user_id=".$user_id;
        $result = $db->query($sql)->getResultArray();
        $resourceData = array();
        foreach($result as $r)
        {
          $rem = array();

            $rem['resource'] = $r['resource'];
            $rem['id'] = $r['id'];
            $sql = "SELECT c.category,c.resource_id,c.id FROM marketing_resource_categories c WHERE c.resource_id =".$r['id'];
            $catResult = $db->query($sql)->getResultArray();
            $rem['cat'] = array();
            if(count($catResult)>0)
            {
                
              foreach($catResult as $c)
              {
                 $sql = "SELECT * FROM track_leads WHERE resource_id =".$r['id'] ." AND resource_category_id=".$c['id'] ." AND lead_date='".date('Y-m-d')."'";

                $trackResult = $db->query($sql)->getResultArray();
                if(count($trackResult)>0)
                {
                    foreach($trackResult as $t)
                    {
                      $category['category'] = $c['category'];
                      $category['resource_id'] = $c['resource_id'];
                      $category['id'] = $c['id'];
                      $category['lead'] = $t['total_leads'];
                      $category['offer_sent'] = $t['sent_offers'];
                      $category['offer_accepted'] = $t['accepted_offers'];
                      $category['signed'] = $t['contract_signed'];
                      $category['deal_closed'] = $t['deal_closed'];
                      $category['profit'] = $t['profit'];

                    }
                }
                else{
                      $category['category'] = $c['category'];
                      $category['resource_id'] = $c['resource_id'];
                      $category['id'] = $c['id'];
                      $category['lead'] = 0;
                      $category['offer_sent'] = 0;
                      $category['offer_accepted'] = 0;
                      $category['signed'] = 0;
                      $category['deal_closed'] = 0;
                      $category['profit'] = 0;
                     
                }
                 $rem['cat'][] = $category;
                
              }
            }
            else
            {
                $sql = "SELECT * FROM track_leads WHERE resource_id =".$r['id'] ." AND lead_date='".date('Y-m-d')."'";

                $trackResult = $db->query($sql)->getResultArray();
                if(count($trackResult)>0)
                {
                  foreach($trackResult as $t)
                    {
                        $rem['lead'] = $t['total_leads'];
                      $rem['offer_sent'] = $t['sent_offers'];
                      $rem['offer_accepted'] = $t['accepted_offers'];
                      $rem['signed'] = $t['contract_signed'];
                      $rem['deal_closed'] = $t['deal_closed'];
                      $rem['profit'] = $t['profit'];
                    }
              }
                else{
                  $rem['lead'] = 0;
                $rem['offer_sent'] = 0;
                $rem['offer_accepted'] = 0;
                $rem['signed'] = 0;
                $rem['deal_closed'] = 0;
                $rem['profit'] = 0;
              }      
                
            }
            $resourceData[] = $rem;
        }
        
         $data['resourceData'] = $resourceData;
        // echo '<pre>'; print_r($resourceData); exit;
       
        return view('track_leads',$data);
    }


    public function ajaxleadTracking()
    {
         $db = \Config\Database::connect();
        $builder = $db->table('track_leads');

       $method = $this->request->getMethod();

       $session = session();
       $user_id = $session->get('id');

       $date = date('Y-m-d',strtotime($this->request->getVar('leaddate')));

        $sql = "SELECT * FROM track_leads WHERE lead_date='".$date."' AND user_id=".$user_id;

        $trackResult = $db->query($sql)->getResultArray();
               
       $data = [
                  'success' => true,
                  'data'  =>  $trackResult
                 ];
            

           return $this->response->setJSON($data);
        
    }


    //expense Tracking
    public function expenseTracking()
    {
         $db = \Config\Database::connect();
        

       $method = $this->request->getMethod();

       $session = session();

       if(!$session->get('id'))
             return redirect()->to(base_url());

        $user_id = $session->get('id');

        if($method == 'post')
        { 
               
              $val = $this->request->getVar('val');
              $expense_id = $this->request->getVar('id');

            $date = date('Y-m-d',strtotime($this->request->getVar('date')));
            $sql = "SELECT * FROM track_expenses WHERE expense_date='".$date."' AND  expense_id=".$expense_id;
            $result = $db->query($sql)->getResultArray();

            if(count($result)>0)
            {
               $sql = "UPDATE track_expenses SET amount=".$val." WHERE id=".$result[0]['id'];
              $db->query($sql);
              $data = [
                  'success' => true,
                  'data'  =>  $result[0]['id']
                 ];
                
            }
            else{
              $sql = "INSERT INTO track_expenses(user_id,expense_id,amount,expense_date) values(".$user_id.",".$expense_id.",".$val.",'".$date."')";
              $result = $db->query($sql);

                $data = [
                  'success' => true,
                  'data'  =>  $db->insertID()
                 ];
            }

           return $this->response->setJSON($data);
        }

        
        $sql = "SELECT expense,type,id FROM expenses WHERE status = 1 AND user_id=".$user_id;
        $result = $db->query($sql)->getResultArray();
        $expenseData = array();
        foreach($result as $r)
        {
            $rem = array();

            $rem['expense'] = $r['expense'];
            $rem['id'] = $r['id'];
            $rem['type'] = $r['type'];
            $sql = "SELECT amount FROM track_expenses WHERE expense_id =".$r['id']." AND expense_date='".date('Y-m-d')."'";
            $catResult = $db->query($sql)->getResultArray();
            if(count($catResult)>0)
            $rem['amount'] = $catResult[0]['amount'];
          else
            $rem['amount'] = 0;
          //query for month to date
          $sql = "SELECT SUM(amount) as amount FROM track_expenses WHERE expense_id =".$r['id']." AND month(expense_date)='".date('m')."'";
            $mtd = $db->query($sql)->getResultArray();
            if(count($mtd)>0)
            $rem['mtd'] = $mtd[0]['amount'];
          else
            $rem['mtd'] = 0;
        
            $expenseData[] = $rem;
        }
        
       
        // echo '<pre>'; print_r($expenseData); exit;

        $data['expenses'] = $expenseData;  
       
        return view('track_expenses',$data);
    }


    public function ajaxExpenseTracking()
    {
         $db = \Config\Database::connect();
       

       $method = $this->request->getMethod();

       $session = session();
       $user_id = $session->get('id');

       $date = date('Y-m-d',strtotime($this->request->getVar('expensedate')));

        $sql = "SELECT * FROM track_expenses WHERE expense_date='".$date."' AND user_id=".$user_id;

        $trackResult = $db->query($sql)->getResultArray();

        $sql = "SELECT IFNULL(SUM(amount),0) as amount,expense_id FROM track_expenses WHERE month(expense_date)='".date('m',strtotime($date))."' AND user_id=".$user_id." GROUP BY expense_id";
            $mtd = $db->query($sql)->getResultArray();

        $track = array();
        if(count($trackResult)>0)
        {
             foreach ($trackResult as $k) {
            
                $t['id'] = $k['id'];
                $t['expense_id'] = $k['expense_id'];
                $t['amount'] = $k['amount'];
                //query for month to date
               
                if(count($mtd)>0)
                {
                  foreach($mtd as $m)
                  {
                    if($m['expense_id']==$k['expense_id'])
                    $t['mtd'] = $m['amount'];
                  }
                }
                else
                  $t['mtd'] = 0;

                  $track[] = $t;
            }
        }
        elseif(count($mtd)>0)
        {
            foreach($mtd as $m)
            {
              $t['expense_id'] = $m['expense_id'];
              $t['amount'] = 0;
              $t['mtd'] = $m['amount'];
              $track[] = $t;
            }
        }
       
               
       $data = [
                  'success' => true,
                  'data'  =>  $track
                 ];
            

           return $this->response->setJSON($data);
        
    }

    //users
    public function userList()
    {
       $db = \Config\Database::connect();
      $email = \Config\Services::email();
      $model = new UserModel();
      $session = session();

      if(!$session->get('id'))
          return redirect()->to(base_url());
      
      $method= $this->request->getMethod();
      $id = $session->get('id');

        if($method == 'post')
        {

            $name = $this->request->getVar('name');
            $password = $name.rand(1000,9999);
            $mail = $this->request->getVar('email');


            $sql = "SELECT * FROM users WHERE user_manager=".$id." AND email='".$this->request->getVar('email')."'";
            $result = $db->query($sql)->getResultArray();
            if(count($result)>0)
            {
              $data = [
                    'success' => false,
                    'email' => 'That email has already been taken.'
                   ];
                   return $this->response->setJSON($data);
            }

            
 
           $sql = "INSERT INTO users SET user_name = '".$name."',
            email  ='".$mail."',
            password ='". md5($password)."',
            contact_person =' ',
            area_code ='". $this->request->getVar('area_code')."',
            contact_no ='". $this->request->getVar('phone')."',
            user_manager =". $id.",
            role =2";
            $result = $db->query($sql);

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
                      <img height="100" src="'.$path.'" style="height: 83px;">
                      <hr>
                      
                    </td>
                  </tr>
                  <tr>
                    <td><h6 style="font-size:20px;margin:10px 0;">Congratulations!! Your Account Has Been Created.</h6></td>
                  </tr>
                  <tr>
                    <td style="font-size: 14px;">
                      <p style="word-spacing: 3px;">Hello '.$name.', </p>
                      <p style="word-spacing: 3px;">Your Company has granted you access to Exigo Management\'s Software.</p>
                      <p style="word-spacing:3px;">These credentials are only for the Company Administrator and are not to be shared with anyone else on your team or otherwise.</p>
                      <p style="word-spacing: 3px;;"><b>Username : </b>'.$mail.' <br><b>Password : </b>'.$password.'</p>
                      <p style="word-spacing: 3px;;">You can log into the software via this link : '.base_url('').'</p>
                      
                      <p style="word-spacing: 3px;">Be sure to keep your username and passwords in a safe spot and do not share with anyone. You can change your password anytime by selecting <strong>Change Password</strong> in the <strong>My Account</strong> page.</p>
                      <p style="word-spacing: 3px;">Thank you,<br>Exigo Management Team</p>
                    </td>
                  </tr>
                </table>
                
              </body>
              </html>';
            $email->setMessage($body);
                if($email->send(false))
                {
                    $session->setFlashdata('Message',"<div class='alert alert-success'>Successfully added a new user. The login credentials have been sent to the User's email.</div>");
                }
                else
                {
                    $session->setFlashdata('Message','<div class="alert alert-success">Successfully added a new user. But there is some problem to send email.</div>');
                }
              $data = [
                  'success' => true,
                 ];
             
         
               return $this->response->setJSON($data);
        }     

     
      $data['users'] = $model->where(['role !='=>1])->where(['role !='=>0])->where(['user_manager'=>$id])->orderBy('id', 'DESC')->findAll(); 

      return view('user_list', $data);
    }

    public function editUser()
    {
      $model = new UserModel();
       $session = session();

    $id = $this->request->getVar('id');
        $user = $model->getUser($id);
        extract($user);
      
      $output['inner_form'] = '<div class="form-group row">
                <div class="col-md-12">
                <input type="hidden" name="id" value="'.$id.'" class="form-control" id="formGroupExampleInput">
                    <label for="">Name</label>
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
                </div>
            </div><script>
  function isNumber(evt) 
  { var val = $("#edit-user #phone").val();
      if(val.length>6)
        return false;
    var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; 
  } function isareaNumber(evt) 
  { var val = $("#edit-user #area_code").val();
      if(val.length>2)
        return false;
    var charCode = (evt.which) ? evt.which : evt.keyCode; if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) return false; return true; 
  } 
</script>'; 

      return $this->response->setJSON($output);

    }

    public function updateUser()
    {
       $db = \Config\Database::connect();
      $model = new UserModel();
        $session = session();
    
        $id = $this->request->getVar('id');
        $user_manager = $session->get('id');

        $sql = "SELECT * FROM users WHERE user_manager=".$user_manager." AND email='".$this->request->getVar('email')."' AND id !=".$id;
        $result = $db->query($sql)->getResultArray();
        if(count($result)>0)
        {
          $data = [
                'success' => false,
                'email' => 'That email has already been taken.'
               ];
               return $this->response->setJSON($data);
        }
        
 
          $sql = "UPDATE users SET user_name = '".$this->request->getVar('name')."',
            email  ='".$this->request->getVar('email')."',
            area_code ='". $this->request->getVar('area_code')."',
            contact_no ='". $this->request->getVar('phone')."' WHERE id=".$id;
            $result = $db->query($sql);
          
             $data = [
              'success' => true,
              'msg' => "Thanks for contact us. We get back to you"
             ];
             $session->setFlashdata('Message','<div class="alert alert-success">User data is successfully updated</div>');
        

       return $this->response->setJSON($data);
    }


    public function status()
  {
    $db = \Config\Database::connect();
    $id   = $this->request->getVar('id');
    $status = $this->request->getVar('status');
    $table = $this->request->getVar('table');

    $sql = "UPDATE ".$table." SET status=".$status." WHERE id=".$id;
            $mtd = $db->query($sql);
     echo "true";
  }



	//--------------------------------------------------------------------

}
