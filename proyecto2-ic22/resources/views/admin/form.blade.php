<input type="text" class="form-control" value="{{ isset($category->nameCategory)?$category->nameCategory:''}}" name="nameCategory" id="nameCategory" aria-describedby="helpId"
                placeholder="Name Category"  required="true">
            <div class="linea_100"></div>
            <input name="btnSave" id="btnSave" class="btn btn-primary" type="submit" value="Save">