<?php use_helper('PagerUrl') ?>
<?php use_helper('Visibility') ?>

   <?php include_partial('search', array('params' => $params, 'modes' => $modes, 'subcats' => $subCategories, 'superCategories' => $superCategories, 'locations' => $locations, 'customerTypes' => $customerTypes, 'hasPriceInfo' => $hasPriceInfo, 'isCarMode' => $isCarMode, 'priceFrom' => $priceFromList, 'priceTo' => $priceToList, 'yearModelsFrom' => $yearModelsFrom, 'yearModelsTo' => $yearModelsTo, 'milageFrom' => $milageFrom, 'milageTo' => $milageTo, 'isApartmentMode' => $isApartmentMode, 'roomsFrom' => $roomsFrom, 'roomsTo' => $roomsTo, 'gearBoxes' => $gearBoxes, 'customerTypes' => $customerTypes, 'areaFromList' => $areaFromList, 'areaToList' => $areaToList, 'fuelList' => $fuelList)) ?>

<div id="wrapper">
   <?php include_partial('item/list', array('itemList' => $pager->getResults(), 'max_per_page' => $max_items_per_page,'showImgs' => $showImgs, 'sort' => $sort, 'params' => $params, 'pager' => $pager)) ?>
</div>

<?php use_javascript('head.min.js') ?>
<?php use_javascript('jquery-1.4.2.min.js') ?>
<?php use_javascript('jquery-ui-1.8.6.custom.min.js') ?>
<?php use_javascript('jquery.ui.selectmenu.js') ?>
<?php use_javascript('jquery-lightbox/jquery.lightbox-0.5.pack.js') ?>
<?php use_javascript('main.js') ?>
<?php use_javascript('http://vkontakte.ru/js/api/share.js?10') ?>
<?php use_javascript('jquery.jqia.selects.js') ?>



