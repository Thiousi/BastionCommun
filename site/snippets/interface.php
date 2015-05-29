<div id="interface">
	<?php if($user = $site->user()): ?>
		<button id="logout" class="log">
			<a href="<?php echo url('logout') ?>">Logout</a>
		</button>
		<button class="plus buttons-centered btn-cancel">+</button>
		<select name="select">
			<option value="directory">dossier</option> 
			<option value="article">Article</option> 
			<option value="list">Liste</option>
			<option value="calendar">calendrier</option>
		</select>
        <button id="button">Settings</button>
        <div id="panel">Settings</div>
	<?php else: ?>
		<button id="login" class="log">
			<a href="<?php echo url('login') ?>">Login</a>
		</button>
	<?php endif ?>
</div>
<?php
    function addPage($name) {
        echo $name;
        
        try {
            $newPage = page()->children()->create($name, 'article', array(
                'title' => $name,
                'date'  => '2012-12-12 22:33',
                'text'  => 'This is my new article',
                'tags'  => 'article, text, readable'
            ));
            echo 'The new page has been created';
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    if (isset($_GET['hoey'])) {
        addPage($_GET['hoey']);
    }
?>
<!--
<?php if($user = $site->user()): ?>
<form method="get" action="<?php echo $page->url() ?>">
    <input class="input" type="text" name="hoey" value="">
    <input class="btn-submit" type="submit" value="Ajouter">
</form>
<?php endif ?>

-->
