<?php
namespace Database\Seeders;
use App\Models\Company;use App\Models\User;use Illuminate\Database\Seeder;use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder { public function run(): void { $company = Company::query()->create(['name'=>'Clínica Demo','document'=>'000000000001','status'=>'active']); User::query()->create(['name'=>'Master','email'=>'master@demo.com','password'=>Hash::make('password'),'role'=>'master']); User::query()->create(['name'=>'Admin','email'=>'admin@demo.com','password'=>Hash::make('password'),'company_id'=>$company->id,'role'=>'admin']); User::query()->create(['name'=>'Operador','email'=>'operador@demo.com','password'=>Hash::make('password'),'company_id'=>$company->id,'role'=>'operator']); }}
