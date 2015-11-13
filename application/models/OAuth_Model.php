<?php

//
class OAuth_model extends CI_Model
{

    public function CheckIfUserExist($user)
    {
        $this->load->database();

        $result = $this->db->query("SELECT COUNT(Google_ID) as usercount FROM person WHERE Google_ID=$user->id");

        if ($result) {
            $user_count = $result->row()->usercount; //will return 0 if user doesn't exist
        }

        return $user_count;
    }

    public function RegisterUser($user)
    {

        $data = array(
            'Google_ID' => $user['id'],
            'Last_Name' => $user['familyName'],
            'First_Name' => $user['givenName'],
            'Email' => $user['email'],
            'picture' => $user['picture']
        );

        $this->db->insert('person', $data);

    }
    
    public function UpdateProfile($aData,$googleID){
        $this->load->database();
        $this->db->where('Google_ID', $googleID);
        $this->db->update('person', $aData); 
    }
}

?>