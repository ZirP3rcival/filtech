<div class="content-inner-all">
    <!-- user account info start -->
    <div class="income-order-visit-user-area">
        <div class="container-fluid">
            <div class="row">
<div class="col-lg-4 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-lock" style="margin-right: 15px; font-size: 2em;"></span>User Login Information</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Please Accomplish the following</h6>
		  </div>
			<div class="card-block">
				<div class="message-box contact-box">
					<div class="row" style="margin: 15px 0px 20px;">          
						<div class="col-xs-12 col-md-12" style="margin-top: 15px;">
							<div class="col-xs-12 col-md-12"><span class="mf" style="float:left; margin-right:10px;">Lastname : </span></div>
							<div class="col-xs-12 col-md-12" style="float: right;">
							<input name="pulnme" type="text" class="form-control" id="pulnme" placeholder="Input Lastname" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?php echo $lnme;?>"></div>
								<div class="clearfix"></div>

							<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Firstname : </span></div>
							<div class="col-xs-12 col-md-12" style="float: right;">
							<input name="pufnme" type="text" class="form-control" id="pufnme" placeholder="Input Firstname" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?php echo $fnme;?>"></div>
								<div class="clearfix"></div>

							<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Middlename : </span></div>
							<div class="col-xs-12 col-md-12" style="float: right;">
							<input name="pumnme" type="text" class="form-control" id="pumnme" placeholder="Input Middlename" required style="width:100%; float:left;" maxlength="30" onKeyPress="return letteronly(event)" value="<?php echo $mnme;?>"></div>
								<div class="clearfix"></div>
							<script type="text/javascript">

							// function that allows enter numbers only, each key in keyboard has special key code. We can restrict input using these key codes:
							$(function () {

							// "textNo" is the ID of input box
							$('#pucno').keydown(function (e) {

							// Shift, control and alternate keys do not effect input
							if (e.shiftKey || e.ctrlKey || e.altKey) {
							e.preventDefault();
							} else {
							var key = e.keyCode;

							// except 0-9, other characters do not effect input box || (key == 109) || (key == 189)
							if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)|| (key >= 96 && key <= 105))) {
							e.preventDefault();
							}
							}
							});
							});

							$(function () {

							// "textNo" is the ID of input box
							$('#fcno').keydown(function (e) {

							// Shift, control and alternate keys do not effect input
							if (e.shiftKey || e.ctrlKey || e.altKey) {
							e.preventDefault();
							} else {
							var key = e.keyCode;

							// except 0-9, other characters do not effect input box || (key == 109) || (key == 189)
							if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)|| (key >= 96 && key <= 105))) {
							e.preventDefault();
							}
							}
							});
							});	

							$(function () {

							// "textNo" is the ID of input box
							$('#mcno').keydown(function (e) {

							// Shift, control and alternate keys do not effect input
							if (e.shiftKey || e.ctrlKey || e.altKey) {
							e.preventDefault();
							} else {
							var key = e.keyCode;

							// except 0-9, other characters do not effect input box || (key == 109) || (key == 189)
							if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105)|| (key >= 96 && key <= 105))) {
							e.preventDefault();
							}
							}
							});
							});

							function masking(input,textbox,e) {

							// adds hyphen after 3 and then after 6 characters
							if (input.length == 4 || input.length == 8) {
							if(e.keyCode != 8){
							input = input + '-';
							}
							textbox.value = input;
							}
							}	
							</script>
							<script type="text/javascript">
							function cnolength(input,textbox,e) {
							if (input.length < 13) {
								var bb = bootbox.alert({ message: "Contact Number Length Invalid!!!",title: "<span style='color:#fff;'>Notification :</span>",
								   size: 'small'});
								   bb.find('.modal-title').css({'float': 'left','margin-top':'10px'});
								   bb.find('.close').css({'display': 'none'});
								   //bb.find('.modal-dialog').css({'border': '#E8E8E8 5px solid','border-radius':'4px'});
								   bb.find('.modal-header').css({'background-color': '#3C763D','padding': '5px 10px','color': '#FFF','font-size': '20px','height':'60px'});
								   bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'4px'});
								   bb.find('.modal-footer').css({'background-color': '#3C763D','padding': '10px'}); 
								   bb.find(".btn-success").addClass("btnpri"); 

								 setTimeout(function() {
								// that's enough of that
								   bootbox.hideAll();
								   }, 5000);

								textbox.value = '';
								 return false;
							}	
							}
							</script>
							<div class="col-xs-12 col-md-5" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Contact No. : </span></div>
							<div class="col-xs-12 col-md-7" style="float: right;margin-top:10px;">
							<input name="pucno" type="text" class="form-control" id="pucno" placeholder="0000-000-0000" required style="width:100%; float:left;" maxlength="13" onBlur="return cnolength(this.value,this,event)" onKeyPress="return masking(this.value,this,event);" value="<?php echo $cno;?>"></div>
								<div class="clearfix"></div>

							<script type="text/javascript">
								function Validate() {
									var password = document.getElementById("D_Password").value;
									var confirmPassword = document.getElementById("C_Password").value;
									if (password != confirmPassword) {

									var bb = bootbox.alert({ message: "<?php echo $errmsg ?>",title: "<span style='color:#fff;'>Notification :</span>",
								   size: 'small'});
								   bb.find('.modal-title').css({'float': 'left','margin-top':'10px'});
								   bb.find('.close').css({'display': 'none'});
								   //bb.find('.modal-dialog').css({'border': '#E8E8E8 5px solid','border-radius':'4px'});
								   bb.find('.modal-header').css({'background-color': '#3C763D','padding': '5px 10px','color': '#FFF','font-size': '20px','height':'60px'});
								   bb.find('.modal-body').css({'font-size': '16px','font-size': '14px','border-radius':'4px'});
								   bb.find('.modal-footer').css({'background-color': '#3C763D','padding': '10px'}); 
								   bb.find(".btn-success").addClass("btnpri"); 	

									  document.getElementById("psuba").disabled = true;

								   setTimeout(function() {
								// that's enough of that
								   bootbox.hideAll();
								   }, 5000);
										return false;
									}
									return true;
								}
							</script>
							</div>
					</div>            
				</div>
			</div>
	</div>
