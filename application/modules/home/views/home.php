
<style>
 #tag2, #tag3, #tag4 {
	display: none;
}
</style>

<div class="mywap" style="width: 100%; background-color: #2ba5de; min-height: 500px;">
    <div class="container"> 

        <div class="row">
            <div class="col-md-6" style="background-color: white; margin-top: 30px; padding-top: 30px; padding-bottom: 30px;">


                <ul class="nav nav-tabs">
                    <li class="active" ><a data-related="tag1">Question</a></li>
                    <li><a data-related="tag2">Themes</a></li>
                    <li><a href="" data-related="tag3">Settings</a></li>
                </ul>
                <br>
                <div id="mycontent">

                    <!-- Setting-->
                    <div class="mytag" id="tag3">

                        <form role="form">
                            
                            
                            <!-- setting for comment-->

                            <div class="form-group">

                                <select class="form-control" id="comment">
                                    <option value="1">Voters can comment via facebook on results page </option>
                                    <option value="2">Voters can comment on result page</option>
                                    <option value="0">Disabled commenting on results page</option>
                                </select>
                            </div>
                            
                            <!-- setting for multiple vote-->

                            <div class="checkbox">
                                <label><input class="setting-check" type="checkbox" name="s_v" value="1">Allow multiple vote from same person.</label>
                            </div>
                            <!-- setting for multiple answer-->
                            <div class="checkbox">
                                <label><input class="setting-check" type="checkbox" name="s_a" value="2">Disable multiple answers from same person.</label>
                            </div>
                            <!-- setting for hide/show result button-->                      
                            <div class="checkbox">
                                <label><input class="setting-check" type="checkbox" name="s_h" value="3">Hide result button.</label>
                            </div>
                        </form>

                    </div>
                    <!-- end Settting-->
                    <!-- Theme-->
                    <div class="mytag" id="tag2">
                        <a href="#" data-related="default"><img class="img" src="<?php echo base_url(); ?>img/theme/theme.jpg"</a> 
                        <a href="#" data-related="red"><img class="img" src="<?php echo base_url(); ?>img/theme/theme-red.jpg"</a> 
                        <a href="#" data-related="dark"><img class="img" src="<?php echo base_url(); ?>img/theme/theme-black.jpg"</a> 
                        <a href="#" data-related="green"><img class="img" src="<?php echo base_url(); ?>img/theme/theme-green.jpg"</a> 
                        <a href="#" data-related="blue"><img class="img" src="<?php echo base_url(); ?>img/theme/theme-blue.jpg"</a> 
                        <a href="#" data-related="grey"><img class="img" src="<?php echo base_url(); ?>img/theme/theme-grey.jpg"</a> 


                    </div>
                    <!-- end tag 2-->

                    <!-- Question-->
                    <div class="mytag" id="tag1">
                        <?php echo form_open('question/question_validation', array('id' => 'form_question', 'role' => 'form')); ?>

                        <!--- Your question type here-------------------->

                        <div class="form-group"> <textarea name="f1" id="f1" class="form-control" rows="5" placeholder="Type your question here" required minlength=10></textarea></div>
                        <input type="hidden" name="count" id="count" value="1"><br>

                        <!-- Theme -->
                        <input class="my-theme" type="hidden" name="c1" id="c1" value="white">
                        <input class="my-theme" type="hidden" name="c2" id="c2" value="black">
                        <input class="my-theme" type="hidden" name="c3" id="c3" value="#006102">
                        <input class="my-theme" type="hidden" name="c4" id="c4" value="white">
                        <input class="my-theme" type="hidden" name="c5" id="c5" value="white">
                        <input class="my-theme" type="hidden" name="c6" id="c6" value="black">
                        <input class="my-theme" type="hidden" name="c7" id="c7" value="white">

                        <!-- End theme -->
                        
                        
                        <!-- Setting -->
                        <input class="my-setting" type="hidden" name="f2" id="f2" value="0">
                        <input class="my-setting" type="hidden" name="f3" id="f3" value="0">
                        <input class="my-setting" type="hidden" name="f4" id="f4" value="0">
                        <input class="my-setting" type="hidden" name="f5" id="f5" value="0">
                        
                        
                        
                        <!-- End setting-->
                        <!-- user-->
                        
                        <?php
                         if ($this->session->userdata('logged_in') == TRUE){
                             $user_id=$this->session->userdata('user_id');
                         }else{
                             $user_id=1;
                         }
                        
                        ?>
                        
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                        
                        <!-- your answer type here---------------------->
                        <ul id="aaaa" class="js-sortable-buttons  list-group-sortable">
                            <li id="a0" class="list-group-item question"> 
                                <div class="row">
                                    <div class="col-xs-11"><input name="i0" id="i0" type="text" name="mytext[]" class="form-control" placeholder="Type your answer here" required="required"></div>
                                    <div class="col-xs-1"><span class="glyphicon glyphicon-move"></span></div>
                                </div>
                            </li>

                            <li id="a1" class="list-group-item question"> <div class="row"><div class="col-xs-11"><input name="i1"  id="i1" type="text" name="mytext[]" class="form-control answer" placeholder="Type your answer here" required="required"></div><div class="col-xs-1"><span class="glyphicon glyphicon-move"></span></div> </div> </li>              
                        </ul>
                        <!------------------------ End answer ------------------------------------>   


                        <!-- a link for ADD item--->
                        <a class="js-add-item-button button blue bg-white">Add item</a><br>
                        <!----------- Submit button---------------------------------------------->
                        <div class="text-center"><button type="submit" class="btn btn-success">Submit</button></div>
                        </form>
                    </div>
                    <!-- end tag1-->
                </div><!-- end my content-->

                <!------------------------------------------------------------------ Review ------------------------------------------------------------------>         
            </div><!-- end column md 6-->
            <div class="col-md-5" style="background-color: white; margin-top: 30px; margin-left: 10px; padding-top: 30px; padding-bottom: 30px;">
                <!-- preview question -->
                <strong>  <h1 id="your-question">Your quuestion?</h1></strong>

                <!-- preview answer----------------->

                <div id="pre-answer">
                    <div class="pre-opt radio"> <label><input type="radio" name="optradio"> <div class="preview" id="ri0">Untitle</div></label></div>
                    <div class="pre-opt radio"> <label><input type="radio" name="optradio"> <div class="preview" id="ri1">Untitle</div></label></div>


                </div><!-- end preview answer -->

                <button type="button" style="background-color:#006102; color: white; " class="btn btn-default">Vote</button>
                <button id="btn_result" type="button" style="background-color:#006102; color: white; " class="btn btn-default">Result</button>
                <p id="demo"></p>
            </div>
        </div><!-- end row-->

    </div><!-- end container-->
</div><!-- end wap-->

<div class="container">
    <h1 class="text-center">How to Publish a Poll in 3 Steps</h1>
    <div class="row">
        <div class="col-md-4">
            <h1>1. Add Questions</h1>
            <p>
                Type your question and then add answers. From this point you can simply hit create poll and you're ready to go. The rest of the steps are optional. No account or signup required.
            </p>
        </div>
        <div class="col-md-4">
            <h1>2. Set Options</h1>
            <p>
                On the Themes tab select one of our default themes or create your own. On the settings tab set options like allowing multiple answers, allowing voters to enter their own answers and much more
            </p>
        </div>
        <div class="col-md-4">
            <h1>3. Share & Report</h1>
            <p>
                Click Share and copy your poll Vote url to share with voters. You can also hit Embed to place the poll directly on your website or blog.
            </p>
        </div>
    </div><!-- end row-->
    
</div><!-- end container -->
