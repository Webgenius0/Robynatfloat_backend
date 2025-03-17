<?php

namespace App\Repositories\Web\Backend\V1\Blog;

use App\Http\Requests\Web\Backend\V1\Dropdown\Blog\BlogRequest;
use App\Models\Blog;

interface BlogRepositoryInterface
{
    // Define the methods your repository should implement
    public function blogList(): mixed;
    public function storeBlog(array $data): mixed;
    public function updateBlog(array $credentials, Blog $blog): mixed;
    public function deleteBlog(Blog $blog): mixed;
}
