<?php
class q2a_re_engage_admin {
	function init_queries($tableslc) {
		return null;
	}
	function option_default($option) {
		switch($option) {
			case 'q2a-re-engage-day-1-A':
			case 'q2a-re-engage-day-1-Q':
				return 30; 
			case 'q2a-re-engage-day-2-A':
			case 'q2a-re-engage-day-2-Q':
				return 60; 
			case 'q2a-re-engage-day-3-A':
			case 'q2a-re-engage-day-3-Q':
				return 90; 
			default:
				return null;
		}
	}
		
	function allow_template($template) {
		return ($template!='admin');
	}       
		
	function admin_form(&$qa_content){                       
		// process the admin form if admin hit Save-Changes-button
		$ok = null;
		if (qa_clicked('q2a-re-engage-save')) {

			qa_opt('q2a-re-engage-1-A', qa_post_text('q2a-re-engage-1-A'));
			qa_opt('q2a-re-engage-title-1-A', qa_post_text('q2a-re-engage-title-1-A'));
			qa_opt('q2a-re-engage-1-Q', qa_post_text('q2a-re-engage-1-Q'));
			qa_opt('q2a-re-engage-title-1-Q', qa_post_text('q2a-re-engage-title-1-Q'));
			qa_opt('q2a-re-engage-day-1-A', (int)qa_post_text('q2a-re-engage-day-1-A'));
			qa_opt('q2a-re-engage-day-1-Q', (int)qa_post_text('q2a-re-engage-day-1-Q'));

			qa_opt('q2a-re-engage-2-A', qa_post_text('q2a-re-engage-2-A'));
			qa_opt('q2a-re-engage-title-2-A', qa_post_text('q2a-re-engage-title-2-A'));
			qa_opt('q2a-re-engage-2-Q', qa_post_text('q2a-re-engage-2-Q'));
			qa_opt('q2a-re-engage-title-2-Q', qa_post_text('q2a-re-engage-title-2-Q'));
			qa_opt('q2a-re-engage-day-2-A', (int)qa_post_text('q2a-re-engage-day-2-A'));
			qa_opt('q2a-re-engage-day-2-Q', (int)qa_post_text('q2a-re-engage-day-2-Q'));

			qa_opt('q2a-re-engage-3-A', qa_post_text('q2a-re-engage-3-A'));
			qa_opt('q2a-re-engage-title-3-A', qa_post_text('q2a-re-engage-title-3-A'));
			qa_opt('q2a-re-engage-3-Q', qa_post_text('q2a-re-engage-3-Q'));
			qa_opt('q2a-re-engage-title-3-Q', qa_post_text('q2a-re-engage-title-3-Q'));
			qa_opt('q2a-re-engage-day-3-A', (int)qa_post_text('q2a-re-engage-day-3-A'));
			qa_opt('q2a-re-engage-day-3-Q', (int)qa_post_text('q2a-re-engage-day-3-Q'));

			$ok = qa_lang('admin/options_saved');
		}
		
		// form fields to display frontend for admin
		$fields = array();
		
		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 1 title 回答者',
			'tags' => 'name="q2a-re-engage-title-1-A"',
			'value' => qa_opt('q2a-re-engage-title-1-A'),
		);


		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 1 回答者',
			'tags' => 'name="q2a-re-engage-1-A"',
			'value' => qa_opt('q2a-re-engage-1-A'),
		);
		
		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 1 質問者',
			'tags' => 'name="q2a-re-engage-title-1-Q"',
			'value' => qa_opt('q2a-re-engage-title-1-Q'),
		);


		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 1 質問者',
			'tags' => 'name="q2a-re-engage-1-Q"',
			'value' => qa_opt('q2a-re-engage-1-Q'),
		);


		$fields[] = array(
			'type' => 'number',
			'label' => '回答者Day',
			'tags' => 'name="q2a-re-engage-day-1-A"',
			'value' => qa_opt('q2a-re-engage-day-1-A'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => '質問者 Day',
			'tags' => 'name="q2a-re-engage-day-1-Q"',
			'value' => qa_opt('q2a-re-engage-day-1-Q'),
		);



		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 2 title',
			'tags' => 'name="q2a-re-engage-title-2-A"',
			'value' => qa_opt('q2a-re-engage-title-2-A'),
		);

		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 2',
			'tags' => 'name="q2a-re-engage-2-A"',
			'value' => qa_opt('q2a-re-engage-2-A'),
		);

		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 質問者',
			'tags' => 'name="q2a-re-engage-title-2-Q"',
			'value' => qa_opt('q2a-re-engage-title-2-Q'),
		);


		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 質問者',
			'tags' => 'name="q2a-re-engage-2-Q"',
			'value' => qa_opt('q2a-re-engage-2-Q'),
		);


		$fields[] = array(
			'type' => 'number',
			'label' => '回答者Day',
			'tags' => 'name="q2a-re-engage-day-2-A"',
			'value' => qa_opt('q2a-re-engage-day-2-A'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => '質問者 Day',
			'tags' => 'name="q2a-re-engage-day-2-Q"',
			'value' => qa_opt('q2a-re-engage-day-2-Q'),
		);





		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 3 title',
			'tags' => 'name="q2a-re-engage-title-3-A"',
			'value' => qa_opt('q2a-re-engage-title-3-A'),
		);

		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 3',
			'tags' => 'name="q2a-re-engage-3-A"',
			'value' => qa_opt('q2a-re-engage-3-A'),
		);

		$fields[] = array(
			'type' => 'text',
			'label' => 'mail 質問者',
			'tags' => 'name="q2a-re-engage-title-3-Q"',
			'value' => qa_opt('q2a-re-engage-title-3-Q'),
		);


		$fields[] = array(
			'type' => 'textarea',
			'label' => 'mail 質問者',
			'tags' => 'name="q2a-re-engage-3-Q"',
			'value' => qa_opt('q2a-re-engage-3-Q'),
		);


		$fields[] = array(
			'type' => 'number',
			'label' => '回答者Day',
			'tags' => 'name="q2a-re-engage-day-3-A"',
			'value' => qa_opt('q2a-re-engage-day-3-A'),
		);

		$fields[] = array(
			'type' => 'number',
			'label' => '質問者 Day',
			'tags' => 'name="q2a-re-engage-day-3-Q"',
			'value' => qa_opt('q2a-re-engage-day-3-Q'),
		);


		return array(     
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $fields,
			'buttons' => array(
				array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'name="q2a-re-engage-save"',
				),
			),
		);
	}
}
