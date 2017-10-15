<?php

            $num=$_GET['q'];//lấy giá trị do js truyền vào
            for($i=1; $i <= $num; $i++)
            {
                 echo '
<div class="form-group" id="txtHint">
      <label class="control-label col-sm-4">Hình ảnh '.$i.'</label>
      <div class="col-sm-6">
        <input type="file" class="form-control" value="1" name="img[]" required>
      </div>
    </div>
';
            }


?>