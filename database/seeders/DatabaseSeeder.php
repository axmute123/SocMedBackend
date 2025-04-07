<?php

namespace Database\Seeders;

use App\Models\PostComment;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'test',
        ]);

        User::create([
            'username' => 'Ryx',
            'email' => 'Ryx@example.com',
            'password' => 'test',
        ]);

        User::create([
            'username' => 'Mad Eye',
            'email' => 'MadEye@example.com',
            'password' => 'test',
        ]);

        
        Post::create([
            'created_by' => 1,
            'description' => 'Hi there, I am a test user.',
            'media_link' => 'https://techwiser.com/wp-content/uploads/2025/01/Sung-Il-Hwan-Jinwoos-father-in-Solo-Leveling-_-Credits_-A-1-Pictures-1024x576.webp',
        ]);

        Post::create([
            'created_by' => 2,
            'description' => 'Hi there, I am a test Ryx.',
            'media_link' => 'https://pm1.aminoapps.com/7574/da2fce7557f50f4a8fe66004e536b4f403254f4br1-1612-2048v2_uhq.jpg',
        ]);

        Post::create(attributes: [
            'created_by' => 3,
            'description' => 'Hi there, I am a test Wax.',
            'media_link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZKW6d772Qs1XtE9Xa7vSz-vcTJL-QYw9tTg&s',
        ]);

      
        
        Video::create([
            'title' => "A man with a hook",
            'description' => "A man with a hook with all the bait in him",
            'url' => "https://www.youtube.com/watch?v=8JW6qzPCkE8",
            'thumbnail' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCIS557jRb_YmDwtxwiwzWwC3y_GvuEjeq2g&s",
            'post_id' => 2
        ]);

        Video::create([
            'title' => "Rare Pokemon",
            'description' => "MagiKarp",
            'url' => 'https://www.youtube.com/shorts/JZDgsQhTp-8',
            'thumbnail' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb6ohyTPKYE5qJJ0aoISusAFVpp5x5rgy0tQ&s",
            'post_id' => 1
        ]);

        Video::create([
            'title' => "A brief history",
            'description' => "A man",
            'url' => 'https://www.youtube.com/watch?v=y5XEwTDlriE',
            'thumbnail' => "https://media.springernature.com/full/springer-static/cover-hires/book/978-3-030-82420-4",
            'post_id' => 3
        ]);

        Video::create([
            'title' => "Atomic Habit",
            'description' => "A man with a hook with all the bait in him",
            'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5o5RBVIsAFpVIuqxCqkGPqaE7Ih3A6yWZJA&s',
            'thumbnail' => 'https://i.redd.it/rp0guv5iy9nc1.jpeg',
            'post_id' => 3
        ]);

        Video::create([
            'title' => "Don't Click",
            'description' => "No! No! Click",
            'url' => 'https://www.youtube.com/watch?v=BijqEg7q6oI',
            'thumbnail' => "https://media.tenor.com/REQM42ULnnQAAAAM/marscatsvoyage-links.gif",
            'post_id' => 3
        ]);

        Video::create([
            'title' => "Daft Punk",
            'description' => "Daft Punk ft. Pharell Williams",
            'url' => 'https://www.youtube.com/watch?v=0QVOc1aagSE',
            'thumbnail' => "https://static01.nyt.com/images/2021/02/23/arts/22daftpunk/merlin_68436082_cbc2d16f-e4ce-4e8e-9f06-d2789c9f309b-superJumbo.jpg",
            'post_id' => 3
        ]);


        Video::create([
            'title' => "One Piece",
            'description' => "Luffy and the Others",
            'url' => "https://www.youtube.com/shorts/mqbjvL9GXzg",
            'thumbnail' => "https://upload.wikimedia.org/wikipedia/en/6/62/Main_characters_of_One_Piece.png",
            'post_id' => 3
        ]);

        Video::create([
            'title' => "Black Panther",
            'description' => "Wakanda Forever",
            'url'=> 'https://www.youtube.com/watch?v=zlCWHebx0oc',
            'thumbnail' => "https://ew.com/thmb/xwjkb_J45L8toxt8uZA8QRcJzX0=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/blackpanther596d2f02625fd-2000-ee7b826f45274fa5a336b7dfb2a7e57d.jpg",
            'post_id' => 3
        ]);


        Video::create([
            'title' => "Brain",
            'description' => "A man with a hook with all the bait in him",
            'url' => 'https://www.youtube.com/watch?v=pRFXSjkpKWA',
            'thumbnail' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDHtlhL153IMbuYARfGL8j6kxc56H_VxzJhQ&s",
            'post_id' => 1
        ]);


        Video::create([
            'title' => "Tom and Jerry",
            'description' => "Tom and Jerry",
            'url'=>'https://www.youtube.com/watch?v=t0Q2otsqC4I',
            'thumbnail' => "https://images.justwatch.com/poster/310410860/s718/tom-and-jerry.jpg",
            'post_id' => 2
        ]);

    


        


        

        

        


        UserProfile::create([
            'user_id'=> 1,
            'bio' => 'This is a test user profile.',
            'profile_picture' => 'https://example.com/profile.jpg',
            'cover_picture' => 'https://example.com/cover.jpg',
            'full_name' => 'Test User',
            'nickname' => 'Testy',
        ]);


        UserProfile::create([
            'user_id'=> 2,
            'bio' => 'This is a test userProfile for test user RYX.',
            'profile_picture' => 'https://example.com/profile.jpg',
            'cover_picture' => 'https://example.com/cover.jpg',
            'full_name' => 'Test User RYX',
            'nickname' => 'RYX',
        ]);


        Artisan::call('passport:client --personal --no-interaction');
    }
}
