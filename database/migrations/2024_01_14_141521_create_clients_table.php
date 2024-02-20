<?php

use App\Models\Tenant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable()->unique();
            $table->foreignId('tenant_id')->constrained();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
        \Illuminate\Support\Facades\DB::table('clients')->insert([
            [
                'name' => 'client',
                "email" => "client@gmail.com",
                "password" => bcrypt('123456789'),
                'tenant_id' => Tenant::inRandomOrder()->first()->id,
            ]
        ]);

    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
        });
        Schema::dropIfExists('clients');
    }
}
