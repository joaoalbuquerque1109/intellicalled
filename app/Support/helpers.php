<?php

if (! function_exists('currentTenant')) {
    function currentTenant(): array
    {
        $user = auth()->user();

        return [
            'company_id' => $user?->company_id,
            'branch_id' => $user?->branch_id,
        ];
    }
}
