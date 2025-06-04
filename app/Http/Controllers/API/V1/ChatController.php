<?php

namespace App\Http\Controllers\API\V1;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
     /**
     ** Get messages between the authenticated user and another user
     *
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function GetMessages(User $user, Request $request): JsonResponse {
        try {
            $authUser = $request->user();

            if (!$authUser) {
                return response()->json(['success' => false, 'message' => 'User not authenticated', 'status' => 401]);
            }

            $authUserId = $authUser->id;
// dd($authUserId);
            $messages = Message::where(function ($query) use ($authUserId, $user) {
                $query->where('sender_id', $authUserId)
                    ->where('receiver_id', $user->id);
            })

                ->orWhere(function ($query) use ($authUserId, $user) {
                    $query->where('sender_id', $user->id)
                        ->where('receiver_id', $authUserId);
                })
                ->with([
                    'sender:id,first_name,avatar',
                    'receiver:id,first_name,avatar',
                ])
                ->orderByDesc('id')
                ->get();
                // dd($messages);

            return $this->success(200, 'Messages retrieved successfully', $messages);
        } catch (Exception $e) {
            Log::error('Error retrieving messages: ' . $e->getMessage(), ['exception' => $e]);
            throw $e;
        }
    }

    /**
     *! Send a message to another user
     *
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    // public function SendMessage(User $user, Request $request): JsonResponse {
    //     try {
    //         $validatedData = $request->validate([
    //             'message' => 'required',
    //         ], [
    //             'message.required' => 'The message field is required.',
    //         ]);

    //         $message = Message::create([
    //             'sender_id'   => $request->user()->id,
    //             'receiver_id' => $user->id,
    //             'text'        => $validatedData['message'],
    //         ]);

    //         //* Load the sender's information
    //         $message->load('sender:id,name,avatar');

    //         broadcast(new MessageSent($message))->toOthers();

    //         return Helper::jsonResponse(true, 'Message sent successfully', 200, new MessageResource($message));
    //     } catch (Exception $e) {
    //         Log::error('Error sending message: ' . $e->getMessage(), ['exception' => $e]);
    //         return Helper::jsonResponse(false, 'An error occurred while sending the message: ' . $e->getMessage(), 500);
    //     }
    // }
    public function SendMessage(User $user, Request $request): JsonResponse {
        // dd('hi');
        try {
            $validatedData = $request->validate([
                'message' => 'required',
            ],
            [
                'message.required' => 'The message field is required.',
            ]);
// dd($validatedData);
            // Create the new message
            $message = Message::create([
                'sender_id'   => $request->user()->id,
                'receiver_id' => $user->id,
                'text'        => $validatedData['message'],
            ]);
            // dd($message);
// dd
            // Load sender's info for the response
            $message->load('sender:handle,first_name,avatar');
// dd($message);
            // Broadcast the new message event (so chat windows update)
            broadcast(new MessageSent($message))->toOthers();

            // Prepare conversation data to update the conversation list in realtime
            $timestamp =$message->created_at->toDateTimeString();

    // For the sender’s conversation list: the conversation is with the receiver.
    $senderConversation = [
        'user_id'      => $request->user()->id,
        'with_user'    => $user->id,
        'last_message' => $message->text,
        'timestamp'    => $timestamp,
    ];

    // For the receiver’s conversation list: the conversation is with the sender.
    $receiverConversation = [
        'user_id'      => $user->id,
        'with_user'    => $request->user()->id,
        'last_message' => $message->text,
        'timestamp'    => $timestamp,
    ];

    // Broadcast conversation update events to both users
    // broadcast(new ConversationUpdated($senderConversation))->toOthers();
    // broadcast(new ConversationUpdated($receiverConversation))->toOthers();

    return $this->success(200, 'Message sent successfully', $message);
} catch (Exception $e) {
    Log::error('Error sending message: ' . $e->getMessage(), ['exception' => $e]);
    throw $e;
}
}

/**
*? Get users with the last message between them and the authenticated user
*
* @param Request $request
* @return JsonResponse
*/
public function getUsersWithLastMessage(Request $request): JsonResponse {
try {
    $authUser = $request->user();

    if (!$authUser) {
        return $this->error(404, 'User not found.');
    }

    $userId = $authUser->id;

    $subQuery = Message::query()
        ->select('sender_id', DB::raw('MAX(id) as last_message_id'))
        ->where('receiver_id', $userId)
        ->where('sender_id', '!=', $userId)
        ->groupBy('sender_id');

    $messages = Message::query()
        ->joinSub($subQuery, 'latest_messages', function ($join) {
            $join->on('messages.id', '=', 'latest_messages.last_message_id');
        })
        ->with(['sender:id,first_name,last_name,avatar'])
        ->orderByDesc('messages.id')
        ->get();

    return $this->success(200, 'Users with last message retrieved successfully', $messages);
} catch (Exception $e) {
    Log::error('Error retrieving users with last message: ' . $e->getMessage(), ['exception' => $e]);
    throw $e;
}
}
}
