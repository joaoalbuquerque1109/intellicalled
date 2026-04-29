<?php
namespace App\Actions;
use App\Models\Ticket;use App\Services\TicketNumberGenerator;
class IssueTicketAction { public function __construct(private TicketNumberGenerator $numbers) {} public function execute(array $data): Ticket { $number=$this->numbers->next(auth()->user()->company_id,$data['service_id']); return Ticket::create(['branch_id'=>$data['branch_id'],'service_id'=>$data['service_id'],'queue_id'=>$data['queue_id'],'number'=>$number,'code'=>$data['prefix'].str_pad((string)$number,3,'0',STR_PAD_LEFT),'priority'=>$data['priority'] ?? false,'status'=>'issued','issued_at'=>now()]); }}
