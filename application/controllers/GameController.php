<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');



class GameController extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        if(empty($_SESSION['Google_ID'])) {

            // Allow some methods?
            $allowed = array(
                'MobileApp',
            );
            if ( ! in_array($this->router->fetch_method(), $allowed))
            {

                redirect('../OAuthController', 'refresh');
            }
        }
    }

    
    public function index(){
        
        $this->load->library('navbar');
        
        $data['nav'] = $this->navbar->get_navbar();
        $data['alert'] = "";
        $data['type'] = "";
        
        
        $this->form_validation->set_rules('gameName', 'Name','required');
        $this->form_validation->set_rules('gameDate', 'Date','required|callback_dateCheck');
        $this->form_validation->set_rules('gameTime', 'Time','required|callback_timeCheck');
        $this->form_validation->set_rules('location', 'location','required');
       
        
        
        if(isset($_POST['CreateGame'])){
            if($this->form_validation->run()==FALSE){
                $this->load->view('GameView1', $data);
            }else{
                
            $Date = DateTime::createFromFormat('d/m/Y', $this->input->post('gameDate'));   
            
            $ID = "";
            if ($this->input->post('type') == 'free') {
                    $ID = 0;
                }
                else if ($this->input->post('type') == 'tourney') {
                    $ID = $this->input->post('Tourney');
                }
            $personen = $this->input->post('Personen[]');
            
              $aGameData = [
                  'Game_Name' => $this->input->post('gameName'),
                  'Date' => $Date->format("Y-m-d"),
                  'Time' => $this->input->post('gameTime'),
                  'Location' => $this->input->post('location'),
                  'Tournament_ID' => $ID 
              ];
              
              $this->load->model('Game_model');
              $this->Game_model->GameToevoegen($aGameData, $personen);
              
              $data['alert'] = "<div class='alert alert-success' role='alert'>Game succesvol aangemaakt!</div>";
              $this->load->view('GameView1', $data);
            }
        }else{
            
            $this->load->view('GameView1', $data);
        } 
    } 
    public function dateCheck($strDate){
        $googleID = $_SESSION['Google_ID'];
        $values = explode("/", $strDate);
        $this->load->model('Game_model');
       
       if($this->input->post('type') == "free"){
           $tournamentID = 0;
           $data['type']= "free";
           $strNewDate = $values[1].'/'.$values[0].'/'.$values[2];
           
           $currentDate = date("Y-m-d");
           $startDate = DateTime::createFromFormat('d/m/Y', $strDate);
           $Date2 = date('Y/m/d',  strtotime($strNewDate));
          
          if(checkdate ( $values[1] , $values[0] , $values[2] )){
              if(strtotime(date_format($startDate,"Y-m-d")) < strtotime($currentDate)){
                    $this->form_validation->set_message('dateCheck', 'Date can\'t be in the past. ');
                    return FALSE;
              }else{
                  return true;
              }
          }else{
              $this->form_validation->set_message('dateCheck', 'Enter a valid date ');
              return false;
          }
         
       }else if($this->input->post('type') == "tourney"){
          $tournamentID = $this->input->post('Tourney');
          $data['type'] = "tourney";
          $strNewDate = $values[1].'/'.$values[0].'/'.$values[2];
          
          $currentDate = date("Y-m-d");
          $Date2 = date('Y/m/d',  strtotime($strNewDate));
          $beginDate = DateTime::createFromFormat('d/m/Y', $strDate);
          $startDate = date('Y/m/d', strtotime($this->Game_model->getStartDate($googleID,$tournamentID)));
          $endDate = date('Y/m/d', strtotime($this->Game_model->getEndDate($googleID,$tournamentID)));
       
          if(checkdate ( $values[1] , $values[0] , $values[2] )){
             if ($Date2 >= $startDate && $Date2 <= $endDate){
                if(strtotime(date_format($beginDate,"Y-m-d")) < strtotime($currentDate)){
                    $this->form_validation->set_message('dateCheck', 'Date can\'t be in the past. ');
                   return FALSE;
              }else{
                  return true;
              }
             } else {
                $this->form_validation->set_message('dateCheck', "Date not between tournament dates -- date:".$Date2." startdate:".$startDate." enddate:".$endDate);
                return FALSE;
             }
          }else{
            $this->form_validation->set_message('dateCheck', 'Enter a valid date ');
            return FALSE;
          } 
              
       }      
    }
    
    public function timeCheck($strTime){
        $values = explode(":", $strTime);
        
        if($values[0] > 23 || $values[1] > 59){
            $this->form_validation->set_message('timeCheck', 'Enter a valid time ');
            return FALSE;
        }else{
            return true;   
        }
    }
    
    public function json(){
        $googleID = $_SESSION['Google_ID'];
        $this->load->model('Game_model');
        $result = $this->Game_model->TourneyOphalen($googleID);
        
        echo json_encode($result);
    }
    
    public function jsonPersonen() {
        $this->load->model('Game_model');
        
        if ($this->input->post('Type') == 'tourney') {
            $result = $this->Game_model->PersonenTourneyOphalen($this->input->post('TournooiID'));
        }
        else {
            $result = $this->Game_model->PersonenOphalen();
        }
        
        echo json_encode($result);
    }
    
    public function MobileApp(){
         $this->load->model('Game_model');
         $this->load->model('Score_model');
         
        $aMobileData = json_decode(file_get_contents('php://input'),true);
        
        if($aMobileData['req'] == "freeGames"){
            $result = $this->Game_model->allGames($aMobileData['Google_ID']);
        }else if ($aMobileData['req'] == "tourneyGames"){
            $result = $this->Score_model->GameOphalen($aMobileData['Google_ID'],$aMobileData['Tournament_ID']);
        }
        
        
        
        echo json_encode($result);
    }
}

