<?php

function getTableDataByTableName($table, $order = 'asc', $column='name', $dataType = '') {
    global $db;
    $dataContainer  =   [];
    $sql = "SELECT * FROM $table order by $column $order";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        if (isset($dataType) && $dataType == 'obj') {
            while ($row = $result->fetch_object()) {
                $dataContainer[] = $row;
            }
        } else {
            while ($row = $result->fetch_assoc()) {
                $dataContainer[] = $row;
            }
        }
    }
    return $dataContainer;
}

function saveData($table, $dataParam) {
    global $db;
    $fields_array   =   array_keys($dataParam);   
    $fields         =   implode(',', array_keys($dataParam));
    $values         =   "'" . implode ( "', '", array_values($dataParam) ) . "'";;
    $sql            = "INSERT INTO $table ($fields) VALUES ($values)";

    if ($db->query($sql) === TRUE) {
        $feedbackData   =   [
            'status'    =>  'success',
            'data'      =>  'Data have been successfully inserted',
            'last_id'   =>  $db->insert_id,
        ];
        return $feedbackData;
    } else {
        $feedbackData   =   [
            'status'    =>  'error',
            'data'      =>  "Error: " . $sql . "<br>" . $db->error,
            'last_id'   =>  '',
        ];
        return $feedbackData;
    }
}

function getNameByIdAndTable($table){
    global $db;
    $sql = "SELECT * FROM $table";
    $result = $db->query($sql);
    $name   =   '';
    if ($result->num_rows > 0) {
        $name   =   $result->fetch_object()->name;
    }
    return $name;
}
function getDataRowIdAndTable($table){
    global $db;
    $sql = "SELECT * FROM $table";
    $result = $db->query($sql);
    $name   =   '';
    if ($result->num_rows > 0) {
        return $result->fetch_object();
    }
}

function getDataRowByTableAndId($table, $id){
    global $db;
    $sql    = "SELECT * FROM $table where id=".$id;
    $result = $db->query($sql);
    $name   =   '';
    if ($result->num_rows > 0) {
        return $result->fetch_object();
    }else{
        return false;
    }
}
function getDefaultCategoryCode($table, $fieldName, $modifier, $defaultCode, $prefix){
    global $db;
    $sql    = "SELECT count($fieldName) as total_row FROM $table";
    $result = $db->query($sql);
    $name   =   '';
    $lastRows   = $result->fetch_object();
    $number     = intval($lastRows->total_row) + 1;
    $defaultCode = $prefix.sprintf('%'.$modifier, $number);
    return $defaultCode;
    
}
function isDuplicateData($table, $where, $notWhere=''){
    global $db;
    $sql='';
    $sql.="SELECT * FROM $table where $where ";
    if(isset($notWhere) && !empty($notWhere)){
        $sql.=" And $notWhere";
    }
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        return true;
    }
    return false;
}
function getDataRowByTable($table){
    global $db;
    $sql = "SELECT * FROM $table";
    $result = $db->query($sql);
    $name   =   '';
    if ($result->num_rows > 0) {
        return $result->num_rows;
    }
    return "0";
}
function deleteRecordByTableAndId($table,$fieldName,$id){
    global $db;
    $sql            = "DELETE FROM $table WHERE $fieldName=".$id;
    if ($db->query($sql) === TRUE) {
        $feedbackData   =   [
            'status'    =>  'success',
            'message'   =>  'Data have been successfully Deleted',
        ];
        return $feedbackData;
    } else {
        $feedbackData   =   [
            'status'    =>  'error',
            'message'   =>  "Error: " . $sql . "<br>" . $db->error,
        ];
        return $feedbackData;
    }
}

function is_super_admin($userType){
    if($userType    ==  'su'){
        return true;
    }
    return false;
}

//functions to loop day,month,year
function formDay(){
    for($i=1; $i<=31; $i++){
        $selected = ($i==date('d'))? ' selected' :'';
        echo '<option'.$selected.' value="'.$i.'">'.$i.'</option>'."\n";
    }
}
//with the -8/+8 month, meaning june is center month
function formMonth(){
    $month = strtotime(date('Y').'-'.date('m').'-'.date('j').' - 8 months');
    $end = strtotime(date('Y').'-'.date('m').'-'.date('j').' + 8 months');
    while($month < $end){
        $selected = (date('F', $month)==date('F'))? ' selected' :'';
        echo '<option'.$selected.' value="'.date('F', $month).'">'.date('F', $month).'</option>'."\n";
        $month = strtotime("+1 month", $month);
    }
}
function formYear($startYear = false){
    if($startYear){
        $i  =   $startYear;
    }else{
        $i  =   1980;
    }
    for($i; $i<=date('Y'); $i++){
        $selected = ($i==date('Y'))? ' selected' :'';
        echo '<option'.$selected.' value="'.$i.'">'.$i.'</option>'."\n";
    }
}