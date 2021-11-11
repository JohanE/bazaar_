

<?php $item = $form->getObject() ?>

<div id="mainContent">
<br />

<form action="<?php echo url_for('item/saveItem'.(!$item->isNew() ? '?id='.$item->getId() : '')) ?>" method="post">
  
 <table border="0" width="500">      
   <tr>
      <td><b>
       <?php if($item->getCustomerType()->getId() == CustomerType::privat) : ?>        
         <?php echo __('Контактное лицо')?>:
       <?php elseif ($item->getCustomerType()->getId() == CustomerType::business) : ?>
         <?php echo __('фирма')?>:
       <?php endif; ?>        
      </b>
      </td>
      <td><?php echo $item->getName() ?></td>
   </tr>
   <tr>
      <td><b>Е-мейл</b></td>
      <td><?php echo $item->getEmail() ?></td>
   </tr>
   <tr>
      <td><b>Телефон</b></td>
      <td><?php echo $item->getPhone() ?></td>
   </tr>

   <?php if($item->getSite() != "" ) : ?>
    <tr>
      <td><b><?php echo __('Линк')?></b></td>
      <td><?php echo $item->getSite() ?></td>
    </tr>
   <?php endif; ?>        

  <tr>
      <td><b><?php echo __('Заглавие объявления')?></b></td>
      <td><?php echo $item->getTitle() ?></td>
  </tr>
  <tr>
      <td width="200"><b><?php echo __('Текст объявление')?></b></td>
  <td><?php echo nl2br($item->getBody()) ?></td>
  </tr>
  <?php if ($item->getPrice() != 0): ?>
  <tr>
      <td><b><?php echo __('Цена') ?></b></td>
  <td><?php echo $item->getPrice() ?></td>
  </tr>
  <?php endif; ?>  
  <tr>
      <td><b>Область</b></td>
      <td><?php echo $item->getLocation() ?></td>
  </tr>
 <tr>
      <td><b><?php echo __('Район или город')?></b></td>
      <td><?php echo $item->getSubLocation() ?></td>
  </tr>
  <tr>
      <td><b><?php echo __('Категория') ?></b></td>
      <td><?php echo $item->getCategory() ?></td>
  </tr>
  <?php if ($item->getSubCategory()): ?>
    <tr>
      <td></td>
      <td><?php echo $item->getSubCategory() ?></td>
    </tr>
  <?php endif; ?>  
  <tr>
      <td></td>
      <td><?php echo $item->getMode() ?></td>
  </tr>  
  <?php if ($item->getRoom()): ?>
    <tr>
      <td><b><?php echo __('Количество комнат')?></b></td>
      <td><?php echo $item->getRoom() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getArea()): ?>
    <tr>
      <td><b><?php echo __('Площадь')?></b></td>
      <td><?php echo $item->getArea() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getRent()): ?>
    <tr>
      <td><b>Квартплата</b></td>
      <td><?php echo $item->getRent() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getStreet()): ?>
    <tr>
      <td><b><?php echo __('Улица') ?></b></td>
      <td><?php echo $item->getStreet() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getPostalcode()): ?>
    <tr>
      <td><b><?php echo __('Почтовый индекс')?></b></td>
      <td><?php echo $item->getPostalcode() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getLength()): ?>
    <tr>
      <td><b><?php echo __('длина')?></b></td>
      <td><?php echo $item->getLength() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getMilage()): ?>
    <tr>
      <td><b><?php echo __('Пробег (километраж)')?></b></td>
      <td><?php echo $item->getMilage() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getGearbox()): ?>
    <tr>
      <td><b>Коробка передач</b></td>
      <td><?php echo $item->getGearbox() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getYearModel()): ?>
    <tr>
      <td><b><?php echo __('год випуска')?></b></td>
      <td><?php echo $item->getYearModel() ?></td>
    </tr>
  <?php endif; ?>  
  <?php if ($item->getFuel()): ?>
    <tr>
      <td><b><?php echo __('Топливо')?></b></td>
      <td><?php echo $item->getFuel() ?></td>
    </tr>
  <?php endif; ?>  

	  <?php echo $form['id'] ?>
</table>

<div>
  <?php echo form_tag_for($form, '@item') ?>

    <?php include_partial('item/form_actions_preview', array('item' => $item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>
