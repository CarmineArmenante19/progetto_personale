<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use League\Glide\Filesystem\FileNotFoundException;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $fileName,$w,$h,$path;
    public function __construct($filePath,$w,$h)
    {
        $this->path=dirname($filePath);
        $this->fileName=basename($filePath);
        $this->w=$w;
        $this->h=$h;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w=$this->w;
        $h=$this->h;
        
        
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        if (!file_exists($srcPath))
        {
            throw new FileNotFoundException('Could not find the image `'.$srcPath.'`.');
        }
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;
        
        
        $croppedImage=Image::load($srcPath)->crop(Manipulations::CROP_CENTER,$w,$h)->watermark(base_path('storage/app/public/images/gigante-sorridente.jpg'))
        ->watermarkPosition('bottom-right');
        $croppedImage->save($destPath);

        
    }
}
