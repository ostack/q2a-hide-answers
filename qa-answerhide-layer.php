<?php

class qa_html_theme_layer extends qa_html_theme_base {
	function head_css(){
		if($this->template == 'question') {
			$this->output('<style type="text/css">'. qa_opt('answerhide-plugin-css') .'</style>');
		}
		qa_html_theme_base::head_css();
	}

	function a_list($a_list){
		if (!empty($a_list)) {
			$userid=qa_get_logged_in_userid();
			$user_points = qa_get_logged_in_points();
			require_once QA_INCLUDE_DIR . 'db/metas.php';
			require_once QA_INCLUDE_DIR . 'qa-base.php';
			if((isset($userid)&&$user_points >= qa_opt('mini_point_can_see_answers'))||(!qa_is_human_probably()&&qa_opt('is_allow_search_bots_view'))) {
				qa_html_theme_base::a_list($a_list);
			}else{
				$this->output('<div class="answerhide row">');				
			    $this->output(qa_opt('tip_msg_for_hide_answer'));
			    $this->output('</div>');
				
			}
		}
		//qa_html_theme_base::a_list($a_list);
	}
}
?>
