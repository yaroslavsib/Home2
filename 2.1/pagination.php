<?php

function paginator($pageCount, $currentPage, $offset) {
    if ($currentPage > $pageCount) {
        throw new \Exception('Текущая страница больше общего количества страниц');
    }
    elseif ((!is_int($pageCount)) || (!is_int($currentPage)) || (!is_int($offset))) {
        throw new \Exception('Аргументы должны быть числами!');
    }
    elseif ($pageCount < 0 || $currentPage < 0 || $offset < 0) {
        throw new \Exception('Аргументы должны быть больше нуля');
    }
    else {
        for ($i = 1; $i <= $pageCount; $i++) {
            if ($i == $currentPage) {
                echo "<span style='font-size: 24px'>$i</span>";
            }
            elseif ($i < $currentPage-$offset && $i > 1) {
                echo "...";
                $i = $currentPage-$offset - 1;
            }
            elseif ($i > $currentPage+$offset && $i < $pageCount) {
                echo "...";
                $i = $pageCount-1;
            }
            else {
                echo " ".$i." ";
            }
        }
    }
}
try {
    paginator(20, 4, 10);
} catch (\Eception $e) {
    echo $e->getMessage();
}