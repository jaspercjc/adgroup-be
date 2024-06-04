<?php

namespace App\Actions;

use App\Models\IpAssignment;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UpdateIp
{
    use AsAction;

    public function handle(IpAssignment $ip, array $data): IpAssignment
    {
        DB::beginTransaction();
        try {
            $oldData = $ip->toArray();
            $ip->update($data);

            $ip->logs()->create([
                'action' => 'Updated IP record '.$ip->ip_address.' assignment from '.$oldData['assignment'].' to '.$ip->assignment.'.',
                'user_id' => auth()->id(),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $ip;
    }
}
