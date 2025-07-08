<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Portfolio;
use App\Models\Profile;
use App\Models\Achievement;

class MigrateImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:migrate {--dry-run : Show what would be migrated without actually doing it}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing images to proper storage locations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting image migration...');
        
        if ($this->option('dry-run')) {
            $this->warn('DRY RUN MODE - No files will be moved');
        }

        // Migrate portfolio images
        $this->migratePortfolioImages();
        
        // Migrate profile images
        $this->migrateProfileImages();
        
        // Migrate achievement images
        $this->migrateAchievementImages();

        $this->info('Image migration completed!');
    }

    private function migratePortfolioImages()
    {
        $this->info('Migrating portfolio images...');
        
        $portfolios = Portfolio::whereNotNull('image')->get();
        
        foreach ($portfolios as $portfolio) {
            $oldPath = $portfolio->image;
            
            // Skip if already in correct location
            if (str_starts_with($oldPath, 'portfolio-images/')) {
                $this->line("Portfolio {$portfolio->id}: Already in correct location");
                continue;
            }
            
            // Check if file exists in public directory
            $publicPath = public_path($oldPath);
            if (File::exists($publicPath)) {
                $newPath = 'portfolio-images/' . basename($oldPath);
                
                if (!$this->option('dry-run')) {
                    // Copy to new location
                    $contents = File::get($publicPath);
                    Storage::disk('public')->put($newPath, $contents);
                    
                    // Update database
                    $portfolio->update(['image' => $newPath]);
                    
                    $this->line("Portfolio {$portfolio->id}: Moved {$oldPath} to {$newPath}");
                } else {
                    $this->line("Portfolio {$portfolio->id}: Would move {$oldPath} to {$newPath}");
                }
            } else {
                $this->warn("Portfolio {$portfolio->id}: File not found at {$publicPath}");
            }
        }
    }

    private function migrateProfileImages()
    {
        $this->info('Migrating profile images...');
        
        $profiles = Profile::whereNotNull('photo')->get();
        
        foreach ($profiles as $profile) {
            $oldPath = $profile->photo;
            
            // Skip if already in correct location
            if (str_starts_with($oldPath, 'profile-photos/')) {
                $this->line("Profile {$profile->id}: Already in correct location");
                continue;
            }
            
            // Check if file exists in public directory
            $publicPath = public_path($oldPath);
            if (File::exists($publicPath)) {
                $newPath = 'profile-photos/' . basename($oldPath);
                
                if (!$this->option('dry-run')) {
                    // Copy to new location
                    $contents = File::get($publicPath);
                    Storage::disk('public')->put($newPath, $contents);
                    
                    // Update database
                    $profile->update(['photo' => $newPath]);
                    
                    $this->line("Profile {$profile->id}: Moved {$oldPath} to {$newPath}");
                } else {
                    $this->line("Profile {$profile->id}: Would move {$oldPath} to {$newPath}");
                }
            } else {
                $this->warn("Profile {$profile->id}: File not found at {$publicPath}");
            }
        }
    }

    private function migrateAchievementImages()
    {
        $this->info('Migrating achievement images...');
        
        $achievements = Achievement::whereNotNull('image')->get();
        
        foreach ($achievements as $achievement) {
            $oldPath = $achievement->image;
            
            // Skip if already in correct location
            if (str_starts_with($oldPath, 'achievement-images/')) {
                $this->line("Achievement {$achievement->id}: Already in correct location");
                continue;
            }
            
            // Check if file exists in public directory
            $publicPath = public_path($oldPath);
            if (File::exists($publicPath)) {
                $newPath = 'achievement-images/' . basename($oldPath);
                
                if (!$this->option('dry-run')) {
                    // Copy to new location
                    $contents = File::get($publicPath);
                    Storage::disk('public')->put($newPath, $contents);
                    
                    // Update database
                    $achievement->update(['image' => $newPath]);
                    
                    $this->line("Achievement {$achievement->id}: Moved {$oldPath} to {$newPath}");
                } else {
                    $this->line("Achievement {$achievement->id}: Would move {$oldPath} to {$newPath}");
                }
            } else {
                $this->warn("Achievement {$achievement->id}: File not found at {$publicPath}");
            }
        }
    }
} 