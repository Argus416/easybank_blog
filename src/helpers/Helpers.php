<?php
namespace App\Helper;
use Exception;

class Helpers {

    
    public static function print_me($value){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    public static function imgToInsert($toCheck, $imgName){
        $imgProfile = "";
        $domain = $_ENV['DOMAIN'];
        $public = $_ENV['PUBLIC'];
        $url = '';
        $checkImg = '';
        $placeHolderImg = '';

        switch($toCheck){
            case "photoProfil":
                $checkImg = $_SERVER['DOCUMENT_ROOT']."/public/upload/images/". $imgName;
                $url = "$domain$public"."upload/images/".$imgName;
                $placeHolderImg = "$domain$public"."style/images/photoprofilplaceholder.jpg";
                break;
            case 'imgArticle':
                $checkImg = $_SERVER['DOCUMENT_ROOT']."/public/upload/post-img/". $imgName;
                $url = "$domain$public"."upload/post-img/". $imgName;
                $placeHolderImg = "$domain$public"."style/images/image-currency.jpg";
                break;
        }
        
        if(file_exists($checkImg) && $imgName != null){
            $imgProfile = $url;
        }else{
            $imgProfile = $placeHolderImg;
        }

        return $imgProfile;
    }

    
    
    public static function sanitizeInput($input){
        $input = htmlentities(trim($input), ENT_QUOTES);
        return $input;
    }

    // TODO Change $maxImgSize
    public static function uploadPhoto(STRING $photoInput, STRING $destination, INT $maxImgSize = 300000){

        $imgProfileName = $_FILES[$photoInput]['name'];
        $imgProfileType = $_FILES[$photoInput]['type'];
        $imgProfileTmpName = $_FILES[$photoInput]['tmp_name'];
        $imgProfileError = $_FILES[$photoInput]['error'];
        $imgProfileSize = $_FILES[$photoInput]['size'];
        
        $imgExt = explode('.', $imgProfileName);
        $imgAcutalExt = strtolower(end($imgExt));
        $allowedExt = array('jpg', 'jpeg', 'png');
        $imgNewName = "" ; 
        
        if(in_array($imgAcutalExt, $allowedExt)){
            if($imgProfileError === 0){
                if($imgProfileSize < $maxImgSize){
                    $imgNewName = str_replace('.','', uniqid('', true) ) . '.' . $imgAcutalExt;
                    $path = "$destination/$imgNewName";

                    try{
                        move_uploaded_file($imgProfileTmpName, $path);
                    }catch(Exception $e){
                        echo $e->getMessage();
                    }
                   
                }else{
                    echo "l'image est trop grande, il ne faut pas qu'elle dépasse 3mb";
                }
            }
        }
        return $imgNewName;
    }

    public static function alertManager(STRING $class = 'danger', STRING $alertType = 'err'){
        
        if(isset($_SESSION['alert']) && strlen($_SESSION['alert'])){
            switch($alertType){
                case "articleAjoute": 
                    $alertType = "Un nouveau article a été publié";
                    break;
                case "articleModifie": 
                    $alertType = "L'article a été modifié";
                    break;
                case "articleDel": 
                    $alertType = "L'article sera supprimé dans 1s";
                    break;
                case "utilisateurCree": 
                    $alertType = "Un nouveau utilisateur a été créé";
                    break;
                case "profilModifie":
                    $alertType = "Le profil a été mis à jour";
                    break;
                case "getLog":
                    $alertType = "Les logs ont été téléchargés";
                    break;
                case "err":
                    $alertType = "Impossible de mettre à jour la base de données";
                    break;
            }

            $template = "<div class='alert alert-$class' role='alert'>
                            <span>$alertType</span>
                        </div>";
    
            unset($_SESSION['alert']);
            return $template;
        }
    }

    public static function Pagination($nbElementParPage = 5 ,$nbArticles = 0, $link = "#"){
        $addPrev = false;
        $addNext = false;
        $nbPages = intval(ceil($nbArticles / $nbElementParPage));
      
        $paginationTemplate = "<nav aria-label='Page navigation '>";
        $paginationTemplate .= "<ul class='pagination justify-content-center'>";
        $activeClass = isset($_GET['pagination']) && !empty($_GET['pagination']) ? 'active disabled' : '';
        $currentPageNumber = 0;
        if($nbPages > 0){

            $prevPage = 1;
           

            for($i = 1; $i <= $nbPages ; $i++){
                //si la page précédente n'est page égal à 0 

                if(isset($_GET['pagination'])){
                    $prevPage = intval($_GET['pagination']) - 1;
                    $currentPageNumber = $_GET['pagination'];
                    if($_GET['pagination'] != 1){
                        if($addPrev === false){
                            $paginationTemplate .= "    <li class='page-item'>";
                            $paginationTemplate .= "        <a class='page-link' href='$link$prevPage' aria-label='Previous'>";
                            $paginationTemplate .= "            <span aria-hidden='true'>&laquo;</span>";
                            $paginationTemplate .= "        </a>";
                            $paginationTemplate .= "     </li>";
                            $addPrev = true;
                        }
                    }
                }

                if($i == $currentPageNumber){
                    $paginationTemplate .= "<li class='page-item $activeClass'><a class='page-link' href=$link$i>$i</a></li>";
                }else{
                    $paginationTemplate .= "<li class='page-item'><a class='page-link' href=$link$i>$i</a></li>";
                }
            }

            $nextPage = 2;
           
            if(isset($_GET['pagination'])){
                $nextPage = intval($_GET['pagination']) + 1;
            }
            if($nbPages != $currentPageNumber && $nbPages != 1){
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