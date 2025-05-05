<?php

namespace App\Repositories\API\V1\Auth;

use App\Helpers\Helper;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{

    /**
     * Creates a new user and their associated profile.
     *
     * Registers a user with provided credentials, creates a unique user handle,
     * and assigns a default role (or a custom role). Additionally, a profile
     * is created for the user upon registration.
     *
     * @param array $credentials The user data (first_name, last_name, email, password).
     * @param string $role The role of the user (default is 'user').
     *
     * @return User The created user object.
     *
     * @throws Exception If user creation fails.
     */
    public function createUser(array $credentials, $role = 'user'):User
    {
        try {

            // creating user
            $user = User::create([
                'first_name' => $credentials['first_name'],
                'last_name' => $credentials['last_name'],
                'handle' => Helper::generateUniqueSlug($credentials['first_name'], 'users', 'handle'),
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password']),
                'role_id' => $credentials['role_id'],
                'yacht_name' => $credentials['yacht_name'],
                'yacht_size' => $credentials['yacht_size'],
                'business_name' => $credentials['business_name'],
                'business_category' => $credentials['business_category'],
                'nationality' => $credentials['nationality'],
                'department' => $credentials['department'],
                'freelancer_name' => $credentials['freelancer_name'],
                'freelancer_category' => $credentials['freelancer_category'],

            ]);
            // creating user profile
            $user->profile()->create([]);
            return $user;
        } catch (Exception $e) {
            Log::error('UserRepository::createUser', ['error' => $e->getMessage()]);
            throw $e;
        }
    }



    /**
     * Attempts to retrieve a user by their email address.
     *
     * This method checks the provided credentials and returns the corresponding user.
     *
     * @param array $credentials The user's login credentials (email and password).
     *
     * @return User|null The user object if found, null otherwise.
     *
     * @throws Exception If there is an error during the query.
     */
    public function login(array $credentials):User|null
    {
        try {
            return User::where('email', $credentials['email'])->first();
        } catch (Exception $e) {
            Log::error('UserRepository::login', ['error' => $e->getMessage()]);
            throw $e;
        }
    }

    /**
     * Updates a user's password.
     *
     * This method takes a user's email and a new password, and updates their password in the database.
     *
     * @param string $email The user's email address.
     * @param string $newPassword The new password for the user.
     *
     * @return bool True if the password update is successful, false otherwise.
     *
     * @throws Exception If there is an error during the update query.
     */
    public function updateUser(array $credentials, User $user):void
    {
        try {
            $user->update([
                'username' => $credentials['username'],
                'phone_number' => $credentials['phone_number'],
                'email'=> $credentials['email'],
                'location' => $credentials['location'],
            ]);
        } catch (Exception $e) {
            Log::error('UserRepository::updateUser', ['error' => $e->getMessage()]);
            throw $e;
        }

    }

    public function getUser(): User
    {
        try {
            // dd('getUser');
            $user = auth()->user(); // OR: User::find(auth()->id())
            // dd($user);
            return $user;
        } catch (Exception $e) {
            Log::error('UserRepository::getUser', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
}
