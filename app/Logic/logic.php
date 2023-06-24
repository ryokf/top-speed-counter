<?php

namespace app\Logic;

class Logic
{
    public $mk;

    function __construct($mk)
    {
        $this->mk = $mk; // koefisien gesek kinetik
    }

    public function forceOnWheel(
        float $engineTorque,
        float $ratioTransmision,
        float $primaryTransmision,
        float $secondaryTransmision,
        float $wheelRad
    ): float {
        $wheelTorque = $engineTorque * $ratioTransmision * $primaryTransmision * $secondaryTransmision;

        return $wheelTorque / $wheelRad;
    }

    public function frictionForce($vehicleWeight, $riderWeight): float
    {
        $normalForce = $vehicleWeight + $riderWeight;

        return $normalForce * $this->mk;
    }

    public function totalForce($forceOnwheel, $frictionForce): float
    {
        return $forceOnwheel - $frictionForce;
    }

    public function vehicleAcceleration(float $vehicleMass, float $riderMass, float $totalForce): float
    {
        return $totalForce / ($vehicleMass + $riderMass);
    }

    public function wheelRPM($acceleration, $circumference,$time_s = 1, $v_start = 0): float
    {
        // dd($v_start);

        $distance = $v_start * $time_s + 1 / 2 * $acceleration * $time_s * $time_s;

        return $distance / $circumference * 60;
    }

    public function wheelRPMatMaxPower(
        $wheelRPM,
        float $ratioTransmision,
        float $primaryTransmision,
        float $secondaryTransmision,
        $maxEnginePowerRPM,
    ): float {
        $engineRPM = $wheelRPM * $ratioTransmision * $primaryTransmision * $secondaryTransmision;

        return $maxEnginePowerRPM * $wheelRPM / $engineRPM;
    }

    public function maxVelocity($wheelRPMatMaxPower, $circumference): float
    {
        $wheel_rpm_at_1s = $wheelRPMatMaxPower / 60;

        return $wheel_rpm_at_1s * $circumference;
    }

    static public function convert_to_kmph($mps): float
    {
        return $mps * 3.6;
    }
}
