<?php
class FacebookTestController extends AppController {
//test だったらURLはtest  Test なら URLはTest
    public function index(){
        if($this->request->is('post')){
            $this->redirect(array('action'=>'display'));
        }
    }

    public function display(){
        // Facebookへ接続
        $this->connectFb();
        $fb = $this->facebook->getUser();

        // Friend List を取得
        try {
            $me = $this->facebook->api('/me');
        //    $friend_list = $this->facebook->api("{$fb}/friends?fields=gender");
			$friend_photos = $this->facebook->api("{$fb}?fields=friends.limit(3).fields(gender,photos.limit(100).fields(tags,source))");
        } catch (FacebookApiException $e){
            error_log($e);
        }
        $this->set(compact('fb'));
        $this->set(compact('me'));
       // $this->set(compact('friend_list'));
		$this->set(compact('friend_photos'));
    }

	public function getAjax( $next_paging = null ){
		 if($this->request->is('ajax')){
            $this->autoRender = false;
			 //Configure::write('debug', 0);

			// Facebookへ接続
        	$this->connectFb();

            $fb_api_url = $this->request->data;

			$fb_api_url = preg_replace('/https:\/\/graph.facebook.com\//', '', $fb_api_url);

			$friend_photos = array();
			try {
				$friend_photos = $this->facebook->api("{$fb_api_url}");//debug  100003887829834?fields=id,name
				//$friend_photos = $this->facebook->api($fb_api_url);
				//100003887829834?friends.limit(3).fields(gender,photos.limit(100).fields(tags,source)).offset(3)&__after_id(564816641)
				//100003887829834/friends?limit=3&fields=gender,photos.limit%28100%29.fields%28tags,source%29&offset=3&__after_id=564816641
				//https://graph.facebook.com/100003887829834/friends?limit=3&fields=gender,photos.limit%28100%29.fields%28tags,source%29&offset=3&__after_id=564816641
        	} catch (FacebookApiException $e){
            	error_log($e);
        	}
           echo json_encode($friend_photos);
        }else{
        	$error = "error.not ajax post data";
			echo $error;
        }
	}



}