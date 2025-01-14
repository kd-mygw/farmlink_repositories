<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        DB::table('templates')->insert([
            [
                'name' => 'テンプレート①',
                'blade_file' => 'public.simple',
                'preview_image' => '/images/templates/simple.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'テンプレート②',
                'blade_file' => 'public.fancy',
                'preview_image' => '/images/templates/fancy.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'コーンテンプレート',
                'blade_file' => 'public.corn',
                'preview_image' => '/images/templates/simple.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ブラウンテンプレート',
                'blade_file' => 'public.browntpl',
                'preview_image' => '/images/templates/simple.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}