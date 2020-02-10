<?php

namespace Damin\Controller;

use Damin\DB;

class ProfileController extends MasterController {
    public function index()
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

        if($user == null){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }

        $this->render("profile", ["user" => $user]);
    }

    public function change()
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

        if($user == null){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }

        $file = $_FILES['file'];
        $nick = $_POST['nick'];

        // file이 null일 경우 nick만 수정
        if($file['name'] == null ) {
            $this->onlynick($user, $nick);
            exit;
        }

        // nick같을때 
        if($nick == $user->nick) {
            $this->onlyfile($user, $file);
        }

        //이미지 파일인지 체크
        if(explode("/", $file['type'])[0] != "image") {
            DB::msgAndBack("이미지 파일만 업로드 가능합니다.");
            exit;
        }

        //이름 겹치는지 체크
        $sql1 = "SELECT * FROM `sns_user` WHERE `nick` = ?";
        $cnt1 = DB::fetch($sql1, [$nick]);

        if($cnt1) {
            DB::msgAndBack("해당 이름이 이미 존재합니다.");
            exit;
        }

        //파일 옮기기
        $tmp = $file['tmp_name'];
        $path = './upload/' . time() . "_" . $file['name'];
        move_uploaded_file($tmp, $path);

        //DB 수정
        $sql2 = "UPDATE `sns_user` SET `nick` = ? ,`img` = ? WHERE `id` = ?";
        $cnt2 = DB::query($sql2, [$nick, $path, $user->id]);
        if(!$cnt2){
            DB::msgAndBack("회원정보 수정 실패");
            exit;
        }
        $sql3 = "SELECT * FROM `sns_user` WHERE id = ?";
        $user2 = DB::fetch($sql3, [$user->id]);
        $_SESSION['user'] = $user2;
        DB::msgAndGo("회원정보 수정 완료", "/profile");
        
    }

    public function onlynick($user, $nick)
    {   
       //이름 겹치는지 체크
       $sql1 = "SELECT * FROM `sns_user` WHERE `nick` = ?";
       $cnt1 = DB::fetch($sql1, [$nick]);

       if($cnt1) {
           DB::msgAndBack("해당 이름이 이미 존재합니다.");
           exit;
       }

       $sql2 = "UPDATE `sns_user` SET `nick` = ? WHERE `id` = ?";
       $cnt2 = DB::query($sql2, [$nick, $user->id]);
       if(!$cnt2){
           DB::msgAndBack("회원정보 수정 실패");
           exit;
       }

       $sql3 = "SELECT * FROM `sns_user` WHERE id = ?";
       $user2 = DB::fetch($sql3, [$user->id]);
       $_SESSION['user'] = $user2;
       DB::msgAndGo("회원정보 수정 완료", "/profile");
    }

    public function onlyfile($user, $file)
    {
        //이미지 파일인지 체크
        if(explode("/", $file['type'])[0] != "image") {
            DB::msgAndBack("이미지 파일만 업로드 가능합니다.");
            exit;
        }
        
        //파일 옮기기
        $tmp = $file['tmp_name'];
        $path = './upload/' . time() . "_" . $file['name'];
        move_uploaded_file($tmp, $path);

        $sql2 = "UPDATE `sns_user` SET `img` = ? WHERE `id` = ?";

       $cnt2 = DB::query($sql2, [$path, $user->id]);
       if(!$cnt2){
           DB::msgAndBack("회원정보 수정 실패");
           exit;
       }

       $sql3 = "SELECT * FROM `sns_user` WHERE id = ?";
       $user2 = DB::fetch($sql3, [$user->id]);
       $_SESSION['user'] = $user2;
       DB::msgAndGo("회원정보 수정 완료", "/profile");
    } 
}