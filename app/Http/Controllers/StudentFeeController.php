<?php

namespace App\Http\Controllers;

use App\Models\PaymentReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\User;

class StudentFeeController extends Controller
{
    public function uploadPayment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required|mimes:pdf,png,jpg,jpeg,gif|max:2048',
            'user_id' => 'required',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Store the image in the 'payment_receipts' directory under 'public' disk
            $imagePath = $image->store('image', 'public');
            // dd($imagePath);

            // Find the student by the ID and associate the payment receipt with the student
            // $student = Student::find($request->user_id);
            $paymentReceipt = new PaymentReceipt();
            $paymentReceipt->user_id= $request->user_id;
            $paymentReceipt->image = $imagePath;
            $paymentReceipt->date = $request->date;
            $paymentReceipt->save(); // Save the path to the student record

            $user = User::find($request->user_id);
            $student=Student::find($user->student->id);    
            $student->date=$request->date;
            $student->save();

            return redirect('/admin_show')->with('success', 'Payment receipt uploaded successfully!')->with("page","fees");
        }

        return back()->with('error', 'There was an error uploading the file.');
    }

    public function destroy($id)
    {
        $student = PaymentReceipt::findOrFail($id);
        $student->delete();

        return redirect('/admin_show')->with('success', 'Payment Receipt deleted successfully!')->with("page","history");
    }
    
}
