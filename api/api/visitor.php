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

    function __construct()
    {
        header('Content-Type:application/json');
        session_start();
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "school_hub";
        $this->con = mysqli_connect($host, $user, $pass, $db);
    }

    public function index($formdata = '')
    {
        if ($formdata != '') {
            echo $formdata;
        } else {
            echo "Welcome to the new routing";
        }
    }

    public function allschools()
    {
        $sql = "SELECT id, School_Name, Email, Address, Country, Image, Phone_Number, Status, Total_Rating, Rate_Count, Description, Opening_Time, Closing_Time, Total_Rating / Rate_Count AS Average_Rating  FROM tblschools";
        $res = mysqli_query($this->con, $sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)) {
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function topschools()
    {
        $sql = "SELECT id, School_Name, Email, Address, Country, Image, Phone_Number, Status, Total_Rating, Rate_Count, Description, Opening_Time, Closing_Time, Total_Rating / Rate_Count AS Average_Rating FROM tblschools WHERE Status = '1' ORDER BY Average_Rating DESC LIMIT 0,7";
        $res = mysqli_query($this->con,$sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)){
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function schoolleaderboard()
    {
        $sql = "SELECT id, School_Name, Email, Address, Country, Image, Phone_Number, Status, Total_Rating, Rate_Count,Description, Opening_Time, Closing_Time, Total_Rating / Rate_Count AS Average_Rating FROM tblschools WHERE Status = '1' ORDER BY Average_Rating DESC";
        $res = mysqli_query($this->con,$sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)){
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }


    public function allschoolcategories()
    {
        $sql = "SELECT id, Category_Name FROM tblcategory";
        $res = mysqli_query($this->con, $sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)) {
            $result[] = $row;
        }
        echo json_encode($result);
    }

    public function allreviewtypes()
    {
        $sql = "SELECT id, Review_Name FROM tblreviewtype";
        $res = mysqli_query($this->con, $sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)) {
            $result[] = $row;
        }
        echo json_encode($result);
    }

    public function schoolreport($schoolid = '')
    {
        $id = $schoolid;
        $sql = "SELECT reports FROM tblreport WHERE school_id = '$id' ";
        $res = mysqli_query($this->con, $sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)) {
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function getparticularschooldetails($schoolid = '')
    {
        $id = $schoolid;
        $sql = "SELECT id, School_Name, Email, Address, Country, Image, Phone_Number, Status, Total_Rating, Rate_Count, Description, Opening_Time, Closing_Time, Total_Rating / (Rate_Count * 4) AS Average_Rating FROM tblschools WHERE tblschools.id = '$id'";
        $res = mysqli_query($this->con, $sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)) {
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function getschoolreview($schoolid = '')
    {
        $id = $schoolid;
        $sql = "SELECT DISTINCT Comment FROM tblreviews WHERE tblreviews.School_Id = '$id' ORDER BY id ASC";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        $result = [];
        $count = 0;
        while ($row = mysqli_fetch_row($res)) {
            $sql1 = "SELECT Comment, sum(Rating)/4 as ratingSum, Date FROM tblreviews WHERE Comment = '$row[0]'";
            $res1 = mysqli_query($this->con,$sql1);
            $row1 = mysqli_fetch_assoc($res1);
            $result[$count]["Comment"] = $row1["Comment"];
            $result[$count]["Rating"] = $row1["ratingSum"];
            $result[$count]["Date"] = $row1["Date"];
            $count++;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function allreports()
    {
        $sql = "SELECT * FROM tblreport";
        $res = mysqli_query($this->con, $sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)) {
            $result[] = $row;
        }
        header('Content-Type:application/json');
        echo json_encode($result);
    }

    public function checkReviewer($schoolid = ''){
        $response = array();
        $data = json_decode(file_get_contents("php://input"), true);
        $phone = $data["phone"];
        echo $phone;
        $sql = "SELECT id FROM tblusers WHERE School_Id = '$schoolid' AND Phone_Number = '$phone'";
        $res = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($res) > 0){
            $response["success"] = true;
        }else{
            $response["success"] = false;
        }
        echo json_encode($response);
    }

    public function getTopicRating($schoolid = ''){
        $response = array();
        $sql = "SELECT Rating FROM tblreviews WHERE School_Id = '$schoolid' AND Review_Type = 1";
        $res = mysqli_query($this->con, $sql);
        $count = 0;
        $sumrating = 0;
        while ($row = mysqli_fetch_row($res)){
            $sumrating += $row[0];
            $count++;
        }
        $response["Facilities"] = $sumrating/$count;
        $response["Facilities"] = $response["Facilities"] == "" ? 0 : $response["Facilities"];
        $sql = "SELECT Rating FROM tblreviews WHERE School_Id = '$schoolid' AND Review_Type = 2";
        $res = mysqli_query($this->con, $sql);
        $count = 0;
        $sumrating = 0;
        while ($row = mysqli_fetch_row($res)){
            $sumrating += $row[0];
            $count++;
        }
        $response["Academic"] = $sumrating/$count;
        $response["Academic"] = $response["Academic"] == "" ? 0 : $response["Academic"];
        $sql = "SELECT Rating FROM tblreviews WHERE School_Id = '$schoolid' AND Review_Type = 3";
        $res = mysqli_query($this->con, $sql);
        $count = 0;
        $sumrating = 0;
        while ($row = mysqli_fetch_row($res)){
            $sumrating += $row[0];
            $count++;
        }
        $response["Quality"] = $sumrating/$count;
        $response["Quality"] = $response["Quality"] == "" ? 0 : $response["Quality"];
        $sql = "SELECT Rating FROM tblreviews WHERE School_Id = '$schoolid' AND Review_Type = 4";
        $res = mysqli_query($this->con, $sql);
        $count = 0;
        $sumrating = 0;
        while ($row = mysqli_fetch_row($res)){
            $sumrating += $row[0];
            $count++;
        }
        $response["Learning"] = $sumrating/$count;
        $response["Learning"] = $response["Learning"] == "" ? 0 : $response["Learning"];
        echo json_encode($response);
    }

    public function addreview($schoolid = '')
    {
        $response = [];
        $data = json_decode(file_get_contents("php://input"), true);
        $phone = $data['reviewphonenumber'];
        $description = $data['reviewdescription'];
        $stars = $data['reviewstars'];

        $facilities = $stars["Facilities"];
        $academic = $stars["Academic"];
        $quality = $stars["Quality"];
        $learning = $stars["Learning"];

        $sql = "INSERT INTO tblreviews (School_Id, Comment, Rating, Review_Type) VALUES ('$schoolid', '$description', '$facilities', '1')";
        $res = mysqli_query($this->con,$sql);
        if($res){
            $sql = "INSERT INTO tblreviews (School_Id, Comment, Rating, Review_Type) VALUES ('$schoolid', '$description', '$academic', '2')";
            $res = mysqli_query($this->con,$sql);
            if($res){
                $sql = "INSERT INTO tblreviews (School_Id, Comment, Rating, Review_Type) VALUES ('$schoolid', '$description', '$quality', '3')";
                $res = mysqli_query($this->con,$sql);
                if($res){
                    $sql = "INSERT INTO tblreviews (School_Id, Comment, Rating, Review_Type) VALUES ('$schoolid', '$description', '$learning', '4')";
                    $res = mysqli_query($this->con,$sql);
                    if($res){
                        $sql = "INSERT INTO tblusers (School_Id, Phone_Number) VALUES ('$schoolid', '$phone')";
                        $res = mysqli_query($this->con,$sql);
                        if($res){
                            $response['success'] = true;
                        }else{
                            $response['success'] = false;
                        }
                    }else{
                        $response['success'] =false;
                    }
                }else{
                    $response['success'] =false;
                }
            }else{
                $response['success'] =false;
            }
        }else{
            $response['success'] =false;
        }
        echo json_encode($response);
    }

    public function addNewSchool()
    {
        $response = [];
        $data = json_decode(file_get_contents("php://input"), true);
        $name = $data['name'];
        $category = $data['category'];
        $cacnumber = $data['cacnumber'];
        $website = $data['website'];
        $email = $data['email'];
        $address = $data['address'];
        $phonenumber = $data['phonenumber'];
        $description = $data['description'];
        $country = $data['country'];
        $image = $data['image'];
        $openingtime = $data['openingtime'];
        $closingtime = $data['closingtime'];

        if (!empty($name) && !empty($category) && !empty($address)) {
            $sql = "INSERT INTO tblschools (Category_Id, School_Name, Description, Opening_Time, Closing_Time, Address, Email, Website, CAC, Country, Image, Phone_Number) VALUES ('$category','$name','$description','$openingtime','$closingtime','$address','$email','$website','$cacnumber','$country','$image','$phonenumber')";
            $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
            if ($res) {
                $response['success'] = true;
            }
        }
        echo json_encode($response);
    }

    public function updateParticularSchoolReview($schoolid = '')
    {
        $response = [];
        $data = json_decode(file_get_contents("php://input"), true);
        $totalrating = $data['totalrating'];
        $ratecount = $data['ratecount'];

        if (!empty($totalrating) && !empty($ratecount)) {
            $sql = "UPDATE tblschools SET Total_Rating = '$totalrating', Rate_Count = '$ratecount' WHERE id = '" . $schoolid . "'";
            $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
            if ($res) {
                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
        } else {
            $response['error'] = "empty";
        }
        echo json_encode($response);
    }

    public function uploadSchoolImage()
    {
        $response = [];
        if (!empty($_FILES['image'])) {
            $file_name = $_FILES["image"]["name"];
            $file_tmp = $_FILES["image"]["tmp_name"];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $target_path = $_SERVER['DOCUMENT_ROOT'] . "/schoolhub/assets/img/" . $file_name;
            if (!file_exists($target_path)) {
                move_uploaded_file($file_tmp, $target_path);
                $response['success'] = $file_name;
            }else{
                $response['success'] = $file_name;
            }
        }else{
            $response['success'] = false;
        }
        echo json_encode($response);
    }
}

