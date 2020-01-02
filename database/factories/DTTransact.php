<?php
/**
 * @Author: C Yongky Pranowo
 * @Date:   2019-11-24 19:45:33
 * @Last Modified by:   C Yongky Pranowo
 * @Last Modified time: 2019-11-30 11:39:35
 */
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\DTTransact;
use App\Models\MstUser;
use App\Models\DTSchedule;
use Faker\Generator as Faker;

$factory->define(DTTransact::class, function (Faker $faker) {
    $timestamp = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now');
    return [
        'user_id' => MstUser::all()->random()->id,
        'dt_schedule_id' =>DTSchedule::all()->random()->id,
        'phone_number' => $faker->mobileNumber,
        'adult' => $faker->randomDigit,
        'child' => $faker->randomDigit,
        'payment_status' => $faker->randomElement($array = array('success','failed','pending')),
        'created_at' => $timestamp,
        'updated_at' => $timestamp,
    ];
});