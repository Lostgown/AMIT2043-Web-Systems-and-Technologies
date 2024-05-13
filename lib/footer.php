<style>

    .container {
    max-width: 2000px;
    margin-right: auto;
    color: #282A2C;
    font-family: "Montserrat", sans-serif;
}

.row {
    display:flex;
    flex-wrap: wrap;
}

ul {
    list-style:'';
}

.footer {
    background-color: #282A2C;
    padding: 70px 0;   
    position: relative;
    
}

.footer-col {
    
    width: 30%;
    padding: 0 15px;    
    /* position: relative; */
}

.footer-col h4 {
    font-size: 16px;
    color: #ffffff;
    margin-bottom: 20px;
    font-weight: 500;
    font-family: "Montserrat", sans-serif;
    position: relative;
}

.footer-col h4::before {
    content: '';
    position:absolute;
    left: 0;
    bottom: -10px;
    background-color: #1ea9e9;
    height: 2px;
    box-sizing: border-box;
    width: 50px;
}

.footer-col ul li:not( :last-child) {
    margin-bottom: 10px;
}

.footer-col ul li a {
    font-size: 16px;
    color: #ffffff;
    text-decoration: none;
    font-weight: 300;
    color: #bbbbbb;
    display: block;
    transition: all 0.3s ease 0s; 
}

.footer-col ul li a:hover {
    color: #ffffff;
    padding-left: 10px;
}

.footer-col .social-links a {
    display: inline-block;
    height: 40px;
    width: 40px;
    background-color: rgba(255, 255, 255, 0.2);
    margin-right: 10px;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    color: #ffffff;
    transition: all 0.5s ease 0s; 
}

.footer-col .social-links a:hover {
    height: 45px;
    width: 45px;
    color: #24262b;
    background-color: #ffffff;
}

@media(max-width: 767px){
    .footer-col {
        width: 50%;
        margin-bottom: 30px;
    }
}
@media(max-width: 574px){
    .footer-col {
        width: 100%;
    }
}

@media(max-width: 767px){
    .footer-address {
        width: 50%;
        margin-bottom: 30px;
    }
}
@media(max-width: 574px){
    .footer-address {
        width: 100%;
    }
}
</style>

<div class="footer" id="footerId">
    <?php 
    if ($_SESSION['userType'] == 'member') {
        echo "<div class='container'>
        <div class='row'>
            <div class='footer-col'>
                <h4>Events Management</h4>
                <ul>
                    <li><a href='../Member/eventShow.php'>Events Details</a></li>
                    <li><a href='../Member/memberBooking.php'>My Bookings</a></li>
                </ul>
            </div>
            <div class='footer-col'>
                <h4>Club Location</h4>
                <ul>
                <li><a href='https://maps.app.goo.gl/UcGTsgyKfvo8GQiS7'>77, Lorong Lembah Permai 3, 11200 Tanjung Bungah, Pulau Pinang</a></li>
                </ul><br>
                <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.760984528147!2d100.28229957482294!3d5.453205194526331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac2c0305a5483%3A0xfeb1c7560c785259!2sTAR%20UMT%20Penang%20Branch!5e0!3m2!1sen!2smy!4v1712057579610!5m2!1sen!2smy' width='300' height='150' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>  
            </div>
        </div>
    </div>";

    }   else 
        echo "<div class='container'>
        <div class='row'>
            <div class='footer-col'>
                <h4>Account Maintenance</h4>
                <ul>
                    <li><a href='../General/resetPassword.php'>Reset Password</a></li>
                    <li><a href='../Member/memberList.php'>Member Account Maintenance</a></li>
                    <li><a href='../Admin/adminList.php'>Admin Account Maintenance</a></li>
                </ul>
            </div>
            <div class='footer-col'>
                <h4>Events Management</h4>
                <ul>
                    <li><a href='../Event/eventCreate.php'>Register Events</a></li>
                    <li><a href='../Event/eventList.php'>Events Details</a></li>
                    <li><a href='../Event/bookingList.php'>Event Bookings Details</a></li>
                </ul>
            </div>
            <div class='footer-col'>
                <h4>Club Location</h4>
                <ul>
                <li><a href='https://maps.app.goo.gl/UcGTsgyKfvo8GQiS7'>77, Lorong Lembah Permai 3, 11200 Tanjung Bungah, Pulau Pinang</a></li>
                </ul><br>
                <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.760984528147!2d100.28229957482294!3d5.453205194526331!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac2c0305a5483%3A0xfeb1c7560c785259!2sTAR%20UMT%20Penang%20Branch!5e0!3m2!1sen!2smy!4v1712057579610!5m2!1sen!2smy' width='300' height='150' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>  
            </div>
        </div>
    </div>";

    ?>
</div>