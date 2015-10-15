<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');


class ToernooiController extends CI_Controller{
    
    public function index(){
        
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        $this->form_validation->set_rules('ToernooiName', 'Name','required');
        $this->form_validation->set_rules('ToernooiStartDate', 'StartDate','required');
        $this->form_validation->set_rules('ToernooiEndDate', 'EndDate','required');
        $this->form_validation->set_rules('location', 'location','required');
        
        if(isset($_POST['CreateToernooi'])){
            if($this->form_validation->run()==FALSE){
                $this->load->view('ToernooiView', $data);
            }else{
              $aToernooiData = [
                  'naam' => $this->input->post('ToernooiName'),
                  'startDatum' => $this->input->post('ToernooiStartDate'),
                  'eindDatum' => $this->input->post('ToernooiEndDate'),
                  'locatie' => $this->input->post('location'),
                  'tournooi_id' => $this->input->post('type') 
              ];
              
              $this->load->model('Toernooi_model');
              $this->Toernooi_model->ToernooiToevoegen($aToernooiData);
              
              $this->load->view('ToernooiView', $data);
            }
        }else{
            
            $this->load->view('ToernooiView', $data);
        }
        
    }
    
}

