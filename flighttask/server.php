    <?php
    $action = $_POST['action'];
    // $header = getallheaders();
    // echo $action;
    // echo $header;
    $headers = getallheaders();

    $key = isset($headers['API-KEY']) ? $headers['API-KEY'] : null;
    if($key=="UPDATEVALUES"){
        if($action=="updateValues"){
            echo "yes update value";
        }
    }

    if($action=='search'){
        echo search($action);
    }
    else if($action=='update'){
        // echo update($action);
        $data_id = $_POST['data_id'];
        echo update($data_id);
    }else if($action = 'updateValues' && $header=='UPDATEVALUES'){
        echo "yes true";
    }



    function search($action){
        $data = $_POST['datas'];
        $dataVal = json_decode($data, true);
        $source = $dataVal['source'];
        $des = $dataVal['destination'];

        $output = [];
        include 'configuration/config.php';
        $sel = $connect->query("select * from data where source='$source' and destination='$des';");
        $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($output["datas"]);
        
    }
    function update($data_id){
        include 'configuration/config.php';
        $output = [];
        $sel = $connect->query("select * from data where data_id='$data_id';");
        $output["datas"] = $sel->fetch(PDO::FETCH_ASSOC);
        echo json_encode($output["datas"]);
    }

    ?>
