<?php

namespace App\Services;

use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserService
{
    /**
     * Create a new user with the provided password and send welcome email.
     * 
     * IMPORTANT SECURITY NOTES:
     * 1. Password is accepted from client (already validated in StoreUserRequest)
     * 2. Password is hashed using bcrypt before storing in database
     * 3. Plain password is ONLY sent in the welcome email
     * 4. Plain password is NEVER stored in database
     *
     * @param array $data (name, email, password, user_type, status)
     * @return array
     */
    public function createUserWithNotification(array $data): array
    {
        try {
            // Use the provided password (validated by StoreUserRequest)
            $plainPassword = $data['password'];

            // Create the user with provided password HASHED
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($plainPassword), // Hash before storing
                'user_type' => $data['user_type'] ?? 'user',
                'status' => $data['status'] ?? 'active',
            ]);

            // Send welcome email with the plain password
            Mail::to($user->email)->queue(new WelcomeUserMail($user, $plainPassword));

            return [
                'success' => true,
                'message' => 'User created successfully. Welcome email has been queued.',
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'user_type' => $user->user_type,
                ],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error creating user: ' . $e->getMessage(),
                'data' => null,
            ];
        }
    }

    /**
     * Update user details.
     *
     * @param User $user
     * @param array $data
     * @return User
     */
    public function updateUser(User $user, array $data): User
    {
        $user->update($data);

        return $user;
    }

    /**
     * Delete a user.
     *
     * @param User $user
     * @return bool
     */
    public function deleteUser(User $user): bool
    {
        return $user->delete();
    }
}
