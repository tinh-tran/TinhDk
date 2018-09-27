<?php 
/**
 * Demo get link from VideoAPI, use jwplayer
 * Login: https://videoapi.io/panel/login
 * Register: https://videoapi.io/panel/login/register
 * Get Key: https://videoapi.io/panel/config
 */

$key = 'a967ffb4575ff624f064ef4bd7047628'; // Enter your key on VideoAPI.io
$link = $_POST['link'];
$api = 'https://videoapi.io/api/getlink?key='.$key.'&link='.$link;
$sources = curl($api);
$arr = json_decode($sources);
// echo "<pre>";
// print_r($sourcesDecode);
// echo "</pre>";
// function curl
function curl($url)
{
  $ch = @curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  $head[] = "Connection: keep-alive";
  $head[] = "Keep-Alive: 300";
  $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
  $head[] = "Accept-Language: en-us,en;q=0.5";
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  $page = curl_exec($ch);
  curl_close($ch);
  return $page;
}

function getMp4HD($url){
  $return = array();
  $regex_link = '/http\:\/\/tv\.zing\.vn\/video\/(.*)\/(.*).html/';
    if (preg_match($regex_link, $url, $getID)) { // lấy ID video
        $idVideo = $getID[2]; // id video
        $linkEmbel = 'http://tv.zing.vn/embed/video/'.$idVideo; // add id video vào link embed
        $data = curl($linkEmbel); // đọc trang embed
        //echo $data;
        preg_match('/http\:\/\/tv\.zing\.vn\/tv\/xml\/media\-embed\/(.*)"/', $data, $arr_preg); // lấy link xml media embed
        $link_xml = str_replace('"','',$arr_preg[0]); // xóa bỏ " trong link
        $xml_data = curl($link_xml); // đọc trang xml
        //echo $xml_data;
        $xml_string = str_replace("<![CDATA[","",$xml_data); // loại bỏ <![CDATA[
        $xml_string = str_replace("]]>","",$xml_string); // loại bỏ ]]>
    	 $xml_string = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $xml_string); // chuyển đổi ký tự đặc biệt
        //echo $xml_string;
       $xml_arr = json_decode(json_encode((array) simplexml_load_string($xml_string)), 1); // chuyển thành mảng
        //print_r($xml_arr);
       if($xml_arr['item']){
        $item = $xml_arr['item'];
        $return['id']         	= $item['id'];
        $return['title']        = $item['title'];
        $return['performer']    = $item['performer'];
      } 
    }
    return $return;
  }
  //Get info of video
  $info = getMp4HD($link);
  ?>

  <?php
  if($arr == null || $arr[0]->src == null)
  {
    echo '<div class="alert alert-danger">Không tìm thấy dữ liệu! Vui lòng kiểm tra lại!</div>';
  } 
  else {
    ?>
    <small>#<?php echo $info['id'] ?></h3>
      <h4 class="text-success"><?php echo $info['title'] ?></h4>
      <h5><?php echo $info['performer'] ?></h5>
      <hr style="width: 20%"/>
      <!--360p-->
      <a href="<?php echo $arr[0]->src ?>" class="btn btn-lg btn-warning" target="_blank">360p <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

      <!--480p-->
      <a href="<?php echo $arr[1]->src ?>" class="btn btn-lg btn-info" target="_blank">480p <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

      <!--720p-->
      <?php if($arr[2]->src != null){
        ?>
        <a href="<?php echo $arr[2]->src ?>" class="btn btn-lg btn-success" target="_blank">720p <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        <?php } ?>

        <?php } ?> 
