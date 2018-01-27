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

    public function addnewschool(){
        $data = array();
        if(isset($_POST['txtschoolname'])){
            $schoolname = mysqli_real_escape_string($this->con, $_POST['txtschoolname']);
            $schoolcategory = mysqli_real_escape_string($this->con, $_POST['ddschoolcategory']);
            $schoolwebsite = mysqli_real_escape_string($this->con, $_POST['txtschoolwebsite']);
            $schooladdress = mysqli_real_escape_string($this->con, $_POST['txtschooladdress']);
            $schoolcity = mysqli_real_escape_string($this->con, $_POST['txtschoolcity']);
            $schoolstate = mysqli_real_escape_string($this->con, $_POST['txtschoolstate']);
            $schoolcountry = mysqli_real_escape_string($this->con, $_POST['txtschoolcountry']);
            $schoolpostalcode = mysqli_real_escape_string($this->con, $_POST['txtschoolpostalcode']);
            $schoolownername = mysqli_real_escape_string($this->con, $_POST['txtschoolownername']);
            $schoolemail = mysqli_real_escape_string($this->con, $_POST['txtschoolemail']);
            $schoolphone = mysqli_real_escape_string($this->con, $_POST['txtschoolphone']);
            $schooluserdesignation = mysqli_real_escape_string($this->con, $_POST['txtschooluserdesignation']);
            $schooldescription = mysqli_real_escape_string($this->con, $_POST['txtschooldescription']);
            $schoolopentime = mysqli_real_escape_string($this->con, $_POST['txtschoolopentime']);
            $schoolclosetime = mysqli_real_escape_string($this->con, $_POST['txtschoolclosetime']);
            if(!empty($schoolname) && !empty($schoolcategory) && !empty($schooladdress)){
                
            }
            
        }
    }

    public function addpropertygroup(){
        $data = array();
        if(isset($_POST['txtpropertytype'])){
            $propertytype = mysqli_real_escape_string($this->con, $_POST['txtpropertytype']);
            $propertyprice = mysqli_real_escape_string($this->con, $_POST['txtpropertyprice']);
            if(!empty($propertytype) && !empty($propertyprice)){
                $sql = "INSERT INTO tblpropertygroup (property_type, property_price) VALUES ('$propertytype','$propertyprice') ";
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

    public function deletepropertygroup($propertygroupid = ''){
        $data = array();
        $id = 5;
        if(isset($_POST)){

            $sql = "DELETE FROM tblpropertygroup WHERE id = '$id' ";
            $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
            if($res){
                $data['success'] = true;
            }
            else{
                $data['success'] = false;
            }
        }
        echo json_encode($data);
    }

    public function createticket($userid = ''){
        $data = array();
        $id = $userid;
        if (isset($_POST['txtticketsubject'])){
            $ticketsubject = $ticketpriority = $ticketpropertyid = $userid = "";
            $ticketsubject = mysqli_real_escape_string($this->con, $_POST['txtticketsubject']);
            $ticketpriority = mysqli_real_escape_string($this->con, $_POST['ddticketpriority']);
            $ticketpropertyid = mysqli_real_escape_string($this->con, $_POST['ddproperty']);
            if(!empty($ticketsubject) && !empty($ticketpriority) && !empty($ticketpropertyid)){
                $sql = "INSERT into tbltickets (subject,status,priority,property_id,user_id) VALUES ('$ticketsubject','pending','$ticketpriority','$ticketpropertyid','$id')";
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

    public function fundwallet($userid = ''){
        $data = array();
        $id = 6;
        if(isset($_POST['txtamount'])){
            $walletamount = mysqli_real_escape_string($this->con, $_POST['txtamount']);
            if(!empty($walletamount)){
                $sql = "INSERT into tblwallet (amount,user_id) VALUES ('$walletamount','$id') ";
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



    /**
     *method for updating properties added by agents
     */
    public function updateproperty($propertyid = ''){
        $data = array();
        $id = 2;
        if(isset($_POST['txtpropertyname'])){
            $propertyname = $propertygroupid = $address = $userid = '';
            $propertyname = mysqli_real_escape_string($this->con, $_POST['txtpropertyname']);
            $propertygroupid = mysqli_real_escape_string($this->con, $_POST['txtpropertygroupid']);
            $address = mysqli_real_escape_string($this->con, $_POST['txtaddress']);
            if(!empty($propertyname) || !empty($propertygroupid) || !empty($address)){
                $sql = "UPDATE tblproperty SET property_name = '$propertyname', propertygroup_id = '$propertygroupid', address = '$address' WHERE id = '$id' ";
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

    public function deleteproperty($propertyid = ''){
        $data = array();
        $id = 2;
        if(isset($_POST)){

            $sql = "DELETE FROM tblproperty WHERE id = '$id' ";
            $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
            if($res){
                $data['success'] = true;
            }
            else{
                $data['success'] = false;
            }
        }
        echo json_encode($data);
    }

    public function deactivateagentaccount($userid = ''){
        $data = array();
        $id = 6;
        $sql = "UPDATE tbllogindetails SET activation = '1' WHERE user_id = '$id' ";
        $res = mysqli_query($this->con, $sql) or die(mysqli_error($this->con));
        if($res){
            $data['success'] = true;
        }
        else{
            $data['success'] = false;
        }
        
        echo json_encode($data);
    }

    


}
