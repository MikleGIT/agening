<?php

class ApiController extends BaseController {

    public function healthCategory() {
        $category = [];
        foreach( Category::findBySlug('service/healthcare')->subCategories()  as  $post ) {
            $slug = $post->getSlug();
            $str = $slug;
            $str = preg_replace('/.*\//','',$str);
            $category[]=[
                'name'=>$post->translate()->name,
                'slug'=>$str
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

    public function healthCareDetail($slug)
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

    public function discountDetail($id)
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

    public function education()
    {
        $data = [];
        foreach( Category::findBySlug('education/courses')->getPosts()  as  $post ) {
            $id = $post->getSlug();
            $str = $id;
            $str = preg_replace('/.*\//','',$str);
            $str = str_replace(array("_","post"),"",$str);
            $data[]= [
                'id'=>$str,
                'title'=>$post->translate()->title,
                'duration'=>$post->getMetaValue('duration'),
                'fee'=>$post->getMetaValue('fee'),
                'quota'=>$post->getMetaValue('quota'),
                'start_at'=>$post->getMetaValue('start_at'),
                'lesson_time'=>$post->getMetaValue('lesson_time')


                ];
        }
        return $data;
    }
    public function educationCategory() {
        $category = [];
        foreach( Category::findBySlug('education/courses')->subCategories()  as  $post ) {
            $slug = $post->getSlug();
            $str = $slug;
            $str = preg_replace('/.*\//','',$str);
            $category[]=[
                'name'=>$post->translate()->name,
                'slug'=>$str
            ];
        }
        return $category;
    }

    public function educationDetail($id)
    {
        $data = [];
        $post  = Post::find($id);
        $data[]= [
            'title'=>$post->translate()->title,
            'createdAt'=>$post->getTranslatedCreatedAt(),
            'organization'=>$post->getMetaValue('organization') ? $post->getMetaValue('organization') : null,
            'detail'=>$post->getMetaValue('detail')?$post->getMetaValue('detail'):null ,
            'address'=>$post->getMetaValue('address')?$post->getMetaValue('address'):null,
            'start_at'=>$post->getMetaValue('start_at')?$post->getMetaValue('start_at'):null,
            'lesson_time'=>$post->getMetaValue('lesson_time')?$post->getMetaValue('lesson_time'):null,
            'language'=>$post->getMetaValue('language')?$post->getMetaValue('language'):null,
            'duration'=>$post->getMetaValue('duration')?$post->getMetaValue('duration'):null,
            'quota'=>$post->getMetaValue('quota')?$post->getMetaValue('quota'):null,
            'audience'=>$post->getMetaValue('audience')?$post->getMetaValue('audience'):null,
            'fee'=>$post->getMetaValue('fee')?$post->getMetaValue('fee'):null,
            'apply'=>$post->getMetaValue('apply')?$post->getMetaValue('apply'):null,
            'contact'=>$post->getMetaValue('contact')?$post->getMetaValue('contact'):null,
            'remark'=>$post->getMetaValue('remark') ? $post->getMetaValue('remark') : null,
            'content'=>$post->translate()->content ? $post->translate()->content : null
        ];
        return $data;
    }


    public function eventCategory()
    {
        $category = [
            //slug取值：art,health,finance,relationships,other
//            文化藝術  運動養生  退休理財  人際關係  其他
            [
                'name'=>'文化藝術',
                'slug'=>'art'
            ],
            [
                'name'=>'運動養生',
                'slug'=>'health'
            ],
            [
                'name'=>'退休理財',
                'slug'=>'finance'
            ],
            [
                'name'=>'人際關係',
                'slug'=>'relationships'
            ],
            [
                'name'=>'其他',
                'slug'=>'other'
            ]
        ];

//        foreach( Category::findBySlug('education/courses')->subCategories()  as  $post ) {
//            $slug = $post->getSlug();
//            $str = $slug;
//            $str = preg_replace('/.*\//','',$str);
//            $category[]=[
//                'name'=>$post->translate()->name,
//                'slug'=>$str
//            ];
//        }
        return $category;
    }
    public function event($slug)
    {
        $data = [];
        foreach( Category::findBySlug('event/'.$slug)->getPosts()  as  $post ) {
            $id = $post->getSlug();
            $str = $id;
            $str = preg_replace('/.*\//','',$str);
            $str = str_replace(array("_","post"),"",$str);
            $data[]= [
                'id'=>$str,
                'title'=>$post->translate()->title,
                'place'=>$post->getMetaValue('place'),
                'date'=>$post->getMetaValue('date'),
                'quota'=>$post->getMetaValue('quota'),
                'contact'=>$post->getMetaValue('contact'),
            ];
        }
        return $data;
    }

    public function eventDetail($id)
    {

        $data = [];
        $post  = Post::find($id);
        $data[]= [
            'title'=>$post->translate()->title,
            'createdAt'=>$post->getTranslatedCreatedAt(),
            'date'=>$post->getMetaValue('date')?$post->getMetaValue('date'):null,
            'place'=>$post->getMetaValue('place')?$post->getMetaValue('place'):null,
            'performer'=>$post->getMetaValue('performer')?$post->getMetaValue('performer'):null,
            'organization'=>$post->getMetaValue('organization')?$post->getMetaValue('organization'):null,
            'fee'=>$post->getMetaValue('fee')?$post->getMetaValue('fee'):null,
            'contact'=>$post->getMetaValue('contact')?$post->getMetaValue('contact'):null,
            'remark'=>$post->getMetaValue('remark')?$post->getMetaValue('remark'):null,
            'content'=>$post->translate()->content?$post->translate()->content:null
            ];
        return $data;

    }
}
