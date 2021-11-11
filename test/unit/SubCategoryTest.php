<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(6, new lime_output_color());

// test the special subcategory type functions ...
$t->is(count(SubCategory::getSpecialSubCategoriesArray() > 0), true, 'testing that SubCategory::getSpecialSubCategoriesArray() return an array that isnt empty');

$t->is(SubCategory::containsSpecialSubcategory("другое"), true, 'testing that SubCategory::containsSpecialSubcategory return "true" when sending special subcat name such as "другое"');

$t->is(SubCategory::containsSpecialSubcategory("Другое"), true, 'testing that SubCategory::containsSpecialSubcategory return "true" when sending special subcat name such as "Другое"');

$t->is(SubCategory::containsSpecialSubcategory("Інші"), true, 'testing that SubCategory::containsSpecialSubcategory return "true" when sending special subcat name such as "Інші"');

$t->is(SubCategory::containsSpecialSubcategory("другие"), true, 'testing that SubCategory::containsSpecialSubcategory return "true" when sending special subcat name such as "другие"');

$t->isnt(SubCategory::containsSpecialSubcategory("foobar"), true, 'testing that SubCategory::containsSpecialSubcategory does not return "true" when sending dummy string');

?>