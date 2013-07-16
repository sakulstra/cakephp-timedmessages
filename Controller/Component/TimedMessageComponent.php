<?php
class TimedMessageComponent extends Component{
	
	public $components = array('Session');
	
	public $javascript = array('/TimedMessages/js/tm');
	
	public $css = array('/TimedMessages/css/tm');
	
	public $controller;
	
	public function __construct(ComponentCollection $collection,$settings = array()){
		$settings = array_merge((array)Configure::read('TimedMessage'), $settings);
		parent::__construct($collection, array_merge($this->settings, (array)$settings));
		$this->controller = $collection->getController();
		$this->controller->helpers[] = 'TimedMessages.TimedMessages';
	}
	
	public function beforeRender(Controller $controller){
		$controller->set(array(
			'timedMessagesCss'=>$this->css,
			'timedMessagesJavascript'=>$this->javascript	
		));
	}
	
}