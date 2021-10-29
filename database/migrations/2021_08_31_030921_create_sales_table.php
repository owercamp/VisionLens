<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sales', function (Blueprint $table) {
      $table->id();
      $table->string('sal_ide', 20);
      $table->string('sal_name', 50);
      $table->string('sal_pho', 20);
      $table->string('sal_add', 50);
      $table->string('sal_fact');
      $table->string('sal_ema');
      $table->string('sal_total');
      $table->string('sal_qua');
      $table->string('sal_vqua');
      $table->text('sal_obs');
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
    Schema::dropIfExists('sales');
  }
}
