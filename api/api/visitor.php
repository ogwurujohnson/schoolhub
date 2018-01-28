<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/22/18
 * Time: 5:35 AM
 */

class visitor
{
    private $con = "";
    private $table = "";

    function __construct(){
        header('Content-Type:application/json');
        session_start();
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "school_hub";
        $this->con = mysqli_connect($host,$user,$pass,$db);
    }

    public function index($formdata = ''){
        if($formdata != ''){
            echo $formdata;
        }else{
            echo "Welcome to the new routing";
        }
    }

    public function allschools(){
        $sql = "SELECT * FROM tblschool";
        $res = mysqli_query($this->con,$sql);
        $result = [];
        while($row = mysqli_fetch_row($res)){
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function allschoolcategories(){
        $sql = "SELECT * FROM tblcategory";
        $res = mysqli_query($this->con,$sql);
        $result = [];
        while($row = mysqli_fetch_row($res)){
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function schoolreport($schoolid = ''){
        $id = $schoolid;
        $sql = "SELECT reports FROM tblreport WHERE school_id = '$id' ";
        $res = mysqli_query($this->con,$sql);
        $result = [];
        while($row = mysqli_fetch_row($res)){
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function getparticularschooldetails($schoolid = ''){
        $id = 2;
        $sql = "SELECT tblschool.school_name,tblschool.school_description,tblschool.opening_hours,tblschool.address, tblschool.total_reviews, tblschool.average_reviews,tblschool.Date,tblreport.reports,tblreport.date FROM tblschool,tblreport WHERE tblschool.id = '$id' AND tblreport.school_id = '$id' ";
        $res = mysqli_query($this->con,$sql);
        $result = [];
        while($row = mysqli_fetch_row($res)){
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function allreports(){
        $sql = "SELECT * FROM tblreport";
        $res = mysqli_query($this->con,$sql);
        $result = [];
        while($row = mysqli_fetch_row($res)){
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function addreview($schoolid = ''){
        $data = array();
        $id = $schoolid;
        if (isset($_POST['txtreport'])) {
            $starreview = $report = $schoolid = "";
            $starreview = mysqli_real_escape_string($this->con, $_POST['txtreviewstar']);
            $report = mysqli_real_escape_string($this->con, $_POST['txtreport']);
            if(!empty($starreview) && !empty($report)){
                $sql = "INSERT INTO tblreport (school_id, reviews, reports) VALUES ('$id','$starreview','$report')";
                $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
                if($res){
                    $data['success'] = true;
                }
                else{
                    $data['success'] = false;
                }
            }else{
                $data['error'] = "empty";
            }
        }
        echo json_encode($data);

    }

    public function addNewSchool(){
        $response = [];
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'];
        $category = $data['category'];
        //$cacnumber = $data['cacnumber'];
        //$website = $data['website'];
        //$email = $data['email'];
        $address = $data['address'];
        //$phonenumber = $data['phonenumber'];
        $description = $data['description'];
        //$country = $data['country'];
        //$image = $data['image'];
        //$facilities = $data['facilities'];
        $openingtime = $data['openingtime'];
        $closingtime = $data['closingtime'];

        if(!empty($name) && !empty($category) && !empty($address)){
            $sql = "INSERT INTO tblschool (category_id, school_name, school_description, opening_hours, closing_hours, address) VALUES ('$category','$name','$description','$openingtime','$closingtime','$address')";
            $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
            if($res){
                $response['success']=true;
            }
        }
        echo json_encode($response);
    }
}

