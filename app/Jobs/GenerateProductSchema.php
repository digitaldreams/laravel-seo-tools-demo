<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Product;
use SEO\Models\Page;
use SEO\Models\PageImage;
use SEO\Tag;

class GenerateProductSchema implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Product
     */
    protected $product;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Create a new job instance.
     *
     * @param Product $product
     * @param array $data
     */
    public function __construct(Product $product, $data = [])
    {
        $this->product = $product;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $page = Page::firstOrNew([
            'object' => Product::class,
            'object_id' => $this->product->id
        ]);

        $page->path = route('products.frontend.show', $this->product->slug);
        $page->object = Product::class;
        $page->object_id = $this->product->id;
        $page->title = $this->product->name;
        $page->description = substr($this->product->description, 0, 180);
        $page->schema = json_encode($this->product->schemaJsonLd(), JSON_PRETTY_PRINT);
        $page->save();

        if (!empty($this->product->image)) {
            $pageImage = PageImage::firstOrCreate(['src' => $this->product->image->getThumbnail(), 'page_id' => $page->id]);
            $pageImage->title = $this->product->image->title;
            $pageImage->caption = $this->product->image->caption;
            $pageImage->save();
        }
        $tag = new Tag($page);
        $tag->make()->save();
    }
}
