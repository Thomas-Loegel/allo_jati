<?php

class MediasControllers extends Controller
{
    private $poster;
    private $pictures;

    public function __construct($poster, $pictures)
    {
        parent::__construct();
        $this->poster = $poster;
        $this->pictures = $pictures;
    }
    public function set_poster($poster)
    {
        $this->poster = $poster;
    }
    public function set_pictures($pictures)
    {
        $this->pictures = $pictures;
    }
    public function get_poster($poster)
    {
        $this->poster = $poster;
    }
    public function get_pictures($pictures)
    {
        $this->pictures = $pictures;
    }
    public function delete($poster, $pictures){
        ;
    }
}