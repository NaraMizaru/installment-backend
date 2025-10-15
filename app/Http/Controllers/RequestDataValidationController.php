<?php

namespace App\Http\Controllers;

use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestDataValidationController extends Controller
{
    public function requestDataValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job' => 'required',
            'job_description' => 'required|min:6',
            'income' => 'required',
            'reason_accepted' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors()
            ], 422);
        }

        $validation = new Validation();
        $validation->job = $request->job;
        $validation->job_description = $request->job_description;
        $validation->income = $request->income;
        $validation->reason_accepted = $request->reason_accepted;
        $validation->society_id = $request->user()->id;
        $validation->validator_id = 1;
        $validation->status = 'pending';
        $validation->save();

        return response()->json([
            'message' => 'Request data validation sent successful',
        ], 201);
    }

    public function getValidations(Request $request)
    {
        $validations = Validation::where('society_id', $request->user()->id)->with('validator')->get();

        return response()->json(['validation' => $validations], 200);
    }
}
