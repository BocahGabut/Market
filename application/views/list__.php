<?php
if ($list->num_rows() === 0) {
	echo '<h4>Result......</h4>';
	foreach ($list->result() as $ls) {
?>
		<a href="#" class="list__"><?= $ls->prod_nama ?></a>
	<?php
	}
} else { ?>
	<a href="#" class="list__">-- No Data --</a>
<?php
} ?>
