<style>
.mCustomScrollBox {
		overflow: auto;
	}
</style>	
<div class="chat-list-wrap">
        <div class="chat-list-adminpro">
            <div class="chat-button">
                <span data-toggle="collapse" data-target="#chat" class="chat-icon-link"><i class="fa fa-comments" style="font-size: 26px;"></i></span>
            </div>
            <div id="chat" class="collapse chat-box-wrap shadow-reset animated zoomInLeft">
                <div class="chat-main-list">
                    <div class="chat-heading">
                        <h2>FILTECH Chatbox v1</h2>
                    </div>
                    <div class="chat-content chat-scrollbar">
<?php
$dsql = mysqli_query($con,"SELECT * from tblsinfo_data where typ='FACULTY' ORDER BY alyas ASC LIMIT $offsetRV, $rowsPerPageRV"); 

				  while($r = mysqli_fetch_assoc($dsql))
				   {  
?>                      
                        <div class="author-chat">
                            <h3>Monica <span class="chat-date">10:15 am</span></h3>
                            <p>Hi, what you are doing and where are you gay?</p>
                        </div>
                        
                        <div class="client-chat">
                            <h3>Mamun <span class="chat-date">10:10 am</span></h3>
                            <p>Now working in graphic design with coding and you?</p>
                        </div>
<?php } ?>                        
                    </div>
                    <div class="chat-send">
                        <input type="text" placeholder="Type..." />
                        <span><button id="csend" name="csend" type="submit">Send</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>