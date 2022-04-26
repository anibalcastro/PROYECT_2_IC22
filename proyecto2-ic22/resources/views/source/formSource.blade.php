<input type="text" class="form-control" name="url" id="urlSource" value="<?=$url?>" aria-describedby = "helpId" placeholder="Url" required="true">
                
                <input type="text" class="form-control" value="<?=$nameSource?>" name="nameSource" id="nameSource" aria-describedby="helpId" placeholder="Name Source" required="true">

                <select name="idCategory" id="category"> 
                    <?php 
                        foreach($categories as $category){
                            if(isset($idCategory)){
                                if ($idCategory == $category->id){
                                    echo "<option value='$category->id' selected= 'selected'>$category->nameCategory</option>";
                                }
                                else {
                                    echo "<option value='$category->id'>$category->nameCategory</option>";
                                }
                                
                            }
                            else{
                                echo "<option value='$category->id'>$category->nameCategory</option>"; 
                            }    
                        } 
                    ?>
                    
                </select>

                <input type="hidden" name="idUser" value="<?=$idUser?>">

                <div class="linea_100"></div>

                <input name="btnSave" id="btnSave" class="btn btn-primary" type="submit" value="Save"> 
