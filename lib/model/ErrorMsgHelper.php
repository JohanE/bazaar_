<?php

/**
 * Class for handling error msgs
 * @author     Johan Edlund
 *
 * @package lib.model
 */ 


class ErrorMsgHelper
{

  public static function getTooShort()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("\'%value%' - слишком короткое, должно содержать минимум %min_length% знака");
    return $ret_str;
  }

 public static function getTooShortPw()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Пароль слишком короткое, должно содержать минимум %min_length% знака");
    return $ret_str;
  }

 public static function getPasswordsMismatch()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Пароли не совпадают");
    return $ret_str;
  }

 public static function getWrongPassword()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Неправильный пароль");
    return $ret_str;
  }

 public static function getPhoneError()
 {
   $ret_str = sfContext::getInstance()->getI18N()->__('Это поле может содержать только цифры и следующие символы: ( ) + - , ;');
   return $ret_str;
 }

 public static function getNameError()
 {
   $ret_str = sfContext::getInstance()->getI18N()->__('не разрешается указывать <b>ссылки</b>, <b>е-мейлы</b>, <b>тел.</b> на этом поле');   
   return $ret_str;
 }

 public static function getBodyError()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__('не разрешается указывать <b>ссылки</b>, <b>е-мейлы</b>, <b>тел.</b> в тексте или заглавии объявления');
    return $ret_str;
  }

  public static function getTooLong()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Поле слишком длинное. Максимальная длинна составляет %max_length% знаков");
    return $ret_str;
  }

  public static function getImageExists()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Фото уже загруженное. Удалите его сначала перед загрузкой нового.");
    return $ret_str;
  }

  public static function getNotInteger()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("\'%value%' не является числом, используйте только цифры");
    return $ret_str;
  }

  public static function getMime()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Неправильный тип файла (%mime_type%). Допустимые форматы файлов: gif, jpg, png");
    return $ret_str;
  }

  public static function getRequired()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Это поле обязательно для заполнения");

    return $ret_str;
  } 

  public static function getInvalidEmail()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Неверный  е-мейл");
    return $ret_str;
  }

  public static function getInvalidUrl()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Неверный сайт, не забывайте указывать http://");
    return $ret_str;
  }

  public static function getMailSendError()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("К сожалению не удалось отправить е-мейл через технические неисправности");
    return $ret_str;
  }

  public static function getForbiddenwordsError()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));
    $ret_str = sfContext::getInstance()->getI18N()->__("Поле содержит запрещенные слова. Для списка нажмите");
    $ret_str .= " <a href=javascript:winLoad('".url_for('service/forbiddenWords') ."')>";
    $ret_str .= sfContext::getInstance()->getI18N()->__("здесь");
    $ret_str .= "</a>";
    return $ret_str;
  }

  public static function getTooManyImgsError($maxImages)
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Количество изображений ограниченно, максимальнoe количество");
    $ret_str .= " " .$maxImages . " ";
    $ret_str .= sfContext::getInstance()->getI18N()->__("изображений");
    return $ret_str;
  }

  public static function getNoMainImageError()
  {
    $ret_str = sfContext::getInstance()->getI18N()->__("Главное фото отсутствует. Загрузите главное фото или удалите дополнительные.");
    return $ret_str;
  }
 

}
