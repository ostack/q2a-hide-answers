<?php
class qa_answerhide_admin {

	function allow_template($template)
	{
		return ($template!='admin');
	}

	function option_default($option) {

		switch($option) {
			case 'tip_msg_for_hide_answer':
				return 'Answers has been hidden!</br>Because you are not login or your point is not enough.</br> You should <a href="./?qa=login">login</a> or <a href="./?qa=register">register</a> to earn more point to see the answers';
			case 'mini_point_can_see_answers':
				return 120;			
			case 'is_allow_search_bots_view':
				return true;
			case 'answerhide-plugin-css':
				return '.answerhide { padding: 10px;
						background: #9b59b7;
						color: #fff;
						margin: 0 0 5px 0;
						font-size: 20px;
						font-weight:800;text-align:center;}';
			default:
				return null;

		}
	}
	function admin_form(&$qa_content)
	{
		//	Process form input
		$ok = null;
		if (qa_clicked('answerhide_save_button')) {
			foreach($_POST as $i => $v) {
				qa_opt($i,$v);
			}

			$ok = qa_lang('admin/options_saved');
		}
		else if (qa_clicked('answerhide_reset_button')) {
			foreach($_POST as $i => $v) {
				$def = $this->option_default($i);
				if($def !== null) qa_opt($i,$def);
			}
			$ok = qa_lang('admin/options_reset');
		}elseif (qa_clicked('donate_zhao_guangyue')) {
				qa_redirect_raw('https://paypal.me/guangyuezhao');
		}			
		//	Create the form for display
		return array(
				'ok' => ($ok && !isset($error)) ? $ok : null,
				'buttons' => array(
					array(
						'label' => qa_lang_html('main/save_button'),
						'tags' => 'NAME="answerhide_save_button"',
					),
					array(
						'label' => qa_lang_html('admin/reset_options_button'),
						'tags' => 'NAME="answerhide_reset_button"',
					),
					array(
						'label' => 'Donate',
						'tags' => 'NAME="donate_zhao_guangyue"',
					)
				),
				'fields' => array(
					'is_allow_search_bots_view'=>array(
						'label' => 'Is allow search engines view answers',
						'tags' => 'NAME="is_allow_search_bots_view"',
						'value' => (int)qa_opt('is_allow_search_bots_view'),
						'type' => 'checkbox',
					),
					'mini_point_can_see_answers'=>array(
						'label' => 'The minimum user point which can see the answer:',
						'tags' => 'NAME="mini_point_can_see_answers"',
						'value' => (int)qa_opt('mini_point_can_see_answers'),
						'type' => 'number',
					),
					'tip_msg_for_hide_answer '=>array(
						'label' => 'Message show to users when answers are hide:',
						'tags' => 'NAME="tip_msg_for_hide_answer"',
						'value' => qa_opt('tip_msg_for_hide_answer'),
						'type' => 'textarea',
						'rows' => 10
					),						
					'answerhide-plugin-css'=>array(
						'label' => 'Answer Hide custom css',
						'tags' => 'NAME="answerhide-plugin-css"',
						'value' => qa_opt('answerhide-plugin-css'),
						'type' => 'textarea',
						'rows' => 10
					),
					'hope_donate'=>array(
					'label' => '<span style="color:#f90; font-size:16px; text-align:center;">Hope you can donate <strong>$1</strong> for my work!</br> Thanks very much!</span>',
					'type' => 'custom',
					'tags' => 'NAME="hope_donate"',
				),
				),
			);
	}


}
