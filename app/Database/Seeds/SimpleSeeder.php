<?php namespace App\Database\Seeds;

class SimpleSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                        'blog_id' => '1',
                        'blog_title'    => 'HelloWorld',
                        'blog_description'    => 'This is HelloWorld'
                ];

                // // 簡單查詢
                // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
                //         $data
                // );

                // 使用查詢生成器
                $this->db->table('blog')->insert($data);
        }
}