<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navbar {

    public function get_navbar()
    {        
        $sMenu = '<nav class="main-menu">
            <a class="green" href="MainController">Home</a>
            <a class="blue" href="ScoreController">Score</a>
            <a class="orange" href="GameController">Game</a>
            <a class="red" href="TournamentController">Toernooi</a>
            <a class="purple" id="test" href="http://localhost/ICTProjects3/index.php?logout=1">Uitloggen</a>
        </nav>';
        
        return $sMenu;
    }
}

/* End of file Navbar.php */

