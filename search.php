<?php
include 'Kvitter.class.php';

$searchword = $_POST['searchword'];
$search_type = $_POST['search_type'];

$results = Kvitter::search($searchword, $search_type);

?>
Resultat
<br />
--------
<?php
if($results){

	if($search_type == "tweets"){
		foreach($results as $result){
			echo '<div>';
			echo $result['username'];
			echo '<br />';
			echo $result['tweet'];
			echo '</div>';
			echo '<br />';
		}
	}else{
		foreach($results as $result){
			echo '<div>';
			echo $result['username'];
			echo '<br />';
		}
	}
	}else{
		echo 'Inga resultat funna.';
	}

?>