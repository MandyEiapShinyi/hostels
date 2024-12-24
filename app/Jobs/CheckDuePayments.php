<?php
namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\PaymentReminder;

class CheckDuePayments implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        // No need to fetch students here, we will do it in the handle() method
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $currentDate = Carbon::now();
        $sixMonthsAgo = $currentDate->subMonths(6);

        // Fetch students whose 'payment_due_date' is earlier than or equal to six months ago
        $dueStudents = Student::where('date', '<=', $sixMonthsAgo)
                              ->get();

                            

        foreach ($dueStudents as $student) {
            // Send reminder email to each due student
            $this->sendReminderEmail($student);
        }
    }

    /**
     * Send reminder email to the student.
     *
     * @param \App\Models\Student $student
     * @return void
     */
    public function sendReminderEmail($student)
    {
        $details = [
            'name' => $student->user->name,
            'due_date' => Carbon::parse($student->date),
            'amount' => $student->room->room_fee,
        ];
        

        Mail::to($student->email)->send(new PaymentReminder($details));
    }

}
