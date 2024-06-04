<?php

namespace App\Http\Controllers;

use App\Actions\CreateIp;
use App\Models\IpAssignment;
use App\Http\Requests\StoreIpAssignmentRequest;
use App\Http\Requests\UpdateIpAssignmentRequest;
use App\Http\Resources\IpAssignmentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IpAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('rowsPerPage', 15);

        $data = IpAssignment::sortBy($request)
            ->searchBy($request)
            ->paginate($perPage)
            ->withQueryString();

        return IpAssignmentResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIpAssignmentRequest $request, CreateIp $createIp)
    {
        $input = $request->validated();
        $ip = $createIp->handle($input);
        
        return new JsonResponse(
            [
                'ip' => IpAssignmentResource::make($ip),
                'message' => 'IP Assignment created successfully.',
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(IpAssignment $ipAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIpAssignmentRequest $request, IpAssignment $ipAssignment)
    {
        $input = $request->validated();
        $ipAssignment->update($input);
        return new JsonResponse(
            [
                'ip_assignment' => IpAssignmentResource::make($ipAssignment),
                'message' => 'IP Assignment updated successfully.',
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IpAssignment $ipAssignment)
    {
        //
    }
}
