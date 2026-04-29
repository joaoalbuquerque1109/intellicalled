<?php
namespace App\Services;
use App\Models\Ticket;
use Carbon\Carbon;
class TicketNumberGenerator {
    public function next(int $companyId, int $serviceId): int {
        $today = Carbon::today();
        $last = Ticket::withoutGlobalScopes()->where('company_id',$companyId)->where('service_id',$serviceId)->whereDate('created_at',$today)->max('number');
        return ($last ?? 0) + 1;
    }
}
