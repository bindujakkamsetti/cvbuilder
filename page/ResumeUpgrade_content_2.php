<?php
$resume['contact']=str_replace('\\',"",$resume['contact']);
$resume['skills']=str_replace('\\',"",$resume['skills']);
$resume['works']=str_replace('\\',"",$resume['experience']);
$resume['education']=str_replace('\\',"",$resume['education']);
$contact=json_decode($resume['contact']);
$skills=json_decode($resume['skills']);
$works=json_decode($resume['works']);
$education=json_decode($resume['education']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title><?=@$title?></title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
</head>

<body>

    <div id="page-wrap">
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn"><?=@$resume['name']?></h1>
            <h1 class="fn"><?=@$resume['headline']?></h1>
        
            <p>
                Cell: <span class="tel"><?=$contact->mobile?></span><br />
                Email: <a class="email" href="<?=$contact->email?>"><?=$contact->email?></a>
            </p>
        </div>
                
        <div id="objective">
        <p class="enlarge">
								<?=$resume['objective']?>
							</p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Education</dt>
            <dd>
            <?php    
            if(count($education)<1){
							?>
                            <h3>no education</h3>
                            <?php
						}
						foreach($education as $ed){
							?>
							<div class="yui-u" style="padding:10px 0px;border-bottom:1px solid rgba(0,0,0,0.1)">
							<h2><?=$ed->college?></h2>
							<h3><?=$ed->course?> &mdash; (<?=$ed->c_duration?>) </h3> 
						</div>
							<?php
						}
						?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Skills</dt>
            <dd>
                            <?php
							foreach($skills as $skill){
								?>
								<ul class="talent">
								<li><?=$skill?></li>
							</ul>
								<?php
							}
							?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Experience</dt>
            <dd>
                <<?php
							if(count($works)<1){
								?>
								<div class="job last">
								<h3>Fresher</h3>
							</div>
								<?php
							}
							foreach($works as $work){
								?>
								<div class="job">
								<h2><?=$work->company?></h2>
								<h3><?=$work->jobrole?></h3>
								<h4><?=$work->w_duration?></h4>
								<p><?=$work->work_desc?></p>
							</div>
								<?php
							}
							?>
            </dd>
            
            <dd class="clear"></dd>
            
            <dd class="clear"></dd>
        
            
            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
    </div>
    <div id="ft">
			<p><?=$resume['name']?> &mdash; <a href="mailto:<?=$contact->email?>"><?=$contact->email?></a> &mdash; <?=$contact->mobile?></p>
		</div>

</body>

</html>