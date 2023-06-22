<?php 

require_once('../../../classes/available.class.php');

$appointmentScheduler = new Available();




$freeSlots = 12; // Replace this with your actual logic to determine available slots

$appointmentScheduler->scheduleAppointment($freeSlots, 'technique', 'technique_waitlist', 'technique');