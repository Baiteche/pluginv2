<?php  

require_once('./../../classes/available.class.php');

$appointmentScheduler = new Available();


$appointmentScheduler->scheduleAppointment(12, 'technique','technique_waitlist', 'technique');