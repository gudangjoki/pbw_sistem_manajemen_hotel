<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function assign_role(Request $request)
    {
        $data = $request->json()->all();
    
        $email = $data['email'];
        $role_id = $data['role_id'];
    
        $role = Role::find($role_id);
        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }
    
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['error' => 'Email not found'], 404);
        }
    
        $roleUserExists = DB::table('role_user')
            ->where('email', $email)
            ->where('role_id', $role_id)
            ->exists();
    
        if ($roleUserExists) {
            return response()->json(['error' => 'Bad Request, email and role already assigned'], 400);
        }
    
        try {
            DB::table('role_user')->insert(['email' => $email, 'role_id' => $role_id]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to insert role', 'message' => $e->getMessage()], 500);
        }
    
        return response()->json(['message' => 'Role assigned successfully', 'role' => $role], 200);
    }    

    public function delete_role(Request $request)
    {
        $data = $request->json()->all();
        $email = $data['email'];
        $role_id = $data['role_id'];
    
        $roleUserExists = DB::table('role_user')
            ->where('email', $email)
            ->where('role_id', $role_id)
            ->exists();
    
        if (!$roleUserExists) {
            return response()->json(['error' => 'Role assignment not found'], 404);
        }
    
        DB::table('role_user')
            ->where('email', $email)
            ->where('role_id', $role_id)
            ->delete();
    
        return response()->json(['message' => 'Role deleted'], 200);
    }
}