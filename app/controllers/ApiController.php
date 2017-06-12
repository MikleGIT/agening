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
            $id = $post->getSlug();
            $str = $id;
            $str = preg_replace('/.*\//','',$str);
            $str = str_replace(array("_","post"),"",$str);
            $data[]= [
                'title'=>$post->translate()->title,
                'id'=>$str,
                'organization'=> $post->getMetaValue('organization', App::getLocale())];
        }
        return $data;
    }

    public function enn($id)
    {
        $data =[];
        $post  = Post::find($id);
        $discountImage = null;
        $address = null;
        $contact=null;
        $date = null;
        if($post->getMetaValue('discount_image', App::getLocale())){
            $discountImage = $post->getMetaValue('discount_image', App::getLocale());
        }
        if($post->getMetaValue('address', App::getLocale())){
            $address = $post->getMetaValue('address', App::getLocale());
        }
        if($post->getMetaValue('contact', App::getLocale())){
            $contact =$post->getMetaValue('contact', App::getLocale());
        }
        if($post->getMetaValue('date', App::getLocale())){
            $date = $post->getMetaValue('date', App::getLocale());
        }
        $data[]= [
            'title'=>$post->translate()->title,
            'createdAt'=>$post->getTranslatedCreatedAt(),
            'organization'=>$post->getMetaValue('organization', App::getLocale()),
            'discount'=>$post->getMetaValue('discount', App::getLocale()),
            'discountImage'=>$discountImage,
            'adress'=>$address,
            'contact'=>$contact,
            'date'=>$date
        ];
        return $data;
    }
}
