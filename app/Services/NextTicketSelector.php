<?php
namespace App\Services;
use App\Models\Ticket;
class NextTicketSelector {
    public function forBranch(int $companyId, int $branchId): ?Ticket {
        return Ticket::query()->where('company_id',$companyId)->where('branch_id',$branchId)->whereIn('status',['issued','recalled'])
            ->orderByDesc('priority')->orderBy('created_at')->first();
    }
}
