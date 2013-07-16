TimedMessages Plugin
====================
## Motivation
There are some problems with Session::flash() |<- my opinion
1. you have to call $this->Session->flash('messageType');, for every single messageType.
2. the flashmessages are shown afterRender(), so after i couple of minutes you can't be sure whether the message is new or old(no Page reload for a while)
3. if you don't have a $this->Session->flash('messageType') in every layout/view a flashmessage can be displayed when it's already out-dated

### Tasks
- [x] automagical display of ALL flashMessages
- [x] hide flashmessages after Time
- [x] possibility to display them again

## Installation
1. move the Plugin 'TimedMessages' in you app/Plugin folder && move tm.css to /webroot/css && move tm.js to /webroot/js
2. load the Plugin in your bootstrap.php CakePlugin::load('TimedMessages');
3. load TimedMessages Component in every Controller u want to use it (or AppController)
```php
public $components = array('TimedMessages.TimedMessage');
```
4. u need to have a minimal Configuration in your apps bootstrap or simply load the plugins via CakePlugin::load(array('TimedMessages'=>array('bootstrap'=>true)));

### minimal Configuration
```php
Configure::write('TimedMessage',array(
			'config'=>array(
				'target'=>'<body>',
				'direction'=>'append',
			),
			'default'=>array(
				'color'=>'tm-red',//colorClass used
				'wait'=>'2',//time to wait till fadeout animation starts
				'speed'=>'3',//fadeout animation time
			));
```


## Instructions
Configuration options:
* TimedMessage
	* config
		* target: regexp-String without delimeters
		* direction: whether the regexp gets appended - `<body>`|messageStuff| or prepended - |messageStuff|`<body>`. prepend especially makes sense when using closing regexp like `</body>` or `</header>`

You can create an TimedMessage.type Configuration for every type you want:
```php
$this->Session->setFlash('someErrorMessage','default',array(),'error');//type = error
```
