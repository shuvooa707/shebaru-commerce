<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'id' => 1,
            'site_name' => 'Business Express',
            'site_logo' => '2137461207.png',
            'owner_phone' => '01601424748',
            'owner_email' => 'mail.softforests@gmail.com',
            'address' => 'Kalabagan',
            'tracking_code' => null,
            'copyright' => 'Copyright © 2023 Soft Forests - All Rights Reserved.',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.facebook.com/',
            'youtube' => 'https://www.facebook.com/',
            'recommend_num' => 18,
            'discount_num' => 18,
            'newarrival_num' => 18,
            'bkash' => 1,
            'bkash_number' => '01600000000',
            'nogod' => 0,
            'nogod_number' => '01600000000',
            'rocket' => 0,
            'rocket_number' => '01600000000',
            'paypal' => 0,
            'paypal_account' => 'ad@gmail.com',
            'stripe' => 0,
            'stripe_account' => 'admin@gmail.com',
            'supp_num1' => '01601424748',
            'supp_num2' => '01601424748',
            'supp_num3' => '01601424748',
            'number_visibility' => 3,
            'coupon_visibility' => 0,
            'currency' => 'BDT',
            'redx_api_base_url' => 'https://sandbox.redx.com.bd/v1.0.0-beta/',
            'redx_api_access_token' => null,
            'pathao_api_base_url' => 'https://hermes-api.p-stageenv.xyz',
            'pathao_api_access_token' => null,
            'pathao_store_id' => 267,
            'steadfast_api_base_url' => 'yourcord',
            'steadfast_api_key' => 'yourcord',
            'steadfast_secret_key' => 'yourcord',
        ]);
    }
}
