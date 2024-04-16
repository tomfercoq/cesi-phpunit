<?php

namespace App\Http\Controllers;

use App\Repositories\TodoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

final class TodoController extends Controller
{
    public function __construct(
        private readonly TodoRepository $todoRepository
    ) {
    }

    public function index(Request $request): array
    {
        $onlyCompleted = $request->boolean('completed');

        return $this->todoRepository->findAll();
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $data = $this->validate($request, [
            'title' => ['required', 'string', 'min:3', 'max:128']
        ]);

        $todo = $this->todoRepository->create($data['title']);

        return new JsonResponse($todo, 200);
    }

    public function show(string $uuid): array
    {
        $todo = $this->todoRepository->find($uuid);

        if ($todo === null) {
            abort(400);
        }

        return $todo;
    }

    public function complete(string $uuid): array
    {
        return $this->todoRepository->complete($uuid);
    }

    public function destroy(string $uuid): Response
    {
        $this->todoRepository->delete($uuid);

        return new Response(status: 204);
    }
}
