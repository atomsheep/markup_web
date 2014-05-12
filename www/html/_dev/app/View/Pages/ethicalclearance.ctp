<style type='text/css'>
	div#ethicalframe {
		border:1px solid #333;
		height:400px;
		margin:20px;
		overflow:scroll;
		padding:20px;
	}
</style>
<div id='ethicalframe'>
<?php
	echo $content;
?>
</div>
<p style='text-align:center;'>
	<a href='<?php echo $baseURL; ?>/pages/ethicalclearance/yes' class='btn btn-primary'>I give consent</a>
	<a href='<?php echo $baseURL; ?>/pages/ethicalclearance/no' class='btn'>I do not give consent</a>
</p>