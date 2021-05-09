<?php

    /*
        Plugin Name: Q2A Answer Hide
        Plugin URI: https://github.com/amiyasahu/Donut/
        Plugin Description: Support admin set minimum user point that can see the answers
        Plugin Version: 1.0.0
        Plugin Date: 2021-03-28
        Plugin Author: Zhao Guangyue
        Plugin Author URI: http://www.ostack.cn
        Plugin Minimum Question2Answer Version: 1.6
        Plugin Update Check URI: 
    */

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
			header('Location: ../../');
			exit;
	}
	
	qa_register_plugin_layer('qa-answerhide-layer.php', 'Answer Hide Layer');	
	qa_register_plugin_module('module', 'qa-answerhide-admin.php', 'qa_answerhide_admin', 'Answer Hide Admin');

/*
	Omit PHP closing tag to help avoid accidental output
*/
