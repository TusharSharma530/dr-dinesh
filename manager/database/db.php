<?php session_start();
error_reporting(0);
define('BASE_PATH',"//localhost/dr dinesh/");
define('DB_HOST', 'localhost');
define('DB_NAME','drdinesh');
define('DB_USER','root');
define('DB_PASSWORD','');
// session_destroy();
date_default_timezone_set("Asia/Kolkata"); 
$path = BASE_PATH;
$con = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
//Load Composer's autoloader
require dirname(__DIR__) . '/PHPMailer/vendor/autoload.php';


function SendEmailer($senderemail, $subject, $bodydata, $filePath = null)
{
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tusharsharma6868@gmail.com';
        $mail->Password   = 'kouf rxzp oxxi rnte';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom(
            'tusharsharma6868@gmail.com',
            SITE_NAME
        );

        $mail->addAddress($senderemail);

        if ($filePath !== null && file_exists($filePath)) {
            $mail->addAttachment($filePath);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodydata;
        $mail->AltBody = strip_tags($bodydata);

        $mail->send();

        return true;

    } catch (Exception $e) {

        error_log('PHPMailer Error: ' . $mail->ErrorInfo);

        return false;
    }
}




// $senderemail = "promotionparadise42@gmail.com";
// $subject = "New Enquiry for Job";
// $bodydata = "Name : Testing";
// echo SendEmailer($senderemail,$subject,$bodydata, null);

// Check connection
if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error(); }

  // Actual Link 
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['REQUEST_URI'] ?? '');

$query_str = parse_url($actual_link, PHP_URL_QUERY);
$query_params = [];
parse_str($query_str ?? '', $query_params);
$getparam = $query_params;


// SEO FRIENDLY URL
function seo_friendly_url($string){
     $string = str_replace(array('[\', \']'), '', $string);
     $string = preg_replace('/\[.*\]/U', '', $string);
     $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string); 
     return strtolower(trim($string, '-'));
}

// FUNCTION FOR MOBILE 
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function createImgWebp($fileinputname, $imagepath){
    $filename = $_FILES[$fileinputname]['name'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $tmp = $_FILES[$fileinputname]['tmp_name'];
    if(!isset($_FILES[$fileinputname]['error']) || $_FILES[$fileinputname]['error'] != UPLOAD_ERR_OK || !is_uploaded_file($tmp)){
        return "";
    }
    $targetdir = dirname(__DIR__, 2)."/branch/assets/".$imagepath."/";
    if(!is_dir($targetdir)){
        mkdir($targetdir, 0777, true);
    }
    $file1 = $fileinputname . time().'.'.$ext;
    if($ext=='webp' || $ext=='png' || $ext=='pdf' || $ext=='avif' || $ext=='mp4' || $ext=='webm' || $ext=='mov' || $ext=='avi' || $ext=='mkv' || $ext=='3gp'){
        $filenewname = $file1;
        move_uploaded_file($tmp, $targetdir.$file1);
    }else{
        $filenewname = $fileinputname . time().'.webp';
        move_uploaded_file($tmp, $targetdir.$file1);

        $img = @imagecreatefromstring(file_get_contents($targetdir.$file1));
        if($img !== false){
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);
            imagewebp($img, $targetdir . $filenewname, 80);
            imagedestroy($img);
            unlink($targetdir.$file1);
        }else{
            $filenewname = $file1;
        }
    }
    if(!file_exists($targetdir.$filenewname)){
        return "";
    }
    return "branch/assets/".$imagepath."/".$filenewname;
}
// $file_type = exif_imagetype($file);
//exif_imagetype($file);
// 1    IMAGETYPE_GIF
// 2    IMAGETYPE_JPEG
// 3    IMAGETYPE_PNG
// 6    IMAGETYPE_BMP
// 15   IMAGETYPE_WBMP
// 16   IMAGETYPE_XBM

/*** DEFAULT DATA LOAD ***/
$sqlsetting = mysqli_query($con,"SELECT * FROM `settings`");
$rwlinks = mysqli_fetch_array($sqlsetting);
$websitename = $rwlinks['web_name'];
$headercenterline = $rwlinks['headercenterline'];
$emailid = $rwlinks['email_id'];
$alternateemailid = $rwlinks['alternate_email_id'];
$contactno = $rwlinks['contact_no'];
$alternateno = $rwlinks['alternate_no'];
$whatsapp = $rwlinks['whatsapp_no'];
$address = $rwlinks['address'];
$youtubeembedcode = $rwlinks['youtubelink'];
$facebook = $rwlinks['facebook'];
$instagram = $rwlinks['instagram'];
$youtube = $rwlinks['youtube'];
$linkedin = $rwlinks['linkedin'];
$twitter = $rwlinks['twitter'];
$mapiframe = $rwlinks['map_iframe'];
$googletag = $rwlinks['googletag'];
$footerdesc = $rwlinks['footerdesc'];
$metatitle = $rwlinks['meta_title'];
$metakeywords = $rwlinks['meta_keywords'];
$metadesc = $rwlinks['meta_desc'];
$logo = $rwlinks['logo'];
$time = $rwlinks['reception_time'];


// ===== site config value with fallback ======
function __cfg($value, $fallback = ''){
	$value = trim((string)$value);
	return ($value === '') ? $fallback : $value;
}


//if page meta title not exist
if(!function_exists('pageMeta')){
	function pageMeta() {
		static $cache = null;
		if($cache !== null){ return $cache; }

		$cache = array('title' => '', 'desc' => '');

		$slug = !empty($GLOBALS['currentSlug']) ? (string)$GLOBALS['currentSlug'] : '';
		if($slug === '' || $slug === 'home'){ return $cache; }

		global $con;
		$sql = mysqli_query($con, "SELECT `c_name`, `meta_title`, `meta_desc`
			FROM `category`
			WHERE `c_url` = '".mysqli_real_escape_string($con, $slug)."'
			AND `c_type` = 1 AND `status` = 1 LIMIT 1");

		if($sql && mysqli_num_rows($sql)){
			$rw   = mysqli_fetch_assoc($sql);
			$name = trim((string)$rw['c_name']);
			// Category names are stored in caps (ROOMS & SUITES).
			$cache['title'] = trim((string)$rw['meta_title']) !== ''
				? trim($rw['meta_title'])
				: ($name !== '' ? ucwords(strtolower($name)) : '');
			$cache['desc'] = trim((string)$rw['meta_desc']);
		}

		return $cache;
	}
}

if(!function_exists('imageUrl')){
	function imageUrl($folder, $filename) {
		return IMAGES_URL . $folder . '/' . $filename;
	}
}
     

// echo getIndianCurrency(25201);


function __getJobTitle($con, $id){
$sql = mysqli_query($con, "SELECT * FROM `jobs` WHERE `status`=1 AND `id`=$id");
$rw = mysqli_fetch_object($sql);
return $rw->title;
}






?>
 
