<?php
    require_once '../../php/EPListProvider.php';
    error_reporting(0);
    $provider = new EPListProvider('../../php/config.ini');
    function createDataURI($image,$image_type){
        return "data:image/".$image_type.";base64,".base64_encode(file_get_contents($image));
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Eclipse Phase Character Creator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>

        <!-- POPUP  -- DYNAMIC CONTENT -->
        <div id="popup" data-name=""></div>
        <div id="loading_popup"><center><img src="<?php echo createDataURI("img/ajax-loader.gif","gif"); ?>"></center></div>

        <div id="container">

        	<!-- MAIN MENU - STATIC CONTENT-->       	
        	<section id="primary" class="panel">
        		<nav id="main-nav">
    			<ul>
                    <?php
                    $main_menu = array(
                        array("backgrounds","&#x2f;","Background"),
                        array("faction","&#x30;","Faction"),
                        array("motivations","&#x28;","Motivations"),
                        array("aptitudes","&#x21;","Aptitudes"),
                        array("rep","&#x24;","Rep","rep"),
                        array("posTrait","&#x35;","ego pos. traits"),
//                         array("neuTrait","&#x34;","ego neutral traits"),
                        array("negTrait","&#x36;","ego neg. traits"),
                        array("activeSkills","&#x2d;","Active Skills"),
                        array("knowledgeSkills","&#x2e;","Knowledge Skills"),
                        array("morph","&#x32;","Morph","morph"),
                        array("soft","&#x33;","Ai's & Soft Gear"),
                        array("psy","&#x34;","Psi Sleights"),
                        array("credit","&#x38;","Credit"),
                        array("moxie","&#x37;","Stat"),
                        array("lastdetails","&#x27;","Last Details")
                        );
                    function createElement($item_class,$icon,$display_name){
                        global $provider;
                        echo '<li>';
                        echo '  <a class="'.$item_class.'" href="#">';
                        echo '      <span class="icone" data-icon="'.$icon.'"></span>';
                        echo        $display_name;
                        echo '      <span class="btnhelp slowTransition" data-icon="&#x2a;" title="'.$provider->getInfosById($item_class).'"></span>';
                        echo '  </a>';
                        echo '</li>';
                    };
                    foreach ($main_menu as $i){
                        createElement($i[0],$i[1],$i[2],$i[3]);
                    }
                    ?>
    			</ul>
    			</nav>
        	</section>
        	
        	<!-- SECONDARY PANNEL - DYNAMIC CONTENT -->
        	<section id="secondary" class="panel"></section>	
        	
        	<!-- TERTIARY PANNEL - DYNAMIC CONTENT-->
        	<section id="tertiary" class="panel"></section>	
        	
        	<!-- QUATERNARY PANNEL - DYNAMIC CONTENT-->
        	<section id="quaternary" class="panel"></section>	
        	
        	<!-- REMAINAING POINTS - DYNAMIC CONTENT-->
        	<section class="points">
                <div id='RZ'>RZ <span id="rez_remain" class="rest"></span>
                    <span class="btnhelp slowTransition" data-icon="&#x2a;" title="<?php echo $provider->getInfosById('points'); ?>"></span></span>
                </div>
                <div id='CP'>CP <span id="creation_remain" class="rest"></span>
                    <span class="btnhelp slowTransition" data-icon="&#x2a;" title="<?php echo $provider->getInfosById('points'); ?>"></span></span>
                </div>
                <div id='AP'>AP <span id="aptitude_remain" class="rest"></span></div>
                <div id='ASR'>ASR <span id="asr_remain" class="rest"></span></div>
                <div id='KSR'>KSR <span id="ksr_remain" class="rest"></span></div>
                <div id='RP'>RP <span id="reputation_remain" class="rest"></span></div>
                <div id='CR'>CR <span id="credit_remain" class="rest"></span></div>
        	</section>
        	<!-- MESSAGES FOR THE USER - DYNAMIC CONTENT-->
        	<section id="messages"></section>
            <div id="menu">
                <button class="popupButton" id="saveButton">
                    <!-- <span class="button_icone" data-icon="&#x2d;"></span> -->
                    Save
                </button>
                <button class="popupButton" id="loadButton">
                    <!-- <span class="button_icone" data-icon="&#x30;"></span> -->
                    Load
                </button>
                <button class="popupButton" id="validateButton">
                    <!-- <span class="button_icone" data-icon="&#x2b;"></span> -->
                    Check
                </button>
                <button class="popupButton" id="exportTxtButton">
                    <!-- <span class="button_icone" data-icon="&#x2c;"></span> -->
                    TXT
                </button>
                <button class="popupButton" id="exportButton">
                    <!-- <span class="button_icone" data-icon="&#x2c;"></span> -->
                    PDF
                </button>
                <button class="popupButton" id="settingsButton">
                    <!-- <span class="button_icone" data-icon="&#x21;"></span> -->
                    Reset
                </button>
                <button class="popupButton" id="aboutButton">
                    <!-- <span class="button_icone" data-icon="&#x21;"></span> -->
                    About
                </button>
            </div>
        </div>

        <style><?php include "css/popup.css"; ?></style>
        <style><?php include "scripts/jquery/jquery-ui.min.css"; ?></style>
        <style><?php include "scripts/vegas/vegas.min.css"; ?></style>
        <style><?php include "css/normalize/normalize.min.css"; ?></style>
        <style><?php include "css/lato.css"; ?></style>
        <style><?php include "css/icomoon.css"; ?></style>
        <style><?php include "css/main7.css"; ?></style>

        <script><?php include "scripts/jquery/jquery.min.js"; ?></script>
        <script><?php include "scripts/jquery/jquery-ui.min.js"; ?></script>
        <script><?php include "scripts/vegas/vegas.min.js"; ?></script>
        <script><?php include "scripts/ajax_helper.js"; ?></script>
        <script><?php include "scripts/main_menu.js"; ?></script>
        <script><?php include "scripts/ajaxManager.js"; ?></script>
        <script><?php include "scripts/popup.js"; ?></script>
        <script>
            $( function() {
                //NAVIGATION JQUERRY
                //class active au menu principal
                $("#main-nav li a").click(function(){
                    $(".active").removeClass("active");
                    $(this).toggleClass("active");
                    $("#tertiary_infos").css('visibility','hidden');
                    return false;
                });

                var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

                //background slideshow
                //See here for more options:  http://vegas.jaysalvat.com/documentation/settings/
                var desktopSlides = [
                        { src: 'img/bg/bg1.jpg'},
                        { src: 'img/bg/bg2.jpg'},
                        { src: 'img/bg/bg3.jpg'},
                        //These are all free (at least non-commercial) use images or images in the public domain
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/3/34/SFO_at_night.jpg'},     //Andrew Choy from Santa Clara, California (Creative Commons Attribution-Share Alike 2.0 Generic)
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/6/62/Starsinthesky.jpg'},    //Credit ESA (This is me giving credit, per the license)
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/0/00/Crab_Nebula.jpg'},                  //Credit NASA
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/7/7f/Ngc1999.jpg'},                      //Credit NASA
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/4/4e/Pleiades_large.jpg'},               //Credit NASA
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/c/c9/Sirius_A_and_B_artwork.jpg'},       //Credit NASA
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/5/57/Witness_the_Birth_of_a_Star.jpg'},  //Credit NASA
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/4/44/Ngc6397_hst_blue_straggler.jpg'},   //Credit NASA
                        { src: 'https://upload.wikimedia.org/wikipedia/commons/b/b4/The_Sun_by_the_Atmospheric_Imaging_Assembly_of_NASA%27s_Solar_Dynamics_Observatory_-_20100819.jpg'}  //Credit NASA
                    ];
                //Do not show the (data heavy) background images if on mobile
                if(isMobile){
                    desktopSlides=[{}]
                };
                $('body').vegas({
                    timer: false,
                    shuffle: true,
                    delay: 60000,
                    overlay: '<?php echo createDataURI("scripts/vegas/overlays/08.png","png"); ?>',
                    slides: desktopSlides
                });
            });
        </script>
    </body>
</html>
