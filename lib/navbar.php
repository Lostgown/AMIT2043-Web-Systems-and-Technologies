<style>

.navMenu{
    display:block;
    float: right;
    background-color: #282A2C;
    margin: 0;
    height:50px;
    width: 100%;
    font-family: "Montserrat", sans-serif;
    padding: 9px;
    /* position: relative; */
}

.navMenu img{
    display:block;
    overflow: hidden;
    margin-top:5px;
    margin-left:10px;
    display:block;
    float:left;
    height:50px;
    width: auto;
}

.navMenu a.title{
    display:block;
    text-align:center;
    padding:14px 16px;
    text-decoration:none;
    color: white;
    float:left;
    font-size:23px;
}

.navMenu a{
    float:right;
    display:block;
    text-align:center;
    padding:14px 16px;
    text-decoration:none;
    color: white;
    transition: all 0.3s ease 0s; 
}


.navMenu .dropdown{
    float:right;
    overflow:hidden;
    /* transition: all 0.3s ease 0s;  */
    
}
.navMenu .icon{
    display:none;
}
/* main buttons*/
.main_links{
    background-color:transparent;
    color: white;
    font-size:1.2rem;
    /* line-height:1; */
    transition: all 0.3s ease 0s; 
}
/* main buttons hover */
.main_links:hover{
    background-color:#EDF1F5;
    color: white;
    box-sizing: border-box;
    /* border: 1px solid black;  */
    border-top: 0px;
}
/* drop down button*/
.dropdown .dropbtn{
    background-color:transparent;
    color: white;
    font-size:1.2rem;
    border:none;
    /* outline:none; */
    padding:14px;
    /* font-family:inherit; */
    /* width:100%; */
    /* dont never ever fucking touch here i swear to god jesus*/
    text-align:left;
    /* transition: all 0.3s ease 0s;  */
    margin-bottom:10px;
}
/* drop down button hover */
.navMenu a:hover {
    color:black;
    /* scale:110%; */
}

.navMenu a.title:hover {
    color:white;
    /* scale:103%; */
}

.navbar a:hover,.navMenu .dropdown:hover .dropbtn{
    background-color:#EDF1F5;
    color: black;
    /* box-sizing: border-box; */
     /* border: 1px solid black;   */
    /* border-top: 0px; */

}
.dropdown-content{
    margin: 0;
    /* padding: 11px; */
    display:none;
    position:absolute;
    min-width:160px;
    box-shadow:0 8px 16px 0 rgba(0,0,0,0.2);
    z-index:2;
    transition: all 0.3s ease 0s; 
}
/* drop down content */
.dropdown-content a{
    background-color:#EDF1F5;
    color:black;
    /* font-size:2.7vh; */
    /* padding:12px 16px; */
    text-decoration:none;
    display:block;
    text-align:left;
    float:none;
    white-space:nowrap;
    transition: all 0.3s ease 0s; 
}
/* drop down content hover */
.dropdown-content a:hover{
    background-color:#EDF1F5;
    color:black;
    /* box-sizing: border-box; */
    /* border: 1px solid #404040; */
    /* margin-top: -1px;  */
    
}
.dropdown:hover .dropdown-content{
    display:block
}

@media screen and (max-width: 1260px), screen and (max-height: 600px){
	.navMenu a:not(:last-child){
        display:none;
    }
    .navMenu .dropbtn {
        display:none;
    }
	.navMenu .dropdown{
        display:none;
    }

	.navMenu a.icon{
        float:right;
        display:block;
        color: white;
    }

    

	.navMenu.mobileView{
        position:relative;
    }
	.navMenu.mobileView .icon{
        position:absolute;
        right:0;
        top:0;
    }
	.navMenu.mobileView a:not(:last-child){
        float:none;
        display:block;
        text-align:left;
        width: 100%;
        background-color:#f0e3d7;
        line-height: 1.5rem;
    }
    .navMenu.mobileView a:hover:not(:last-child){
        background-color:#f2c995;
    }
	.navMenu.mobileView .dropdown{
        float:none;
        display:block;
        text-align:left;
    }

    .navMenu.mobileView .dropdown-content{
        display: block;
        position:relative;   
    }
	.navMenu.mobileView .dropdown-content a{
        background-color:#f0e3d7;
        position:relative;   
        width: 200%;
    }
    .navMenu.mobileView .dropdown-content a:hover{
        background-color:#f2c995;
        border: 0;
    }
}
</style>



<div class='navMenu' id='navMenuId'>
    <img src="../photo/tarumt-logo1.png" >
    <a class="title" href="#" onclick="window.location.reload(true)"> Badminton Club Event Management System </a>
    <a href='../Sys/logout.php' class='main_links'>Log Out</a>
    <?php
    if ($_SESSION['userType'] == 'member') {
        echo "
            <a href='../Member/menuMember.php' class='main_links'>Main Page</a>
              <div class='dropdown'>
                  <button class='dropbtn'>Content<i>&#9660;</i></button>
                  <div class='dropdown-content'>
                      <a href='../Peserta/keputusanPeserta.php'> - Events </a>
                      <a href='../Peserta/keputusanPeserta.php'> - My Bookings </a>
                  </div>
              </div>";
    }

    else if ($_SESSION['userType'] == 'admin') {
        echo "<a href='../Admin/menuAdmin.php' class='main_links'>Main Page</a>
              <div class='dropdown'>
                  <a class='dropbtn'> Content <i>&#9660;</i> </a>
                  <div class='dropdown-content'>
                      <a href='../Hakim/semakHakim.php'> - Register User </a>
                      <a href='../Admin/daftarAhli.php'> - Admin Account Maintenance </a>
                      <a href='../Admin/senarai.php'> - Member Account Maintenance </a>
                      <a href='../Admin/import.php'> - Events Management </a>
                      <a href='../General/keputusan.php'> - Events Bookings Details </a>
                  </div>
              </div>";
    }
    ?>
    
    <a class='icon' id = 'icon' href='javascript:void(0);'>&#9776;</a>
</div>

<script>
icon.onmouseover = function openMenu() {  
    var navMain = document.getElementById('navMenuId');  
    navMain.className += ' mobileView';
    
    icon.onmouseout = function closeMenu() {
        navMain.className = 'navMenu';

        navMenuId.onmouseover = function keepMenuOpen() {
            navMain.className += ' mobileView';

            navMenuId.onmouseout = function keepMenuClose() {
                navMain.className = 'navMenu';
            }
        }
    }
}
</script>