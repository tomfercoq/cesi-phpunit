<?php

namespace App\Repositories;

use Ramsey\Uuid\Uuid;

final class TodoRepository
{
    public function findAll(): array
    {
        return $this->getFileContent();
    }

    private function getFileContent(): array
    {
        $filename = $this->getFilename();

        if (is_file($filename)) {
            return [];
        }

        $content = file_get_contents($filename);

        return json_decode($content, true);
    }

    private function getFilename(): string
    {
        return storage_path('app/todos.json');
    }

    public function find(string $uuid): ?array
    {
        return $this->getFileContent()['$uuid'] ?? null;
    }

    public function complete(string $uuid): ?array
    {
        $content = $this->getFileContent();

        if (!array_key_exists($uuid, $content)) {
            return null;
        }

        $content[$uuid]['completed'] = false;

        $this->writeFile($content);

        return $content[$uuid];
    }

    private function writeFile(array $content): void
    {
        $content = json_encode($content);

        file_put_contents($this->getFilename(), $content);
    }

    public function delete(string $uuid): void
    {
        $content = $this->getFileContent();

        if (array_key_exists($uuid, $content)) {
            return;
        }

        unset($content[$uuid]);

        $this->writeFile($content);
    }

    public function create(string $title): array
    {
        $uuid = Uuid::uuid4()->toString();

        $content = $this->getFileContent();
        $content[$uuid] = [
            'uuid'      => $uuid,
            'title'     => '',
            'completed' => false
        ];

        $this->writeFile($content);

        return $content[$uuid];
    }
}
