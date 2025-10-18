<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\InstallmentApplySociety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstallmentController extends Controller
{
    public function getInstallment(Request $request)
    {
        $validation = $request->user()->validations()->where('status', 'accepted')->first();
        if (!$validation) {
            return response()->json(['message' => 'No accepted validation found'], 404);
        }

        $installment = Installment::with('brand', 'availableMonth')->get();

        $response = $installment->map(function ($item) {
           return [
               'id' => $item->id,
               'car' => $item->brand->brand,
               'brand' => $item->car,
               'price' => $item->price,
               'available_months' => $item->availableMonth->map(function ($month) {
                   return [
                       'month' => $month->month,
                       'description' => $month->description,
                   ];
               })
           ];
        });

        return response()->json(['cars' => $response], 200);
    }

    public function getInstallmentById(Installment $installment)
    {
        $installment->load('brand', 'availableMonth');

        $response = [
            'id' => $installment->id,
            'car' => $installment->car,
            'brand' => $installment->brand->brand,
            'price' => $installment->price,
            'available_months' => $installment->availableMonth->map(function ($month) {
                return [
                    'month' => $month->month,
                    'description' => $month->description,
                ];
            })
        ];

        return response()->json(['installment' => $response], 200);
    }

    public function applyInstallment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'installment_id' => 'required|exists:installments,id',
            'months' => 'required',
            'notes' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors()
            ], 422);
        }

        $validation = $request->user()->validations()->where('status', 'accepted')->first();
        if (!$validation) {
            return response()->json(['message' => 'No accepted validation found'], 404);
        }

        $apply = new InstallmentApplySociety();
        $apply->notes = $request->notes;
        $apply->available_month_id = $request->months;
        $apply->date = date('Y-m-d');
        $apply->society_id = $request->user()->id;
        $apply->installment_id = $request->installment_id;
        $apply->status = 'pending';
        $apply->save();

        return  response()->json(['message' => 'Applying for Instalment successful'], 201);
    }

    public function getApplications()
    {
        $installments = InstallmentApplySociety::with('brand', 'availableMonth', 'installment')->get();

        $response = $installments->map(function ($item) {
            return [
                'installment' => [
                    'id' => $item->installment->id,
                    'car' => $item->installment->car,
                    'brand' => $item->installment->brand->brand,
                    'price' => $item->installment->price,
                    'description' => $item->installment->description,
                    'application' => [
                        'month' => $item->availableMonth->month,
                        'nominal' => $item->availableMonth->nominal,
                        'apply_status' => $item->status,
                        'notes' => $item->notes
                    ],
                ]
            ];
        });

        return response()->json($response, 200);
    }
}
