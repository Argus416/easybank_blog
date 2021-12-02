<?php

class Helpers {
    public static function print_me($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    public static function Pagination($nbElementParPage = 5 ,$nbArticles = 0, $link = "#"){
        $addPrev = false;
        $addNext = false;
        $nbPages = intval(ceil($nbArticles / $nbElementParPage));
      
        $paginationTemplate = "<nav aria-label='Page navigation '>";
        $paginationTemplate .= "<ul class='pagination justify-content-center'>";
     
        if($nbPages > 0){
            
            for($i = 1; $i <= $nbPages ; $i++){
                //si la page précédente n'est page égal à 0 
                $prevPage = $i - 1 != 0 ? $i - 1 : '';
                $nextPage = $i != $nbPages ? $i +1 : '';

                if($addPrev === false){
                    $paginationTemplate .= "    <li class='page-item'>";
                    $paginationTemplate .= "        <a class='page-link' href='$link$i' aria-label='Previous'>";
                    $paginationTemplate .= "            <span aria-hidden='true'>&laquo;</span>";
                    $paginationTemplate .= "        </a>";
                    $paginationTemplate .= "     </li>";
                    $addPrev = true;
                }

                if($addNext === false){
                    $paginationTemplate .= "    <li class='page-item'>";
                    $paginationTemplate .= "        <a class='page-link' href='$link$i' aria-label='Previous'>";
                    $paginationTemplate .= "            <span aria-hidden='true'>&laquo;</span>";
                    $paginationTemplate .= "        </a>";
                    $paginationTemplate .= "     </li>";
                    $addNext = true;
                }
              
              

                $paginationTemplate .= "<li class='page-item'><a class='page-link' href=$link$i>$i</a></li>";
            }
            $paginationTemplate .= "    <li class='page-item'>";
            $paginationTemplate .= "        <a class='page-link' href='$link$i' aria-label='Previous'>";
            $paginationTemplate .= "            <span aria-hidden='true'>&raquo;</span>";
            $paginationTemplate .= "        </a>";
            $paginationTemplate .= "     </li>";
        }else{
            $paginationTemplate .= "<li class='page-item'><a class='page-link' href=$link$1</a></li>";
        }
        $paginationTemplate .= " </ul>";
        $paginationTemplate .= " </nav>";
        return $paginationTemplate;
    }
}