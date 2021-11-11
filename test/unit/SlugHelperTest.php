<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';

$t = new lime_test(18, new lime_output_color());

// testing some russian
$expected = "traktor";
$t->is(SlugHelper::slugify("трактор"), $expected, 'testing russian text');
$t->is(SlugHelper::slugify("ТРАКТОР"), $expected, 'testing that str to lower is working');
$t->is(SlugHelper::slugify("ТРаКтОр"), $expected, 'testing that str to lower is working 2');

$expected = "vernyot";
$t->is(SlugHelper::slugify("вернёт"), $expected, 'testing russian lang 2');
$expected = "nedvizhimost";
$t->is(SlugHelper::slugify("Недвижимость"), $expected, 'testing russian lang 3');
$expected = "proisshestviya";
$t->is(SlugHelper::slugify("Происшествия"), $expected, 'testing russian lang 4');

$expected = "stranicej";
$t->is(SlugHelper::slugify("страницей"), $expected, 'testing russian lang 5');

# test of longer strings
$expected = "motor-yamaha-f25aes-distancionnyj-2009-goda";
$t->is(SlugHelper::slugify("Мотор Yamaha F25AES дистанционный 2009 года"), $expected, 'testing real bazar example');
$expected = "-elektromobil-arti-roadster-dlya-detej-ot-3-do-6-let-";
$t->is(SlugHelper::slugify("**Электромобиль Arti Roadster Для детей от 3 до 6 лет."), $expected, 'testing real bazar example 2');

$expected = "posutochno-2h-komn-centr-st-m-dvorec-sporta-c-50ue-skidki-";
$t->is(SlugHelper::slugify("Посуточно,2х комн.,Центр,ст.м.Дворец,Спорта ц.50уе (скидки)"), $expected, 'testing real bazar example 3');

# testing some ukrainian words
$expected = "kilkist";
$t->is(SlugHelper::slugify("Кількість"), $expected, 'testing ukrainian lang 1');
$expected = "ukrajinska";
$t->is(SlugHelper::slugify("українська"), $expected, 'testing ukrainian lang 2');
$expected = "komp-yutera";
$t->is(SlugHelper::slugify("комп'ютера"), $expected, 'testing ukrainian lang 3');
$expected = "zastosovuvatimetsya";
$t->is(SlugHelper::slugify("застосовуватиметься"), $expected, 'testing ukrainian lang 4');

# Test of swedish style letters
$expected = "aao";
$t->is(SlugHelper::slugify("åäö"), $expected, 'testing swe letters');

# Test of french style accents
$expected = "accepte";
$t->is(SlugHelper::slugify("accÈpté"), $expected, 'testing accents');

# Test of empty or null values
$expected = null;
$t->is(SlugHelper::slugify(null), $expected, 'testing null');
$expected = "";
$t->is(slughelper::slugify(""), $expected, 'testing empty string');

?>
