<?php

function Paginator($pageCount, $currentPage, $offset) {
    if ($currentPage > $pageCount or (!is_int($pageCount)) or (!is_int($currentPage)) or (!is_int($offset)) or $pageCount < 0 or $currentPage < 0 or $offset < 0) { //If variable is not a number or is a minus number - throw exception
        echo "Error";
    } else {
        //It can be three possible cases: 1) $currentPage > $offset; 2) $currentPage < $offset; 3) $currentPage = $offset;
        // 1) case;
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
        elseif ($currentPage = $offset) {
            if ($currentPage + $offset >= $pageCount) {
                for ($i = 1; $i <= $pageCount; $i++) {
                    echo " " . $i . " ";
                }
            } else {
                for ($i = 1; $i < $currentPage; $i++) {
                    echo " " . $i . " ";
                }
                echo "<span style='font-size: 24px'>$currentPage</span>";
                for ($i = $currentPage + 1; $i <= $currentPage + $offset; $i++) {
                    echo " " . $i . " ";
                }
                if ($currentPage + $offset < $pageCount - 1) {
                    echo "...";
                }
                echo " " . $pageCount;
            }
        }
    }
}