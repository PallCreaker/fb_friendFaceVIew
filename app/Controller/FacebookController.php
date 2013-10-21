<?php
class FacebookController extends AppController {
    public function index(){

    }

    public function friendList(){
        // if($this->request->is('post')){
            // Facebookへ接続
            $this->connectFb();
            $fb = $this->facebook->getUser();

            // Friend List を取得
            try {
                $me = $this->facebook->api('/me');
    			$friend_photos = $this->facebook->api("{$fb}?fields=friends.limit(7).fields(gender,photos.limit(300).fields(tags,source))");
            } catch (FacebookApiException $e){
                error_log($e);
            }
            if(isset($friend_photos['error_code'])) {
                 $this->Session->setFlash(__('データ取得にに失敗しました'), 'default', array(), 'authError');
            }else{
                $this->set(compact('friend_photos'));
            }
            $this->set(compact('fb'));
            $this->set(compact('me'));
        // }
    }
    public function myFriend(){
        // if($this->request->is('post')){
            // Facebookへ接続
            $this->connectFb();
            $fb = $this->facebook->getUser();

            // Friend List を取得
            try {
                $me = $this->facebook->api('/me');
               $friend_list = $this->facebook->api("{$fb}/friends?fields=gender");
            } catch (FacebookApiException $e){
                error_log($e);
            }

            $this->set(compact('fb'));
            $this->set(compact('me'));
            $this->set(compact('friend_list'));
        }
    // }
}