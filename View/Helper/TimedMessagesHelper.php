<?php

class TimedMessagesHelper extends AppHelper{
	
	public $helpers = array('Html');
	
	public $settings = array(
		'target'=>'</body>',
		'direction'=>'prepend'	
	);
	
	public function send(){
		$this->settings = array_merge($this->settings,Configure::read('TimedMessage.config'));
		$view = $this->_View;
		$head = '';
		if (isset($view->viewVars['timedMessagesCss']) && !empty($view->viewVars['timedMessagesCss'])) {
			$head .= $this->Html->css($view->viewVars['timedMessagesCss']);
		}
		if (isset($view->viewVars['timedMessagesJavascript'])) {
			foreach ($view->viewVars['timedMessagesJavascript'] as $script) {
				if ($script) {
					$head .= $this->Html->script($script);
				}
			}
		}
		if (preg_match('#</head>#', $view->output)) {
			$view->output = preg_replace('#</head>#', $head . "\n</head>", $view->output, 1);
		}
		$messages = $view->element('timedMessages', array(), array('plugin' => 'TimedMessages'));
		if (preg_match('#'.$this->settings['target'].'#', $view->output)) {
			$view->output = ($this->settings['direction']=='prepend')?
			preg_replace('#'.$this->settings['target'].'#', $messages . "\n".$this->settings['target'], $view->output, 1):
			preg_replace('#'.$this->settings['target'].'#', $this->settings['target']."\n".$messages, $view->output, 1);
		}
	}
	
	public function afterLayout($layoutFile) {
		if (!$this->request->is('requested')) {
			$this->send();
		}
	}
	
}