<?php
$error = '';
if (isset($_GET['from']) && isset($_GET['to'])) {
	if ($_GET['from'] != $_GET['to']) {
			if ( ! is_dir("content/".$_GET['to']) ) { 
				rename ("content/".$_GET['from'], "content/".$_GET['to']);
			} else {
				$error = "Une page avec ce nom existe déjà !";
			}
	}
}

?>
<nav role="navigation">
	
	<ul class="menu cf">
		<?php

		function nested($element){ 
			echo '<li>';
				echo "<span class='element'><a class='title' href='{$element->url()}'>{$element->title()->html()}</a></span>";
			echo '</li>';
		};

		foreach($pages->not('error', 'login', 'about') as $p){
			if($p->title('private') && $user = $site->user()){
				nested($p);
			} else {
				nested($p);
			}
		}
		?>

	</ul>
	<br>
	<span class="warning">
		<?php if ($error) { echo $error; } ?>
	</span>

</nav>



<?php snippet('interface') ?>





