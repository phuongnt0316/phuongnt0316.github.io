<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include('connect.php');
include("PHPMailer/src/Exception.php");
include("PHPMailer/src/OAuth.php");
include("PHPMailer/src/POP3.php");
include("PHPMailer/src/PHPMailer.php");
include("PHPMailer/src/SMTP.php");
 class data{
     //register
    public function add_acc($fullname,$email,$password,$gender,$address,$birthday,$file,$level){
        global $conn;
        $sql="insert into register(fullname,email,password,gender,address,birthday,file,level)
        values('$fullname','$email','$password','$gender','$address','$birthday','$file',$level)";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function check_email($email){//kiemtra email da ton tai chua?
        global $conn;
        $sql="select*from register where email='$email'";
        $run=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($run);
        return $count;
    }
    public function login($email,$pass){
        global $conn;
        $sql="select*from register where email='$email' and password='$pass'";
        $run=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($run);
        return $count;
    }
    public function get_register($email,$pass){
        global $conn;
        $sql="select*from register where email='$email' and password='$pass'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function get_user($id_regt){
        global $conn;
        $sql="select*from register where id_regt='$id_regt'";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function update_infor($fullname,$email,$address,$bday,$file,$gender,$id_regt){
        global $conn;
        $sql="update register set  Fullname='$fullname',email='$email', address='$address', birthday='$bday',
         file='$file', gender='$gender' where id_regt='$id_regt'";
        $run=mysqli_query($conn,$sql);
        return $run;
    
    }
    public function delete_user($id_regt){
        global $conn;
        $sql="delete from register where id_regt=$id_regt";
        $run=mysqli_query($conn,$sql);
        return $run;   
    }

    public function update_pass($id_regt,$pass){
        global $conn;
        $sql="update register set password='$pass' where id_regt=$id_regt";
        $run=mysqli_query($conn,$sql);
        return $run;   
    }
    public function get_pass($email){ 
        global $conn;
        $sql="select password from register where email='$email'";
        $run=mysqli_query($conn,$sql);
        $kq=mysqli_fetch_array($run);
        return $kq;
    }
    public function get_name($email){
        global $conn;
        $sql="select Fullname from register where email='$email'";
        $run=mysqli_query($conn,$sql);
        $kq=mysqli_fetch_array($run);
        return $kq;
    }
    public function select_user(){
        global $conn;
        $sql="select *from register";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    //blog
    public function add_blog($id_regt,$id_sub,$name_blog,$add,$s_blog,$l_blog,$img,$check_blog){
        global $conn;
        $sql="insert into blog(id_regt,id_sub,Name_blog,id_add,S_blog,L_blog,Date_blog,image,Check_blog) 
        values($id_regt,$id_sub,'$name_blog','$add','$s_blog','$l_blog',curdate(),'$img',$check_blog)";
        echo $sql;
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function select_blog(){
        global $conn;
        $sql="select*from blog,register where register.id_regt=blog.id_regt";
        $run=mysqli_query($conn,$sql);
        return $run;
    }
    public function post_blog()
{
    global $conn;
    $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and check_blog= 1";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function blog_travel() //blog theo chu de du lich
{
    global $conn;
    $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and check_blog= 1 and id_sub=1";
    $run =mysqli_query($conn,$sql);
    return $run;}
public function blog_dd($id_add) //blog theo dia diem
    {
        global $conn;
        $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and check_blog= 1 and id_add=$id_add";
        $run =mysqli_query($conn,$sql);
        return $run;}
    public function blog_culinary()// blog chu de am thuc
    {
        global $conn;
        $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and check_blog= 1 and id_sub=2";
        $run =mysqli_query($conn,$sql);
        return $run;
    }
public function post_blog3()
{
    global $conn;
    $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and check_blog= 1 ORDER by Date_blog DESC LIMIT 3";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function post_blog5()
{
    global $conn;
    $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and check_blog= 1 ORDER by Date_blog DESC LIMIT 5";
    $run =mysqli_query($conn,$sql);
    return $run;
}
    public function post($id)
{
    global $conn;
    $sql="update blog set check_blog='1' where id_blog= '$id'";
    $run=mysqli_query($conn,$sql);
    return $run;
}
public function unpost($id)
{
    global $conn;
    $sql="update blog set check_blog='0' where id_blog= '$id'";
    $run=mysqli_query($conn,$sql);
    return $run;
}
public function select_blog_id($id_blog){
    global $conn;
    $sql="select*from blog,register where register.id_regt=blog.id_regt and id_blog=$id_blog";
    $run=mysqli_query($conn,$sql);
    return $run;
}
public function update_blog($id_blog,$id_sub,$name_blog,$id_add,$s_blog,$l_blog,$file){
    global $conn;
    $sql="update blog set  id_sub=$id_sub,Name_blog='$name_blog',id_add='$id_add', S_blog='$s_blog', L_blog='$l_blog',Date_blog=CURDATE(),
     image='$file' where id_blog=$id_blog";
    $run=mysqli_query($conn,$sql);
    return $run;

}
public function delete_blog($id_blog){
    global $conn;
    $sql="delete from blog where id_blog=$id_blog";
    $run=mysqli_query($conn,$sql);
    return $run;
}
public function select_user_blog($id_regt){
    global $conn;
    $sql="select*from blog where Id_regt=$id_regt";
    $run=mysqli_query($conn,$sql);
    return $run;
}
public function search_blog($search){
    global $conn;
    $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and L_blog like N'%$search%'";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function check_search_blog($search){
    global $conn;
    $sql="SELECT*from register,blog WHERE register.id_regt=blog.id_regt and L_blog like N'%$search%'";
    $run =mysqli_query($conn,$sql);
    $count=mysqli_num_rows($run);
    return $count;
}
    public function sendMail($username,$password,$address,$subject,$body,$altbody){

        
            $mail= new PHPMailer();
            $mail->SMTPDebug=2;
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->Username=$username;
            $mail->Password=$password;
            $mail->SMTPSecure='tls';
            $mail->Port=587;
            $mail->CharSet='UTF-8';
            $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true;    // enable SMTP authentication
            $mail->setFrom($username);
            $mail->addAddress($address);
            $mail->isHTML(true);
            $mail->Subject=$subject;
            $mail->Body=$body;
            $mail->AltBody=$altbody;
            if(!$mail->Send())
            {
                return 0;
            }
            else{
                return 1;
            }

 }
 //subject
 public function select_devvn_tinhthanhpho(){
    global $conn;
    $sql="SELECT*from devvn_tinhthanhpho";
    $run =mysqli_query($conn,$sql);
    return $run;
 }
 public function select_nametp($id){
    global $conn;
    $sql="SELECT*from devvn_tinhthanhpho where matp='$id'";
    $run =mysqli_query($conn,$sql);
    return $run;
 }
 public function select_subject(){
    global $conn;
    $sql="SELECT*from subject";
    $run =mysqli_query($conn,$sql);
    return $run;
 }
 //contact
 public function contact($name,$email){
    global $conn;
    $sql="insert into contact(name,email) values('$name','$email')";
    $run=mysqli_query($conn,$sql);
    return $run;
 }
 public function check_contact($email){ //email da ton tai o bang contact chua
     global $conn;
     $sql="select*from contact where email='$email'";
     $run=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($run);
     return $count;
 }
public function select_contact(){
    global $conn;
    $sql="select*from contact";
    $run=mysqli_query($conn,$sql);
    return $run;
}
//add_blog
public function select_add(){//chon add_bog
    global $conn;
    $sql="SELECT*from add_blog";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function select_id($id){// chon add_blog theo id
    global $conn;
    $sql="SELECT*from add_blog where id_add=$id";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function update_id($id,$name){ // cap nhat add_blog theo id
    global $conn;
    $sql="update add_blog set name_add='$name' where id_add=$id";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function delete_id($id){// xoa add_blog theo id
    global $conn;
    $sql="delete from add_blog where id_add=$id";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function insert_id($name){// them moi id
    global $conn;
    $sql="insert into add_blog(name_add) values('$name')";
    $run =mysqli_query($conn,$sql);
    echo $sql;
    return $run;
}
//header_blog
public function insert_hd($name,$cont,$f1,$f2,$f3,$check_hd){// them moi id
    global $conn;
    $sql="insert into header_blog(name_header,content,file1,file2,file3,check_hd) 
    values('$name','$cont','$f1','$f2','$f3',$check_hd)";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function select_hd(){//chon tat ca bai viet chu de
    global $conn;
    $sql="select *from header_blog";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function post_hd(){// hien thi bai viet chu de
    global $conn;
    $sql="select *from header_blog where check_hd=1";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function update_hd0(){// set tat ca check=0
    global $conn;
    $sql="update  header_blog set check_hd=0";
    $run =mysqli_query($conn,$sql);
    return $run;
}
public function update_hd1($id){ // cho blog chu de da chon bang 1
    global $conn;
    $sql="update  header_blog set check_hd=1 where id_header=$id";
    $run =mysqli_query($conn,$sql);
    return $run;
}
 
}