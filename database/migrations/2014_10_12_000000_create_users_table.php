<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 40)->default('');
            $table->string('name')->default('');
            $table->string('image_url', 255)->default('')->comment('圖片網址');
            $table->string('email')->unique()->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('users_permission', function (Blueprint $table) {
            $table->id();
            $table->string('users_uuid', 40)->default('');
            $table->string('permission')->comment('權限')->default('');;
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('reservation_group', function (Blueprint $table) {
            $table->id();
            $table->string('users_uuid', 40)->default('');
            $table->string('image_url', 255)->default('')->comment('圖片網址');
            $table->string('title')->default('');;
            $table->string('invite_code')->unique()->default('')->comment('邀請碼');
            $table->text('content');
            $table->string('remark')->default('');;
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_reservation_group', function (Blueprint $table) {
            $table->id();
            $table->string('users_uuid', 40)->default('');
            $table->string('reservation_group_uuid', 40)->default('');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('users_permission');
        Schema::dropIfExists('reservation_group');
        Schema::dropIfExists('user_reservation_group');
    }
}

