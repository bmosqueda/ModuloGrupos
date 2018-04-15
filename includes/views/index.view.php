<?php require_once(VIEW_PATH.'header.inc.php'); ?>
	<div class="container">
		<h1>Módulo de grupos</h1>
	</div>
	<script type="text/javascript">
		//Axios http methods
		window.onload = () => {
	      window.axios.get('postAPI.php')
	        .then(({data}) => {
	        	console.log("AXIOS");
	        	document.write(JSON.stringify(data));
	        })
	    }
	</script>
<?php require_once(VIEW_PATH.'footer.inc.php'); ?>