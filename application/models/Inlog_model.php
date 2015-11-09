<?php
//
class Inlog_model extends CI_Model {

    public function CheckIfUserExist($user)
    {
        $this->load->database();


        $result = $this->db->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
        $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

        return $user_count;
    }

    public function RegisterUser()
    {

        $data = array(
          'google_id' => 'Google_ID',
            'google_name' => 'Google_ID',
            'google_email' => 'Google_ID',
            'google_id' => 'Google_ID',
            'google_id' => 'Google_ID',
        );

        $statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (id,?,?,?,?)");
        $statement->bind_param('issss', $user->id, $user->name, $user->email, $user->link, $user->picture);
        $statement->execute();

        $this->db->query('INSERT INTO participants VALUES ('.$gameID.','.$persoonID.')');
    }
}

?>