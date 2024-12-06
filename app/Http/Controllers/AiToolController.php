<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Http\Controllers\services\AiToolsListService;


class AiToolController extends Controller
{
    protected $AiToolsListService;

    /**
     * Inject AiToolsListService into the controller.
     *
     * @param AiToolsListService $AiToolsListService
     */
    public function __construct(AiToolsListService $AiToolsListService)
    {
        $this->AiToolsListService = $AiToolsListService;
    }
    /**
     * Fetch all AI tools.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $AiToolsList = $this->AiToolsListService->listAiTools();
        return response()->json($AiToolsList);
    }

    /**
     * Fetch AI tools by category ID.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCategory($id)
    {
        $aiTools = $this->AiToolsListService->aiToolsByCategory($id);
        return response()->json($aiTools);
    }
    public function getAiToolById($id)
    {
        $aiTool = $this->AiToolsListService->getByTool($id);
        return response()->json($aiTool);
    }


    public function updateTool(Request $request, $id)
    {
        // dd($request);
        $updateTool = $this->AiToolsListService->update_tool($request, $id);

        return response()->json($updateTool);
    }

    public function updateCategory(Request $request, $id)
    {
        // dd($request);
        $updateTool = $this->AiToolsListService->updateCat($request, $id);

        return response()->json($updateTool);
    }


    public function deleteTool(Request $request)
    {

        $updateTool = $this->AiToolsListService->delete_tool($id);

        return response()->json($updateTool);
        // Find the category by ID
       

    }

    public function deleteCategory(Request $request)
    {

        $updateTool = $this->AiToolsListService->deleteCat($id);

        return response()->json($updateTool);
        // Find the category by ID
       

    }

    
}
