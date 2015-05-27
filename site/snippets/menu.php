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
			echo '<li data-depth="'.$element->depth().'">'.str_repeat('<span class="space" data-depth="'.$element->depth().'"></span>', max(0, $element->depth()-2));
				echo "<span class='element' data-dir='{$element->diruri()}'><a class='title' href='{$element->url()}' >{$element->title()->html()}</a></span>";
				echo '<ul>';
					foreach($element->children() as $e):
						nested($e);
					endforeach;
				echo '</ul>';
			echo '</li>';
		};

		foreach($pages->not('error', 'login') as $p){
			nested($p);
		}
		?>

	</ul>
	<br>
	<span class="warning">
		<?php if ($error) { echo $error; } ?>
	</span>


</nav>



<?php snippet('interface') ?>





