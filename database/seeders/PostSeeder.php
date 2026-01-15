<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Chào mừng đến với Laravel',
                'content' => 'Laravel là một PHP framework mạnh mẽ và dễ sử dụng. Nó cung cấp nhiều tính năng tuyệt vời như Eloquent ORM, Blade templating, routing đơn giản, và nhiều hơn nữa. Laravel giúp bạn xây dựng ứng dụng web nhanh chóng và hiệu quả.',
                'author' => 'Admin',
                'published' => true,
            ],
            [
                'title' => 'Eloquent ORM - Làm việc với Database',
                'content' => 'Eloquent là ORM (Object-Relational Mapping) của Laravel, giúp bạn làm việc với database một cách dễ dàng. Thay vì viết SQL queries, bạn có thể sử dụng các phương thức PHP để thao tác với dữ liệu. Ví dụ: User::all(), Post::find(1), $post->save().',
                'author' => 'Developer',
                'published' => true,
            ],
            [
                'title' => 'Blade Templates - Tạo Views đẹp mắt',
                'content' => 'Blade là template engine của Laravel. Nó cho phép bạn viết PHP code trong views một cách sạch sẽ và dễ đọc. Blade cung cấp các directives như @if, @foreach, @extends, @section để tổ chức code tốt hơn.',
                'author' => 'Designer',
                'published' => true,
            ],
            [
                'title' => 'Routing trong Laravel',
                'content' => 'Laravel cung cấp hệ thống routing mạnh mẽ và linh hoạt. Bạn có thể định nghĩa routes cho GET, POST, PUT, DELETE requests. Resource routes giúp tạo CRUD operations nhanh chóng chỉ với một dòng code.',
                'author' => 'Backend Dev',
                'published' => false,
            ],
            [
                'title' => 'Validation - Kiểm tra dữ liệu đầu vào',
                'content' => 'Laravel cung cấp nhiều validation rules để kiểm tra dữ liệu từ người dùng. Bạn có thể validate email, required fields, max length, unique values, và nhiều hơn nữa. Validation giúp bảo vệ ứng dụng khỏi dữ liệu không hợp lệ.',
                'author' => 'Security Expert',
                'published' => true,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
