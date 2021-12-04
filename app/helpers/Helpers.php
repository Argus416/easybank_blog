<?php

class Helpers {

    
    public static function print_me($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    public static function imgProfile(){
        $imgProfile = "";
        $domain = $_ENV['DOMAIN'];
        $public = $_ENV['PUBLIC'];
        
        if(file_exists($_SERVER['DOCUMENT_ROOT']."/public/uploaded/images/".$_SESSION['authorImg'])){
            $imgProfile = "$domain$public"."uploaded/images/".$_SESSION['authorImg'];
        }else{
            $imgProfile = "$domain$public"."style/images/photoprofilplaceholder.jpg";
        }

        return $imgProfile;
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

                if($addPrev === false){
                    $paginationTemplate .= "    <li class='page-item'>";
                    $paginationTemplate .= "        <a class='page-link' href='$link$i' aria-label='Previous'>";
                    $paginationTemplate .= "            <span aria-hidden='true'>&laquo;</span>";
                    $paginationTemplate .= "        </a>";
                    $paginationTemplate .= "     </li>";
                    $addPrev = true;
                }

                $paginationTemplate .= "<li class='page-item'><a class='page-link' href=$link$i>$i</a></li>";
            }

            $nextPage = 0;

           
            if(isset($_GET['pagination'])){
                $nextPage = intval($_GET['pagination']) + 1;
            }
            if($nbPages != $_GET['pagination']){
                $paginationTemplate .= "    <li class='page-item'>";
                $paginationTemplate .= "        <a class='page-link' href='$link$nextPage' aria-label='Previous'>";
                $paginationTemplate .= "            <span aria-hidden='true'>&raquo;</span>";
                $paginationTemplate .= "        </a>";
                $paginationTemplate .= "     </li>";
            }
            
       
        }else{
            $paginationTemplate .= "<li class='page-item'><a class='page-link' href=$link$1</a></li>";
        }
        $paginationTemplate .= " </ul>";
        $paginationTemplate .= " </nav>";

        
        return $paginationTemplate;
    }


}