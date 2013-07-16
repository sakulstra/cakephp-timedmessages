<?php
Configure::write('TimedMessage',array(
			'config'=>array(
				'target'=>'<div id="content" class="grid-100">',
				'direction'=>'append',
			),
			'default'=>array(
				'color'=>'tm-green',
				'wait'=>'5',
				'speed'=>'2'
			)
		)
);