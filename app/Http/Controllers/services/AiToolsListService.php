<?php

namespace App\Http\Controllers\Services;  // Namespace declaration should be the first statement

use App\Models\AiTool;
use App\Models\AiCategory;
use Illuminate\Support\Facades\DB;

class AiToolsListService
{
    /**
     * Fetch all AI tools.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listAiTools()
    {
        // Get all AI tools
        // $aiTools = AiTool::all();
        $aiTools = DB::table('ai_tools')
            ->join('categories', 'ai_tools.category_id', '=', 'categories.id') // Join on category_id
            ->select(
                'ai_tools.id',
                'ai_tools.name',
                'ai_tools.description',
                'ai_tools.image',
                'ai_tools.link',
                'ai_tools.usage',
                'categories.name as category_name', // Select category name instead of category_id
                'ai_tools.created_at',
                'ai_tools.updated_at'
            )
            ->get(); // Fetch all the results

        // Return the AI tools as a JSON response
        return response()->json($aiTools);
    }
    public function getByTool($id){
        $aiTools = AiTool::where('id', $id)->get(); // Assuming category_id is the column in your table
    
        if ($aiTools->isEmpty()) {
            return response()->json(['message' => 'No tools found for this AiTool'], 404);
        } else {
            return response()->json($aiTools);
        }  
    }
    public function aiToolsByCategory($id)
    {

       $aiTools = AiCategory::where('id', $id)->get(); // Assuming category_id is the column in your table
    
    if ($aiTools->isEmpty()) {
        return response()->json(['message' => 'No tools found for this category'], 404);
    } else {
        return response()->json($aiTools);
    }

    }


    public function update_tool($request, $id)
    {
        $tool = AiTool::find($id);

        if (!$tool) {
            return [
                'error' => 'tool not found',
                'status' => 404,
            ];
        }

        // Update the tool data
        $tool->name = $request->name;
        $tool->description = $request->description;
        $tool->link = $request->link;
        $tool->usage = $request->usage;
        $tool->updated_at = now();
        $tool->save();

        return [
            'message' => 'Tool updated successfully',
            'tool' => $tool,
        ];
    }

    public function updateCat($request, $id)
    {
        $category = AiCategory::find($id);

        if (!$category) {
            return [
                'error' => 'Category not found',
                'status' => 404,
            ];
        }

        // Update the category data
        $category->name = $request->name;
        $category->description = $request->description;
        $category->updated_at = now();
        $category->save();

        return [
            'message' => 'Category updated successfully',
            'category' => $category,
        ];
    }

    
    public function delete_tool($request, $id)

    {
        $category = AiTool::find($request->id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Delete the Tool
        $category->delete();

        return response()->json([
            'message' => 'Tool deleted successfully',
        ]);
    }
    public function deleteCat($request, $id)

    {
        $category = AiCategory::find($request->id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Delete the category
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
        ]);
    }

}
