<?php
  /**
   * Class for storing and handling system settings
   * like maximum allowed period for ads on the site
   **/
class SystemSetting extends BaseSystemSetting
{
  const max_ad_key = "max_duration_for_ad";
  const max_ad_default_value = 4;

  const max_images_key = "max_images_for_ad";
  const max_images_default_value = 5;

  public function __toString()
  {
    return $this->name;
  }

  public static function getMaxDurationForAdsInMonths()
  {
    $criteria = SystemSettingPeer::getSystemSetting(self::max_ad_key);
    $value = SystemSettingPeer::doSelectOne($criteria);
    return $value;
  }

  public static function getMaxNumberOfImagesForAd()
  {
    $retValue = self::max_images_default_value;
    $criteria = SystemSettingPeer::getSystemSetting(self::max_images_key);
    $sysSetting = SystemSettingPeer::doSelectOne($criteria);
    if(isset($sysSetting)) {
      $retValue = $sysSetting->getValue();
    }
    return $retValue;
  }

  public static function getMaxPeriodOnSite()
  {
    $systemSetting = self::getMaxDurationForAdsInMonths();
    if(isset($systemSetting))
      $maxNrOfMonths = $systemSetting->getValue();
    else
      $maxNrOfMonths = self::max_ad_default_value;

    return $maxNrOfMonths;
  }



}
