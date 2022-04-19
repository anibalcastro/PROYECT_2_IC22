<input type="text" name="url" id="urlSource" value="{{ isset($source->url)? $source-> url: '')}}" aria-describedby = "helpId" placeholder="Url" required="true">
                
                <input type="text" class="form-control" value="{{ isset($source->nameSource)?$source->nameSource:''}}" name="nameSource" id="nameSource" aria-describedby="helpId" placeholder="Name Source" required="true">

                <select name="idCategory" id="category"> 
                    <?php foreach($categories as $category){?>
                        <option value="<?=$category->id?>"><?=$category->name?></option>
                    <?php } ?>
                </select>

                <div class="linea_100"></div>

                <input name="btnSave" id="btnSave" class="btn btn-primary" type="submit" value="Save"> 
