<?php use_helper('Javascript') ?>


        <select name='subcategory_id' id='subcategory_id'><option value=''>Välj här</option>
        <?php foreach ($subcats as $subcat) :?>
            <?php echo "<option>".$subcat->getName() . "</option>"; ?>
        <?php endforeach; ?>
        </select>

        size: <?php echo sizeof($subcats) ?>

