        	  <div class="form-group">
                  <label class="control-label col-sm-3" for="month">ኮድ:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" id="code" name="code" required="required">
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
              <label class="col-md-2 control-label" for="">መጠን ዝኣቱ ብር</label>
              <div class="col-md-4">
                <input id="amount" name="amount" type="text" placeholder="" class="form-control" value=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-2 control-label" for="">ናይ ስራሕ መካየዲ</label>
              <div class="col-md-4">
                <input id="sem1" name="sem1" type="text" placeholder="" class="form-control" value=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-2 control-label" for="">ወለድ</label>
              <div class="col-md-4">
                <input id="interest" name="interest" type="text" placeholder="" class="form-control" value=""></div>
              </div>
              <br>
              <br>
             
              	<div class="form-group">
                  <label class="control-label col-sm-2" for="occupation">ወርሒ:<span class="text-danger">*</span></label>
                   <div class="col-md-4">
                    <select class="form-control" id="month" name="month" required="required">
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
                  <br>
                  <br>
               <div class="form-group">
                <label class="col-md-2 control-label" for="">ዝኣተወሉ ዕለት</label>
                <div class="col-md-4">
                  <input id="entrydate" name="entrydate" type="date" placeholder="" class="form-control" value="" required></div>
                </div>
                <br>
                <br>
                <div class="form-group">
                <label class="col-md-2 control-label" for="">ቅፅዓት</label>
                <div class="col-md-4">
                  <input id="penality" name="penality" type="text" placeholder="" class="form-control" value="" required></div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label class="control-label col-md-2" for="occupation">ዝወፀሉ ዕለት:<span class="text-danger">*</span></label>
                   <div class="col-md-4">
                  <input id="leavedate" name="leavedate" type="date" placeholder="" class="form-control" value="" required></div>
                </div>
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