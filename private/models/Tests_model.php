<?php
//tests model

class Tests_model extends Model
{
    protected $table = "tests";
    protected $allowedColumns = [
        'test',
        'date',
        'description',
        'class_id',
        'disabled',
        ];

    protected $beforeInsert = [
        'make_user_id',
        'make_school_id',
        'make_test_id',
        ];

    protected $afterSelect = [
         'get_user',
          ];

   public function validate($DATA){
    $this->errors = array();
    //check for school
    if(empty($DATA['test']) || !preg_match('/^[a-z A-Z0-9]+$/', $DATA['test']))
    {
       $this->errors['test'] = "only letters & allowed in test name";
       return false;
    }
        return true;
     }
   
   public function make_user_id($data){
    if(isset($_SESSION['USER']->user_id)){
       $data['user_id'] = $_SESSION['USER']->user_id;  
   }
    return $data;
}

public function make_school_id($data){
    if(isset($_SESSION['USER']->school_id)){
       $data['school_id'] = $_SESSION['USER']->school_id;  
   }
    return $data;
}



// public function make_school_id($data){
    
//     $data['school_id'] = random_string(60);
//     return $data;

// }


   public function make_test_id($data){
    
        $data['test_id'] = random_string(60);
        return $data;
   
   }

   public function get_user($data){
    $user = new User();
    foreach($data as $key => $row){
      $result = $user->where('user_id', $row->user_id);
        $data[$key]->user = is_array($result) ? $result[0] : false;
    }
    
    return $data;

}


//    private function random_string($length){
//     $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
//     $text = "";
//     for($x = 0; $x < $length; $x++){
//         $random = rand(0,61);
//         $text .= $array[$random];
//     }
//     return $text;
//    }

}