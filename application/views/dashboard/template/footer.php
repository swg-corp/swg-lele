<?php foreach ($js as $key => $value):?>
<script src="<?php echo $value;?>"></script>
<?php endforeach;?>
<script>
   <?php if(isset($script)):?>
       <?php echo $script;?>
   <?php endif;?> 
</script>
</body>
</html>
