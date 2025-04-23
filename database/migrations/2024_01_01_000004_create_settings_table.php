// 2024_01_01_000004_create_settings_table.php
public function up()
{
    Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->string('key')->unique();
        $table->text('value');
        $table->timestamps();
    });
}
