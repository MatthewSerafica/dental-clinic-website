<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use Carbon\Carbon;

class AutoArchiveEmployees extends Command
{
    protected $signature = 'auto-archive:employees';
    protected $description = 'Auto archive employees and related records whose last visit was more than 5 years ago';

    public function handle()
    {

        $cutoffDate = now()->subYears(5);

        $employeesToArchive = Employee::where('updated_at', '<', $cutoffDate)
            ->whereNull('archived_at')
            ->get();

        foreach ($employeesToArchive as $employee) {
            $this->archiveEmployee($employee);
        }

        $this->info(count($employeesToArchive) . ' employees and related records auto-archived successfully.');
    }

    protected function archiveEmployee(Employee $employee)
    {
        $now = now();

        $employee->archived_at = $now;
        $employee->save();

        $employee->medicals()->update(['archived_at' => $now]);
        $employee->charts()->update(['archived_at' => $now]);
        $employee->examinations()->update(['archived_at' => $now]);
        $employee->treatments()->update(['archived_at' => $now]);

        $employee->user()->update([
            'is_active' => false,
        ]);
    }
}
