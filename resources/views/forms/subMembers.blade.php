  <div class="form-group">
                  <label class="control-label col-sm-3" for="month">code:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="code" required="required">
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
                  <label class="control-label col-sm-3" for="">ስም ዝመፀ:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="name" id="name" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->name}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
                  <br>
                  <br>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="month">ስም ኣቦ ዝመፀ:<span class="text-danger">*</span></label>
              <div class="col-md-6">
                    <select class="form-control" name="fname" id="fname" required="required">
                      <option selected disabled>~ምረፅ~</option>
                      @foreach($abalats as $abalat)
                      <option >{{$abalat->fname}} </option>
                      @endforeach
                      
                </select>
                  </div>
              </div>
              <br><br>
                <div class="form-group">
                <label class="col-md-3 control-label" for="">ዝኣተወሉ ዕለት</label>
                <div class="col-md-6">
                  <input id="entrydate" name="entrydate" type="date" placeholder="" class="form-control" value=""></div>
                </div>
              

                
                