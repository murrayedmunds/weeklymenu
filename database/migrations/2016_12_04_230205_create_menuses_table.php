<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('mainMonday-metadataLink')->nullable();
            $table->string('mainMonday-metadataLinkTitle')->nullable();
            $table->string('mainMonday-metadataLinkDescription')->nullable();
            $table->string('mainMonday-note')->nullable();
            $table->string('mainMonday-link')->nullable();
            $table->string('mainMonday-image')->nullable();
            $table->string('sideMonday-metadataLink')->nullable();
            $table->string('sideMonday-metadataLinkTitle')->nullable();
            $table->string('sideMonday-metadataLinkDescription')->nullable();
            $table->string('sideMonday-note')->nullable();
            $table->string('sideMonday-link')->nullable();
            $table->string('sideMonday-image')->nullable();
            $table->string('mainTuesday-metadataLink')->nullable();
            $table->string('mainTuesday-metadataLinkTitle')->nullable();
            $table->string('mainTuesday-metadataLinkDescription')->nullable();
            $table->string('mainTuesday-note')->nullable();
            $table->string('mainTuesday-link')->nullable();
            $table->string('mainTuesday-image')->nullable();
            $table->string('sideTuesday-metadataLink')->nullable();
            $table->string('sideTuesday-metadataLinkTitle')->nullable();
            $table->string('sideTuesday-metadataLinkDescription')->nullable();
            $table->string('sideTuesday-note')->nullable();
            $table->string('sideTuesday-link')->nullable();
            $table->string('sideTuesday-image')->nullable();
            $table->string('mainWednesday-metadataLink')->nullable();
            $table->string('mainWednesday-metadataLinkTitle')->nullable();
            $table->string('mainWednesday-metadataLinkDescription')->nullable();
            $table->string('mainWednesday-note')->nullable();
            $table->string('mainWednesday-link')->nullable();
            $table->string('mainWednesday-image')->nullable();
            $table->string('sideWednesday-metadataLink')->nullable();
            $table->string('sideWednesday-metadataLinkTitle')->nullable();
            $table->string('sideWednesday-metadataLinkDescription')->nullable();
            $table->string('sideWednesday-note')->nullable();
            $table->string('sideWednesday-link')->nullable();
            $table->string('sideWednesday-image')->nullable();
            $table->string('mainThursday-metadataLink')->nullable();
            $table->string('mainThursday-metadataLinkTitle')->nullable();
            $table->string('mainThursday-metadataLinkDescription')->nullable();
            $table->string('mainThursday-note')->nullable();
            $table->string('mainThursday-link')->nullable();
            $table->string('mainThursday-image')->nullable();
            $table->string('sideThursday-metadataLink')->nullable();
            $table->string('sideThursday-metadataLinkTitle')->nullable();
            $table->string('sideThursday-metadataLinkDescription')->nullable();
            $table->string('sideThursday-note')->nullable();
            $table->string('sideThursday-link')->nullable();
            $table->string('sideThursday-image')->nullable();
            $table->string('mainFriday-metadataLink')->nullable();
            $table->string('mainFriday-metadataLinkTitle')->nullable();
            $table->string('mainFriday-metadataLinkDescription')->nullable();
            $table->string('mainFriday-note')->nullable();
            $table->string('mainFriday-link')->nullable();
            $table->string('mainFriday-image')->nullable();
            $table->string('sideFriday-metadataLink')->nullable();
            $table->string('sideFriday-metadataLinkTitle')->nullable();
            $table->string('sideFriday-metadataLinkDescription')->nullable();
            $table->string('sideFriday-note')->nullable();
            $table->string('sideFriday-link')->nullable();
            $table->string('sideFriday-image')->nullable();
            $table->string('mainSaturday-metadataLink')->nullable();
            $table->string('mainSaturday-metadataLinkTitle')->nullable();
            $table->string('mainSaturday-metadataLinkDescription')->nullable();
            $table->string('mainSaturday-note')->nullable();
            $table->string('mainSaturday-link')->nullable();
            $table->string('mainSaturday-image')->nullable();
            $table->string('sideSaturday-metadataLink')->nullable();
            $table->string('sideSaturday-metadataLinkTitle')->nullable();
            $table->string('sideSaturday-metadataLinkDescription')->nullable();
            $table->string('sideSaturday-note')->nullable();
            $table->string('sideSaturday-link')->nullable();
            $table->string('sideSaturday-image')->nullable();
            $table->string('mainSunday-metadataLink')->nullable();
            $table->string('mainSunday-metadataLinkTitle')->nullable();
            $table->string('mainSunday-metadataLinkDescription')->nullable();
            $table->string('mainSunday-note')->nullable();
            $table->string('mainSunday-link')->nullable();
            $table->string('mainSunday-image')->nullable();
            $table->string('sideSunday-metadataLink')->nullable();
            $table->string('sideSunday-metadataLinkTitle')->nullable();
            $table->string('sideSunday-metadataLinkDescription')->nullable();
            $table->string('sideSunday-note')->nullable();
            $table->string('sideSunday-link')->nullable();
            $table->string('sideSunday-image')->nullable();
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
        Schema::dropIfExists('menuses');
    }
}
