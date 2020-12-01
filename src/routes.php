<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });


$app->get("/getUser/{id}/", function (Request $request, Response $response,$args){
    $id=$args["id"];
    $sql = "SELECT * FROM user where id=$id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch([":id" => $id]);
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

$app->get("/getListUser/", function (Request $request, Response $response){
    $sql = "SELECT * FROM user";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

$app->get("/getCompany/{id}/", function (Request $request, Response $response, $args){
    $id=$args["id"];
    $sql = "SELECT * FROM company where id=$id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});

$app->get("/getListCompany/", function (Request $request, Response $response){

    $sql = "SELECT * FROM company";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});


$app->get("/getBudgetCompany/{id}/", function (Request $request, Response $response, $args){
    $id=$args['id'];
    $sql = "SELECT * FROM company_budget where id=$id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([":id" => $id]);
    $result = $stmt->fetch();

    return $response->withJson(["status" => "success", "data" => $result], 200);
});


$app->get("/getListBudgetCompany/", function (Request $request, Response $response){

    $sql = "SELECT * FROM company_budget";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});



$app->get("/getLogTransaction/", function (Request $request, Response $response){

    $sql = "SELECT * FROM transaction join user on user.id=transaction.user_id join company on user.company_id=company.id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson(["status" => "success", "data" => $result], 200);
});


$config = ['settings' => [
    'addContentLengthHeader' => false,
]];

$app->post("/createCompany/", function (Request $request, Response $response){

    $name=$_REQUEST['name'];
    $address=$_REQUEST['address'];

    $sql = "INSERT INTO company (name, address) VALUE ('$name', '$address')";
    $stmt = $this->db->prepare($sql);

    if($stmt->execute())
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});


$app->put("/updateCompany/{id}/", function (Request $request, Response $response, $args){
    
    $name = $_REQUEST['name'];
    $address=$_REQUEST['address'];
    $id = $args["id"];
    
    $sql = "UPDATE company SET name='$name', address='$address' WHERE id=$id";
    $stmt = $this->db->prepare($sql);
    
    if($stmt->execute())
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

$app->delete("/deleteCompany/{id}/", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $sql = "DELETE FROM company WHERE id=$id";
    $stmt = $this->db->prepare($sql);
    
    if($stmt->execute())
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});



$app->post("/createUser/", function (Request $request, Response $response){

    $first_name=$_REQUEST['first_name'];
    $last_name=$_REQUEST['last_name'];
    $email=$_REQUEST['email'];
    $account=$_REQUEST['account'];
    $company_id=$_REQUEST['company_id'];
    $bank=$_REQUEST['bank'];
    $no_rek=$_REQUEST['no_rek'];

    $sql = "INSERT INTO user (last_name,first_name,email,account,company_id,bank,no_rek) 
            VALUE ('$first_name', '$last_name','$email','$account','$company_id','$bank','$no_rek')";
    $stmt = $this->db->prepare($sql);

    if($stmt->execute())
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});


$app->put("/updateUser/{id}/", function (Request $request, Response $response, $args){
    
    $first_name=$_REQUEST['first_name'];
    $last_name=$_REQUEST['last_name'];
    $email=$_REQUEST['email'];
    $account=$_REQUEST['account'];
    $company_id=$_REQUEST['company_id'];
    $bank=$_REQUEST['bank'];
    $no_rek=$_REQUEST['no_rek'];
    $id = $args["id"];
    
    $sql = "UPDATE user SET first_name='$first_name', last_name='$last_name',email='$email' 
            ,account='$account',company_id='$company_id',bank='$bank',no_rek='$no_rek' where id=$id";
    $stmt = $this->db->prepare($sql);
    
    if($stmt->execute())
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});

$app->delete("/deleteUser/{id}/", function (Request $request, Response $response, $args){
    $id = $args["id"];
    $sql = "DELETE FROM user WHERE id=$id";
    $stmt = $this->db->prepare($sql);
    
    if($stmt->execute())
       return $response->withJson(["status" => "success", "data" => "1"], 200);
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});


$app->post("/createTransaction/", function (Request $request, Response $response){

    $type=$_REQUEST['type'];
    $user_id=$_REQUEST['user_id'];
    $amount=$_REQUEST['amount'];
    if ($type != 'R' && $type != 'S' && $type != 'C'){

    return $response->withJson(["status" => "failed", "data" => "0","messsage"=>"Type should R,S or C"], 200);
    }

    $get_user="select*from user where id=$user_id";
    $stmt = $this->db->prepare($get_user);

    $stmt->execute();
    $result = $stmt->fetch();
    

    $sql="UPDATE `company_budget` SET `amount`=amount-$amount where company_id=$result[company_id]";

    $stmt = $this->db->prepare($sql);
    
    if($stmt->execute()){
        $sql = "INSERT INTO transaction (type,user_id,amount)  VALUE ('$type', '$user_id','$amount')";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            return $response->withJson(["status" => "success", "data" => "1"], 200);
        }
    }
    
    return $response->withJson(["status" => "failed", "data" => "0"], 200);
});



};
