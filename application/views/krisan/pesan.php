<?php 
    if(isset($pesan)) 
    {
    	$pecah = explode(".", $pesan['pesan']);
        if(count($pecah) > 1)
        {
          $pecah2 = explode(" ", $pecah[0]);
          if(count($pecah2) > 1)
          {
            if(strlen($pecah2[0]) <= 50)
            {
              	echo nl2br($pesan['pesan']);
            }
            else
            {
                for ($i=1; $i < 5; $i++)
	        	{ 
	        		$sub = 70;
	        		if($i == 1)
	        		{
	        			$j = 0;
	        		}
	        		echo substr($pesan['pesan'], $j, $sub)."<br>";
	        		if($i == 1)
	        		{
	        			$j += 71;
	        		}
	        		else
	        		{
	        			$j += 70;
	        		}           
	        	}
            }
          } 
          else
          {
            if(strlen($pecah2[0]) <= 50)
            {
              	echo nl2br($pesan['pesan']);
            }
            else
            {
                for ($i=1; $i < 5; $i++)
            	{ 
            		$sub = 70;
            		if($i == 1)
            		{
            			$j = 0;
            		}
            		echo substr($pesan['pesan'], $j, $sub)."<br>";
            		if($i == 1)
            		{
            			$j += 71;
            		}
            		else
            		{
            			$j += 70;
            		}           
            	}
            }
          }            
        }
        else
        {
			$pecah2 = explode(" ", $pecah[0]);
            if(count($pecah2) > 1)
            {
	            if(strlen($pecah2[0]) <= 50)
	            {
	              echo nl2br($pesan['pesan']);
	            }
	            else
	            {
	            	for ($i=1; $i < 5; $i++)
	            	{ 
	            		$sub = 70;
	            		if($i == 1)
	            		{
	            			$j = 0;
	            		}
	            		echo substr($pesan['pesan'], $j, $sub)."<br>";
	            		if($i == 1)
	            		{
	            			$j += 71;
	            		}
	            		else
	            		{
	            			$j += 70;
	            		}           
	            	}
	            }
            } 
            else
            {
	            if(strlen($pecah2[0]) <= 50)
	            {
	              echo nl2br($pesan['pesan']);
	            }
	            else
	            {
	              	for ($i=1; $i < 5; $i++)
	                { 
	            		$sub = 70;
	            		if($i == 1)
	            		{
	            			$j = 0;
	            		}
	            		echo substr($pesan['pesan'], $j, $sub)."<br>";
	            		if($i == 1)
	            		{
	            			$j += 71;
	            		}
	            		else
	            		{
	            			$j += 70;
	            		}            		
	            	}
	            }
            }    
		}
    }         
?>