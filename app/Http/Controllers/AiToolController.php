<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AiTool;

class AiToolController extends Controller
{
    /**
     * Fetch all AI tools.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Get all AI tools
        $aiTools = AiTool::all();

        // Return the AI tools as a JSON response
        return response()->json($aiTools);
    }

    /**
     * Fetch AI tools by category ID.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCategory($categoryId)
    {
        // Get AI tools by category ID
        $aiTools = AiTool::where('category_id', $categoryId)->get();

        // Check if there are any AI tools in the specified category
        if ($aiTools->isEmpty()) {
            return response()->json(['message' => 'No AI tools found in this category'], 404);
        }

        // Return the AI tools as a JSON response
        return response()->json($aiTools);
    }
}
