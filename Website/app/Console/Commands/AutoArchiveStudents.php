<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\MedicalHistory;
use App\Models\DentalChart;
use App\Models\DentalExamination;
use App\Models\TreatmentRecord;
use App\Models\User;
use Carbon\Carbon;

class AutoArchiveStudents extends Command
{
    protected $signature = 'auto-archive:students';
    protected $description = 'Auto archive students and related records whose last visit was more than 5 years ago';

    public function handle()
    {

        $cutoffDate = now()->subYears(5);

        $studentsToArchive = Student::where('updated_at', '<', $cutoffDate)
            ->whereNull('archived_at')
            ->get();

        foreach ($studentsToArchive as $student) {
            $this->archiveStudent($student);
        }

        $this->info(count($studentsToArchive) . ' students and related records auto-archived successfully.');
    }

    protected function archiveStudent(Student $student)
    {
        $now = now();

        $student->archived_at = $now;
        $student->save();

        $student->medicals()->update([
            'archived_at' => $now,
        ]);

        $student->charts()->update([
            'archived_at' => $now,
        ]);

        $student->examinations()->update([
            'archived_at' => $now,
        ]);

        $student->treatments()->update([
            'archived_at' => $now,
        ]);

        $student->user->appointments()->update([
            'archived_at' => $now,
        ]);

        $student->user()->update([
            'is_active' => false,
        ]);
    }
}
