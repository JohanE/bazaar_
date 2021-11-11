<?php

#require_once '/usr/share/php/symfony/autoload/sfCoreAutoload.class.php';
require_once '/usr/share/symfony_dir/symfony/lib/autoload/sfCoreAutoload.class.php';

sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));

    

  }
}
