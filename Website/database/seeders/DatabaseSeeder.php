<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Dentist;
use DateInterval;
use DateTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* \App\Models\User::factory(10)
            ->has(Student::factory(10))
            ->create(); */


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = [
            [
                'name' => 'Doe, John',
                'user_type' => 'dentist',
                'email' => 'dentist1@slu.edu.ph',
                'password' => '!dentist1'
            ],
            [
                'name' => 'Admin',
                'user_type' => 'admin',
                'email' => 'dentaladmin@slu.edu.ph',
                'password' => '!dentaladmin',
            ],
            [
                'name' => 'Doe, Jane',
                'user_type' => 'dentist',
                'email' => 'dentist2@slu.edu.ph',
                'password' => '!dentist2'
            ],
            [
                'name' => 'Doe, James',
                'user_type' => 'dentist',
                'email' => 'dentist3@slu.edu.ph',
                'password' => '!dentist3'
            ],
            [
                'name' => 'Assistant 1',
                'user_type' => 'assistant',
                'email' => 'assistant1@slu.edu.ph',
                'password' => '!assistant1'
            ],
            [
                'name' => 'Assistant 2',
                'user_type' => 'assistant',
                'email' => 'assistant2@slu.edu.ph',
                'password' => '!assistant2'
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::factory()->create($user);
        }

        $dentists = [
            [
                'user_id' => 1,
                'last_name' => 'Doe',
                'first_name' => 'John',
                'middle_name' => '',
                'contact_number' => '09328342505',
            ],
            [
                'user_id' => 3,
                'last_name' => 'Doe',
                'first_name' => 'Jane',
                'middle_name' => '',
                'contact_number' => '09328342505',
            ],
            [
                'user_id' => 4,
                'last_name' => 'Doe',
                'first_name' => 'James',
                'middle_name' => '',
                'contact_number' => '09328342505',
            ],
        ];

        foreach ($dentists as $dentist) {
            Dentist::factory()->create($dentist);
        }



        $assistants = [
            [
                'user_id' => 5,
                'name' => 'Assistant 1',
            ],
            [
                'user_id' => 6,
                'name' => 'Assistant 2',
            ],
        ];

        foreach ($assistants as $assistant) {
            \App\Models\Assistant::create($assistant);
        }

        $schools = [
            ['school' => 'SAMCIS'],
            ['school' => 'SAS'],
            ['school' => 'SEA'],
            ['school' => 'SOL'],
            ['school' => 'SOM'],
            ['school' => 'SONAHBS'],
            ['school' => 'STELA'],
        ];

        foreach ($schools as $school) {
            \App\Models\School::create($school);
        }

        $departments = [
            ['departments' => 'SAMCIS'],
            ['departments' => 'SAS'],
            ['departments' => 'SEA'],
            ['departments' => 'SOL'],
            ['departments' => 'SOM'],
            ['departments' => 'SONAHBS'],
            ['departments' => 'STELA'],
            ['departments' => 'Non-teaching'],
        ];

        foreach ($departments as $department) {
            \App\Models\Department::create($department);
        }

        $courses = [
            ['school_id' => 1, 'course' => 'BSAC'],
            ['school_id' => 1, 'course' => 'BSMA'],
            ['school_id' => 1, 'course' => 'BSBA FIN MAN-BA'],
            ['school_id' => 1, 'course' => 'BSBA MKTG MGMT BA'],
            ['school_id' => 1, 'course' => 'BS ENTREP BA'],
            ['school_id' => 1, 'course' => 'BSTM'],
            ['school_id' => 1, 'course' => 'BSHM'],
            ['school_id' => 1, 'course' => 'BSCS'],
            ['school_id' => 1, 'course' => 'BSIT'],
            ['school_id' => 1, 'course' => 'BSMMA'],
            ['school_id' => 2, 'course' => 'Ph.D. in Management'],
            ['school_id' => 2, 'course' => 'MBA'],
            ['school_id' => 2, 'course' => 'Master of Entrepreneurship'],
            ['school_id' => 2, 'course' => 'MSA'],
            ['school_id' => 2, 'course' => 'MSBA'],
            ['school_id' => 2, 'course' => 'MSPM'],
            ['school_id' => 2, 'course' => 'MIT'],
            ['school_id' => 2, 'course' => 'MLIS'],
            ['school_id' => 2, 'course' => 'MSSME'],
            ['school_id' => 2, 'course' => 'Doctor of Engineering'],
            ['school_id' => 2, 'course' => 'MMEM'],
            ['school_id' => 2, 'course' => 'MAEHP'],
            ['school_id' => 2, 'course' => 'ME in ChE'],
            ['school_id' => 2, 'course' => 'ME in EE'],
            ['school_id' => 2, 'course' => 'ME in ECE'],
            ['school_id' => 2, 'course' => 'ME in IE'],
            ['school_id' => 2, 'course' => 'ME in ME'],
            ['school_id' => 2, 'course' => 'MSEE'],
            ['school_id' => 2, 'course' => 'MSME'],
            ['school_id' => 2, 'course' => 'Ph.D. in Philosophy'],
            ['school_id' => 2, 'course' => 'Ph.D. in Psychology'],
            ['school_id' => 2, 'course' => 'MA in Philosophy'],
            ['school_id' => 2, 'course' => 'MA in Religious Studies'],
            ['school_id' => 2, 'course' => 'MSGC'],
            ['school_id' => 2, 'course' => 'MS Psych'],
            ['school_id' => 2, 'course' => 'Ph.D. in Biology'],
            ['school_id' => 2, 'course' => 'Ph.D. in Pharmacy'],
            ['school_id' => 2, 'course' => 'Master in Environmental Sciences'],
            ['school_id' => 2, 'course' => 'MS in Biology'],
            ['school_id' => 2, 'course' => 'MSECB'],
            ['school_id' => 2, 'course' => 'MSMT'],
            ['school_id' => 2, 'course' => 'MS in Pharm'],
            ['school_id' => 2, 'course' => 'MSPH'],
            ['school_id' => 2, 'course' => 'Ph.D. in Nursing'],
            ['school_id' => 2, 'course' => 'MS in Nursing'],
            ['school_id' => 2, 'course' => 'Ph.D. in Ed. (Science Ed.)'],
            ['school_id' => 2, 'course' => 'Ph.D. in Ed. (Ed. Mgmt.)'],
            ['school_id' => 2, 'course' => 'Ph.D. in Ed. (Language Ed.)'],
            ['school_id' => 2, 'course' => 'MA in CE (Leadership & Mgmt.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Early Childhood Ed.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Filipino Ed.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Inclusive Ed.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Language Ed.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Math Ed.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Science Ed.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Social Studies)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Ed. Mgmt.)'],
            ['school_id' => 2, 'course' => 'MA in Ed. (Special Ed.)'],
            ['school_id' => 2, 'course' => 'MSPES'],
            ['school_id' => 3, 'course' => 'BS Arch'],
            ['school_id' => 3, 'course' => 'BSChE'],
            ['school_id' => 3, 'course' => 'BSCE'],
            ['school_id' => 3, 'course' => 'BSEE'],
            ['school_id' => 3, 'course' => 'BSECE'],
            ['school_id' => 3, 'course' => 'BSGE'],
            ['school_id' => 3, 'course' => 'BSIE'],
            ['school_id' => 3, 'course' => 'BSME'],
            ['school_id' => 3, 'course' => 'BSMECE'],
            ['school_id' => 3, 'course' => 'BSEM'],
            ['school_id' => 4, 'course' => 'Juris Doctor'],
            ['school_id' => 4, 'course' => 'Masters of Law'],
            ['school_id' => 5, 'course' => 'Doctor of Medicine'],
            ['school_id' => 6, 'course' => 'BS Bio'],
            ['school_id' => 6, 'course' => 'BSMLS'],
            ['school_id' => 6, 'course' => 'BSN'],
            ['school_id' => 6, 'course' => 'BS Pharm'],
            ['school_id' => 6, 'course' => 'BSRT'],
            ['school_id' => 7, 'course' => 'BA COM'],
            ['school_id' => 7, 'course' => 'BA PHILO'],
            ['school_id' => 7, 'course' => 'BA POL SCI'],
            ['school_id' => 7, 'course' => 'BS PYSCH'],
            ['school_id' => 7, 'course' => 'BSSWK '],
            ['school_id' => 7, 'course' => 'BEED'],
            ['school_id' => 7, 'course' => 'BSED (English)'],
            ['school_id' => 7, 'course' => 'BSED (Filipino)'],
            ['school_id' => 7, 'course' => 'BSED (Math)'],
            ['school_id' => 7, 'course' => 'BSED (Science)'],
            ['school_id' => 7, 'course' => 'BSED (Social Studies)'],
            ['school_id' => 7, 'course' => 'BSNEd'],
            ['school_id' => 7, 'course' => 'BSSWK'],
            ['school_id' => 7, 'course' => 'BPEd'],
        ];

        foreach ($courses as $course) {
            \App\Models\Course::create($course);
        }

        $services = [
            ['services' => 'Annual Check-up', 'annual' => 1, 'employee' => 1],
            ['services' => 'Consultation', 'regular' => 1, 'employee' => 1],
            ['services' => 'Excuse Slip', 'regular' => 1],
            ['services' => 'Extraction', 'regular' => 1, 'employee' => 1],
            ['services' => 'Internship/OJT', 'regular' => 1],
            ['services' => 'Varsity/Athlete', 'regular' => 1],
            ['services' => 'Employment', 'employee' => 1],
            ['services' => 'Emergency Case', 'regular' => 1, 'employee' => 1],
            ['services' => 'Others', 'regular' => 1, 'employee' => 1],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }

        /* function createTimeSlots(DateTime $startTime, DateTime $endTime, DateInterval $interval, DateTime $excludeStart, DateTime $excludeEnd)
        {
            $timeSlots = [];
            while ($startTime <= $endTime) {
                if ($startTime < $excludeStart || $startTime >= $excludeEnd) {
                    $timeSlots[] = $startTime->format('H:i:s');
                }
                $startTime->add($interval);
            }
            return $timeSlots;
        }

        function createAvailability(array $days, array $timeSlots, $dentistId)
        {
            $times = [];
            foreach ($days as $day) {
                foreach ($timeSlots as $slot) {
                    $times[] = ['days' => $day, 'time' => $slot, 'dentist_id' => $dentistId];
                }
            }
            return $times;
        }

        $timeSlots = createTimeSlots(new DateTime('08:00:00'), new DateTime('16:00:00'), new DateInterval('PT30M'), new DateTime('11:00:01'), new DateTime('12:59:59'));
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        $dentistIds = Dentist::pluck('dentist_id');
        foreach ($dentistIds as $dentistId) {
            $times = createAvailability($days, $timeSlots, $dentistId);
            foreach ($times as $time) {
                \App\Models\DentistAvailability::create($time);
            }
        } */

    }
}
