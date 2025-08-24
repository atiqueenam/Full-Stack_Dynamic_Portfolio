<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Info;
use App\Models\User;

// Get the first user
$user = App\Models\User::first();
if (!$user) {
    $user = App\Models\User::create([
        'name' => 'Atique Enam',
        'email' => 'admin@portfolio.com', 
        'password' => bcrypt('password123')
    ]);
    echo 'Created new user' . PHP_EOL;
}

// Get or create Info record
$info = App\Models\Info::where('user_id', $user->id)->first();
if (!$info) {
    $info = new App\Models\Info();
    $info->user_id = $user->id;
    echo 'Created new info record' . PHP_EOL;
}

// Set ScienThush information
$info->scienthush_description = 'Most Viewed Content Across Platforms - Creating viral content that bridges technology, education, and entertainment';
$info->scienthush_facebook_url = 'https://facebook.com/scienthush';
$info->scienthush_youtube_url = 'https://www.youtube.com/@scienthush';
$info->show_scienthush_section = true;

// Add the featured videos
$videos = [
    'https://youtu.be/_RupsuOad7A',
    'https://youtu.be/0ntFIxxC7ZY', 
    'https://youtu.be/aD5BmGQ8mLU',
    'https://www.facebook.com/scienthush/videos/1946150585816340',
    'https://www.facebook.com/scienthush/videos/2479949425737080',
    'https://www.facebook.com/scienthush/videos/2190473314723834'
];

$info->scienthush_featured_videos = $videos;

// Set basic info if not exists
$info->portfolio = $info->portfolio ?: 'Atique Enam - Professional Portfolio';
$info->designation = $info->designation ?: 'AI Researcher & Full Stack Developer';
$info->description = $info->description ?: 'Experienced AI researcher and full-stack developer with expertise in machine learning, web development, and content creation.';

$info->save();

echo 'Successfully added ScienThush videos and information!' . PHP_EOL;
echo 'Videos added: ' . count($videos) . PHP_EOL;
echo 'ScienThush section enabled: ' . ($info->show_scienthush_section ? 'Yes' : 'No') . PHP_EOL;
echo 'Facebook URL: ' . $info->scienthush_facebook_url . PHP_EOL;
echo 'YouTube URL: ' . $info->scienthush_youtube_url . PHP_EOL;
echo 'Description: ' . $info->scienthush_description . PHP_EOL;

// Display the videos
echo PHP_EOL . 'Featured Videos:' . PHP_EOL;
foreach ($videos as $index => $video) {
    echo ($index + 1) . '. ' . $video . PHP_EOL;
}
