<?php

namespace App\Dtos;

use App\Models\File;

class FileToView {
    public int $id;
    public string $orig_name;
    public string $description;
    public string $type;
    public string $created_at;
    public string $user_name;

    public function __construct(File $file) {
        $this->id = $file->id;
        $this->orig_name = $file->orig_name;
        $this->description = $file->description;
        $this->type = $file->type;
        $this->created_at = $file->created_at;
        $this->user_name = $file->user->name;
    }
}