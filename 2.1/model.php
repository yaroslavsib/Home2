<?php

function pagination($pageCount, $currentPage, $offset){
	$totalpage = (isset($_GET['total']) ? $_GET['total']:$pageCount);
	$currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);
	$firstpage = 1;
	$lastpage = $pageCount;
	$loopcounter = ( ( ( $currentPage + $offset ) <= $lastpage ) ? ( $currentPage + $offset ) : $lastpage );
	$startcounter = ( ( ( $currentPage - $offset) >= 1+$offset ) ? ( $currentPage - $offset ) : 1 );
	if($pageCount > 1) {
		$pagination = '<ul class="paginate" id="paginate">';
		$pagination .= '<li><a href="http://localhost/pagination/model.php?page=1" class="paginate_click" id="1-page">1</a></li>';
			for($i = $startcounter; $i <= $loopcounter; $i++) {
				$pagination .= '<li><a href="http://localhost/pagination/model.php?page='.$i.'">'.$i.'</a></li>';
			}
		$pagination .= '<li><a href="http://localhost/pagination/model.php?page='.$pageCount.'" class="paginate_click" id="'.$pageCount.'-page">Last</a></li>';
		$pagination .= '</ul>';
	}
	echo $pagination;
}
pagination(20,9,2);

?>

