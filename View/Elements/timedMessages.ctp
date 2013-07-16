<?php if(($messages = $this->Session->read('Message'))==null)$messages = array();?>
<div id="timedMessages">
<?php foreach($messages as $key => $message):?>
	<?php $cfg = array_merge((array)Configure::read('TimedMessage.default'),(array)Configure::read('TimedMessage.'.$key));?>
	<div data-colorclass="<?php echo $cfg['color']?>" class="timedMessage tm-active <?php echo $cfg['color']?>" style="animation: fadeOut <?php echo $cfg['speed']+$cfg['wait'];?>s linear forwards;">
		<?php echo $this->Session->flash($key);?>
		<div class="tm-progress" style="animation: runProgress <?php echo $cfg['speed']-0.2;?>s linear forwards <?php echo $cfg['wait'];?>s;"></div>
	</div>
<?php endforeach;?>
</div>
<script type="text/javascript">
<!--
$(document).ready(function(){
	$(this).tM();
});
-->
</script>