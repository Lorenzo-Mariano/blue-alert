<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonColumnsToUsersAndArticlesTables extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('ban_reason')->nullable()->after('is_banned');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->text('restriction_reason')->nullable()->after('is_restricted');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ban_reason');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('restriction_reason');
        });
    }
}
