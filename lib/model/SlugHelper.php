<?php

/**
 * Class with help methods related to Slug / pretty urls
 * 
 * @author Joe
 * @package lib.model
 */ 
class SlugHelper
{

  /*
   * Attempts to make a nice looking "slug" from text entered by user 
   * when submitting an ad. Should also handle cyrillic to latin conversion.
   */
 public static function slugify($string)
  {
    $table = array(
                'А' => 'A',
                'Б' => 'B',
                'В' => 'V',
                'Г' => 'G',
                'Д' => 'D',
                'Е' => 'E',
                'Ё' => 'YO',
                'Ж' => 'ZH',
                'З' => 'Z',
                'И' => 'I',
                'Й' => 'J',
                'К' => 'K',
                'Л' => 'L',
                'М' => 'M',
		'Н' => 'N',
                'О' => 'O',
                'П' => 'P',
                'Р' => 'R',
                'С' => 'S',
                'Т' => 'T',
                'У' => 'U',
                'Ф' => 'F',
                'Х' => 'H',
                'Ц' => 'C',
                'Ч' => 'CH',
                'Ш' => 'SH',
                'Щ' => 'CSH',
                'Ь' => '',
                'Ы' => 'Y',
                'Ъ' => '',
                'Э' => 'E',
                'Ю' => 'YU',
                'Я' => 'YA',
                #ukr letters
		'Ї' => 'JI',
		'ї' => 'ji',
		'Є' => 'JE',
		'є' => 'je',
		'І' => 'I',
		'і' => 'i',
		'Ґ' => 'g',
		'ґ' => 'g',

                'а' => 'a',
                'б' => 'b',
                'в' => 'v',
                'г' => 'g',
                'д' => 'd',
                'е' => 'e',
                'ё' => 'yo',
                'ж' => 'zh',
                'з' => 'z',
                'и' => 'i',
                'й' => 'j',
                'к' => 'k',
                'л' => 'l',
                'м' => 'm',
                'н' => 'n',
                'о' => 'o',
                'п' => 'p',
                'р' => 'r',
                'с' => 's',
                'т' => 't',
                'у' => 'u',
                'ф' => 'f',
                'х' => 'h',
                'ц' => 'c',
                'ч' => 'ch',
                'ш' => 'sh',
                'щ' => 'csh',
                'ь' => '',
                'ы' => 'y',
                'ъ' => '',
                'э' => 'e',
                'ю' => 'yu',
                'я' => 'ya',
    );

    // trim string
    $string = trim($string, '-');

    // replace non letter or digits by -
    $string = preg_replace('~[^\\pL\d]+~u', '-', $string);

    $slug = str_replace(
        array_keys($table),
        array_values($table),$string
    );

    // transliterate (to remove accents etc)
    if (function_exists('iconv'))
      {
	$slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
      }
        
    // Make the string lower case
    $slug = strtolower($slug);

    // remove unwanted characters
    $slug = preg_replace('~[^-\w]+~', '', $slug);

    return $slug;
  }

}
?>