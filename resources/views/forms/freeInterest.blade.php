  <div class="form-group">
                  <label class="control-label col-sm-3" for="month">code:<span class="text-danger">*</span></label>
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
              <label class="col-md-3 control-label" for="birthPlace">መጠን ዝኣቱ ብር</label>
              <div class="col-md-6">
                <input id="amount" name="amount" type="text" placeholder="" class="form-control" value=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
              <label class="col-md-3 control-label" for="birthPlace">ናይ ስራሕ መካየዲ</label>
              <div class="col-md-6">
                <input id="sem1" name="sem1" type="text" placeholder="" class="form-control" value=""></div>
              </div>
              <br>
              <br>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="occupation">ወርሒ:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="occupation" id="month" name="month" required="required">
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
              <!--  <div class="form-group">
                <label class="col-md-3 control-label" for="dob">ዝኣተወሉ ዕለት</label>
                <div class="col-md-6">
                  <input id="dob" name="dob" type="date" placeholder="" class="form-control" value=""></div>
                </div>
                <br>
                <br> -->
                <div class="form-group">
                <label class="col-md-3 control-label" for="dob">ቅፅዓት</label>
                <div class="col-md-6">
                  <input id="penality" name="penality" type="text" placeholder="" class="form-control" value=""></div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label class="control-label col-md-3" for="occupation">ዝወፀሉ ዕለት:<span class="text-danger">*</span></label>
                   <div class="col-md-6">
                  <input id="date" name="date" type="date" placeholder="" class="form-control" value=""></div>
                </div>