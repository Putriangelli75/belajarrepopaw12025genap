<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $this->rebuildBookingsTable(
            "'pending', 'menunggu_verifikasi', 'disetujui', 'ditolak'",
            'CASE WHEN "status" = \'lunas\' THEN \'disetujui\' ELSE "status" END'
        );
    }

    public function down(): void
    {
        $this->rebuildBookingsTable(
            "'pending', 'menunggu_verifikasi', 'lunas', 'ditolak'",
            'CASE WHEN "status" = \'disetujui\' THEN \'lunas\' ELSE "status" END'
        );
    }

    private function rebuildBookingsTable(string $allowedStatuses, string $statusExpression): void
    {
        Schema::withoutForeignKeyConstraints(function () use ($allowedStatuses, $statusExpression): void {
            DB::statement('DROP TABLE IF EXISTS "bookings_new"');

            DB::statement(<<<SQL
CREATE TABLE "bookings_new" (
    "id" integer primary key autoincrement not null,
    "user_id" integer not null,
    "lapangan_id" integer not null,
    "tanggal" date not null,
    "jam_mulai" time not null,
    "jam_selesai" time not null,
    "total_harga" integer not null,
    "status" varchar check ("status" in ($allowedStatuses)) not null default 'pending',
    "created_at" datetime,
    "updated_at" datetime,
    foreign key("user_id") references "users"("id") on delete cascade,
    foreign key("lapangan_id") references "lapangans"("id") on delete cascade
)
SQL);

            DB::statement(<<<SQL
INSERT INTO "bookings_new" (
    "id",
    "user_id",
    "lapangan_id",
    "tanggal",
    "jam_mulai",
    "jam_selesai",
    "total_harga",
    "status",
    "created_at",
    "updated_at"
)
SELECT
    "id",
    "user_id",
    "lapangan_id",
    "tanggal",
    "jam_mulai",
    "jam_selesai",
    "total_harga",
    $statusExpression,
    "created_at",
    "updated_at"
FROM "bookings"
SQL);

            DB::statement('DROP TABLE "bookings"');
            DB::statement('ALTER TABLE "bookings_new" RENAME TO "bookings"');
        });
    }
};
