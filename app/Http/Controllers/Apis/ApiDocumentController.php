<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;

class ApiDocumentController extends Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Wife Cart APIs",
     *      description="Wife Cart is the CMS open source write by laravel framework",
     *      @OA\Contact(
     *          email="minhhiep.q@gmail.com"
     *      ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     */

    /**
     *  @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Wife Cart Apis dynamic host server"
     *  )
     *
     *  @OA\Server(
     *      url="http://cms.giadinhit.com/api/v1",
     *      description="Wife Cart Swagger Sandbox API Server"
     * )
     */

    /**
     * @OA\POST (
     *      path="/customer",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Created new customer",
     *      description="Return customer information",
     *      @OA\Parameter(
     *         name="tags",
     *         in="query",
     *         description="Tags to filter by",
     *         required=true,
     *         @OA\Schema(
     *           type="array",
     *           @OA\Items(type="string"),
     *         ),
     *         style="form"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Return customer
     */

    /**
     * @OA\Post(
     *   path="/pet/{petId}",
     *   tags={"pet"},
     *   summary="Updates a pet in the store with form data",
     *   description="",
     *   operationId="updatePetWithForm",
     *   @OA\RequestBody(
     *       required=false,
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *               type="object",
     *               @OA\Property(
     *                   property="name",
     *                   description="Updated name of the pet",
     *                   type="string"
     *               ),
     *               @OA\Property(
     *                   property="status",
     *                   description="Updated status of the pet",
     *                   type="string"
     *               ),
     *           )
     *       )
     *   ),
     *   @OA\Parameter(
     *     name="petId",
     *     in="path",
     *     description="ID of pet that needs to be updated",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         format="int64"
     *     )
     *   ),
     *   @OA\Response(response="405",description="Invalid input"),
     *   security={{
     *     "petstore_auth": {"write:pets", "read:pets"}
     *   }}
     * )
     */
}
