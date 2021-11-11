<?php

/**
 * Image form.
 *
 * @package    form
 * @subpackage internetbazar_image
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ImageForm extends BaseImageForm
{  

  public function configure()
  {
    
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'itemid' => new sfWidgetFormPropelSelect(array('model' => 'Item', 'add_empty' => false)),
      'path2'    	   => new sfWidgetFormInputFile(),
      'path'   => new sfWidgetFormInput(),

    ));
    
  $this->setValidators(array(
      #'id'             => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id', 'required' => false)),
      #'itemid' => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id')),
      #'path'           => new sfValidatorFile(array('required' => false,
	#					    'max_size' => '4194304',
		#				    'mime_types' => array('image/jpeg','image/png','image/gif') )),
      #'path'   => new sfValidatorString(array('max_length' => 100,'required' => false )),
    ));

  $this->widgetSchema->setNameFormat('image[%s]');

  $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }
		
}
