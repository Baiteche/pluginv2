<?php

class GymClass {
    private $name;
    private $availableSlots;
    private $waitingList;

    public function __construct($name, $availableSlots) {
        $this->name = $name;
        $this->availableSlots = $availableSlots;
        $this->waitingList = [];
    }

    public function getName() {
        return $this->name;
    }

    public function getAvailableSlots() {
        return $this->availableSlots;
    }

    public function getWaitingList() {
        return $this->waitingList;
    }

    public function enrollStudent($studentName, $studentEmail) {
        $filteredEmail = $this->filterEmail($studentEmail);
        if ($this->availableSlots > 0) {
            $this->availableSlots--;
            $this->sendConfirmationEmail($studentName, $filteredEmail, "Enrolled in {$this->name} class");
        } else {
            $this->waitingList[] = ['name' => $studentName, 'email' => $filteredEmail];
            $this->sendNotificationEmail($studentName, $filteredEmail, "Added to the waiting list for {$this->name} class");
        }
    }

    private function filterEmail($email) {
        // Implement email filtering/validation logic as per your requirements
        // Example: simple validation using filter_var()
        $filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        return $filteredEmail !== false ? $filteredEmail : '';
    }

    private function sendConfirmationEmail($name, $email, $message) {
        $subject = "Gym Class Enrollment Confirmation";
        $body = "Dear {$name},\n\n{$message}\n\nThank you for enrolling in {$this->name} class.";

        // Implement your email sending logic here
        // For example, using the PHP mail() function
        $headers = "From: gym@example.com";
        mail($email, $subject, $body, $headers);
    }

    private function sendNotificationEmail($name, $email, $message) {
        $subject = "Gym Class Waiting List Notification";
        $body = "Dear {$name},\n\n{$message}\n\nYou have been added to the waiting list for {$this->name} class.";

        // Implement your email sending logic here
        // For example, using the PHP mail() function
        $headers = "From: gym@example.com";
        mail($email, $subject, $body, $headers);
    }
}

// Create GymClass instances
$conditioningClass = new GymClass("Conditioning", 8);
$techniqueClass = new GymClass("Technique", 12);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentName = $_POST["nom"];
    $studentEmail = $_POST["email"];
    $classType = $_POST["category"];

    // Determine class type and enroll student
    if ($classType === "conditioning") {
        $conditioningClass->enrollStudent($studentName, $studentEmail);
    } elseif ($classType === "technique") {
        $techniqueClass->enrollStudent($studentName, $studentEmail);
    }
}

?>


