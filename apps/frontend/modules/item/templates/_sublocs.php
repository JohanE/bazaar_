
    <select id="item_sublocation_id" name="item[sublocation_id]" class="custom">
  <option value="" <?php if($current == null) echo "selected";?>><?php echo __('Выбрать') ?></option>
    <?php foreach ($sublocs as $subloc): ?>
      <option <?php if($current == $subloc->getId()) echo "selected";?> value="<?php echo $subloc->getId()?>"><?php echo $subloc ?></option>
    <?php endforeach; ?>
    </select>

 

 


