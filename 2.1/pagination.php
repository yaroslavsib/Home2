 <?php

function paginator($pageCount, $currentPage, $offset) {
    if ($currentPage > $pageCount) {
        throw new \Exception('Текущая страница больше общего количества страниц');
    }
    elseif ((!is_int($pageCount)) or (!is_int($currentPage)) or (!is_int($offset))) {
        throw new \Exception('Аргументы должны быть числами!');
    }
    elseif ($pageCount < 0 or $currentPage < 0 or $offset < 0) {
        throw new \Exception('Аргументы должны быть больше нуля');
    }
    else {
        if ($currentPage > $offset) {
            if ($offset + 1 == $currentPage or $offset + 2 == $currentPage) {
                for ($i = 1; $i < $currentPage; $i++) {
                    echo " " . $i . " ";
                }
            } else {
                echo '1 ...';
                for ($i = $currentPage - $offset; $i < $currentPage; $i++) {
                    echo " " . $i . " ";
                }
            }
            echo "<span style='font-size: 24px'>$currentPage</span>";
            if ($currentPage + $offset < $pageCount - 1) {
                for ($i = $currentPage + 1; $i <= $currentPage + $offset; $i++) {
                    echo " " . $i . " ";
                }
                echo "... ".$pageCount;
            } else {
                for ($i = $currentPage + 1; $i <= $pageCount; $i++) {
                    echo " " . $i . " ";
                }
            }
        }
//2) case
        elseif ($currentPage < $offset) {
            for ($i = 1; $i < $currentPage; $i++) {
                echo " " . $i . " ";
            }
            echo "<span style='font-size: 24px'>$currentPage</span>";
            if ($currentPage + $offset < $pageCount - 1) {
                for ($i = $currentPage + 1; $i <= $currentPage + $offset; $i++) {
                    echo " " . $i . " ";
                }
                echo "... " . $pageCount;
            } else {
                for ($i = $currentPage + 1; $i <= $pageCount; $i++) {
                    echo " " . $i . " ";
                }
            }
        }
// 3) case;
        elseif ($currentPage == $offset) {
            if ($currentPage == 1) {
                echo "<span style='font-size: 24px'>$currentPage</span>";
            } else {
                for ($i = 1; $i < $currentPage; $i++) {
                    echo " " . $i . " ";
                }
                echo "<span style='font-size: 24px'>$currentPage</span>";
                if ($currentPage + $offset < $pageCount - 1) {
                    for ($i = $currentPage + 1; $i <= $currentPage + $offset; $i++) {
                        echo " " . $i . " ";
                    }
                    echo "...";
                    echo $pageCount;
                } else {
                    for ($i = $currentPage + 1; $i <= $pageCount; $i++) {
                        echo " " . $i . " ";
                    }
                }
            }
        }
    }
}
try {
    paginator(20, 13, 13);
} catch (\Eception $e) {
    echo $e->getMessage();
}