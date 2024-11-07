<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function test()
    {
        $ai_tools = [
            [
                "id" => 1,
                "name" => "ChatGPT",
                "description" => "A conversational AI model by OpenAI for generating human-like responses.",
                "category" => "Natural Language Processing",
                "website" => "https://chat.openai.com"
            ],
            [
                "id" => 2,
                "name" => "DALL-E",
                "description" => "An AI model that generates images from text descriptions, also by OpenAI.",
                "category" => "Image Generation",
                "website" => "https://openai.com/dall-e"
            ],
            [
                "id" => 3,
                "name" => "Midjourney",
                "description" => "An AI tool that creates high-quality images from textual prompts, widely used for art.",
                "category" => "Art Generation",
                "website" => "https://www.midjourney.com"
            ]
        ];                
        return response()->json($ai_tools);
    }
}
