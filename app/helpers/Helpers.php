<?php

class Helpers {
    public static function print_me($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    public static function Pagination($nbElementParPage = 5 ,$nbPages, $link = "#"){
      
        $paginationTemplate = "<nav aria-label='Page navigation '>";
        $paginationTemplate .= "<ul class='pagination justify-content-center'>";
        $paginationTemplate .= "    <li class='page-item'>";
        $paginationTemplate .= "        <a class='page-link' href='#' aria-label='Previous'>";
        $paginationTemplate .= "            <span aria-hidden='true'>&laquo;</span>";
        $paginationTemplate .= "        </a>";
        $paginationTemplate .= "     </li>";
        
        for($i = 1; $i <= $nbPages ; $i++){
            $paginationTemplate .= "<li class='page-item'><a class='page-link' href=$link$i>$i</a></li>";

        }

        $paginationTemplate .= "    <li class='page-item'>";
        $paginationTemplate .= "        <a class='page-link' href='#' aria-label='Previous'>";
        $paginationTemplate .= "            <span aria-hidden='true'>&raquo;</span>";
        $paginationTemplate .= "        </a>";
        $paginationTemplate .= "     </li>";
        $paginationTemplate .= " </ul>";
        $paginationTemplate .= " </nav>";

        return $paginationTemplate;
    }
}