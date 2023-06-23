<?php declare(strict_types=1);
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Middleware.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/LoaiHoSo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/HoSoUngTuyen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/GiayToUngVien.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ChungChi.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/LoaiHoSoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/HoSoUngTuyenModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/GiayToUngVienModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ChungChiModel.php";
class GuiHoSoController extends KhongXacDinhAuthMiddleWare
{
    private HoSoUngTuyenModel $hoSoUngTuyenModel;
    private LoaiHoSoModel $loaiHoSoModel;
    private GiayToUngVienModel $giayToUngVienModel;
    private ChungChiModel $chungChiModel;
    private $session;
    private string $nameSession;
    private int $timeOutForSession;
    public function __construct(&$Session, object $inforSession)
    {
        $this->Session = $Session;
        $this->session = $inforSession->session;
        $this->nameSession = $inforSession->nameSession;
        $this->timeOutForSession = $inforSession->timeOutForSession;
        $this->initModel();
    }
    private function initModel()
    {
        $this->hoSoUngTuyenModel = new HoSoUngTuyenModel();
        $this->loaiHoSoModel = new LoaiHoSoModel();
        $this->giayToUngVienModel = new GiayToUngVienModel();
        $this->chungChiModel = new ChungChiModel();
    }

    public function guiHoSoPage($iDKeHoachTuyenDung) {
        if($iDKeHoachTuyenDung == null) {
            echo "Yêu cầu của bạn không hợp lệ";
            exit();
        }
        $variables = ['iDKeHoachTuyenDung' => $iDKeHoachTuyenDung];
        require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/GuiHoSoUngTuyen/GuiHoSoUngTuyenView.php';
        exit;
    }

    public function addThongTinHoSo(object $thongTinHoSo)
    {
        $this->checkSendPortfolioCondition();
        
        if (!$this->isFullParametersWithAddJobApplication($thongTinHoSo)) $this->returnJson(new Exception("Chưa có đầy đủ thông tin"));

        $generalInformation = $thongTinHoSo->generalInformation;
        $documents = $thongTinHoSo->documents;
        $certificatesList = $thongTinHoSo->certificatesList;
        $extendInformation = $thongTinHoSo->extendInformation;

        $uuid = new UUIDVersion1();
        $iDHoSoUngTuyen = $uuid->getID();

        $generalInformation->iD = $iDHoSoUngTuyen;
        $this->addHoSoUngTuyen($generalInformation, $extendInformation->iDKeHoachTuyenDung);

        $newLoaiHoSo = new LoaiHoSo($iDHoSoUngTuyen, 'Chưa quyết định');
        $this->addLoaiHoSo($newLoaiHoSo);

        $documents->iD = $iDHoSoUngTuyen;
        $this->addGiayToUngVien($documents);

        $this->addChungChisList($certificatesList, $iDHoSoUngTuyen);

        $this->setSession();
        $this->returnJson(true);
    }

    public function isFullParametersWithAddJobApplication(object $jobApplication) {
        $isFullParams = isset($jobApplication->generalInformation) && isset($jobApplication->documents) && isset($jobApplication->certificatesList) && isset($jobApplication->extendInformation) && isset($jobApplication->extendInformation->iDKeHoachTuyenDung);
        if(!$isFullParams) {
            return false;
        }
        return true;
    }

    public function checkSendPortfolioCondition()
    {
        $time = time();
        if (isset($this->session[$this->nameSession]) && $time - $this->session[$this->nameSession] < $this->timeOutForSession) {
            $this->returnJson(new Exception("Bạn chỉ được gửi mỗi ngày 1 lần"));
            exit();
        }
    }

    public function setSession()
    {
        $this->session[$this->nameSession] = time();
    }

    private function addHoSoUngTuyen($hoSoUngTuyen, string $iDKeHoachTuyenDung)
    {
        $hoSoUngTuyen->iDKeHoachTuyenDung = $iDKeHoachTuyenDung;
        $hoSoUngTuyen->iDKeHoachPhongVan = null;
        $result = $this->hoSoUngTuyenModel->addHoSoUngTuyen($hoSoUngTuyen);
        if ($result instanceof Exception)
            $this->returnJson($result);
    }

    private function addLoaiHoSo($loaiHoSo)
    {
        $result = $this->loaiHoSoModel->addLoaiHoSo($loaiHoSo);
        if ($result instanceof Exception)
            $this->returnJson($result);
    }

