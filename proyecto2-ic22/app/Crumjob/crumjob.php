<?php

/**
 * Get connection
 */
function conexion()
{
    return mysqli_connect('127.0.0.1', 'root', '', 'news');
}

/**
 * Get all source
 */
function getSource()
{
    $connection = conexion();
    $sqlGetSource = "SELECT * FROM `sources`;";
    $resultado = mysqli_query($connection, $sqlGetSource);
    mysqli_close($connection);

    return $resultado->fetch_all();
}

/**
 * Get name category
 */
function getNameCategoryById($idCategory)
{
    $sqlGetCategory = "SELECT `nameCategory` FROM `categories` WHERE `id` = $idCategory;";
    $connection = conexion();

    $result = mysqli_query($connection, $sqlGetCategory);
    mysqli_close($connection);

    $nameCategory = $result->fetch_array();

    return $nameCategory[0];
}

/**
 * Function validate if news exists
 */
function existsNews($link, $idUser)
{
    $boolean = false;
    $sqlExists = "SELECT `id` FROM `news` WHERE `permanLink` = '$link' AND `userId` = $idUser;";
    $connection = conexion();

    $result = mysqli_query($connection, $sqlExists);

    $id = $result->fetch_array(MYSQLI_NUM);

    if (!empty($id[0]))
    {
        $boolean = true;
    }

    return $boolean;
}

/**
 * Create news
 */
function createNews($xmlTitle, $xmlDescription, $xmlLink, $dateTime, $idSource, $idCategoria, $tags , $idUser)
{
    //title / short_description / perman_link / fecha / news_source_id / user_id / category_id
    $connection = conexion();
    $title = str_replace("'", "", $xmlTitle);
    $descripction = str_replace("'", "", $xmlDescription);

    $sqlInsert = "INSERT INTO `news`(`title`,`shortDescription`,`permanLink`,`date`,`sourceId`,`userId`,`categoryId`, `tags`)VALUES('$title','$descripction','$xmlLink','$dateTime',$idSource,$idUser,$idCategoria, '$tags');";
    
    //echo $sqlInsert;
    $result = mysqli_query($connection, $sqlInsert);
    mysqli_close($connection);
}

/**
 * Function to create Tags
 */
function createTags($idCategory, $nameTag){
    try {
       $connection = conexion();
       $sqlInsert = "INSERT INTO `tags`(`idCategory`, `nameTag`)
       VALUES($idCategory, '$nameTag')";

       mysqli_query($connection, $sqlInsert);
       mysqli_close($connection);
       return true;
    } catch (\Throwable $th) {
        return false;
    }
}




//Obtain result
$sources = getSource();

foreach($sources as $source){
    $idSource = $source[0];
    $urlSource = $source[1];
    $idCategory = $source[3];
    $nameCategory = getNameCategoryById($idCategory);
    $idUser = $source[4];

    if (@simplexml_load_file($urlSource))
    {
        //Si es valido lo agrega a la variable $feed.
        $feeds = simplexml_load_file($urlSource);
    }
    else
    {
        //Si es invalido muestra un mensaje.
        $invalidurl = true;
        echo "RSS Invalido, identificador ".$idSource." URL=".$url. PHP_EOL;
    }

    if(!empty($feeds)){
                /**
         * Iteramos el xml, y obtenemos lo que ocupemos.
         */
        foreach ($feeds
            ->channel->item as $item)
        {
            //titulo
            $xmlTitle = $item->title;
            
            //link noticia
            $xmlLink = $item->link;
            
            //descripcion noticia
            $xmlDescription = $item->description;
            
            //fecha noticia
            $xmlPubDate = $item->pubDate;

            $xmlCategoriaPrincipal = $item->category;
            //echo $xmlCategoriaPrincipal.'=='.$nameCategory.PHP_EOL;

            if ($xmlCategoriaPrincipal == $nameCategory)
            {
                $tagsNews = '';
                $date = date_create("$xmlPubDate");
                $dateTime = date_format($date, "Y/m/d H:i:s");

                if(!existsNews($xmlLink, $idUser))
                {
                     //Obtener cantidad de categorias
                    $cantCategories = sizeof($xmlCategoriaPrincipal);

                    for ($i=0; $i < $cantCategories; $i++) { 

                        if ($i > 0){
                            //Etiquetas
                            $tags = $item->category[$i];
                            
                            //crear etiqueta
                            if (createTags($idCategory, $tags)){
                                $tagsNews .= $tags.' / ';
                            }
                            else {
                                $tagsNews .= $tags.' / ';
                            }
                        
                        }
                    }

                    createNews($xmlTitle, $xmlDescription, $xmlLink, $dateTime, $idSource, $idCategory, $tagsNews, $idUser);
                    $tagsNews = '';

                    /*
                    echo "Titulo: ". $xmlTitle.PHP_EOL;
                    echo "Link: ".$xmlLink.PHP_EOL;
                    echo "Descripcion: ".$xmlDescription.PHP_EOL;
                    echo "Publicacion: ".$xmlPubDate.PHP_EOL;
                    echo "Categoria Principal: ".$xmlCategoriaPrincipal.PHP_EOL;
                    echo "Etiquetas: ".$tagsNews.PHP_EOL;
                    echo "".PHP_EOL;
                    echo "".PHP_EOL;
                    echo "".PHP_EOL;
                    */
                }    
            }
        }

    }
    
}

echo 'Noticias Actualizadas';