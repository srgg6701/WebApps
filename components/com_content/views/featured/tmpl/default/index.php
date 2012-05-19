<?		 	
		
		/*	Продумать, что показывать юзеру, который заавторизовался в зависимости от состояния его сотрудничества с нами...
		
		$user = JFactory::getUser();
		if ($user->get('guest')==1){ ?><? }else{?><? }*/        

		$path_to_images='templates/fastwebdev/images/';
		
		if ($dw_mode){?>    	
        <?	require "default_mission.php";?>        
    <?	}else require $req_tmpl_files.'default_mission.php';?>    
            	</div>
            </div>
            <!-- / section1 -->
		</div>
        <div>
        	<div>
            	<div>
    <?	if ($dw_mode){?>    	
        <?	require "quick_and_free.php";?>        
    <?	}else require $req_tmpl_files.'quick_and_free.php';?>    
		<!-- section2 -->        

    		<div id="section2">
<?	if ($dw_mode){?>    	
	<?	require "all_our.php";?>        
<?	}else require $req_tmpl_files.'all_our.php';?>    
        	<div id="right_advices">
           		<div style="padding-left:10px;">
<?	if ($dw_mode){?>    	
	<?	require "right_advices.php";?>        
<?	}else require $req_tmpl_files.'right_advices.php';?>    
            	</div>
        	</div>
          </div>  
    	<!-- / section2 -->
