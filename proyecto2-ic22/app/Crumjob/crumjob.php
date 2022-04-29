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

    $sqlInsert = "INSERT INTO `news`(`title`,`shortDescription`,`permanLink`,`fecha`,`news_source_id`,`user_id`,`category_id`)VALUES('$title','$descripction','$xmlLink','$dateTime',$idSource,$idUser,$idCategoria);";
    
    //echo $sqlInsert;
    $result = mysqli_query($connection, $sqlInsert);
    mysqli_close($connection);
}

//Obtain result
$sources = getSource();






$url = 'https://feeds.feedburner.com/crhoy/wSjk';

if (@simplexml_load_file($url))
    {
        //Si es valido lo agrega a la variable $feed.
        $feeds = simplexml_load_file($url);
    }
    else
    {
        //Si es invalido muestra un mensaje.
        $invalidurl = true;
        echo "RSS Invalido, identificador ".$idSource." URL=".$url. PHP_EOL;
    }

    //Si no esta vacio accede al ciclo
    if (!empty($feeds))
    {
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
            
           

            if ($xmlCategoriaPrincipal = 'Nacional'){
                echo "Titulo: ". $xmlTitle.PHP_EOL;
                echo "Link:".$xmlLink.PHP_EOL;
                echo "Descripcion:".$xmlDescription.PHP_EOL;
                echo "Publicacion:".$xmlPubDate.PHP_EOL;
                    //Obtener cantidad de categorias
                $cantCategories = sizeof($item->category);
                for ($i=0; $i < $cantCategories; $i++) { 

                    if ($i == 0){
                        //Categoria principal
                        echo "Categoria Principal:".$item->category[$i].PHP_EOL;
                    }
                    else{
                        //Etiquetas
                        echo "Etiqueta:".$item->category[$i].PHP_EOL;
                        //Validar si la etiqueta existe

                        //Obtener idCategoria 

                        //Agregar a la BD

                        //Guardar etiquetas

                    }
            }
                echo "".PHP_EOL;
                echo "".PHP_EOL;
                echo "".PHP_EOL;
            }
    
        }
    }

