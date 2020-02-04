<?php

namespace Damin\Controller;

use Damin\DB;

class MainController extends MasterController {

	public function index()
	{	
		// 로그인 되어있는지 체크
        // if(isset($_SESSION['user'])){
        //     DB::msgAndBack("로그아웃 후 이용해주시기 바랍니다.");
        //     exit;
        // }
		$this->render("main", []);
	}
}