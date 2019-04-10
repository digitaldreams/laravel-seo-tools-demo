<?php
/**
 * Created by PhpStorm.
 * User: Tuhin
 * Date: 2/7/2018
 * Time: 10:49 PM
 */

namespace App\Services;


use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoService
{
    /**
     * @var Photo
     */
    protected $photo;
    protected $folder;

    public function __construct(Photo $photo)
    {
        $this->photo = $photo;
        $this->folder = 'photos';
    }

    /**
     * @param Request $request
     * @param string $name
     * @return Photo
     * @throws \Exception
     */
    public function save(Request $request, $name = 'file')
    {
        if ($request->hasFile($name)) {
            $this->photo->src = $request->$name->store($this->folder, 'public');

            if (empty($this->photo->caption)) {
                $this->photo->caption = $request->file($name)->getClientOriginalName();
            }
            if (empty($this->photo->title)) {
                $this->photo->title = $request->file($name)->getClientOriginalName();
            }

            $this->photo->save();
        }


        return $this->photo;
    }

    public function setFolder($folder)
    {
        $this->folder = $folder;
        return $this;
    }
}