</div>
<div class="col-lg-4 my-acct-box mg-tb-31">
	<div class="card">
		  <div class="card-block card-top login-fm my-acct-title">
			 <h4 class="text-white card-title" style="margin-bottom: 0px;">
			 <span class="fa fa-user" style="margin-right: 15px; font-size: 2em;"></span>Personal Information</h4>
			 <h6 class="card-subtitle text-white m-b-0 op-5" style="padding-left: 40px; margin-bottom: 0px;">Please Accomplish the following</h6>
		  </div>
			<div class="card-block">
				<div class="message-box contact-box">
					<div class="row" style="margin: 15px 0px 20px;">          
						<div class="col-xs-12 col-md-12" style="padding: 0px;">
						   <div class="clearfix"></div>
						<div class="col-xs-12 col-md-12"><span class="mf" style="float:left; margin-right:10px;">Email Address : </span></div>
						<div class="col-xs-12 col-md-12"><input type="email" maxlength="60" class="form-control" style="width:100%; float:left;" id="peadd" name="peadd" required placeholder="Input Email Address" value="<?php echo $eadd;?>" onblur="checkPEmail(this.value)"></div>
							 <div class="clearfix"></div>

						<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Security Question : </span></div>
						<div class="col-xs-12 col-md-12">
						<select name="pusqs" required class="form-control" id="pusqs" style="display: inline-block; position:inherit; width:100%;">
								  <option value="What is the first name of your favorite uncle?" >What is the first name of your favorite uncle?</option>
								  <option value="Where did you meet your spouse?" >Where did you meet your spouse?</option>
								  <option value="What is your oldest cousin&#39;s name?" >What is your oldest cousin&#39;s name?</option>
								  <option value="What is your youngest child&#39;s nickname?" >What is your youngest child&#39;s nickname?</option>
								  <option value="What is your oldest child&#39;s nickname?" >What is your oldest child&#39;s nickname?</option>
								  <option value="What is the first name of your oldest niece?" >What is the first name of your oldest niece?</option>
								  <option value="What is the first name of your oldest nephew?" >What is the first name of your oldest nephew?</option>
								  <option value="What is the first name of your favorite aunt?" >What is the first name of your favorite aunt?</option>
								</select>
						</div>
							<div class="clearfix"></div>
						<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Answer : </span></div>
						<div class="col-xs-12 col-md-8" style="margin-top:10px; float: right;">
						<input name="pusqa" type="text" required class="form-control" id="pusqa" placeholder="Question Answer" value="<?php echo $sqa;?>"/></div>
							<div class="clearfix"></div>
						<!-- ################################################################################################-->
						<script type="text/javascript">
						$(document).ready(function() {
							var paswrd1       = $('#D_Password'); //id of first password field
							//var password2       = $('#password2'); //id of second password field
							var paswrdsInfo   = $('#Ppass-info'); //id of indicator element

							paswordStrngthChck(paswrd1, paswrdsInfo); //,password2,paswrdsInfo); //call password check function

						});

						function paswordStrngthChck(paswrd1, paswrdsInfo) //, password2, paswrdsInfo)
						{
							//Must contain 8 characters or more
							var WeakPass = /(?=.{8,}).*/; 
							//Must contain lower case letters and at least one digit.
							var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/; 
							//Must contain at least one upper case letter, one lower case letter and one digit.
							var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/; 
							//Must contain at least one upper case letter, one lower case letter and one digit.
							var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/; 

							$(paswrd1).on('keyup', function(e) {
								if(VryStrongPass.test(paswrd1.val()))
								{
									paswrdsInfo.removeClass().addClass('vrystrongpass').html("<span style='color:#03017E;'>Very Strong! (Don't forget your password!)</span>");
									document.getElementById("psuba").disabled = false; 
								}   
								else if(StrongPass.test(paswrd1.val()))
								{
									paswrdsInfo.removeClass().addClass('strongpass').html("<span style='color:#1165BF; font-weight:bold;'>Strong! (Make it even more stronger</span>");
									document.getElementById("psuba").disabled = false; 
								}   
								else if(MediumPass.test(paswrd1.val()))
								{
									paswrdsInfo.removeClass().addClass('goodpass').html("<span style='color:#5E95FF; font-weight:bold;'>Good! (Use uppercase letter to make stronger)</span>");
									document.getElementById("psuba").disabled = false; 
								}
								else if(WeakPass.test(paswrd1.val()))
								{
									paswrdsInfo.removeClass().addClass('stillweakpass').html("<span style='color:#701A3F; font-weight:bold;'>Still Weak! (Enter digits to make good password)</span>");
									document.getElementById("psuba").disabled = false; 
								}
								else
								{
									paswrdsInfo.removeClass().addClass('weakpass').html("<span style='color:#D63939; font-weight:bold;'>Very Weak! (Must be 8 or more characters)</span>");
									document.getElementById("psuba").disabled = true;
								}
							});
						}
						</script>

						<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Username : </span></div>
						<div class="col-xs-12 col-md-8" style="margin-top:10px; float: right;"><input type="text" required maxlength="25" class="form-control" style="width:100%; float:left;" id="Nw_Usrname" name="pusr" placeholder="Username" onkeyup="chcknme();return false;" onBlur="chcknme();return false;" value="<?php echo $usr;?>"/>
						<div class="col-xs-12 col-md-12" id="nme_status" style="font-size:11px; word-wrap:normal; font-weight:bold; color:#0E04F7;"></div>
						<input type="hidden" name="nme_status" id="nme_status_hidden" />
						</div>

						<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Password :<em style="font-size:9px;">&nbsp;(min. 8 characters)</em></span><span style="float: right; color: #000; font-size: 11px;"><input type="checkbox" onclick="myFunction()">&nbsp;Show Password</span></div>
						<div class="col-xs-12 col-md-12">
						<input type="password" required maxlength="25" class="form-control" style="width:100%; float:left;" id="D_Password" name="ppwd" placeholder="Password" value="<?php echo $ppwd;?>"/>
							</div><div class="clearfix"></div><div class="col-xs-12 col-md-12" id="Ppass-info" style="padding-left: 20px; font-size:11px; word-wrap:normal;"></div>
						</div>
					</div>            
				</div>
			</div>
	</div>
</div>           
            </div>
        </div>
    </div>
    <!-- user account info end -->
</div>
<!--#########################################################################-->  
<script type="text/javascript">
    function myFunction() {
    var x = document.getElementById("D_Password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        } 
</script> 