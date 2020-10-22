<div id= "page-container">
    <div id="page-content">
    
<?php    
    if(isset($_GET['p']))
        {
        
            $page = $_GET['p'];
           
            if($page == 'home')
            {
                include 'includes/home.html';
            }
            
            else if($page == 'about')
            {
                include 'includes/about.html';
            }
           
            else if($page == 'contact')
            {
                include 'includes/contact.html';
            }
      
            else if($page == 'resume')
            {
                include 'includes/resume.html';
            }
         
        }
        else
        {
            include 'includes/home.html';
        }
        ?>
    </div>
</div>






