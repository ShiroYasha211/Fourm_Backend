<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Storage;
use Validator;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'error'=> $validator->errors()->first(),
                ],422);
            }
            $user = auth()->user();
            if (!$user) {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }
        try {
        if ($request->hasFile("profile_image")) {
            if($user->profile_image) {
                $oldImagePath= str_replace("storage/","public/", $user->profile_image);
                if(Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
            }
            $file = $request->file("profile_image");
            $filename = time().'_'. preg_replace('/[^a-z0-9\.]/', '', strtolower($file->getClientOriginalName()));
            $path = $file->storeAs('profile_images', $filename, 'public');
            $user->profile_image = 'storage/' . $path;
            $user->save();
            return response([
                'message' => 'Profile image updated successfully',
                'profile_image' => $user->profile_image,
            ], 200);
            }
             return response()->json([
                'message' => 'No image uploaded'
            ], 400);
    }catch (\Exception $e) {
        return response()->json([
            'message'=> 'Error updating profile image',
            'error'=> $e->getMessage()
            ],500);
        }

    }
}
