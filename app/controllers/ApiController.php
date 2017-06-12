<?php

class ApiController extends BaseController {

    public function healthCategory() {
        $category = [];
        foreach( Category::findBySlug('service/healthcare')->subCategories()  as  $post ) {
            $category[]=[
                'name'=>$post->translate()->name,
                'slug'=>$post->getSlug()
            ];
        }
        return $category;
    }

    public function healthCare()
    {

        $data = [];
        foreach( Category::findBySlug('service/healthcare')->getPosts()  as  $post ) {
            $data[]= [
                'title'=>$post->translate()->title,
                'content'=>$post->translate()->content];
        }
        return $data;

    }

    public function healthCareSlug($slug)
    {
        $usefulSlug = 'service/healthcare/'.$slug;
        $data = [];
        foreach( Category::findBySlug($usefulSlug)->getPosts()  as  $post ) {
            $data[]= [
                'title'=>$post->translate()->title,
                'content'=>$post->translate()->content];
        }
        return $data;
    }

    public function discount()
    {
        $data = [];
        foreach( Category::findBySlug('discount')->getPosts()  as  $post ) {
            $data[]= [
                'title'=>$post->translate()->title,
                'slug'=>$post->getSlug(),
                'organization'=> $post->getMetaValue('organization', App::getLocale())];
        }
        return $data;
    }
}
