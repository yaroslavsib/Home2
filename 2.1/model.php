<?php




$totalpage = (isset($_GET['total']) ? $_GET['total'] : 10);
$currentpage = (isset($_GET['page']) ? $_GET['page'] : 1);
$firstpage = 1;
$lastpage = $totalpage;
$loopcounter = ( ( ( $currentpage + 2 ) <= $lastpage ) ? ( $currentpage + 2 ) : $lastpage );
$startCounter = ( ( ( $currentpage - 2 ) >= 3 ) ? ( $currentpage - 2 ) : 1 );

if($totalpage > 1) {
  $pagination = '<ul class="paginate" id="paginate">';
  $pagination .= '<li><a href="http://localhost/Home2/2.1/model.php?page=1" class="paginate_click" id="1-page">First</a></li>';
    for($i = $startCounter; $i <= $loopcounter; $i++) {
      $pagination .= '<li><a href="http://localhost/Home2/2.1/model.php?page='.$i.'">'.$i.'</a></li>';
    }
  $pagination .= '<li><a href="http://localhost/Home2/2.1/model.php?page='.$totalpage.'" class="paginate_click" id="'.$totalpage.'-page">Last</a></li>';
  $pagination .= '</ul>';
}

echo $pagination;

?>