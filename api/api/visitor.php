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
        $sql = "SELECT id, School_Name, Email, Address, Country, Image, Phone_Number, Status, Total_Rating, Rate_Count, Description, Opening_Time, Closing_Time, Total_Rating / Rate_Count AS Average_Rating FROM tblschools WHERE tblschools.id = '$id'";
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
        $sql = "SELECT id, School_Id, Comment, Rating, Review_Type, Date FROM tblreviews WHERE tblreviews.School_Id = '$id'";
        $res = mysqli_query($this->con, $sql);
        $result = [];
        while ($row = mysqli_fetch_row($res)) {
            $result[] = $row;
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

    public function addreview($schoolid = '')
    {
        $response = [];
        $data = json_decode(file_get_contents("php://input"), true);
        $type = $data['reviewtype'];
        $description = $data['reviewdescription'];
        $stars = $data['stars'];

        if (!empty($type) && !empty($description) && !empty($stars)) {
            $sql = "INSERT INTO tblreviews (School_Id, Comment, Rating, Review_Type) VALUES ('$schoolid','$description','$stars','$type')";
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

