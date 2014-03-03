<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Template for displaying content with a centered title
 *
   Template Name: Honeylake Contact Page
   MultiEdit: SubTitle,TagLine,LargeItalicText,RightSideList
 *
 * @file           page-honeylakecontent.php
 * @author         Andrew Fenhoff 
 * @copyright      2012-2013 Styledthemes.com
 * @license        license.txt
 */
 
get_header(); ?>

<div class="container">
    <div class="intro">
        <h1>Contact Us</h1>
        <h3>We would love to hear from you. Looking to <a href="http://ushlp.webhotel.microsdc.us/" target="_blank">book a reservation?</a></h3>
    </div>
    <div class="main inset-box form">
        <p>Fill out the form below and someone will contact you shortly regarding your request.</p>
        <iframe id="JotFormIFrame" onload="window.parent.scrollTo(0,0)" allowtransparency="true" src="http://form.jotform.us/form/33453821736153" frameborder="0" style="width: 100%; height: 687px; border: none;" scrolling="no"></iframe>
        <div class="fit-vids-style" id="fit-vids-style" style="display: none;">­<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style></div><script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript">window.handleIFrameMessage = function(e) {var args = e.data.split(":");var iframe = document.getElementById("JotFormIFrame");if (!iframe)return;switch (args[0]) {case "scrollIntoView":iframe.scrollIntoView();break;case "setHeight":iframe.style.height = args[1] + "px";break;}};if (window.addEventListener) {window.addEventListener("message", handleIFrameMessage, false);} else if (window.attachEvent) {window.attachEvent("onmessage", handleIFrameMessage);}</script>
    </div>
    <aside class="map-wrap">
        
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d219998.4157333994!2d-83.688952!3d30.507598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!1s0x0%3A0x948c2d4d4d58a8c1!5e0!3m2!1sen!2sus!4v1386792505079" width="100%" height="275px" frameborder="0"></iframe>
        <p></p>
        <address>
            <h6>Honey&nbsp;Lake&nbsp;Plantation Resort&nbsp;&amp;&nbsp;Spa</h6>
            <p>1290 Honey Lake Rd, Greenville, FL </p>
            <?php $options = _s_get_theme_options(); ?>
            <a href="tel:<?php echo $options['telephone_text_input']; ?>">Tel: <?php echo $options['telephone_text_input']; ?></a>
            
        </address>
        <a href="https://www.google.com/maps/preview#!data=!1m4!1m3!1d449163!2d-83.688952!3d30.507598!4m32!3m16!1m0!1m5!1sHoney+Lake+Plantation+Resort+and+Spa%2C+1290+Honey+Lake+Rd%2C+Greenville%2C+FL+32331!2s0x88ec2681a3dfdc57%3A0x948c2d4d4d58a8c1!3m2!3d30.507598!4d-83.688952!3m8!1m3!1d439997!2d-83.688952!3d30.507598!3m2!1i1024!2i768!4f13.1!5m12!2m11!1m10!1s0x0%3A0x948c2d4d4d58a8c1!3m8!1m3!1d439997!2d-83.688952!3d30.507598!3m2!1i1024!2i768!4f13.1!7m1!3b1&amp;fid=0" target="_blank" class="contact-btn">Get Directions</a>
            
    </aside>
</div>

	

<?php get_footer(); ?>