    private function addGiayToUngVien($giayToUngVien)
    {
        if(!isset($giayToUngVien->CV)) {
            $this->returnJson(new Exception("No have CV property"));
        }
        $giayToUngVien->CV = $this->handleIMG($giayToUngVien->CV);
        $giayToUngVien->soYeuLyLich = isset($giayToUngVien->soYeuLyLich) ? $this->handleIMG($giayToUngVien->soYeuLyLich) : null;
        $giayToUngVien->donXinViec = isset($giayToUngVien->donXinViec) ? $this->handleIMG($giayToUngVien->donXinViec) : null;
        $giayToUngVien->CCCD = isset($giayToUngVien->CCCD) ? $this->handleIMG($giayToUngVien->CCCD ): null;
        $giayToUngVien->giayKhaiSinh = isset($giayToUngVien->giayKhaiSinh) ? $this->handleIMG($giayToUngVien->giayKhaiSinh) : null;
        $giayToUngVien->soHoKhau = isset($giayToUngVien->soHoKhau) ? $this->handleIMG($giayToUngVien->soHoKhau) : null;
        $giayToUngVien->giayKhamSucKhoe = isset($giayToUngVien->giayKhamSucKhoe) ? $this->handleIMG($giayToUngVien->giayKhamSucKhoe) : null;
        $giayToUngVien->anh = isset($giayToUngVien->anh) ? $this->handleIMG($giayToUngVien->anh) : null;

        $result = $this->giayToUngVienModel->addGiayToUngVien($giayToUngVien);
        if ($result instanceof Exception) {
            $this->deleteIMGFromFolder([$giayToUngVien->CV, $giayToUngVien->soYeuLyLich, $giayToUngVien->donXinViec, $giayToUngVien->CCCD, $giayToUngVien->giayKhaiSinh, $giayToUngVien->soHoKhau, $giayToUngVien->giayKhamSucKhoe, $giayToUngVien->anh]);
            $this->returnJson($result);
        }
    }

    private function addChungChisList(array $chungChiList, $iDKeHoachTuyenDung)
    {
        foreach($chungChiList as $chungChi) {
            $chungChi->iDHoSoUngTuyen = $iDKeHoachTuyenDung;
            if(isset($chungChi->tenChungChi) && isset($chungChi->anhChungChi)) {
                $chungChi->anhChungChi = $this->handleIMG($chungChi->anhChungChi);
            } else {
                $this->returnJson(new ErrorException("Thiếu tên hoặc ảnh chứng chỉ"));
            }
            $uuiD = new UUIDVersion1();
            $chungChi->iD = $uuiD->getID();
        }
        $result = $this->chungChiModel->addMultiChungChi($chungChiList);
        if ($result instanceof Exception) {
            foreach($chungChiList as $chungChi) {
                $this->deleteIMGFromFolder([$chungChi->anhChungChi]);
            }
            $this->returnJson($result);
        }
    }

    private function handleIMG($inForIMG) {
        if($inForIMG === null) {
            return null;
        }
        $nameFile = $this->saveIMGToFolder($inForIMG);
        return $nameFile;
    }

    private function saveIMGToFolder($inForIMG) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/QuanLyNhanSu_BTL_PHP/Assets/ImageOfJobApplication/";
        $uuid = new UUIDVersion1();
        $extenionIMG = strtolower(pathinfo($inForIMG->name,PATHINFO_EXTENSION));
        $nameIMG = $uuid->getID() . "." . $extenionIMG;
        $target_file = $target_dir . $nameIMG;
        
        if($extenionIMG != "jpg" && $extenionIMG != "png" && $extenionIMG != "jpeg"
        && $extenionIMG != "gif" ) {
          return null;
        }

        $file = base64_decode($inForIMG->data);
        file_put_contents($target_file, $file);

        return $nameIMG;
    }

    private function deleteIMGFromFolder(array $linkIMGList) {
        foreach($linkIMGList as $linkIMG) {
            if($linkIMG !== null)
                unlink($linkIMG);
        }
    }

}

$timeOutForSession = 86400;
$inforSession = (object)["session" => &$_SESSION, "nameSession" => "isSendedThongTinHoSo", "timeOutForSession" => $timeOutForSession];

$guiHoSoController = new GuiHoSoController($_SESSION, $inforSession);
$guiHoSoController->handleAccessController();

if($_SERVER["REQUEST_METHOD"] === "GET") {
    $guiHoSoController->guiHoSoPage(isset($_GET["iDKeHoachTuyenDung"]) ? $_GET["iDKeHoachTuyenDung"] : null);
}

$dataFromClient = json_decode(file_get_contents("php://input"));
if(!isset($dataFromClient->extendInformation->action)) {
    header('Content-Type: application/json');
    echo json_encode((object)['isSuccess' => false, 'message' => 'Không có hành động']);
    exit;
}

$action = $dataFromClient->extendInformation->action;
switch($action) {
    case "addThongTinHoSo":
        $guiHoSoController->addThongTinHoSo($dataFromClient);
        break;
    default:
        header('Content-Type: application/json');
        echo json_encode((object)['isSuccess' => false, 'message' => 'Hành động không hợp lệ']);
}

?>