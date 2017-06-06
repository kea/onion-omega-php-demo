<?php

include(__DIR__.'/../Omega/PwmExp.php');
include(__DIR__.'/../ServoMotor.php');

\onionSetVerbosity(ONION_VERBOSITY_NONE - 1);

$servos = [
  ['name' => 'Futaba S3003', 'rotation' => 60, 'pulseCycle' => 30, 'pulseMin' => 500, 'pulseMax' => 3000],
  ['name' => 'Tower Pro SG90', 'rotation' => 180, 'pulseCycle' => 20, 'pulseMin' => 1000, 'pulseMax' => 2000],
];

$standardServo = new ServoMotor(0, 500, 2400);
$microServo = new ServoMotor(1, 500, 2400);

$standardServo->setAngle(90.0);
$microServo->setAngle(90.0);

sleep(2);

while (true) {
    # Turn servos to the 0 angle position
    $standardServo->setAngle(0.0);
    $microServo->setAngle(0.0);
    sleep(2);
    # Turn servos to the neutral position
    $standardServo->setAngle(90.0);
    $microServo->setAngle(90.0);
    sleep(2);
    # Turn servos to the 180 angle position
    $standardServo->setAngle(180.0);
    $microServo->setAngle(180.0);
    sleep(2);
}

sleep(5);

$pwm->disableChip();
