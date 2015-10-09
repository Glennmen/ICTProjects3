<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navbar {

    public function get_navbar()
    {        
        $sMenu = '<div class="container">
	<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
                    <!-- <a class="navbar-brand" href="'.base_url("home").'"><span><img alt="Brand" width="32" height="32" src="'.base_url('assets/images/thedon.png').'"></span> GF5FCalc</a> -->
		</div>
                <!-- Nav links -->
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
			<li><a href="'.base_url("GameController").'">GameController</a></li>
                        <li><a href="'.base_url("ScoreController").'">ScoreController</a></li>
			</ul>
		</div>
	</div>
	</nav>';
        
        return $sMenu;
    }
}

/* End of file Navbar.php */

