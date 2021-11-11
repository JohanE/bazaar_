<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Internetbazar Admin Interface</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php use_stylesheet('admin.css') ?>
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">

       <div style="float: right">
     <?php if ($sf_user->isAuthenticated()): ?> 
     logged in as: <?php echo $sf_user->getUserName()?>
     <?php endif; ?>
       </div>
      </div>
     <?php if ($sf_user->isAuthenticated()): ?> 
      <div id="menu">
        <ul>
	 <?php if ($sf_user->hasCredential('regular')): ?> 
           <li>
             <?php echo link_to('Items', '@item') ?>
           </li>
	 <?php endif; ?>
	 <?php if ($sf_user->hasCredential('admin')): ?> 
          <li>
            <?php echo link_to('System settings', '@system_setting') ?>
          </li>
          <li>
            <?php echo link_to('Mails', '@ib_mail') ?>
          </li>
          <li>
            <?php echo link_to('Categories', '@category') ?>
          </li>
          <li>
            <?php echo link_to('Super Categories', '@super_category') ?>
          </li>
          <li>
            <?php echo link_to('Sub Categories', '@sub_category') ?>
          </li>
          <li>
            <?php echo link_to('Location', '@location') ?>
          </li>
          <li>
            <?php echo link_to('Sub Location', '@sub_location') ?>
          </li>
          <li>
            <?php echo link_to('Mode', '@mode') ?>
          </li>
          <li>
            <?php echo link_to('Status', '@status') ?>
          </li>
          <li>
            <?php echo link_to('CustomerType', '@customer_type') ?>
          </li>
          <li>
            <?php echo link_to('ImageType', '@image_type') ?>
          </li>
          <li>
            <?php echo link_to('Fuel', '@fuel') ?>
          </li>
          <li>
            <?php echo link_to('Gearbox', '@gearbox') ?>
          </li>
          <li>
            <?php echo link_to('Milage', '@milage') ?>
          </li>
          <li>
            <?php echo link_to('Yearmodel', '@yearmodel') ?>
          </li>
          <li>
            <?php echo link_to('Room', '@room') ?>
          </li>
      <?php endif; ?>
      <?php if ($sf_user->isSuperAdmin()): ?> 
	 <li><?php echo link_to('Users', '@sf_guard_user') ?></li>
	 <li><?php echo link_to('Groups', '@sf_guard_group') ?></li>
	 <li><?php echo link_to('Permissions', '@sf_guard_permission') ?></li>
       <?php endif; ?>
	 <li><?php echo link_to('Logout', '@sf_guard_signout') ?></li>
        </ul>	 

      </div>
   <?php endif; ?>
      <div id="content">
        <?php echo $sf_content ?>
      </div>
 
      <div id="footer">
      </div>
    </div>
  </body>
</html>
