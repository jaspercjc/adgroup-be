<?php

namespace App\Actions;

use App\Models\IpAssignment;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateIp
{
    use AsAction;

    public function handle(array $data): IpAssignment
    {
        DB::beginTransaction();
        try {
            $ip = IpAssignment::create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        $ip->refresh();
        return $ip;
    }
}
