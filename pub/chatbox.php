<style>
.chat-box-wrap.collapse.in {
			position: fixed;
			height: 480px!important;
			width: 530px!important;
			border-radius: 15px;
			}
		.chat-content {
				height: 460px!important;
			}	';
   }

.border-rad {
	border-top-left-radius: 15px;
    border-top-right-radius: 15px;
	}	
	
#page-wrap {
    margin-top: 15px!important;
	}
#send-message-area p {
    padding-top: 0px!important;
	}
	
@media (max-width: 767px){
.chat-box-wrap.collapse.in {
    position: absolute;
    height: 480px!important;
    width: 95%!important;
    border-radius: 15px;
	right: 5px;
}
	
#chat-area {
	height: 210px!important; 
}	
	
#page-wrap {
    width: 90%!important; 
	}
	
#cfgrd, #cfsbj, #sendie { 
	width: 100%!important 
	}	
	
}	
</style>	
<?php
if($_SESSION['account']=='FACULTY')
	{  $cbox='chat/findex.php';   }
else {  $cbox='chat/index.php';   }	
?>      
       <div class="chat-list-wrap">
        <div class="chat-list-adminpro">
            <div class="chat-button">
                <span data-toggle="collapse" data-target="#chat" class="chat-icon-link"><i class="fa fa-comments" style="font-size: 26px;"></i></span>
            </div>
            <div id="chat" class="collapse chat-box-wrap shadow-reset animated zoomInLeft">
                <div class="chat-main-list">
                    <div class="chat-heading">
                        <h2 class="login-fm border-rad">FILTECH Chatbox v1</h2>
                    </div>
                    <div class="chat-content chat-scrollbar">
    					 <?php include($cbox);?>                 
                    </div>
                </div>
            </div>
        </div>
    </div>