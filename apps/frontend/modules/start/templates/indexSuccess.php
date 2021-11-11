<?php decorate_with('start_layout') ?>

<?php use_stylesheet('reset.css') ?>

<?php use_stylesheet('ui-lightness/jquery-ui-1.8.6.custom.css') ?>
<?php use_stylesheet('ui.selectmenu.css') ?>
<?php use_stylesheet('/js/jquery-lightbox/css/jquery.lightbox-0.5.css') ?>
<?php use_stylesheet('style.css') ?>

<div id="page" class="pngfix">
	<div id="holder">
		<div id="header">
			<h1><a href="#">InternetBazar.com.ua</a></h1>
			<ul id="langs">
				<li class="ru" title="По русски" alt="По русски"><a href="<?php echo url_for('@change_language') ?>?language=ru">ru</a></li>
				<li class="ua"><a alt="українською" title="українською" href="<?php echo url_for('@change_language') ?>?language=uk">ua</a></li>
			</ul>
			<div id="map-holder">
				<div id="map-hover"><img src="/images/blank.gif" name="map" width="586" height="388" class="pngfix" id="map" usemap="#map_ua" alt="map" /></div>
			</div>
			<map id="map_ua" name="map_ua">
				<area alt="<?php echo __('Львовская область') ?>" title="<?php echo __('Львовская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_lvivid'))?>" coords="52,164,39,156,32,122,69,86,82,80,100,92,117,111,94,130,81,141,62,148" shape="poly" id="area-1" />
				<area alt="<?php echo __('Волынская область') ?>" title="<?php echo __('Волынская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_volinskaid'))?>" coords="71,27,80,66,83,78,109,94,119,78,141,69,132,43,128,17,82,21,82,29" shape="poly" id="area-2" />
				<area alt="<?php echo __('Ровенская область') ?>" title="<?php echo __('Ровенская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_rovenskaid'))?>" coords="131,19,129,43,144,62,127,78,110,87,116,109,147,100,174,85,174,62,191,40,175,29,140,19" shape="poly" id="area-3" />
				<area alt="<?php echo __('Тернопольская область') ?>" title="<?php echo __('Тернопольская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_ternopolskaid'))?>" coords="116,110,107,119,95,133,101,152,110,163,128,179,142,179,140,133,142,124,142,115,143,100,123,102" shape="poly" id="area-4" />
				<area alt="<?php echo __('Закарпатская область') ?>" title="<?php echo __('Закарпатская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_zakarpatskaid'))?>" coords="7,169,16,160,26,144,37,156,56,168,68,177,84,202,49,197,32,198,18,185" shape="poly" id="area-5" />
				<area alt="<?php echo __('Ивано-Франковская область') ?>" title="<?php echo __('Ивано-Франковская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_ivanofrankoid'))?>" coords="63,147,83,146,86,132,97,134,101,155,114,165,118,173,118,186,95,201,93,214,79,188,53,164" shape="poly" id="area-6" />
				<area alt="<?php echo __('Черновицкая область') ?>" title="<?php echo __('Черновицкая область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chernovitskaid'))?>" coords="96,214,96,199,118,184,119,173,147,184,155,182,178,180,178,187,143,196,134,205" shape="poly" id="area-7" />
				<area alt="<?php echo __('Хмельницкая область') ?>" title="<?php echo __('Хмельницкая область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chmelnitskaid'))?>" coords="145,103,141,126,140,150,140,182,175,181,179,154,191,155,190,127,182,119,184,104,175,88,161,87" shape="poly" id="area-8" />
				<area alt="<?php echo __('Житомирская область') ?>" title="<?php echo __('Житомирская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_zhitomirskaid'))?>" coords="194,36,186,47,180,60,176,72,173,89,186,105,188,122,227,124,229,134,243,133,249,120,244,85,240,51,233,37,222,46,210,36" shape="poly" id="area-9" />
				
				<area alt="<?php echo __('Винницкая область') ?>" title="<?php echo __('Винницкая область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_vinitskaid'))?>" coords="175,163,191,150,191,136,193,124,225,120,228,133,242,133,249,157,245,162,259,189,247,205,225,210,218,201,207,202,193,193,174,185" shape="poly" id="area-10" />

				<area alt="<?php echo __('Киевская область') ?>" title="<?php echo __('Киевская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_kievid'))?>" coords="242,48,237,62,244,72,245,85,243,125,248,153,269,153,283,146,292,140,296,122,311,125,323,102,317,84,296,91,292,81,282,78,273,53,267,44" shape="poly" id="area-11" />


				<area alt="<?php echo __('Черкасская область') ?>" title="<?php echo __('Черкасская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_cherkasskayaid'))?>" coords="289,144,296,124,313,122,320,103,344,136,346,162,338,166,329,160,318,171,307,167,301,177,280,178,258,191,252,177,246,160,253,155" shape="poly" id="area-12" />

				<area alt="<?php echo __('Черниговская область') ?>" title="<?php echo __('Черниговская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chernigovskayaid'))?>" coords="291,15,278,32,277,55,280,80,289,77,298,92,314,87,324,100,327,95,348,97,353,67,349,53,353,41,350,31,360,16,361,3,351,1,330,5,325,17" shape="poly" id="area-13" />

				<area alt="<?php echo __('Сумская область') ?>" title="<?php echo __('Сумская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_sumskayaid'))?>" coords="361,1,358,17,349,32,350,56,350,66,354,69,354,90,387,91,396,107,431,96,421,84,426,76,419,63,411,53,386,53,386,40,383,33,393,27,380,17,372,0" shape="poly" id="area-14" />

				<area alt="<?php echo __('Полтавская область') ?>" title="<?php echo __('Полтавская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_poltavaid'))?>" coords="346,98,330,96,322,103,332,122,342,135,344,145,349,153,365,165,380,168,394,170,392,163,410,151,411,145,424,143,426,128,409,117,410,104,396,106,388,90,356,89" shape="poly" id="area-15" />

				<area alt="<?php echo __('Кировоградская область') ?>" title="<?php echo __('Кировоградская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_kirovogradid'))?>" coords="278,175,274,185,251,195,251,202,266,203,308,206,318,221,340,220,351,210,367,198,368,183,375,177,373,171,378,167,346,151,343,166,331,159,323,168,306,166,299,177" shape="poly" id="area-16" />

				<area alt="<?php echo __('Одесская область') ?>" title="<?php echo __('Одесская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_oddessaid'))?>" coords="273,230,283,230,284,247,293,249,298,257,291,263,294,277,285,279,283,288,275,300,262,315,247,326,245,345,237,333,217,339,212,345,192,333,207,328,206,321,217,310,225,299,221,285,258,288,256,272,245,261,244,253,245,241,237,245,229,236,231,212,222,209,227,206,237,207,251,203,265,206" shape="poly" id="area-17" />

				<area alt="<?php echo __('Николаевская область') ?>" title="<?php echo __('Николаевская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_nikolaevid'))?>" coords="265,203,290,201,313,209,317,222,331,219,341,221,344,210,354,211,354,229,358,247,350,254,356,259,349,266,317,277,294,277,291,262,298,253,286,246,282,230,267,229" shape="poly" id="area-18" />

				<area alt="<?php echo __('Херсонская область') ?>" title="<?php echo __('Херсонская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chersonskaid'))?>" coords="355,259,353,252,354,239,356,231,390,234,396,243,405,243,403,256,414,264,409,271,423,287,417,295,396,294,374,300,342,303,318,293,316,284,336,280,321,273,344,265" shape="poly" id="area-19" />

				<area alt="<?php echo __('Днепропетровская область') ?>" title="<?php echo __('Днепропетровская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_dneprid'))?>" coords="369,172,378,171,391,171,393,158,413,152,429,161,444,162,459,174,474,175,480,196,457,216,448,202,410,203,412,231,364,235,354,227,351,211,369,198,366,186,374,178" shape="poly" id="area-20" />

				<area alt="<?php echo __('Харьковская область') ?>" title="<?php echo __('Харьковская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_charkovid'))?>" coords="465,93,481,87,492,92,505,106,505,143,496,143,480,166,470,167,468,174,458,179,445,162,429,161,411,152,414,146,424,146,423,128,408,115,409,104,443,89,454,96" shape="poly" id="area-21" />

				<area alt="<?php echo __('Луганская область') ?>" title="<?php echo __('Луганская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_luganskid'))?>" coords="566,118,571,113,573,148,568,166,576,179,571,202,546,203,545,196,541,196,535,193,531,187,523,181,520,166,511,156,509,145,503,144,508,109,513,101,544,109,554,111" shape="poly" id="area-22" />

				<area alt="<?php echo __('Донецкая область') ?>" title="<?php echo __('Донецкая область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_donetskid'))?>" coords="516,156,522,177,546,198,539,210,529,215,524,243,503,245,495,255,486,255,489,250,483,239,490,231,474,222,466,206,479,197,471,178,468,169,486,157,496,145,507,143" shape="poly" id="area-23" />

				<area alt="<?php echo __('Запорожская область') ?>" title="<?php echo __('Запорожская область') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_zaporozhskaid'))?>" coords="464,211,491,230,480,243,490,252,480,262,464,269,424,290,423,280,408,273,414,263,405,254,403,246,397,244,393,235,405,229,416,232,412,211,414,204,446,200,457,211" shape="poly" id="area-24" />

				<area alt="<?php echo __('Крым') ?>" title="<?php echo __('Крым') ?>" href="<?php echo url_for('item/index?loc='.sfConfig::get('app_krimid'))?>" coords="442,348,431,360,416,362,406,375,393,385,384,384,372,378,380,351,366,347,357,336,341,340,340,333,360,316,380,310,380,301,409,305,425,324,426,332,440,340,452,329,483,327,475,346,459,352,450,345" shape="poly" id="area-25" />
			</map>
			<div class="clr"></div>
		</div>
		<div id="wrapper">
                     <div class="promo pngfix"><span><?php echo __('Доска бесплатных объявлений!') ?></span></div>
			<p class="promo"><?php echo __('Здесь вы можете бесплатно разместить или найти частное объявление или объявление фирмы, например: б/у авто, недвижимость, мебель, бытовая и электротехника и много другого из всей Украины.') ?></p>
                        <a href="<?php echo url_for('item/create') ?>" class="add"><?php echo __('Подать объявление') ?></a>
			<div class="clr"></div>
			<ol class="areas">
				<li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_lvivid'))?>" id="link-1"><?php echo __('Львовская область') ?></a></li>
				<li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_volinskaid'))?>" id="link-2"><?php echo __('Волынская область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_rovenskaid'))?>" id="link-3"><?php echo __('Ровенская область') ?></a></li>	
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_ternopolskaid'))?>" id="link-4"><?php echo __('Тернопольская область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_zakarpatskaid'))?>" id="link-5"><?php echo __('Закарпатская область') ?></a></li>
				<li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_ivanofrankoid'))?>" id="link-6"><?php echo __('Ивано-Франковская область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chernovitskaid'))?>" id="link-7"><?php echo __('Черновицкая область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chmelnitskaid'))?>" id="link-8"><?php echo __('Хмельницкая область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_zhitomirskaid'))?>" id="link-9"><?php echo __('Житомирская область') ?></a></li>		
			</ol>
			<ol class="areas" start="10">
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_vinitskaid'))?>" id="link-10"><?php echo __('Винницкая область') ?></a></li>                               
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_kievid'))?>" id="link-11"><?php echo __('Киевская область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_cherkasskayaid'))?>" id="link-12"><?php echo __('Черкасская область') ?></a></li>		
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chernigovskayaid'))?>" id="link-13"><?php echo __('Черниговская область') ?></a></li>		
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_sumskayaid'))?>" id="link-14"><?php echo __('Сумская область') ?></a></li>		
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_poltavaid'))?>" id="link-15"><?php echo __('Полтавская область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_kirovogradid'))?>" id="link-16"><?php echo __('Кировоградская область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_oddessaid'))?>" id="link-17"><?php echo __('Одесская область') ?></a></li>
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_nikolaevid'))?>" id="link-18"><?php echo __('Николаевская область') ?></a></li>										
			</ol>
			<ol class="areas" start="19">
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_chersonskaid'))?>" id="link-19"><?php echo __('Херсонская область') ?></a></li>									       				
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_dneprid'))?>" id="link-20"><?php echo __('Днепропетровская область') ?></a></li>							
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_charkovid'))?>" id="link-21"><?php echo __('Харьковская область') ?></a></li>									       						       						
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_luganskid'))?>" id="link-22"><?php echo __('Луганская область') ?></a></li>									       						       						
                                <li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_donetskid'))?>" id="link-23"><?php echo __('Донецкая область') ?></a></li>
	       			<li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_zaporozhskaid'))?>" id="link-24"><?php echo __('Запорожская область') ?></a></li>							
				<li><a href="<?php echo url_for('item/index?loc='.sfConfig::get('app_krimid'))?>" id="link-25"><?php echo __('Крым') ?></a></li>								
			</ol>
			<div class="clr"></div>
		</div>
	</div>
	<div id="footer"><span>&copy; 2009 - 2011 Internetbazar</span></div>
</div>
<div class="bottom pngfix"></div>


<?php use_javascript('head.min.js') ?>
<?php use_javascript('jquery-1.4.2.min.js') ?>
<?php use_javascript('jquery-ui-1.8.6.custom.min.js') ?>
<?php use_javascript('jquery.ui.selectmenu.js') ?>
<?php use_javascript('jquery-lightbox/jquery.lightbox-0.5.pack.js') ?>
<?php use_javascript('main.js') ?>
<?php use_javascript('jquery.jqia.selects.js') ?>




