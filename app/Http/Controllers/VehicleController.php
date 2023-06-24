<?php

namespace App\Http\Controllers;

use App\Logic\Logic;
use App\Models\Rider;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('index', compact('vehicles'));
    }

    public function show($id = 1)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        $rider = Rider::where('id', 1)->first();
        $formula = new Logic(1);
        $velocity = [];
        $data_per_gear = [];

        $gear = [
            $vehicle->gear_ratio_1,
            $vehicle->gear_ratio_2,
            $vehicle->gear_ratio_3,
            $vehicle->gear_ratio_4,
            $vehicle->gear_ratio_5,
            $vehicle->gear_ratio_6,
        ];


        $last_gear = 5;

        if ($gear[5] == 0) {
            $last_gear = 4;
        }

        $last_v = [0];

        for ($i = 0; $i < count($gear); $i++) {
            if ($last_gear + 1 == $i) {
                array_push($velocity, "-");
                continue;
            }


            $forceOnWheel = $formula->forceOnWheel(
                engineTorque: $vehicle->torque,
                ratioTransmision: $gear[$i],
                primaryTransmision: $vehicle->primary_gear_ratio,
                secondaryTransmision: $vehicle->secondary_gear_ratio,
                wheelRad: $vehicle->wheel_rad
            );

            $frictionForce = $formula->frictionForce(
                vehicleWeight: $vehicle->weight,
                riderWeight: $rider->weight
            );

            $totalForce = $formula->totalForce(forceOnwheel: $forceOnWheel, frictionForce: $frictionForce);

            $acceleration = $formula->vehicleAcceleration(
                vehicleMass: $vehicle->mass,
                riderMass: $rider->mass,
                totalForce: $totalForce
            );

            $wheelRPM = $formula->wheelRPM(
                v_start: $last_v[$i],
                // v_start: 2,
                acceleration: $acceleration,
                circumference: $vehicle->wheel_rad * 2 * 3.14
            );

            $wheelRPMatMaxPower = $formula->wheelRPMatMaxPower(
                wheelRPM: $wheelRPM,
                ratioTransmision: $gear[$i],
                primaryTransmision: $vehicle->primary_gear_ratio,
                secondaryTransmision: $vehicle->secondary_gear_ratio,
                maxEnginePowerRPM: $i == $last_gear ? $vehicle->limit_rpm : $vehicle->shifting_rpm
            );

            $maxVelocity = $formula->maxVelocity(
                wheelRPMatMaxPower: $wheelRPMatMaxPower,
                circumference: $vehicle->wheel_rad * 2 * 3.14
            );

            array_push($last_v, $maxVelocity);

            array_push(
                $data_per_gear,
                [
                    $forceOnWheel,
                    $frictionForce,
                    $totalForce,
                    $acceleration,
                    $wheelRPM,
                    $wheelRPMatMaxPower,
                    round(Logic::convert_to_kmph($maxVelocity)),
                    $maxVelocity,
                    $last_v[$i],
                    ]
                );
        }

        return view('show', compact('vehicle', 'rider', 'gear', 'data_per_gear'));
    }

    function create() {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'torque' => 'required|numeric',
            'power' => 'required|numeric',
            'shifting_rpm' => 'required|integer',
            'limit_rpm' => 'required|integer',
            'weight' => 'required|numeric',
            'mass' => 'required|numeric',
            'wheel_rad' => 'required|numeric',
            'primary_gear_ratio' => 'required|numeric',
            'gear_ratio_1' => 'required|numeric',
            'gear_ratio_2' => 'required|numeric',
            'gear_ratio_3' => 'required|numeric',
            'gear_ratio_4' => 'required|numeric',
            'gear_ratio_5' => 'required|numeric',
            'gear_ratio_6' => 'required|numeric',
            'secondary_gear_ratio' => 'required|numeric',
            'photo' => 'required',
        ]);

        // Upload and save photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $validatedData['photo'] = $photoPath;
        }

        Vehicle::create($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }
}
