             <div class="form-group">
                  <label class="control-label col-sm-3" for="month">code:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="code" id="code" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->code}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
              <br>
              <br>
             <div class="form-group">
              <label class="col-md-3 control-label" for="total">መጠን ዝኣቱ ብር</label>
              <div class="col-md-6">
                <input id="amount" name="amount" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="sem">ናይ ስራሕ መካየዲ</label>
              <div class="col-md-6">
                <input id="sem1" name="sem1" type="text" placeholder="" class="form-control"></div>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="month">ወርሒ:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="month" id="month" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      <option >መስከረም</option>
                      <option >ጥቅምቲ</option>
                      <option >ሕዳር</option>
                      <option >ታሕሳስ</option>
                      <option >ጥሪ</option>
                      <option >ለካቲት</option>
                      <option >መጋቢት</option>
                      <option >ሚያዝያ</option>
                      <option >ግንቦት</option>
                      <option >ሰነ</option>
                      <option >ሓምለ</option>
                      <option >ነሓሰ</option>
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
                <label class="col-md-3 control-label" for="date">ዝኣተወሉ ዕለት</label>
                <div class="col-md-6">
                  <input id="entrydate" name="entrydate" type="text" placeholder="" class="form-control" value=""></div>
                  <div class="fa fa-calendar"></div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="status">status:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="status" id="status" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      <option >ኣብ_እዋኑ</option>
                      <option >ኣብ_5_ውሽጢ</option>
                      <option >ካብ_5_ንላዕሊ</option>
                </select>
                  </div>
              </div>
                <br>
                <br>
<!--                 <div class="form-group">
                  <label class="control-label col-md-3" for="leave">ዝወፀሉ ዕለት:<span class="text-danger">*</span></label>
                   <div class="col-md-6">
                  <input id="leave" name="leave" type="text" placeholder="" class="form-control" value=""></div>
                </div> -->
       <!--          <div class="form-group">
        <label for="">Simple Date &amp; Time</label>
          <div class='input-group date' id='example1'>
              <input type='text' class="form-control" />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
      </div> -->